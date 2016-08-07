<?php

	class Comment_model extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		// Inserts the comment with all data in the database
		public function insert_comment($id_post, $id_user, $comment){
			$data = array(
				'id_post' => $id_post,
				'id_user' => $id_user,
				'date' => date('Y-m-d H:i:s'),
				'comment' => $comment
			);
			$query = $this->db->insert('comments', $data);
			return $query->result();
		}
	}