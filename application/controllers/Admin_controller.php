<?php

class Admin_controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('getDB/Users_model');
  }

  public function show_users()
  {
    $data['users'] = $this->Users_model->get_users();
    $data['title'] = "Three Musketeers Blog";
    $data['page'] = 'admin/users';
    $this->load->view('admin/templates/template', $data);
  
  }
}
