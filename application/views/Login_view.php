<!DOCTYPE html>
<html>

<head lang="es">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-signin-client_id" content="30644026759-4tnfjfj9bs2q9vh2bvmrhpchjhtbda70.apps.googleusercontent.com">
	<title><?php echo $title ?></title>
	<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/login.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>

	<!--Pulling Awesome Font -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body class="img-fluid">
	<!--Pulling Awesome Font -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<div class="row col-center container">
		<div class="col-lg-6 col-md-5 col-sm-8 col-xs-12 tittle ">
			<h2>THE BBLOG</h2>
			<p>Now you can see the latest news</p>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-8 col-xs-12">
			<div class="form-login">
				<form  action="<?php echo base_url() ?>Login_controller/entrada_login" method="post">
					<h4>Please login</h4>

					<p><i class="fa fa-envelope-o" aria-hidden="true"></i> Email:</p>
					<input type="text" name="email" required class="col-center form-control input-sm chat-input"/>
					<span class="text-danger"><?php echo form_error('email'); ?></span>

					<br>

					<p><i class="fa fa-key" aria-hidden="true"></i> Password:</p>
					<input type="password" name="password" required class="form-control input-sm chat-input" />
					<span class="text-danger"><?php echo form_error('password')?></span>

				</br>

				<input type="hidden" name="token" value="<?php echo $token?>" />

					<div class="wrapper">
						<div class="display">
								<!-- <a href="<?php echo base_url() ?>" class="btn botton-back" ><i class="fa fa-chevron-left"></i>
								</a> -->
							<input class="display button btn azm-social azm-btn azm-border-bottom azm-drupal" type="submit" name="submit" value="Login">
							<a href="<?php echo base_url() ?>" class="display" ><i class="fa fa-chevron-left"></i> back to blog
								</a>
						</div>
						<!-- <a href="#" class="btn azm-social azm-btn azm-border-bottom azm-drupal"><i class="fa"></i> Login </a> -->
									<!-- <a href="<?php echo $loginUrl ?>" class="btn azm-social azm-btn azm-border-bottom azm-facebook"><i class="fa fa-facebook"></i></a>
									<a href="#" class="btn azm-social azm-btn azm-border-bottom azm-twitter"><i class="fa fa-twitter"></i></a>
									<a href="#" class="btn azm-social azm-btn azm-border-bottom azm-google-plus"><i class="fa fa-google"></i></a> -->
								</div>
							</form>
						</div>
					</div>
				</div>
<script src="https://apis.google.com/js/platform.js" async defer>
	function onSignIn(googleUser) {
	var profile = googleUser.getBasicProfile();
	alert('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
	alert('Name: ' + profile.getName());
	console.log('Image URL: ' + profile.getImageUrl());
	console.log('Email: ' + profile.getEmail());
	}
</script>
</body>
</html>
