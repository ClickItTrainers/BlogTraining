<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>assets/css/blog.css" rel="stylesheet">
<!-- Home css -->
<link href="<?php echo base_url(); ?>assets/css/home.css" rel="stylesheet">

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
<center><h2><?php echo $title; ?></h2>
<?php echo validation_errors();?>
<?php echo form_open(base_url().'Home/new_post');?>
    <label for="title">Titulo</label><br />
    <input type="input"style="width: 70%" name="title" onkeypress="return validar(event)" /><br /><br/>
    <label for="text">Texto</label><br />
    <div class="row">
    <textarea name="text" style="width: 70%; height: 40%" rows="10" onkeypress="return validar(event)"></textarea><br/><br/>
    <input type="submit" class="btn btn-success" name="submit" value="Enviar"/>
    <a href="<?php echo base_url();?>Home"class="btn btn-danger">Regresar</a><br/>
</div>
</form>
</center>
