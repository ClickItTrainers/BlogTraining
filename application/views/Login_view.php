<!DOCTYPE html>
<html>

<head lang="es">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title ?></title>
	<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/login.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>

	<!--Pulling Awesome Font -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<!-- line modal forgot password  -->
<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-lg-10 col-md-11 col-sm-11 col-xs-12 ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<h3><i class="fa fa-lock fa-4x"></i></h3>
				<h3 class="" id="lineModalLabel">Forgot your password ??</h3>
				<p>You can reset your password here.</p>
			</div>
			<div class="modal-body">

				<form method="post" action="<?php echo base_url() ?>Mailgun_controller/mail_psw">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
							<input placeholder="Email address" name="email" type="email" class="form-control" value="<?php echo set_value('email'); ?>" required onpaste="return false" onkeypress="return validar(event)" name="email">
						</div>
					</div>
					<span class="text-danger"><?php echo form_error('email'); ?></span>
					<button type="submit" class="btn btn-warning">Reset password</button>
				</form>

			</div>
		</div>
	</div>
</div>

<body class="img-fluid">

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
					<input type="email" name="email" required class="col-center form-control input-sm chat-input"/>
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
							<a href="<?php echo base_url() ?>" class="display" ><i class="fa fa-chevron-left"></i> Back to blog </a> 
						</div>
						<!-- <a href="#" class="btn azm-social azm-btn azm-border-bottom azm-drupal"><i class="fa"></i> Login </a> -->
									<!-- <a href="<?php echo $loginUrl ?>" class="btn azm-social azm-btn azm-border-bottom azm-facebook"><i class="fa fa-facebook"></i></a>
									<a href="#" class="btn azm-social azm-btn azm-border-bottom azm-twitter"><i class="fa fa-twitter"></i></a>
									<a href="#" class="btn azm-social azm-btn azm-border-bottom azm-google-plus"><i class="fa fa-google"></i></a> -->
								</div>
							</form>
							<button data-toggle="modal" data-target="#forgot" class="btn">
								Forgot Password? <i class="fa fa-chevron-right"></i>
							</button>
						</div>
					</div>
				</div>

				<!-- jQuery -->
				<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>

				<!-- Bootstrap Core JavaScript -->
				<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

			</body>
			</html>
