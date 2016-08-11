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

		//Delete the user that the admin selected
		public function delete_user($id_user)
		{
			$this->db->where('id_user', $id_user);
			return $this->db->delete('users');
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

		//Gets all the users for the admins
		public function get_users(){
			$this->db->order_by('id_user', 'desc');
			$query = $this->db->get('users');
			return $query->result();
		}


		//
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

		public function get_username_iduser($id_user){
			$this->db->select('username');
			$this->db->from('users');
			$this->db->where('id_user', $id_user);
			$query = $this->db->get();
			foreach ($query->result() as $row){
					 $username = $row->username;
			}
			return $username;
		}

		// Gets the user type of the user that is logged in
		/*public function get_userType(){
			$user = $this->session->userdata('username');
			$this->db->select('type');
			$this->db->from('users');
			$this->db->where('username', $user);

			$query = $this->db->get();

			foreach ($query->result() as $row){
				   $type = $row->type;
			}
			return $type;
		}*/

		// Gets a list of all categories
		public function get_category(){
			$this->db->select('name');
			$this->db->from('categories');

			$query = $this->db->get()->result();
			return $query;
		}
}
