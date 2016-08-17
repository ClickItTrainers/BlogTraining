<?php

class Profile_controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Posts_model');
    $this->load->model('getDB/Users_model');
    $this->load->library('bcrypt');
  }

  public function index()
  {
    if ($this->session->userdata('is_logued_in'))
    {
      $id_user = $this->Users_model->get_userID();
      $data['user_info'] = $this->Users_model->get_userinfo();
      $user = $this->session->userdata('username');
      $data['posts'] = $this->Posts_model->posts_list_user($id_user);
      $data['title'] = "$user profile";
      $data['user'] = $user;
      $this->load->view('templates/header', $data);
      $this->load->view('profile', $data);
      $this->load->view('templates/footer', $data);
    }else
    {
      redirect(base_url(), $method='auto');
    }
  }

  public function update_profile()
  {
    //validamos si es único
    $this->form_validation->set_rules("username","username","is_unique[users.username]");
    //si no lo es mostramos un mensaje con set_message
    $this->form_validation->set_message('is_unique', 'El %s ya está ocupado.');

    if (!$this->form_validation->run())
    {
      $this->index('#settings');
    }
    else
    {
      $new_username = $this->input->post('username');
      $email = $this->session->userdata('email');
      $new_password = $this->input->post('password');
      $repeat_pass = $this->input->post('repeatpassword');
      $name = $this->input->post('name');
      $gender = $this->input->post('gender');
      if($new_password === null)
      {
        $update = $this->Users_model->update_profile($new_username, $email, "", $name, $gender);

        if($update)
        {
          $this->session->set_userdata('username', $new_username);
          $url = base_url() . 'Profile_controller';
          echo "<script> alert('¡Profile updated!');
          window.location.href='$url';
          </script>";
        }else
        {
          echo "<script> alert('Not is possible to update')
          </script>";
        }
      }
      elseif($new_password == $repeat_pass)
      {
        $hash = $this->bcrypt->hash_password($new_password);
        if ($this->bcrypt->check_password($new_password, $hash))
        {

          $update  = $this->Users_model->update_profile($new_username, $email, $hash, $name, $gender);

          if($update)
          {
            $this->session->set_userdata('username', $new_username);
            $url = base_url() . 'Profile_controller';
            echo "<script> alert('¡Profile updated!');
            window.location.href='$url';
            </script>";
          }else
          {
            echo "<script> alert('Not is possible to update')
            </script>";
          }
        }
      }
      else
      {
        $url = base_url() . 'Profile_controller';
        echo "<script> alert('The passwords do not match');
          window.location.href='$url';</script>";
      }
    }
  }

  public function user_profile($id_user)
  {
    $user = $this->Users_model->get_username_iduser($id_user);
    $data['posts'] = $this->Posts_model->posts_list_user($id_user);
    $data['user_info'] = $this->Users_model->getother_userinfo($id_user);
    $data['title'] = "$user profile";
    $data['user'] = $user;
    $this->load->view('templates/header', $data);
    $this->load->view('profile', $data);
    $this->load->view('templates/footer', $data);
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
