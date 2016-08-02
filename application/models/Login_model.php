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
    $query = $this->db->get('Users');
		//Si coincide se procede
		if ($query->num_rows() > 0){
			$user = $query->row();
			/*En la siguiente variable se almacena la contraseña de la bd para comprobarse*/
			$pass = $user->password;

			/*Procedimiento para comprobar
			si el password coincide*/
			if($this->bcrypt->check_password($hash, $pass))
			{
				return $query->row();
			}else
			{

			}
    }
  }

  public function registro($username,$email,$hash)
  {
    //Aqui se almacenan los datos en un array
    $data = array(
			'username' => $username,
			'email' => $email,
			'password' => $hash
		);

    //Linea para la insercion de los datos del array en la bd
		return $this->db->insert('Users', $data);
  }
}
