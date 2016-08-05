<!DOCTYPE html>
<html>

<head lang="es">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $title ?></title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">
</head>
	<body>

			<!--Pulling Awesome Font -->
			<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">
						<div class="text">
							<h4>Please Register</h4>
							</div>
							<div class="form-login">

								<form action="<?php echo base_url() ?>Login_controller/registro_user" method="post">

									<p>Username:</p>
									<input type="text" name="username" class="form-control input-sm chat-input" value="<?php echo set_value('username'); ?>"/>
									<span class="text-danger"><?php echo form_error('username'); ?></span>

									<br>

									<p>Email:</p>
									<input type="email" name="email" class="form-control input-sm chat-input" value="<?php echo set_value('email'); ?>"/>
									<span class="text-danger"><?php echo form_error('email')?></span>

									<br>

									<p>Password:</p>
									<input type="password" name="password" class="form-control input-sm chat-input"/>
									<span class="text-danger"><?php echo form_error('password')?></span>

									</br>
									<input type="hidden" name="token" value="<?php echo $token?>" />

									<div class="wrapper">
										<input class=" button btn azm-social azm-btn azm-border-bottom azm-drupal" type="submit" name="submit" value="Login">
										<!-- <a href="#" class="btn azm-social azm-btn azm-border-bottom azm-drupal"><i class="fa"></i> Login </a> -->

										<a href="#" class="btn azm-social azm-btn azm-border-bottom azm-facebook"><i class="fa fa-facebook"></i> Log in with Facebook</a>
										<a href="#" class="btn azm-social azm-btn azm-border-bottom azm-twitter"><i class="fa fa-twitter"></i> Log in with Twitter</a>
										<a href="#" class="btn azm-social azm-btn azm-border-bottom azm-google-plus"><i class="fa fa-google"></i> Log in with Google+</a>
									</div>

								</form>

						</div>
					</div>
				</div>
			</div>

	</body>
</html>
