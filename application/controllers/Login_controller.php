<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include("./vendor/autoload.php");

class Login_controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('bcrypt');
    $this->load->Model('getDB/Users_model');
  }

  public function index()
  {
    $data['title']= 'Login';
    $data['token'] = $this->token();

    $fb = new Facebook\Facebook([
      'app_id' => '1092965707405902',
      'app_secret' => 'f053d3491233211c2266ed52748c1b2c',
      'default_graph_version' => 'v2.7',
    ]);
    $helper = $fb->getRedirectLoginHelper();
    $permissions = ['email', 'user_posts'];
    $data['loginUrl'] = $helper->getLoginUrl(base_url().'Login_controller/fb_login');
    $this->load->view('Login_view',$data);
  }

  public function index_registro()
  {
    $data['title'] = 'Register';
    $data['token'] = $this->token();
    $this->load->view('Register_view', $data);
  }

  public function token()
  {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }

  public function fb_login()
  {
    $fb = new Facebook\Facebook([
      'app_id' => '1092965707405902',
      'app_secret' => 'f053d3491233211c2266ed52748c1b2c',
      'default_graph_version' => 'v2.7',
    ]);

    $helper = $fb->getRedirectLoginHelper();
    try {
      $accessToken = $helper->getAccessToken();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

    if (isset($accessToken)) {
      $fb->setDefaultAccessToken($accessToken);
      try {
        $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
        $profile = $profile_request->getGraphNode()->asArray();

        print_r($profile['id']);
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error:v ' . $e->getMessage();
      }
    }
  }

  public function entrada_login()
  {
    // Verify the token
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
    {

      // Validation rules

      $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|max_length[50]|htmlspecialchars');
      $this->form_validation->set_rules('password', 'password', 'required|trim|max_length[50]|htmlspecialchars');

      // Error messages
      $this->form_validation->set_message('valid_email', '*Invalid email');
      $this->form_validation->set_message('required', '*Required field');
      $this->form_validation->set_message('min_length', '*The field %s must be at least %s characters');
      $this->form_validation->set_message('max_length', '*The field %s cant be more than %s characters');

      if (!$this->form_validation->run())
      {
        $this->index();
      }
      else
      {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $login = $this->Login_model->login($email, $password);
        if($login)
        {
          $dat = array(
            'is_logued_in' => TRUE,
            'username' => $login->username,
            'email' => $login->email);
            $this->session->set_userdata($dat);

          if ($login->type == 1) {
              $url = base_url() . 'Admin_controller';
              echo "<script> alert('¡Welcome Admin!');
              window.location.href='$url';
              </script>";
              $this->session->set_userdata('admin', TRUE);
          }else{
              $url = base_url() . 'Home';
              echo "<script> alert('Welcome');
              window.location.href='$url';
              </script>";
          }
        }
        else
        {

            $url = base_url().'Login_controller';
            echo "<script> alert('That user does not exist');
            window.location.href='$url';
            </script>";
          }
        }
      }
    }



    public function logout()
    {
      $this->session->sess_destroy();
      $url = base_url().'Home';
      echo "<script> alert('See ya!');
      window.location.href = '$url'; </script>";
    }


    public function registro_user()
    {

      if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
      {

        // Validation rules
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|trim|max_length[40]|htmlspecialchars');
        $this->form_validation->set_rules('username', 'username', 'required|trim|max_length[20]|htmlspecialchars');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]|max_length[20]|htmlspecialchars');

        // Error messages
        //$this->form_validation->set_message('alpha_spaces', 'The field only accept alphabetic characters');
        $this->form_validation->set_message('valid_email', '*Invalid email');
        $this->form_validation->set_message('required', '*Required field');
        $this->form_validation->set_message('min_length', '*The field %s must be at least %s characters');
        $this->form_validation->set_message('max_length', '*The field %s cant be more than %s characters');

        if (!$this->form_validation->run())
        {
          //Si no pasamos la validación volvemos al formulario mostrando los errores
          $this->index_registro();
        }
        else
        {
          //Si funciona se procesan los datos
          $email = $this->input->post('email');
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          $hash = $this->bcrypt->hash_password($password);
          //Probar si la contraseña se encripto
          if ($this->bcrypt->check_password($password, $hash))
          {
            $insert_pass = $this->Login_model->registro($username, $email, $hash);
            if ($insert_pass)
            {
              $url = base_url().'Login_controller/index';
              echo "<script> alert ('Saved!');
              window.location.href = '$url';
              </script>";
            }
            else
            {
              throw new Exception("Error Processing request", 1);
              echo Exception;
            }
          }
        }
      }
    }
  }
