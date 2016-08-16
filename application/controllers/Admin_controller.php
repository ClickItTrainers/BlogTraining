<?php

class Admin_controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('getDB/Users_model');
    $this->load->model('Posts_model');
  }

  //Loads the Home page view
	public function index(){
		$data['title'] = "Three Musketeers Blog";
		$data['page'] = 'admin/home';
		$this->load->view('admin/templates/template', $data);
	}

	public function admin_profile(){
		$data['title'] = "Three Musketeers Blog";
		$data['page'] = 'admin';
		$this->load->view('admin/templates/template', $data);
	}

  public function show_users(){
    $data['users'] = $this->Users_model->get_users();
    $data['title'] = "Three Musketeers Blog";
    $data['page'] = 'admin/users';
    $this->load->view('admin/templates/template', $data);
  }

  public function delete_user(){
    $id_user = $this->input->post('id');
    $res = $this->Users_model->delete_user($id_user);

    if($res){
      $url = base_url() . 'Admin_controller/show_users';
      echo "<script> alert('¡User deleted!');
      window.location.href='$url';
      </script>";
    }
  }

  public function update_post(){
    $id_post = $this->input->post('id_post');
    $title = $this->input->post('title');
    $desc = $this->input->post('description');
    $cont = $this->input->post('content');

    $update = $this->Posts_model->update_post($id_post, $title, $desc, $cont);

    if($update){
      $url = 'post/' . $id_post . '/';
      $url .= url_title(convert_accented_characters($title), '-', TRUE);
      echo "<script> alert('¡Post updated!');
      window.location.href='$url';
      </script>";
    }
  }
}
