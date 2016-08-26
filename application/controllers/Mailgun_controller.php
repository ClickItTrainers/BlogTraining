<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

class Mailgun_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Comment_model');
		$this->load->model('getDB/Users_model');
		$this->load->library('My_mailgun');
	}

	// Creates data to send it to the model
	public function comment(){
		$id_post = $this->input->post('id_post',TRUE);
		$id_user = $this->Users_model->get_userID();
		$comment = $this->input->post('comment',TRUE);
		$title = $this->input->post('tit',TRUE);
		$query = $this->Comment_model->insert_comment($id_post, $id_user, $comment);

		// if comment successfully inserted, the owner of the post is notified by the administrator
		if ($query) {

			// Email of the owner of the post
			$email = $this->Users_model->get_email($id_post);

			$this->my_mailgun->comment_mail($email, $comment);

			$url = base_url().'post/' . $id_post . '/';
			$url .= url_title(convert_accented_characters($title), '-', TRUE);
			echo "<script> alert('¡Your comment was posted!');
			window.location.href='$url';
			</script>";
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
}
