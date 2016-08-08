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
            <center> 
                <h2><?php echo $title; ?></h2>
                <?php echo validation_errors();?>
                <?php echo form_open(base_url().'Home/new_post');?>
                <div class="row">
                    <div class="col-lg-11 col-md-9 col-sm-12 col-xs-12">
                        <label for="title">Title</label><br />
                        <input type="input" class="width" name="title" onkeypress="return validar(event)" /><br /><br/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-11 col-md-9 col-sm-12 col-xs-12">
                        <label for="text">Text</label><br />
                            <textarea name="text" class="size-text" rows="8" onkeypress="return validar(event)"></textarea><br/><br/>
                         <input type="submit" class="btn btn-success" name="submit" value="Send"/>
                     </div>
                </div>
               
                </form>
            </center>
        
         </div>
    </div>
</div>
