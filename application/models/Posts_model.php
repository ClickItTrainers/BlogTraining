<?php

	class Posts_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		// Sends a list of the posts in Home page
		public function posts_list(){
			$this->db->order_by('id_post', 'desc');
			$query = $this->db->get('posts');
			return $query->result();
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
		public function posts_list_user($user){
			$this->db->where('username', $user);
			$this->db->order_by('id_post', 'desc');
			$query = $this->db->get('posts');
			return $query->result();
		}

		// Sends the comments of one post
		public function getComments($id_post){
        	$this->db->where('id_post', $id_post);
        	$this->db->order_by('id_comment', 'desc');
        	return $this->db->get('comments')->result();
		}

	}
