<!DOCTYPE html>
<html>

<head lang="es">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title ?></title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>

	<!--Pulling Awesome Font -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="row col-center container-register">
		<div class="col-lg-6 col-md-5 col-sm-8 col-xs-12 tittle ">
			<h2>THE BBLOG</h2>
			<p>Now you can see the latest news</p>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-8 col-xs-12">
			<div class="form-login">
				<form action="<?php	echo base_url()?>Login_controller/registro_user" method="post">
					<h4>Please Register</h4>
					<p>Username:</p>
					<input type="text" name="username" class="form-control input-sm chat-input" required value="<?php echo set_value('username');?>"/>
					<span class="text-danger"><?php echo form_error('username'); ?></span>

					<p>Email:</p>
					<input type="email" name="email" class="form-control input-sm chat-input" required value="<?php echo set_value('email');?>"/>
					<span class="text-danger"><?php echo form_error('email')?></span>


					<p>Password:</p>
					<input type="password" name="password" required class="form-control input-sm chat-input"/>
					<span class="text-danger"><?php echo form_error('password')?></span>


					<p>Name:</p>
					<input type="text" name="name" required  value="<?php echo set_value('name');?>" class="form-control input-sm chat-input"/>
					<span class="text-danger"><?php echo form_error('name')?></span>


					<p>Gender:</p>
					<select name="gender" class="form-control input-sm chat-input">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>

					<input type="hidden" name="token" value="<?php echo $token?>" />

					<div class="wrapper">
						<div class="display">
							<input class=" button btn azm-social azm-btn azm-border-bottom azm-drupal" type="submit" name="submit" value="Registar">
						</div>
						<!-- <a href="#" class="btn azm-social azm-btn azm-border-bottom azm-drupal"><i class="fa"></i> Login </a> -->

						<!-- 	<div class="caja-redes">
						<a href="#" class="icon-button facebook"><i class="fa fa-facebook"></i><span></span></a>
						<a href="#" class="icon-button google-plus"><i class="fa fa-google"></i><span></span></a>

					</div> -->


					<a href="<?php echo $loginUrl ?>" class="btn azm-social azm-btn azm-border-bottom azm-facebook"><i class="fa fa-facebook"></i></a>
					<!-- <a href="#" class="btn azm-social azm-btn azm-border-bottom azm-twitter"><i class="fa fa-twitter"></i></a> -->
					<a href="#" class="btn azm-social azm-btn azm-border-bottom azm-google-plus"><i class="fa fa-google"></i></a>
				</div>

			</form>

		</div>
	</div>
</div>

</body>
</html>
