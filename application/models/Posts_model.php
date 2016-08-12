<?php

	class Posts_model extends CI_Model{

		public function __construct(){

			parent::__construct();
		}

		// Sends a list of the posts in Home page
		public function posts_list($init = false, $limit = false){
			$this->db->order_by('id_post', 'desc');
			//$this->db->limit(5);
			if($init!== false && $limit !== false)
			{
				$this->db->limit($limit, $init);
			}
			$query = $this->db->get('posts');
			return $query->result();
		}

		// Gets the date in a long format
		public function get_date(){
			$this->db->select('date', "DATE_FORMAT(date,'%b %d %Y %h:%i %p')");
			$this->db->from('posts');
			$date = null;
			$query = $this->db->get();

			foreach ($query->result() as $row){
				   $date = $row->date;
			}
			return $date;
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

		//test
		public function get_comments($id_post)
		{
			$this->db->select('u.username,c.*');
			$this->db->from('users u, comments c');
			$this->db->where('u.id_user=c.id_user');
			$this->db->where('c.id_post', $id_post);
			$this->db->order_by('id_comment', 'desc');
			return $this->db->get()->result();
		}
	}
