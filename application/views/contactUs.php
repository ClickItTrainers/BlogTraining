	<title><?php echo $title ?></title>
	<link href="<?php echo base_url(); ?>assets/css/contact.css" rel="stylesheet">

		<div class="container margin-top">

			<div class="row">
		      <div class="col-lg-7 col-md-9 col-sm-12 col-xs-12 col-md-offset-3 border margin col-center">
		        <div class="well well-sm">
		          <form class="form-horizontal" action="<?php echo base_url() ?>Mailgun_controller/send_mail" method="post">
			          <fieldset>
			          <div class="text-contact">
			            <legend class="text">Contact us</legend>
			          </div>
			            <!-- Name input-->
			            <div class="form-group ">
			              <label class="col-lg-3 col-md-3 control-label" for="email">Your E-mail</label>
			              <div class="col-md-9 margin-bottom">
			                <input id="email" name="email" type="text" placeholder="Your email" class="form-control" value="<?php echo set_value('email'); ?>">
			                <span class="text-danger"><?php echo form_error('email'); ?></span>
			              </div>
			            </div>
			    
			            <!-- Email input-->
			            <div class="form-group">
			              <label class="col-md-3 control-label" for="subject">Subject</label>
			              <div class="col-md-9 margin-bottom">
			                <input id="subject" name="subject" type="text" placeholder="Subject" class="form-control" value="<?php echo set_value('subject'); ?>">
			                <span class="text-danger"><?php echo form_error('subject')?></span>
			              </div>
			            </div>
			    
			            <!-- Message body -->
			            <div class="form-group">
			              <label class="col-md-3 control-label" for="message">Your message</label>
			              <div class="col-md-9 margin-bottom">
			                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5" style="resize: none;"></textarea>
			                <span class="text-danger"><?php echo form_error('message')?></span>
			              </div>
			            </div>
			    
			            <!-- Form actions -->
			            <div class="form-group">
			              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 botton-right">
			                <button type="submit" class="btn btn-primary">Submit</button>
			              </div>
			            </div>
			          </fieldset>
		          </form>
		         	
		        </div>
		      </div> <!-- col -->
			</div> <!-- row -->
	

