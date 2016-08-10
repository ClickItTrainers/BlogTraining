<?php

class Profile_controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Posts_model');
    $this->load->model('getDB/Users_model');
  }

  public function index()
  {
    if ($this->session->userdata('is_logued_in'))
    {
      $id_user = $this->Users_model->get_userID();
      $user = $this->session->userdata('username');
      $data['posts'] = $this->Posts_model->posts_list_user($id_user);
      $data['title'] = " $user profile";
      $this->load->view('templates/header', $data);
      $this->load->view('profile', $data);
      $this->load->view('templates/footer', $data);
    }else
    {
      redirect(base_url(), $method='auto');
    }
  }

  public function delete_post()
  {
    $delete = $this->Posts_model->delete_post($this->input->post('id_post'));

    if ($delete)
    {
      
      $url = base_url() . 'Profile_controller';
      echo "<script> alert('¡Post Deleted!');
      window.location.href='$url';
      </script>";
    }
  }
}
