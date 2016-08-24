<!DOCTYPE html>
<html>
<html itemscope itemtype="http://schema.org/Article">

<head lang="es">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--meta name="google-signin-client_id" content="30644026759-4tnfjfj9bs2q9vh2bvmrhpchjhtbda70.apps.googleusercontent.com"-->
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
					<input type="text" name="username" class="form-control input-sm chat-input" required onpaste="return false" onkeypress="return validar(event)" value="<?php echo set_value('username');?>"/>
					<span class="text-danger"><?php echo form_error('username'); ?></span>

					<p>Email:</p>
					<input type="email" name="email" class="form-control input-sm chat-input" required onpaste="return false" onkeypress="return validar(event)" value="<?php echo set_value('email');?>"/>
					<span class="text-danger"><?php echo form_error('email')?></span>


					<p>Password:</p>
					<input type="password" name="password" required onpaste="return false" onkeypress="return validar(event)" class="form-control input-sm chat-input"/>
					<span class="text-danger"><?php echo form_error('password')?></span>


					<p>Name:</p>
					<input type="text" name="name" required onpaste="return false" onkeypress="return validar(event)"  value="<?php echo set_value('name');?>" class="form-control input-sm chat-input"/>
					<span class="text-danger"><?php echo form_error('name')?></span>


					<p>Gender:</p>
					<select name="gender" class="form-control input-sm chat-input">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>

					<input type="hidden" name="token" value="<?php echo $token?>" />

					<div class="wrapper">
						<div class="display">
							<!-- <a href="<?php echo base_url() ?>" class="btn  botton-back" ><i class="fa fa-chevron-left"></i>
						</a> -->
						<input class="display button btn azm-social azm-btn azm-border-bottom azm-drupal" type="submit" name="submit" value="Registar">
					</div>
					<a href="<?php echo base_url() ?>" class="display" ><i class="fa fa-chevron-left"></i> back to blog
					</a>
					<!-- <a href="#" class="btn azm-social azm-btn azm-border-bottom azm-drupal"><i class="fa"></i> Login </a> -->

					<!-- <div class="caja-redes">
					<a href="#" class="icon-button facebook"><i class="fa fa-facebook"></i><span></span></a>
					<a href="#" class="icon-button google-plus"><i class="fa fa-google"></i><span></span></a>

				</div> -->
				<a href="<?php echo $loginUrl ?>" class="btn azm-social azm-btn azm-border-bottom azm-facebook"><i class="fa fa-facebook"></i></a>
				<a href"#" id="SignInbtn" class="btn azm-social azm-btn azm-border-bottom azm-google-plus"><i class="fa fa-google"></i></a>
			</div>

		</form>

	</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
<script type="text/javascript">
function start() {
	gapi.load('auth2', function() {
		auth2 = gapi.auth2.init({
			client_id: '30644026759-4tnfjfj9bs2q9vh2bvmrhpchjhtbda70.apps.googleusercontent.com',
			fetch_basic_profile: true,
			scope: 'profile email'
		});
	});
}
</script>
<script type="text/javascript">
$('#SignInbtn').click(function() {


	// Sign the user in, and then retrieve their ID.
	auth2.signIn().then(function() {
		profile = auth2.currentUser.get().getBasicProfile();

		console.log(profile.getName());
		console.log(profile.getEmail());
		console.log(profile.getImageUrl());
		console.log( profile.getGivenName());
		$.post( "http://www.blogtraining.com/Login_controller/google_login", { 'given_name' : profile.getGivenName(),
		'email' : profile.getEmail(),
		'name' : profile.getName(),
		'image' : profile.getImageUrl()})
		.done(function(){
			alert('Welcome');
			window.location.href = 'http://www.blogtraining.com/Home';
		});
	});
});
</script>
</body>
</html>
