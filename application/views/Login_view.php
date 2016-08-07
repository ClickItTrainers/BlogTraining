<!DOCTYPE html>
<html>

<head lang="es">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title ?></title>
	<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

	<link href="<?php echo base_url()?>assets/css/login.css" rel="stylesheet">
</head>
	<body class="img-fluid">

			<!--Pulling Awesome Font -->
			<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-8 col-sm-12 col-xs-12">

						
						<div class="form-login">
						<form  action="<?php echo base_url() ?>Login_controller/entrada_login" method="post">
							<h4>Please login</h4>
							<p>Email:</p>
					<input type="text" name="email" class=" col-center form-control input-sm chat-input"/>
							<span class="text-danger"><?php echo form_error('email'); ?></span>
							<br>
							<p>Password:</p>
							<input type="password" name="password" class="form-control input-sm chat-input" />
							<span class="text-danger"><?php echo form_error('password')?></span>
							</br>
							<input type="hidden" name="token" value="<?php echo $token?>" />
							
							<div class="wrapper">
								<div class="display">
									<input class=" button btn azm-social azm-btn azm-border-bottom azm-drupal" type="submit" name="submit" value="Login">
								</div>
								<!-- <a href="#" class="btn azm-social azm-btn azm-border-bottom azm-drupal"><i class="fa"></i> Login </a> -->

								<a href="#" class="btn azm-social azm-btn azm-border-bottom azm-facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="btn azm-social azm-btn azm-border-bottom azm-twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="btn azm-social azm-btn azm-border-bottom azm-google-plus"><i class="fa fa-google"></i></a>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</body>
	</html>
