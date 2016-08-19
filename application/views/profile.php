<title><?php echo $title ?></title>
<link href="<?php echo base_url(); ?>assets/css/profile.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/showProfile.js"></script>
<link href="https://fonts.googleapis.com/css?family=Candal|Patua+One" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<script type="text/javascript">
        function validar(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            patron =/[<>''$#%&=]/;
            te = String.fromCharCode(tecla);
            return !patron.test(te);
        }
</script>



<div class="container margin-top ">
	<div class="row">
		<div class="col-lg-10 col-md-11 col-sm-11 col-xs-12 col-center">
			 <section class="relative row">
				<img class="img-fluid img-size" src="/assets/img/blog.jpg" alt="img-blog"/>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 position">
					<img class="size-profile img-fluid" src="/assets/img/profile-blog.jpg" alt="img-profile"/>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 position-name word-break">
					<span><?php echo $user;?><span>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 options">

				<!-- SIDEBAR BUTTONS -->
				<?php if ($this->session->userdata('admin') && $this->session->userdata('username') != $user) {?>
					<div class="profile-userbuttons">
					<a href="<?php echo base_url(); ?>index.php/Security/logout">
						<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete user</button></i>
					</a>
					</div>
				<?php } ?><!-- END SIDEBAR BUTTONS -->

					<ul class="nav">
						<a href="" onclick="myFunctionO()">
							<li class="display-inline line">
								<i class="fa fa-home"></i> Overview
							</li>
						</a>
						<?php if ($this->session->userdata('username') === $user){ ?>
						<a href="#settings" onclick="myFunctionS()">
							<li class="display-inline">
								<i class="fa fa-user"></i> Account Settings
							</li>
						</a>
						<?php } ?>
					</ul>
				</div>
			</section>
		</div>

		<!-- 	col -->
		<div class="col-lg-11 col-md-10 col-sm-10 col-xs-12 col-center margin-container">
			<!-- Overview -->
			<div id="overview" class="container-style">
				<!-- Form Name -->
				<legend class="post-user">Posts of <?php echo $user ?></legend>

				<?php foreach ($posts as $my_posts):
					$mostrar = substr($my_posts->description, 0,65);
					$mostrarTitle = substr($my_posts->title, 0,55);
					$url = 'post/' . $my_posts->id_post . '/';
					$url .= url_title(convert_accented_characters($my_posts->title), '-', TRUE);?>
					<div class=" col-lg-4 col-md-6 col-sm-12 col-xs-12 post relative">
						<!-- img -->
						<img class="img-fluid size-post" src="/assets/img/category/Cloud.jpg" alt="Loading image failed"/>
						<!-- description -->
						<div class="caption">
							<h3 class="description word-break">
								<?php echo anchor($url, $mostrarTitle."...");?>
							</h3>
						<!-- content -->
							<p class="content word-break">
								<?php echo $mostrar."..."; ?>
							</p>
						<!-- button read -->
							<div class="position-button">
								<a href="" class="btn btn-primary btn-sm" role="button">Read more</a>
							</div>
						</div>
						<?php if ($this->session->userdata('username') === $user || $this->session->userdata('admin')): ?>
							<div class="position-delete">
								<form action="<?php echo base_url()?>Profile_controller/delete_post" method="post">
									<input type="hidden" name="id_post" value="<?php echo $my_posts->id_post;?>"/>
									<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete</i></button>
								</form>
							</div>
						<?php endif ?>
					</div>
				<?php endforeach; ?>
			</div> <!-- overview -->
			<?php if ($this->session->userdata('username') === $user){ ?>
				<!-- Account Settings -->
				<div id="settings" class=" settings" >
					<!-- Form Name -->
					<legend class="post-user">Account setting</legend>

					<form class="form-horizontal padding-left" action="<?php echo base_url()?>Profile_controller/update_profile" method="post">
						<fieldset>


							<!-- username input-->
							<div class="form-group">
								<label class="col-lg-3 col-md-12 col-sm-12 col-xs-12 control-label" for="textinput">Username:</label>
								<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
									<input name="username" type="text" class="form-control input-md margin-bottom" onpaste="return false" onkeypress="return validar(event)" value="<?php echo $this->session->userdata('username');?>" >
									<span class="text-danger"><?php echo form_error('username')?></span>
								</div>
							</div>
							<!-- Email input-->
							<div class="form-group">
								<label class="col-lg-3 col-md-12 col-sm-12 col-xs-12 control-label" for="textinput">Email:</label>
								<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
									<input name="my_email" value="<?php echo $this->session->userdata('email');?>" type="text" class="form-control input-md margin-bottom" disabled>
								</div>
							</div>
							<!-- name input-->
							<div class="form-group">
								<label class="col-lg-3 col-md-12 col-sm-12 col-xs-12 control-label" for="textinput">Name:</label>
								<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
									<input name="name" value="<?php echo $user_info->name; ?>" type="text" onpaste="return false" onkeypress="return validar(event)" class="form-control input-md margin-bottom">
								</div>
							</div>
							<!-- Password input-->
							<div class="form-group">
								<label class="col-lg-3 col-md-12 col-sm-12 col-xs-12 control-label" for="passwordinput">New password:</label>
								<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
									<input name="password" type="password" placeholder="New password" onpaste="return false" onkeypress="return validar(event)" class="form-control input-md margin-bottom">
								</div>
							</div>
							<!-- Repeat Password input-->
							<div class="form-group">
								<label class="col-lg-3 col-md-12 col-sm-12 col-xs-12 control-label" for="passwordinput">Repeat password:</label>
								<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
									<input name="repeatpassword" type="password" placeholder="Repeat password" onpaste="return false" onkeypress="return validar(event)" class="form-control input-md margin-bottom">
								</div>
							</div>
							<!-- Select Basic -->
							<?php if($user_info->gender === null): ?>
								<div class="form-group">
									<label class="col-lg-3 col-md-12 col-sm-12 col-xs-12 control-label" for="selectbasic">Gender:</label>
									<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
										<select  name="gender" class="form-control margin-bottom">
											<option value="F">Female</option>
											<option value="M">Male</option>
										</select>
									</div>
								</div>
							<?php else: ?>
								<!-- Gender input-->
								<div class="form-group">
									<label class="col-lg-3 col-md-12 col-sm-12 col-xs-12 control-label" for="textinput">Gender:</label>
									<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
										<input name="gender" value="<?php echo $user_info->gender; ?>" type="text" class="form-control input-md margin-bottom">
									</div>
								</div>
							<?php endif ?>
							<!-- Save Button -->
							<div class="form-group">
								<div class="col-md-3 margin-left">
									<button name="singlebutton" type="submit" class="btn btn-success">Update my profile</button>
								</div>
							</div>
							<!-- Delete Button -->
							<div class="form-group">
								<div class="col-md-3 margin-left">
									<button name="singlebutton" class="btn btn-danger">Remove my account</button>
								</div>
							</div>

						</fieldset>
					</form>
				</div> <!--End Account Settings -->
				<?php } ?>
		</div> <!-- col-lg-10 -->


	</div> <!-- row -->










