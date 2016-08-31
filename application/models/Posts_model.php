<?php

	class Posts_model extends CI_Model{

		public function __construct(){

			parent::__construct();
		}

		// Sends a list of the posts in Home page
		public function posts_list($init = false, $limit = false){
			$this->db->select('p.*, c.name');
			$this->db->from('posts p');
			$this->db->join('categories c', 'p.id_category = c.id_category');
			$this->db->order_by('id_post', 'desc');
			if($init!== false && $limit !== false)
			{
				$this->db->limit($limit, $init);
			}
			$query = $this->db->get();
			return $query->result();
		}

		//Gets the post of the same category
		public function get_post_category($id_category){
			$this->db->select('p.*, c.name');
			$this->db->from('posts p');
			$this->db->join('categories c', 'p.id_category = c.id_category');
			$this->db->where('c.id_category', $id_category);
			$this->db->order_by('id_post', 'desc');
			$res = $this->db->get();

			return $res->result();
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

		public function delete_comment($id_comment)
		{
			$this->db->where('id_comment', $id_comment);
			return $this->db->delete('comments');
		}

		// Sends a list of the users
		public function users_list(){
			$query = $this->db->get('users');
			return $query->result();
		}

		//Update the information of the post
		public function update_post($id_post,$url, $title, $description, $content){
	    $data = array(
				'url_post' => $url,
	      'title' => $title,
	      'description' => $description,
	      'content' => $content
	    );
	    $this->db->where('id_post', $id_post);
	    return $this->db->update('posts', $data);
	    }

		// Sends the details of one post by ID
		public function posts_details($url_post){
			$this->db->select('p.*, c.name');
			$this->db->from('posts p');
			$this->db->join('categories c', 'p.id_category = c.id_category');
			$this->db->where('url_post', $url_post);
			$this->db->order_by('id_post', 'desc');
			$query = $this->db->get('');
			return $query->row();
		}

		public function insert($table, $data){
                return $this->db->insert($table, $data);
        }

        // Sends a list of the posts of the user
		public function posts_list_user($id_user){
			$this->db->select('*', 'c.name');
			$this->db->from('posts p');
			$this->db->join('users u', 'p.id_user = u.id_user');
			$this->db->join('categories c', 'p.id_category = c.id_category');
			$this->db->where('p.id_user', $id_user);
			$this->db->order_by('id_post', 'desc');
			return $this->db->get()->result();
		}

		public function delete_post($id_post){
			$this->db->where('id_post', $id_post);
			return $this->db->delete('posts');
		}

		//test
		public function get_comments($id_post){
			$this->db->select('u.username,c.*');
			$this->db->from('users u, comments c');
			$this->db->where('u.id_user=c.id_user');
			$this->db->where('c.id_post', $id_post);
			$this->db->order_by('id_comment', 'desc');
			return $this->db->get()->result();
		}

		//
		public function search_posts($q){
			$this->db->select('p.*, c.name');
			$this->db->from('posts p');
			$this->db->join('categories c', 'p.id_category = c.id_category');
			$this->db->like('title', $q, 'both');
			$this->db->order_by('id_post', 'desc');
			return $this->db->get()->result();
		}

	}
