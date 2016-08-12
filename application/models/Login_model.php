<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function login($email,$password)
  {
    //Obtener los datos del usuario
    $this->db->where('email',$email);
    $query = $this->db->get('users');
		//Si coincide se procede
		if ($query->num_rows() > 0){
			$user = $query->row();
			/*En la siguiente variable se almacena la contraseña de la bd para comprobarse*/
			$pass = $user->password;

			/*Procedimiento para comprobar
			si el password coincide*/
			if($this->bcrypt->check_password($password, $pass))
			{
				return $query->row();
			}else
			{
        $url = base_url().'Login_controller';
        echo "<script> alert('Wrong password');
        window.location.href='$url';
        </script>";
			}
    }
  }

  public function registro_fb($user, $email, $hash, $gender, $picture)
  {
    //Saved the data
    $data = array(
			'username' => $user,
			'email' => $email,
			'password' => $hash,
      'picture' => $picture,
      'gender' => $gender
		);

    //Linea para la insercion de los datos del array en la bd
		return $this->db->insert('users', $data);
  }

  public function registro($username,$email,$hash)
  {
    //Saved the data
    $data = array(
			'username' => $username,
			'email' => $email,
			'password' => $hash
		);

    //Linea para la insercion de los datos del array en la bd
		return $this->db->insert('users', $data);
  }
}
