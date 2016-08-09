<title><?php echo $title ?></title>
<link href="<?php echo base_url(); ?>assets/css/profile.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/showProfile.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row profile">
			<div class=" col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<div class="profile-sidebar">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
						<img src="<?php echo base_url(); ?>assets/img/jordan.jpg" class="img-fluid" alt="">
					</div>
					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
							<?php echo $this->session->userdata('username'); ?>
						</div>
						<div class="profile-usertitle-job">
							Developer
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">
						<!-- <a href="<?php echo base_url(); ?>">
						<button type="button" class="btn btn-success btn-sm">Home</button> -->
						<a href="<?php echo base_url(); ?>index.php/Security/logout">
							<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete</button></i></a>
						</div>
						<!-- END SIDEBAR BUTTONS -->
						<!-- SIDEBAR MENU -->
						<div class="profile-usermenu">
							<ul class="nav">
								<li class="active padding-li">
									<a href="" onclick="myFunctionO()">
										<i class="glyphicon glyphicon-home"></i>
										Overview </a>
									</li>
									<li>
										<a href="#settings" onclick="myFunctionS()">
											<i class="glyphicon glyphicon-user"></i>
											Account Settings </a>
										</li>
										<li>
											<a href="" target="_blank">
												<i class="glyphicon glyphicon-ok"></i>
												Tasks </a>
											</li>
											<li>
												<a href="">
													<i class="glyphicon glyphicon-flag"></i>
													Help </a>
												</li>
											</ul>
										</div>
										<!-- END MENU -->
									</div>
								</div>

								<!-- 	overview -->
								<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 ">
									<div class="profile-content">
										<!-- Overview -->
										<div id="overview" class="container-style">
											<!-- Form Name -->
											<legend>My Posts</legend>

											<?php foreach ($posts as $my_posts):
												$url = 'post/' . $my_posts->id_post . '/';
					        			$url .= url_title(convert_accented_characters($my_posts->title), '-', TRUE);?>
												<div class=" col-lg-4 col-md-6 col-sm-12 col-xs-12 ">
													<div class="size-img container-post">
														<img class="img-fluid height>" src="<?php echo base_url(); ?>assets/img/hitman.jpg" alt="Loading image failed">
														<div class="caption">
															<h3>
																<?php echo anchor($url, $my_posts->title);?>
															</h3>
															<p class="font-size">
																<?php echo $my_posts->description; ?>
															</p>
															<p class="down">
																<a href="" class="btn btn-primary" role="button">Read more</a>
																<span class="glyphicon glyphicon-chevron-right"></span></a>
															</p>
														</div>

														<div class="down-delete center">
															<div class="profile-userbuttons">
																<form action="<?php echo base_url()?>Profile_controller/delete_post" method="post">
																	<input type="hidden" name="id_post" value="<?php echo $my_posts->id_post;?>">
																	<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete</button></i>
																</form>
															</div>
														</div>
													</div>
												</div>

											<?php endforeach; ?>
											</div>

											<!-- Account Settings -->
											<div id="settings" class=" settings" >
												<form class="form-horizontal">
													<fieldset>

														<!-- Form Name -->
														<legend>Account setting</legend>

														<!-- Email input-->
														<div class="form-group">
															<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="textinput">Change Email ID</label>
															<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
																<input id="textinput" name="textinput" type="text" placeholder="your current email " class="form-control input-md height">
																<span class="help-block color">your new email ID</span>
															</div>
														</div>

														<!-- Password input-->
														<div class="form-group">
															<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="passwordinput">New password</label>
															<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
																<input id="passwordinput" name="passwordinput" type="password" placeholder="new password" class="form-control input-md">
															</div>
														</div>
														<!-- Password input-->
														<div class="form-group">
															<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="passwordinput">Repeat password</label>
															<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
																<input id="passwordinput" name="passwordinput" type="password" placeholder="repeat password" class="form-control input-md">
															</div>
														</div>
														<!-- Birth input-->
														<div class="form-group">
															<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="passwordinput">Birth</label>
															<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
																<input id="passwordinput" name="passwordinput" type="password" placeholder="your birth" class="form-control input-md">

															</div>
														</div>
														<!-- Select Basic -->
														<div class="form-group">
															<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="selectbasic">Gender</label>
															<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
																<select id="selectbasic" name="selectbasic" class="form-control">
																	<option value="1">Female</option>
																	<option value="2">Male</option>
																</select>
															</div>
														</div>
														<!-- Address Input -->
														<div class="form-group">
															<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="textinput">Address</label>
															<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
																<input id="textinput" name="textinput" type="text" placeholder="your current address" class="form-control input-md">
															</div>
														</div>
														<!-- Cel Input -->
														<div class="form-group">
															<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="textinput">Celphone</label>
															<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
																<input id="textinput" name="textinput" type="text" placeholder="your current celphone" class="form-control input-md">
															</div>
														</div>
														<!-- Select Multiple -->
														<div class="form-group">
															<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="selectmultiple">What is your job ?</label>
															<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
																<select id="selectmultiple" name="selectmultiple" class="form-control" multiple="multiple">
																	<option value="1">Student</option>
																	<option value="2">Office employee</option>
																	<option value="3">Nini</option>
																</select>
															</div>
														</div>
														<!-- Save Button -->
														<div class="form-group">
															<label class="col-lg-4 col-md-12 col-sm-12 col-xs-12 control-label" for="singlebutton">Save your data</label>
															<div class="col-md-4 margin-right">
																<button id="singlebutton" name="singlebutton" class="btn btn-success">Save</button>
															</div>
														</div>
														<!-- Delete Button -->
														<div class="form-group">
															<label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label" for="singlebutton">Remove my account</label>
															<div class="col-md-4">
																<button id="singlebutton" name="singlebutton" class="btn btn-danger">remove</button>
															</div>
														</div>

													</fieldset>
												</form>

											</div>

											<!-- End Account Settings -->
										</div>
									</div>
									<!-- End Overview -->


								</div>
							</div>
						</div>
					</div>

				</body>
				</html>
