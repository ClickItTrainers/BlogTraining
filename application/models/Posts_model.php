<?php

	class Posts_model extends CI_Model{

		public function __construct(){

			parent::__construct();
		}

		// Sends a list of the posts in Home page
		public function posts_list(){
			$this->db->order_by('id_post', 'desc');
			//$this->db->limit(5);
			$query = $this->db->get('posts');
			return $query->result();
		}

		// Sends a list of the users
		public function users_list(){
			$query = $this->db->get('users');
			return $query->result();
		}

		//Update the information of the post
		public function update_post($id_post, $title, $description, $content)
	  {
	    $data = array(
	      'title' => $title,
	      'description' => $description,
	      'content' => $content
	    );
	    $this->db->where('id_post', $id_post);
	    return $this->db->update('posts', $data);
	  }

		// Sends the details of one post by ID
		public function posts_details($id_post){
			$this->db->where('id_post', $id_post);
			$query = $this->db->get('posts');
			return $query->row();
		}

		public function insert($table, $data){
                return $this->db->insert($table, $data);
        }

        // Sends a list of the posts of the user
		public function posts_list_user($id_user){
			$this->db->select('*');
			$this->db->from('posts p');
			$this->db->join('users u', 'p.id_user = u.id_user');
			$this->db->where('p.id_user', $id_user);
			$this->db->order_by('id_post', 'desc');
			return $this->db->get()->result();
		}

		public function delete_post($id_post)
		{
			$this->db->where('id_post', $id_post);
			return $this->db->delete('posts');
		}

		// Sends the comments of one post
		public function getComments($id_post){
        	$this->db->where('id_post', $id_post);
        	$this->db->order_by('id_comment', 'desc');
        	return $this->db->get('comments')->result();
		}

	}
