<?php
{
	if($this->session->userdata('is_logued_in')===null)
	{
		redirect(base_url());
	}
}?>

<div class="container">
	<div class="row padding padding-top">
		<div class="col-md-6">
			<div class="card card-inverse card-primary text-xs-center">
			  <div class="card-block">
			    <blockquote class="card-blockquote">
			    <img src="<?php echo base_url(); ?>assets/img/user.jpg" alt="Loading image failed" class="img-fluid  url-user">
			    <div class="color">
			      <p>Users</p>
			    </div>
			    </blockquote>
			  </div>
			</div>

		</div>

		<div class="col-md-6">
			<div class="card card-inverse card-primary text-xs-center">
			  <div class="card-block">
			    <blockquote class="card-blockquote">
			      <img src="<?php echo base_url(); ?>assets/img/profile.jpg" alt="Loading image failed" class="img-fluid url-profile">
			      <div class="color">
			     	 <p>My profile</p>
			      </div>
			      <!-- <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer> -->
			    </blockquote>
			  </div>
			</div>

		</div>
