<?php

class Profile_controller extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('Posts_model');
    $this->load->model('getDB/Users_model');
    $this->load->library('bcrypt');
  }

  public function index(){
    if ($this->session->userdata('is_logued_in')){

      $id_user = $this->Users_model->get_userID();
      $data['user_info'] = $this->Users_model->get_userinfo();
      $user = $this->session->userdata('username');
      $data['posts'] = $this->Posts_model->posts_list_user($id_user);
      $data['title'] = "$user profile";
      $data['user'] = $user;
      $this->load->view('templates/header', $data);
      $this->load->view('profile', $data);
      $this->load->view('templates/footer', $data);
    }else{
      redirect(base_url(), $method='auto');
    }
  }

  //
  public function update_username(){

    //$this->form_validation->set_rules("username","username","is_unique[users.username]|htmlspecialchars|trim|max_length[20]");
    $this->form_validation->set_message('is_unique', 'El %s ya está ocupado.');
    $this->form_validation->set_message('max_length', '*The field %s cant be more than %s characters');

    if ($this->form_validation->run()){
      $this->index();
    }else{
      if ($this->input->post('username') == '') {
        $url = base_url() . 'Profile_controller';
        echo "<script> alert('Cannot upload an empty username');
        window.location.href='$url';
        </script>";
      }else{
        $new_username = strip_tags($this->input->post('username'));
        $email = $this->session->userdata('email');
        $update = $this->Users_model->update_username($this->security->xss_clean($new_username), $email);
        if (isset($update)) {
          if (isset($error)) {
            echo "<script> alert('It is not possible to update your username')
            </script>";
          }
          $this->session->set_userdata('username', $new_username);
          $url = base_url() . 'Profile_controller';
          echo "<script> alert('¡Username updated!');
          window.location.href='$url';
          </script>";
        }else{
          echo "<script> alert('It is not possible to update your username')
          </script>";
        }
      }
    }
  }

  //
  public function update_email(){

    $this->form_validation->set_rules("email","email","is_unique[users.email]|valid_email|required");
    $this->form_validation->set_message('is_unique', 'El %s ya está ocupado.');
    $this->form_validation->set_message('required', '*Required field');
    $this->form_validation->set_message('valid_email', '*Invalid email');

    if ($this->form_validation->run()){
      $this->index();
    }else{
      if ($this->input->post('email') == '') {
        /*$this->session->set_flashdata('username', 'Cannot upload an empty username');
        redirect('Profile_controller', 'refresh');
        echo $this->session->flashdata('username');*/

        $url = base_url() . 'Profile_controller';
        echo "<script> alert('Cannot upload an empty email');
        window.location.href='$url';
        </script>";
      }else{
        $new_email = strip_tags($this->input->post('email'));
        $username = $this->session->userdata('username');
        $update = $this->Users_model->update_email($this->security->xss_clean($new_email), $username);
        if (isset($update)) {
          if (isset($error)) {
            echo "<script> alert('It is not possible to update your email')
            </script>";
          }
          $this->session->set_userdata('email', $new_email);
          $url = base_url() . 'Profile_controller';
          echo "<script> alert('Email updated!');
          window.location.href='$url';
          </script>";
        }else{
          echo "<script> alert('It is not possible to update your email')
          </script>";
        }
      }
    }
  }

  //
  public function update_name(){

    $this->form_validation->set_rules("name","name","strip_tags|trim|htmlspecialchars|required");
    $this->form_validation->set_message('required', '*Required field');

    if ($this->form_validation->run()){
      $this->index();
    }else{
      if ($this->input->post('name') == '') {
        /*$this->session->set_flashdata('username', 'Cannot upload an empty username');
        redirect('Profile_controller', 'refresh');
        echo $this->session->flashdata('username');*/

        $url = base_url() . 'Profile_controller';
        echo "<script> alert('Cannot upload an empty name');
        window.location.href='$url';
        </script>";
      }else{
        $new_email = strip_tags($this->input->post('name'));
        $username = $this->session->userdata('username');
        $update = $this->Users_model->update_name($this->security->xss_clean($new_name), $username);
        if (isset($update)) {
          if (isset($error)) {
            echo "<script> alert('It is not possible to update your name')
            </script>";
          }
          $this->session->set_userdata('name', $new_name);
          $url = base_url() . 'Profile_controller';
          echo "<script> alert('Name updated!');
          window.location.href='$url';
          </script>";
        }else{
          echo "<script> alert('It is not possible to update your name')
          </script>";
        }
      }
    }
  }

  public function user_profile($id_user){
    $user = $this->Users_model->get_username_iduser($id_user);
    $data['posts'] = $this->Posts_model->posts_list_user($id_user);
    $data['user_info'] = $this->Users_model->getother_userinfo($id_user);
    $data['title'] = "$user profile";
    $data['user'] = $user;
    $this->load->view('templates/header', $data);
    $this->load->view('profile', $data);
    $this->load->view('templates/footer', $data);
  }

  public function delete_post(){
    $delete = $this->Posts_model->delete_post($this->input->post('id_post'));

    if ($delete){

      $url = base_url() . 'Profile_controller';
      echo "<script> alert('¡Post Deleted!');
      window.location.href='$url';
      </script>";
    }
  }
}
