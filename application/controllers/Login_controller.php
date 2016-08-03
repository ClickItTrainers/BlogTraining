<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('bcrypt');
  }

  public function index()
  {
    $data['titulo']= 'Login';
    $data['token'] = $this->token();
    $this->load->view('Login_view',$data);
  }

  public function index_registro()
  {
    $data['titulo'] = 'Register';
    $data['token'] = $this->token();
    $this->load->view('Register_view', $data);
  }

  public function token()
  {
		$token = md5(uniqid(rand(), true));
		$this->session->set_userdata('token', $token);
		return $token;
	}

  public function entrada_login()
  {
  //Verificar la clave token
  if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
  {
  //Reglas de validación
  $this->form_validation->set_rules('email', 'email', 'required|trim|max_length[50]|htmlspecialchars');
  $this->form_validation->set_rules('password', 'password', 'required|trim|max_length[50]|htmlspecialchars');


  $this->form_validation->set_message('required', 'This field must not be empty');
  $this->form_validation->set_message('min_length', 'The field %s needs to have at less %s chars');
  $this->form_validation->set_message('max_length', 'The field %s can not have more than %s chars');


  if (!$this->form_validation->run())
  {
    $this->index();
  }else
  {

    $email = $this->input->post('email');
    $password = $this->input->post('password');


    $login = $this->Login_model->login($email, $password);

    if($login)
    {
      $dat = array(
        'is_logued_in' => TRUE,
        'username' => $login->username,
        'email' => $login->email
        );
      $this->session->set_userdata($dat);
      $url = base_url().'Home';
      echo "<script> alert('Welcome');
      window.location.href='$url';
      </script>";


    }
  }
}
}

public function logout()
{
$this->session->sess_destroy();
$url = base_url().'Home/index';
/*echo "<script> alert('¡See ya!');
window.location.href = '$url'; </script>";*/
}

/*Procesar los datos de la vista*/
	public function registro_user()
	{
		 if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		 {
		     //Reglas de validacion
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|trim|max_length[40]|htmlspecialchars');
			$this->form_validation->set_rules('username', 'username', 'required|trim|max_length[20]|htmlspecialchars');
			$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]|max_length[20]|htmlspecialchars');

			//$this->form_validation->set_message('alpha_spaces', 'The field only accept alphabetic characters');
	    $this->form_validation->set_message('valid_email', 'The text is not a email address');
			$this->form_validation->set_message('required', 'The field must not be empty');
			$this->form_validation->set_message('min_length', 'The field %s needs to have at less 8 chars');
			$this->form_validation->set_message('max_length', 'The field %s can not have more than %s chars');

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
				echo "<script> alert ('¡Saved!');
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
