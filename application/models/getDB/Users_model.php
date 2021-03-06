<?php

class Users_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	// Gets the user id of the user that is logged in
	public function get_userID(){
		$user = $this->session->userdata('email');
		$this->db->select('id_user');
		$this->db->from('users');
		$this->db->where('email', $user);

		$query = $this->db->get();

		foreach ($query->result() as $row){
			$id_user = $row->id_user;
		}
		return $id_user;
	}

	public function verify_password()
	{
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('email', $this->session->userdata('email'));
		$query = $this->db->get();

		foreach ($query->result() as $row){
			$pass = $row->password;
		}
		return $pass;
	}


	public function update_username($new_username){
		$this->db->set('username', $new_username);
		$this->db->where('email', $this->session->userdata('email'));
		$query = $this->db->update('users');

		if(!$query){
            show_error("Something went wrong! <a href=''>Go back!</a>", 500 );

        }else{
        	return $query;
        }
		/*if (isset($query)) {
			return $query;
		}else{
			$error = $this->db->error();
			return $error;
		}*/
	}

	public function update_email($new_email){
		$this->db->set('email', $new_email);
		$this->db->where('email', $this->session->userdata('email'));
		$query = $this->db->update('users');

		if(!$query){
            show_error("Something went wrong! <a href=''>Go back!</a>", 500 );

        }else{
        	return $query;
        }
	}

	public function update_name($new_name){
		$this->db->set('name', $new_name);
		$this->db->where('email',$this->session->userdata('email'));
		$query = $this->db->update('users');

		if(!$query){
            show_error("Something went wrong! <a href=''>Go back!</a>", 500 );

        }else{
        	return $query;
        }
	}

	public function update_password($new_password){
		$this->db->set('password', $new_password);
		$this->db->where('username',$this->session->userdata('username'));
		$query = $this->db->update('users');

		if(!$query){
            show_error("Something went wrong! <a href=''>Go back!</a>", 500 );

        }else{
        	return $query;
        }
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

	//Verify if a user from facebook is registered
	public function verify_user_exists($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		return $query->row();
	}

	public function get_userinfo()
	{
		$this->db->where('email', $this->session->userdata('email'));
		$query = $this->db->get('users');

		return $query->row();
	}

	public function getother_userinfo($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('users');

		return $query->row();
	}

	// Gets a list of all categories
	public function get_category(){
		$this->db->select('*');
		$this->db->from('categories');

		$query = $this->db->get()->result();
		return $query;
	}

	public function getUSerData($email){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$query = $this->db->get()->row();

		if ($query) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function temp_password($email, $temp_pass){
		$this->db->set('password', $temp_pass);
		$this->db->where('email', $email);
		$query = $this->db->update('users');
		return $query;
	}
}