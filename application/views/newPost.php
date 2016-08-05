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
    <button href="<?php echo base_url();?>"class="btn btn-danger">Regresar</button><br/>
</div>
</form>
</center>
