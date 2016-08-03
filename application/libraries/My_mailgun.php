<?php
	include("./vendor/autoload.php");
	use Mailgun\Mailgun;

	// Api Key got from https://mailgun.com/cp/my_account
	public $api_key = new Mailgun("ey-90006bdde06d8e24c02532aa3f2767d8");

	// Domain Name you given to Mailgun
	public $domain = "sandboxd014b091eeac4ec8b218c0fe9ba75da2.mailgun.org";
	
	class My_mailgun {

		// Contact with the admin of the blog
	    public function admin_mail($email, $subject, $msg) {

				$api_key->sendMessage($domain, array(
											'from'		=> $email,
											'to' 		=> 'luischa04@gmail.com',
											'subject' 	=> $subject,
											'text' 		=> $msg ));
	    }

	    // Sends email when a post is commented
	    public function comment_mail($email, $comment) {

				$api_key->sendMessage($domain, array(
											'from'		=> 'luischa04@gmail.com',
											'to' 		=> $email,
											'subject' 	=> 'New comment in your post',
											'text' 		=> $comment ));
	    }

	    // Sends email when a post is edited
	    public function post_edited_mail($email) {

				$api_key->sendMessage($domain, array(
											'from'		=> 'luischa04@gmail.com',
											'to' 		=> $email,
											'subject' 	=> 'Your post was edited',
											'text' 		=> 'Check your post!' ));
	    }
  
  
	}