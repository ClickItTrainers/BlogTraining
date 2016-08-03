<!DOCTYPE html>
<html>

<head lang="es">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $titulo ?></title>
	<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/login.css" rel="stylesheet">
</head>
	<body>

			<!--Pulling Awesome Font -->
			<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

			<div class="container">
				<div class="row">
					<div>
						<div class="text">
							<h4>Please login</h4>
						</div>
						<div class="form-login">

						<form  action="<?php echo base_url() ?>Login_controller/entrada_login" method="post">
							<p>Username:</p>
					<input type="text" name="email" class="form-control input-sm chat-input"/>
							<span class="text-danger"><?php echo form_error('email'); ?></span>

							<br>

							<p>Password:</p>
							<input type="password" name="password" class="form-control input-sm chat-input" />
							<span class="text-danger"><?php echo form_error('password')?></span>

							</br>
							<input type="hidden" name="token" value="<?php echo $token?>" />
							<div class="wrapper">
								<input class="button" type="submit" name="submit" value="Login">
							</div>

						</form>

						</div>
					</div>
				</div>
			</div>

		</body>
	</html>
