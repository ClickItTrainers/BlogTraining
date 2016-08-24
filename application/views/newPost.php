<?php
{
	if($this->session->userdata('is_logued_in')===null)
	{
		redirect(base_url());
	}
}?>
<title><?php echo $title ?></title>
<link href="<?php echo base_url(); ?>assets/css/new-post.css" rel="stylesheet">

<!-- <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script> -->
<!-- <script src="http://www.blogtraining.com/assets/js/previewImage.js" type="text/javascript"></script> -->
<!-- <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script> -->

    <!-- fonts -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

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



<div class="container margin-top">
    <div class="row">
         <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 border padding-container">
            <form method="post" action="<?php echo base_url() ?>/Home/insert_post">
                <h2> <?php echo $title; ?></h2>
                <!-- Tittle -->
                <div class="padding-top">
                    <div class="margin-bottom form-group">
                        <legend for="title" class="margin-right">Title:</legend>
                        <input type="input" class="width form-control display-inline-block" name="title" required onpaste="return false" onkeypress="return validar(event)"/>
                        <span class="text-danger"><?php echo form_error('title'); ?></span>
                    </div>
                    <!-- Description -->
                    <div  class="margin-bottom">
                        <legend for="description">Description:</legend>
                        <input type="input" class="width form-control display-inline-block" name="description" required onpaste="return false" onkeypress="return validar(event)"/>
                        <span class="text-danger"><?php echo form_error('description'); ?></span>
                    </div>

                     <!-- Category -->
                     <div class="margin-bottom">
                         <legend for="category" class="margin-category">Category</legend>

                    <!-- <div class="dropdown ">
                        <select name="OS">
                           <option selected value="0">  
                                <button class="btn btn-secondary dropdown-toggle"
                                          type="button" id="dropdownMenu1" data-toggle="dropdown"
                                          aria-haspopup="true" aria-expanded="false">Choose a category
                                </button> 
                                </option>
                            <div class="dropdown-menu">
                               <option value="1">Windows Vista</option> 
                               <option value="10">Fedora</option> 
                            </div>
                        </select>
                    </div> -->

                        <div class="dropdown ">
                              <button class="btn btn-secondary dropdown-toggle"
                                      type="button" id="dropdownMenu1" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">Choose a category
                              </button>
                              <div class="dropdown-menu">
                                     <?php $count=0;
                                    foreach ($category_arr as $item)
                                    {
                                    $count++?>
                                    <label class="btn ">
                                        <input type="radio" style="visibility:hidden;" name="category" value="<?php echo $count;?>"><?php echo $item->name;?></input>
                                    </label>
                                    <?php ; } ?>
                                    <span class="text-danger"><?php echo form_error('category'); ?></span>
                              </div>
                        </div>
                     </div>
                </div>
                <!-- Content od the post -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom">
                    <legend for="text">Content of the post</legend>
                    <textarea name="content" class="size-text" rows="8" onkeypress="return validar(event)" style="resize: none;"></textarea>
                    <span class="text-danger"><?php echo form_error('content'); ?></span>
                </div>
                <input type="submit" class="btn btn-success color" name="submit" value="Send"/>

            </form>

         </div> <!-- col -->
    </div> <!-- row -->
