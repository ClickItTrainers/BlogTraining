<?php

class Users_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		// Gets the user id of the user that is logged in
		public function get_userID(){
			$user = $this->session->userdata('username');
			$this->db->select('id_user');
			$this->db->from('users');
			$this->db->where('username', $user);

			$query = $this->db->get();

			foreach ($query->result() as $row){
				   $id_user = $row->id_user;
			}
			return $id_user;
		}

		// Gets the email of the owner of the post
		public function get_email($id_post){
			$this->db->select('email');
			$this->db->from('users u');
			$this->db->join('posts p', 'u.id_user = p.id_user');
			$this->db->where('id_post', $id_post);

			$query = $this->db->get();

			foreach ($query->result() as $row){
				   $email = $row->email;
			}
			return $email;
		}

		// Gets the username, owner of the post
		public function get_username($id_post){
			$this->db->select('username');
			$this->db->from('users u');
			$this->db->join('posts p', 'u.id_user = p.id_user');
			$this->db->where('id_post', $id_post);

			$query = $this->db->get();

			foreach ($query->result() as $row){
				   $username = $row->username;
			}
			return $username;
		}
}