
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

	    public function mail_psw($email, $temp_pass) {

				$api_key = new Mailgun("key-90006bdde06d8e24c02532aa3f2767d8");
				$domain = "sandboxd014b091eeac4ec8b218c0fe9ba75da2.mailgun.org";
				$msg = '<html>
							<h3> Here you can see your temporal new password </h3>
						<body>
							<hr>
							<p> This is your new temporal password: <strong>' . $temp_pass . '</strong> </p>
							<hr>
							<p> Use it to login in your account and change your password. </p>
							<hr>
							<p> Click here --> <a href="http://www.blogtraining.com/Login_controller"> www.unblogtraining.tk </a> and do it! </p>
						</body>
						</html>';

				$api_key->sendMessage($domain, array(
											'from'		=> 'luischa04@gmail.com',
											'to' 		=> $email,
											'subject' 	=> 'Reset your password',
											'html' 		=> $msg));

				if ($api_key) {
						echo "<script> alert('Check your mail!'); </script>";
				} else {
						echo "<script> alert('Error sending the email! Try again!'); </script>";
				}
	    }


	}
