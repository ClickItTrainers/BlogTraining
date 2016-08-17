<?php
{
	if($this->session->userdata('is_logued_in')===null || $this->session->userdata('admin')===null)
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
				    <a href="<?php echo base_url() ?>admin/users"> <img src="<?php echo base_url(); ?>assets/img/user.jpg" alt="Loading image failed" class="img-fluid  url-user">
					    <div class="color">
					     <p>Users</p> 
					    </div>
				     </a>
			    </blockquote>
			  </div>
			</div>
		</div> <!-- col -->

		<div class="col-md-6">
			<div class="card card-inverse card-primary text-xs-center">
			  <div class="card-block">
			    <blockquote class="card-blockquote">
			      <a href="<?php echo base_url() ?>profile"><img src="<?php echo base_url(); ?>assets/img/profile.jpg" alt="Loading image failed" class="img-fluid url-profile">
				      <div class="color">
				     	 <p>My profile</p> 
				      </div>
			      </a>
			      <!-- <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer> -->
			    </blockquote>
			  </div>
			</div>

		</div><!-- col -->
	</div><!-- /.row -->

