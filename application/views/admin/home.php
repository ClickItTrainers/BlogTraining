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
			  <div class="card-block ">
			    <div class="cuadro_intro_hover">
						<a href="<?php echo base_url() ?>admin/users"> <img src="<?php echo base_url(); ?>assets/img/user.jpg" alt="Loading image failed" class="img-fluid img-height"/>
					<div class="caption">
						<div class="blur"></div>
						<div class="caption-text">
							<p>Users</p>
							<br>
							<br>
							<i class="fa fa-user"></i>
							<span> you can see and delete users here!</span>
						</div>
					</div>
				</div>
			  </div>
			</div>
		</div> <!-- col -->

		<div class="col-md-6">
			<div class="card card-inverse card-primary text-xs-center">
			  <div class="card-block">
				   <div class="cuadro_intro_hover">
						<a href="<?php echo base_url() ?>profile"><img src="<?php echo base_url(); ?>assets/img/profile.jpg" alt="Loading image failed" class="img-fluid img-height">
						<div class="caption">
							<div class="blur"></div>
							<div class="caption-text">
								<p>My profile</p>
								<br>
								<br>
								<i class="fa fa-list-alt "></i>
								<span> you can see your profile here!</span>
							</div>
						</div>
					</div>
			   </div>
			</div>

		</div><!-- col -->
	</div><!-- /.row -->


