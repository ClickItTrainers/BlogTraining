<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

class Mailgun_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Comment_model');
		$this->load->model(array('getDB/Users_model', 'Posts_model'));
		$this->load->library('My_mailgun');
	}

	// Creates data to send it to the model
	public function comment(){

		//Rules
		$this->form_validation->set_rules('comment', 'comment', 'htmlspecialchars|required');
		//Error messages
		$this->form_validation->set_message('required', '*Required field');

		if (!$this->form_validation->run())
		{
			$this->index();
		}
		else
		{
			$data = $this->Posts_model->posts_details($this->input->post('url_post'));
			$id_user = $this->Users_model->get_userID();
			$comment = $this->input->post('comment');
			$query = $this->Comment_model->insert_comment($data->id_post, $id_user, $comment);

			// if comment successfully inserted, the owner of the post is notified by the administrator
			if ($query) {

				// Email of the owner of the post
				$email = $this->Users_model->get_email($data->id_post);

				$this->my_mailgun->comment_mail($email, $comment);

				$url = base_url().'post/' . $this->input->post('url_post');;
				echo "<script> alert('¡Your comment was posted!');
				window.location.href='$url';
				</script>";
			}
		}
	}

	// Load the ContactUs view
	public function contactUs(){
		$data['title'] = "Contact Us!";
		$this->load->view('templates/header', $data);
		$this->load->view('contactUs', $data);
		$this->load->view('templates/footer', $data);
	}

	// Verify the input validations (send email to the administrator)
	public function send_mail(){

		// Validations
		$this->form_validation->set_rules('email', 'email', 'required|trim|max_length[30]|valid_email');
		$this->form_validation->set_rules('subject', 'subject', 'required|trim|max_length[50]|min_length[1]');
		$this->form_validation->set_rules('message', 'message', 'required|trim|min_length[1]');

		// Error messages
		$this->form_validation->set_message('valid_email', '*Invalid email');
		$this->form_validation->set_message('required', '*Required field');
		$this->form_validation->set_message('min_length', '*The field %s must be at least %s characters');
		$this->form_validation->set_message('max_length', '*The field %s cant be more than %s characters');

		if($this->form_validation->run() == FALSE){

			$this->contactUs();

		} else {

			$email = $this->input->post('email');
			$subject = $this->input->post('subject',TRUE);
			$msg = $this->input->post('message',TRUE);

			$this->my_mailgun->admin_mail($email, $subject, $msg);

			redirect('/Mailgun_controller/contactUs', 'refresh');
		}
	}

    public function temp_password($temp_pass){
    	$temp_pass = substr(md5(uniqid(mt_rand(), true)), 0, 8);
    	//$temp_pass = "hola1234";
    	return $temp_pass;
    }

	public function mail_psw($temp_pass = ""){

		$this->form_validation->set_rules('email', 'email', 'required|valid_email|trim|max_length[40]|htmlspecialchars');
        $this->form_validation->set_message('valid_email', '*Invalid email');

        if($this->form_validation->run() == FALSE){

            redirect('/Login_controller', 'refresh');

        }else{

        	$userData = $this->Users_model->getUserData($this->input->post('email'));

        	if($userData == TRUE){
        		$email = $this->input->post('email');
        		$this->load->library('bcrypt');
        		$temp_pass = $this->temp_password($temp_pass);
        		$temp_passHash = $this->bcrypt->hash_password($temp_pass);
        		if($this->Users_model->temp_password($email, $temp_passHash)){
		            $this->my_mailgun->mail_psw($email, $temp_pass);
		            redirect('/Login_controller', 'refresh');
		        }else{
		        	echo "<script> alert('Please, try again!'); </script>";
        			redirect('/Login_controller', 'refresh');
		        }
        	}else{
        		echo "<script> alert('Your email is not in our database, please register first!'); </script>";
        		redirect('/Login_controller/index_registro', 'refresh');
        	}
            
        }
	}
}
