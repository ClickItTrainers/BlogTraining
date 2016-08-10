
<?php
	include("./vendor/autoload.php");
	use Mailgun\Mailgun;


	class My_mailgun {

		public function __construct(){

		}

		// Contact with the admin of the blog
	    public function admin_mail($email, $subject, $msg) {

				$api_key = new Mailgun("key-90006bdde06d8e24c02532aa3f2767d8");
				$domain = "sandboxd014b091eeac4ec8b218c0fe9ba75da2.mailgun.org";

				$api_key->sendMessage($domain, array(
											'from'		=> $email,
											'to' 		=> 'luischa04@gmail.com',
											'subject' 	=> $subject,
											'text' 		=> $msg ));

				if ($api_key) {
						echo "<script> alert('Email sent!'); </script>";
				} else {
						echo "<script> alert('Error sending the email! Try again!'); </script>";
				}
	    }

	    // Sends email when a post is commented
	    public function comment_mail($email, $comment) {

				$api_key = new Mailgun("key-90006bdde06d8e24c02532aa3f2767d8");
				$domain = "sandboxd014b091eeac4ec8b218c0fe9ba75da2.mailgun.org";

				$api_key->sendMessage($domain, array(
											'from'		=> 'luischa04@gmail.com',
											'to' 		=> $email,
											'subject' 	=> 'New comment in your post',
											'text' 		=> $comment ));

											return $api_key;
	    }

	    // Sends email when a post is edited
	    public function post_edited_mail($email) {

				$api_key = new Mailgun("key-90006bdde06d8e24c02532aa3f2767d8");
				$domain = "sandboxd014b091eeac4ec8b218c0fe9ba75da2.mailgun.org";

				$api_key->sendMessage($domain, array(
											'from'		=> 'luischa04@gmail.com',
											'to' 		=> $email,
											'subject' 	=> 'Your post was edited',
											'text' 		=> 'Check your post!' ));

				if ($api_key) {
							echo "<script> alert('The owner will be notified!'); </script>";
				} else {
							echo "<script> alert('Error sending the email to the owner!'); </script>";
				}
	    }


	}
