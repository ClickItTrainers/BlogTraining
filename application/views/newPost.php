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
         <div class="col-lg-11 col-md-9 col-sm-12 col-xs-12 border margin col-center">
                <?php echo validation_errors();?>
                 <?php echo form_open(base_url().'Home/insert_post');?>
                <div class="row">
                    <div class="col-lg-11 col-md-9 col-sm-12 col-xs-12">

							<h2><?php echo $title; ?></h2>
                        <legend for="title">Title</legend>
                        <input type="input" class="width" name="title" onkeypress="return validar(event)" /><br>
						<legend for="description">Description</legend>
						<input type="input" class="width" name="description" onkeypress="return validar(event)" /><br>
                    </div>
					<div class="col-lg-1">
						<legend>Category</legend>
						<div class="btn-group" data-toggle="buttons">

							<?php $count=0;
							foreach ($category_arr as $item)
							{
								$count++?>
								<label class="btn btn-outline-success">
									<input type="radio" name="category" value="<?php echo $count;?>"><?php echo $item->name;?></input>
								</label><br>
							<?php ; } ?>
						</div>
					</div>
                </div>
                <div class="row">
                    <div class="col-lg-11 col-md-9 col-sm-12 col-xs-12">
                        <legend for="text">Content of the post</legend>
                            <textarea name="content" class="size-text" rows="8" onkeypress="return validar(event)"></textarea><br/><br/>
                         <input type="submit" class="btn btn-success" name="submit" value="Send"/>
                     </div>
                </div>
                </form>
         </div>
    </div>
</div>
