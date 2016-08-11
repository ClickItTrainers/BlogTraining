<?php
{
	if($this->session->userdata('is_logued_in')===null)
	{
		redirect(base_url());
	}
}?>
<title><?php echo $title ?></title>
<link href="<?php echo base_url(); ?>assets/css/new-post.css" rel="stylesheet">

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<script type="text/javascript">
        function validar(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            patron =/[<>'']/;
            te = String.fromCharCode(tecla);
            return !patron.test(te);
        }
</script>
<div class="container">
    <div class="row">
         <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 border padding-container">
            <form method="post" action="<?php echo base_url() ?>/Home/insert_post">
                <h2><?php echo $title; ?></h2>
                <!-- Tittle -->
                <div class="padding-top">
                    <div class="margin-bottom">
                        <legend for="title" class="margin-right">Title:</legend>
                        <input type="input" class="width" name="title" onkeypress="return validar(event)"/>
                        <span class="text-danger"><?php echo form_error('title'); ?></span>
                    </div>
                    <!-- Description -->
                    <div  class="margin-bottom">
                        <legend for="description">Description:</legend>
                        <input type="input" class="width" name="description" onkeypress="return validar(event)"/>
                        <span class="text-danger"><?php echo form_error('description'); ?></span>
                    </div>

                     <!-- Category -->
                     <div class="margin-bottom">
                         <legend for="category" class="margin-category" ">Category</legend>
                        <div class="dropdown ">
                              <button class="btn btn-secondary dropdown-toggle"
                                      type="button" id="dropdownMenu1" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
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
                    <textarea name="content" class="size-text" rows="8" onkeypress="return validar(event)"></textarea>
                    <span class="text-danger"><?php echo form_error('content'); ?></span>
                </div>
                <input type="submit" class="btn btn-success color" name="submit" value="Send"/>
            </form>
         </div>
    </div>
</div>
