<title><?php echo $title ?></title>
<link href="<?php echo base_url(); ?>assets/css/profile.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/showProfile.js"></script>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container margin-top">
	<div class="row profile">
		<div class=" col-lg-3 col-md-4 col-sm-5 col-xs-12">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="<?php echo base_url(); ?>assets/img/jordan.jpg" class="img-fluid" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $user;?>
					</div>
					<div class="profile-usertitle-job">

					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<?php if ($this->session->userdata('admin') && $this->session->userdata('username') != $user) {?>
					<div class="profile-userbuttons">
						<a href="<?php echo base_url(); ?>">
							<button type="button" class="btn btn-success btn-sm">Home</button>
							<a href="<?php echo base_url(); ?>index.php/Security/logout">
								<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete</button></i></a>
							</div>
							<?php } ?>
							<!-- END SIDEBAR BUTTONS -->
							<!-- SIDEBAR MENU -->
							<div class="profile-usermenu">
								<ul class="nav">
									<a href="" onclick="myFunctionO()">
										<li class=" padding-li">
											<i class="fa fa-home"></i> Overview
										</li>
									</a>
									<?php if ($this->session->userdata('username') === $user){ ?>
										<a href="#settings" onclick="myFunctionS()">
											<li>
												<i class="fa fa-user"></i> Account Settings
											</li>
										</a>
										<?php } ?>
									</ul>
								</div><!-- END MENU -->
							</div> <!-- profile-sidebar -->
						</div> <!-- col -->

						<!-- 	overview -->
						<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12 ">
							<!-- Overview -->
							<div id="overview" class="container-style">
								<!-- Form Name -->
								<legend>Posts of <?php echo $user ?></legend>

								<?php foreach ($posts as $my_posts):
									$mostrar = substr($my_posts->description, 0,65);
									$mostrarTitle = substr($my_posts->title, 0,55);
									$url = 'post/' . $my_posts->id_post . '/';
									$url .= url_title(convert_accented_characters($my_posts->title), '-', TRUE);?>
									<div class=" col-lg-4 col-md-6 col-sm-12 col-xs-12 ">
										<div class="size-img container-post">
											<img class="img-fluid height>" src="<?php echo base_url(); ?>assets/img/hitman.jpg" alt="Loading image failed"/>
											<div class="caption">
												<h3 class="font-size-h3">
													<?php echo anchor($url, $mostrarTitle."...");?>
												</h3>
												<p class="font-size-p">
													<?php echo $mostrar."..."; ?>
												</p>
												<div class="down">
													<a href="" class="btn btn-primary font-size-a" role="button">Read more</a>
												</div>
											</div>

											<?php if ($this->session->userdata('username') === $user || $this->session->userdata('admin')): ?>
												<div class="down-delete center">
													<div class="profile-userbuttons">
														<form action="<?php echo base_url()?>Profile_controller/delete_post" method="post">
															<input type="hidden" name="id_post" value="<?php echo $my_posts->id_post;?>">
															<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete</button></i>
														</form>
													</div>
												</div>
											<?php endif ?>
										</div>
									</div>
								<?php endforeach; ?>
							</div> <!-- overview -->
							<?php if ($this->session->userdata('username') === $user){ ?>
								<!-- Account Settings -->
								<div id="settings" class=" settings" >
									<form class="form-horizontal" action="<?php echo base_url()?>Profile_controller/update_profile" method="post">
										<fieldset>

											<!-- Form Name -->
											<legend>Account setting</legend>

											<!-- username input-->
											<div class="form-group">
												<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="textinput">Username:</label>
												<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
													<input name="username" type="text" class="form-control input-md height" >
												</div>
											</div>
											<!-- Email input-->
											<div class="form-group">
												<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="textinput">Email:</label>
												<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
													<input name="my_email" value="<?php echo $this->session->userdata('email');?>" type="text" class="form-control input-md height" disabled>
												</div>
											</div>
											<!-- name input-->
											<div class="form-group">
												<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="textinput">Name:</label>
												<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
													<input name="name" value="<?php echo $user_info->name; ?>" type="text" class="form-control input-md height">
												</div>
											</div>
											<!-- Password input-->
											<div class="form-group">
												<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="passwordinput">New password:</label>
												<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
													<input name="password" type="password" placeholder="New password" class="form-control input-md">
												</div>
											</div>
											<!-- Repeat Password input-->
											<div class="form-group">
												<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="passwordinput">Repeat password:</label>
												<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
													<input name="repeatpassword" type="password" placeholder="Repeat password" class="form-control input-md">
												</div>
											</div>
											<!-- Select Basic -->
											<?php if($user_info->gender === null): ?>
												<div class="form-group">
													<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="selectbasic">Gender:</label>
													<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
														<select  name="gender" class="form-control">
															<option value="F">Female</option>
															<option value="M">Male</option>
														</select>
													</div>
												</div>
											<?php else: ?>
												<!-- Gender input-->
												<div class="form-group">
													<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="textinput">Gender:</label>
													<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
														<input name="gender" value="<?php echo $user_info->gender; ?>" type="text" class="form-control input-md height">
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
							</div><!-- col End Overview -->
						</div> <!-- row -->
