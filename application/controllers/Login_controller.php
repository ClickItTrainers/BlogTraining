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
    $this->load->view('Login_view',$data);
  }

  public function google_login()
  {

    $name = $this->input->post('given_name');
    $name_complete = $this->input->post('name');
    $email = $this->input->post('email');
    $image = $this->input->post('image');

    $verify = $this->Users_model->verify_user_exists($email);

    if($verify){
      $dat = array(
        'is_logued_in' => TRUE,
        'username' => $verify->username,
        'email' => $verify->email);
        $this->session->set_userdata($dat);
        }else {

        $password = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 12);
        $hash = $this->bcrypt->hash_password($password);
        //Probar si la contraseña se encripto
        if ($this->bcrypt->check_password($password, $hash))
        {
          $fb_user = $this->Login_model->registro_google($name, $email, $hash, $name_complete, $image);
          if ($fb_user)
          {
            $dat = array(
              'is_logued_in' => TRUE,
              'username' => $name,
              'email' => $email);
              $this->session->set_userdata($dat);
            }
          }
        }
      }

      public function index_registro()
      {
        $data['title'] = 'Register';
        $data['token'] = $this->token();
        $fb = new Facebook\Facebook([
          'app_id' => '1092965707405902',
          'app_secret' => 'f053d3491233211c2266ed52748c1b2c',
          'default_graph_version' => 'v2.7',
        ]);
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email'];
        $data['loginUrl'] = $helper->getLoginUrl(base_url().'Login_controller/fb_login', $permissions);
        $data['google_url'] = base_url().'Login_controller/google_login';
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
          try {
            /*$Client = $fb->getOAuth2Client();
            $tokenMetadata = $Client->debugToken($accessToken);
            $tokenMetadata->validateAppId('1092965707405902');
            if (! $accessToken->isLongLived()) {
            try {
            $longlivedaccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            $fb->setdefaultAccessToken($longlivedaccessToken);
          } catch (Facebook\Exceptions\FacebookSDKException $e) {
          echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
        }
      }*/
      $requestPicture = $fb->get('/me/picture?redirect=false&type=large', $accessToken); //getting user picture
      $profile_request = $fb->get('/me?fields=id,name,first_name,email,picture,gender', $accessToken);
      $profile = $profile_request->getGraphNode()->asArray();
      $picture = $requestPicture->getGraphUser();

      $verify = $this->Users_model->verify_user_exists($profile['email']);

      if($verify){
        $dat = array(
          'is_logued_in' => TRUE,
          'username' => $verify->username,
          'email' => $verify->email);
          $this->session->set_userdata($dat);
          $url = base_url().'Home';
          echo "<script> alert ('Welcome!');
          window.location.href = '$url';
          </script>";
        }else {
          $username = $profile['name'];
          $email = $profile['email'];
          $picture = $picture['url'];
          if($profile['gender'] === "male"){
            $gender = "M";
          }else {
            $gender = "F";
          }
          $password = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 12);
          $hash = $this->bcrypt->hash_password($password);
          //Probar si la contraseña se encripto
          if ($this->bcrypt->check_password($password, $hash))
          {
            $fb_user = $this->Login_model->registro_fb($username, $email, $hash, $gender, $picture);
            if ($fb_user)
            {
              $dat = array(
                'is_logued_in' => TRUE,
                'username' => $profile['name'],
                'email' => $profile['email']);
                $this->session->set_userdata($dat);
                $url = base_url().'Home';
                echo "<script> alert ('Welcome!');
                window.location.href = '$url';
                </script>";
              }
            }
          }
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          echo 'Facebook SDK returned an error:' . $e->getMessage();
        }
      }
    }

    public function entrada_login()
    {
      // Verify the token
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
      {

        // Validation rules

        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|max_length[30]|htmlspecialchars');
        $this->form_validation->set_rules('password', 'password', 'required|trim|max_length[25]|htmlspecialchars');

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

      public function logout(){
        $this->session->sess_destroy();
        $url = base_url().'Home';
        echo "<script> alert('See you!');
        window.location.href = '$url'; </script>";
      }

      public function registro_user(){

        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')){

          // Validation rules
          $this->form_validation->set_rules('email', 'email', 'required|valid_email|trim|max_length[40]|htmlspecialchars|is_unique[users.email]');
          $this->form_validation->set_rules('username', 'username', 'required|alpha|trim|max_length[20]|htmlspecialchars|is_unique[users.username]');
          $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]|max_length[20]|htmlspecialchars');
          $this->form_validation->set_rules('name', 'name', 'required|trim|htmlspecialchars');
          $this->form_validation->set_rules('gender', 'gender', 'required|trim|htmlspecialchars');

          // Error messages
          //$this->form_validation->set_message('alpha_spaces', 'The field only accept alphabetic characters');
          $this->form_validation->set_message('valid_email', '*Invalid email');
          $this->form_validation->set_message('required', '*Required field');
          $this->form_validation->set_message('alpha', '*Invalid username');
          $this->form_validation->set_message('is_unique', 'The %s already exists');
          $this->form_validation->set_message('min_length', '*The field %s must be at least %s characters');
          $this->form_validation->set_message('max_length', '*The field %s cant be more than %s characters');

          if (!$this->form_validation->run()){

            //Si no pasamos la validación volvemos al formulario mostrando los errores
            $this->index_registro();

          }else{

            //Si funciona se procesan los datos
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $name = $this->input->post('name');
            $gender = $this->input->post('gender');

            $hash = $this->bcrypt->hash_password($password);
            //Probar si la contraseña se encripto

            if ($this->bcrypt->check_password($password, $hash) && ($this->valid_username($username) === TRUE)){
              
              $insert_pass = $this->Login_model->registro($username, $email, $hash, $name, $gender);
              if ($insert_pass){

                $url = base_url().'Login_controller/index';
                echo "<script> alert ('Saved!');
                window.location.href = '$url';
                </script>";

              }else{

                throw new Exception("Error Processing request", 1);
                echo Exception;
              }
            }
          }
        }
      }
    }
