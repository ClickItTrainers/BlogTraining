<?php
{
	if($this->session->userdata('is_logued_in')===null)
	{
		redirect(base_url());
	}
}?>
<title><?php echo $title ?></title>
<link href="<?php echo base_url(); ?>assets/css/new-post.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/sweetalert.css" rel="stylesheet">

<!-- <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script> -->
<!-- <script src="http://www.blogtraining.com/assets/js/previewImage.js" type="text/javascript"></script> -->
<!-- <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script> -->

<!-- fonts -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/sweetalert.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/sweetalert.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/sweetalert-dev.js"></script>
<script type="text/javascript">

function validar(e) {
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8) return true;
	patron =/[<>''$#%&=]/;
	te = String.fromCharCode(tecla);
	return !patron.test(te);
}

/*$(document).on('click', '#close-preview', function(){
$('.image-preview').popover('hide');
// Hover befor close the preview
$('.image-preview').hover(
function () {
$('.image-preview').popover('show');
},
function () {
$('.image-preview').popover('hide');
}
);
});

$(function() {
// Create the close button
var closebtn = $('<button/>', {
type:"button",
text: 'x',
id: 'close-preview',
style: 'font-size: initial;',
});
closebtn.attr("class","close pull-right");
// Set the popover default content
$('.image-preview').popover({
trigger:'manual',
html:true,
title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
content: "There's no image",
placement:'bottom'
});
// Clear event
$('.image-preview-clear').click(function(){
$('.image-preview').attr("data-content","").popover('hide');
$('.image-preview-filename').val("");
$('.image-preview-clear').hide();
$('.image-preview-input input:file').val("");
$(".image-preview-input-title").text("Browse");
});
// Create the preview image
$(".image-preview-input input:file").change(function (){
var img = $('<img/>', {
id: 'dynamic',
width:250,
height:200
});
var file = this.files[0];
var reader = new FileReader();
// Set preview image into the popover data-content
reader.onload = function (e) {
$(".image-preview-input-title").text("Change");
$(".image-preview-clear").show();
$(".image-preview-filename").val(file.name);
img.attr('src', e.target.result);
$(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
}
reader.readAsDataURL(file);
});
});X*/
</script>
<script type="text/javascript">
$(document).ready(function(){

	$('form.new_post').on('submit', function(form){
		form.preventDefault();
		$.post("<?php echo base_url() ?>Home/insert_post", $('form.new_post').serialize(), function(data){
			$('span.Title_error').html(data.title);
			$('span.Desc_error').html(data.description);
			$('span.Category_error').html(data.category);
			$('span.Cont_error').html(data.content);

			if(data.st === 1)
			{
				swal({
					title: "¡Excellent!",
					text: data.msg,
					imageUrl: "/assets/img/thumbs_up.png"
				},
				function()
				{
					window.location.href=data.url;
				});
			}else if(data.st === 0)
			{
				swal({
					title: data.msg,
					type: "error"
				},
				function()
				{
					window.location.href=data.url;
				});
			}
		}, 'json');
	});

});
</script>



<div class="container margin-top">
	<div class="row">
		<div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 border padding-container">
				<?php echo form_open(base_url().'Home/insert_post', 'class="new_post"');?>
				<h2> <?php echo $title; ?></h2>
				<!-- Tittle -->
				<div class="padding-top">
					<div class="margin-bottom form-group">
						<legend for="title" class="margin-right">Title:</legend>
						<input type="input" class="width form-control display-inline-block" name="title" required onpaste="return false" onkeypress="return validar(event)"/>
						<span class="text-danger Title_error"></span>
					</div>
					<!-- Description -->
					<div  class="margin-bottom">
						<legend for="description">Description:</legend>
						<input type="input" class="width form-control display-inline-block" name="description" required onpaste="return false" onkeypress="return validar(event)"/>
						<span class="text-danger Desc_error"></span>
					</div>

					<!-- Category -->
					<div class="margin-bottom">
						<legend for="category" class="margin-category">Category:</legend>

						<select class="selectpicker" name="category" required data-style="btn-primary">
							<?php $count=0;
							foreach ($category_arr as $item){
								$count++ ?>
								<option value="<?php echo $count;?>"> <?php echo $item->name;?></option>
								<?php } ?>
							</select>
							<span class="text-danger Category_error"></span>



						</div>
					</div>
					<!-- Content od the post -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom">
						<legend for="text">Content of the post:</legend>
						<textarea name="content" class="size-text" rows="8" onkeypress="return validar(event)" style="resize: none;"></textarea>
						<span class="text-danger Cont_error"></span>
					</div>
					<input type="submit" class="btn color" name="submit" value="Send"/>
					<?php echo form_close(); ?>
				</div> <!-- col -->
			</div> <!-- row -->
