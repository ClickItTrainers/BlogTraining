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

  public function update_username()
  {
    if ($this->input->post('username') == $this->session->userdata('username'))
    {
      $this->index();
    }else{
      //rules
      $this->form_validation->set_rules("username","username","min_length[4]|max_length[25]|htmlspecialchars|required|is_unique[users.username]");
      //messages
      $this->form_validation->set_message('is_unique', 'The %s already exists');
      $this->form_validation->set_message('min_length', '*The field %s must be at least %s characters');
      $this->form_validation->set_message('max_length', '*The field %s cant be more than %s characters');

      if (!$this->form_validation->run())
      {
        echo '<div class="error">'.validation_errors().'</div>';
      }
      else
      {

        $new_username = htmlentities($this->input->post('username', TRUE));
        $resultado = strpos($new_username, 'script');

        if($resultado != FALSE):
          $new_username = "script";
        endif;

        $update = $this->Users_model->update_username($new_username);

        if($update)
        {
          $this->session->set_userdata('username', $new_username);
          $url = base_url() . 'Profile_controller';
          echo "<script>  alert('¡Username updated!');
          window.location.href='$url';
          </script>";
        }else
        {
          echo "<script> alert('It is not possible to update')
          </script>";
        }
      }
    }
  }

  public function update_name()
  {
    //rules
    $this->form_validation->set_rules('name', 'name', 'required|htmlspecialchars');
    //messages
    $this->form_validation->set_message('required', '*The field must not be empty');

    if (!$this->form_validation->run())
    {
      echo '<div class="error">'.validation_errors().'</div>';
    }else
    {
      $new_name = $this->input->post('name', TRUE);

      $update = $this->Users_model->update_name($new_name);

      if($update)
      {
        $url = base_url() . 'Profile_controller/#settings';
        echo "<script> alert('Name updated');
        window.location.href='$url';
        </script>";
      }else
      {
        echo "<script> alert('It is not possible to update')
        </script>";
      }
    }
  }

  public function update_password()
  {
    $this->form_validation->set_rules('last_password', 'last_password', 'required|trim|htmlspecialchars');
    $this->form_validation->set_rules('new_password', 'new_password', 'required|trim|min_length[8]|max_length[20]|htmlspecialchars');
    $this->form_validation->set_rules('repeat_password', 'repeat_password', 'required|trim|min_length[8]|max_length[20]|htmlspecialchars');

    // Error messages
    $this->form_validation->set_message('required', '*Required field');
    $this->form_validation->set_message('min_length', '*The field %s must be at least %s characters');
    $this->form_validation->set_message('max_length', '*The field %s cant be more than %s characters');

    if (!$this->form_validation->run())
    {
      //Se envian las validaciones por medio de un array codificado como json
      echo json_encode(array('last' => form_error('last_password'),
       'new' => form_error('new_password'),
       'repeat' => form_error('repeat_password')));

    }else
    {
      $last_password = $this->input->post('last_password');
      $new_password = $this->input->post('new_password');
      $repeat_password = $this->input->post('repeat_password');

      $pass = $this->Users_model->verify_password();

      if ($this->bcrypt->check_password($last_password, $pass))
      {
        if($new_password === $repeat_password)
        {
          $hash = $this->bcrypt->hash_password($new_password);
          $update = $this->Users_model->update_password($hash);

          if($update)
          {
            //Si la actualizacion resulto correcta el metodo en javascript recibe
            //el mensaje que mostrar y la url a la cual redirigir
            $url = base_url() . 'Profile_controller/#settings';
            echo json_encode(array('st' => 1,
             'msg' => 'Password updated',
             'url' => $url));
          }
        }else
        {

          echo json_encode(array('st' => 0,
           'msg' => 'The passwords does not match'));
        }

      }else
      {
        echo json_encode(array('st' => 0,
         'msg' => 'Your old password is not correct'));
        /*$url = base_url() . 'Profile_controller/#settings';
        echo "<script> alert('Your old password is not correct');
        window.location.href = '$url'</script>";*/
      }
    }
  }

  public function update_email()
  {
    if($this->input->post('email') === $this->session->userdata('email'))
    {
      $this->index();
    }else
    {
      //rules
      $this->form_validation->set_rules("email","email","is_unique[users.email]|max_length[60]|htmlspecialchars|valid_email|required");
      //messages
      $this->form_validation->set_message('valid_email', '*Invalid email');
      $this->form_validation->set_message('is_unique', 'The %s already exists');
      $this->form_validation->set_message('required', '*Required field');
      $this->form_validation->set_message('max_length', '*The field %s cant be more than %s characters');

      if (!$this->form_validation->run())
      {
          echo '<div class="error">'.validation_errors().'</div>';
      }else
      {
        $new_email = $this->input->post('email', TRUE);

        $update = $this->Users_model->update_email($new_email);

        if($update)
        {
          $this->session->set_userdata('email', $new_email);
          $url = base_url() . 'Profile_controller/#settings';
          echo "<script> alert('Email updated');
          window.location.href='$url';
          </script>";
        }else
        {
          echo "<script> alert('It is not possible to update')
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
