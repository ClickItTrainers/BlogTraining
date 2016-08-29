<title><?php echo $title ?></title>
<link href="<?php echo base_url(); ?>assets/css/profile.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/showProfile.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<script type="text/javascript">
function validar(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==8) return true;
  patron =/[<>''$#%&=]/;
  te = String.fromCharCode(tecla);
  return !patron.test(te);
}

</script>

<!-- line modal Username  -->
<div class="modal fade" id="userNameModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content col-lg-10 col-md-11 col-sm-11 col-xs-12 ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Close</span>
        </button>
        <h3 class="" id="lineModalLabel">Update Username</h3>
      </div>
      <div class="modal-body">
        <!-- content goes here -->
        <form class="formUsername" method="post" action="<?php echo base_url() ?>Profile_controller/update_username">
          <div class="form-group">
            <label for="name">Username:</label>
            <input id="username" type="text" class="form-control" required onpaste="return false" onkeypress="return validar(event)" name="username">
            <!--span class="text-danger" id="ero"></span-->
            <div class="ero">

            </div>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- line modal email  -->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content col-lg-10 col-md-11 col-sm-11 col-xs-12 ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Close</span>
        </button>
        <h3 class="" id="lineModalLabel">Update Email</h3>
      </div>
      <div class="modal-body">
        <!-- content goes here -->
        <form method="post" action="<?php echo base_url() ?>Profile_controller/update_email">
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" value="<?php echo set_value('email'); ?>" required onpaste="return false" onkeypress="return validar(event)" name="email">
            <span id="msgUser" class="text-danger"><?php echo form_error('email'); ?></span>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- line modal name  -->
<div class="modal fade" id="nameModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content col-lg-10 col-md-11 col-sm-11 col-xs-12 ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Close</span>
        </button>
        <h3 class="" id="lineModalLabel">Update Name</h3>
      </div>
      <div class="modal-body">
        <!-- content goes here -->
        <form method="post" action="<?php echo base_url() ?>Profile_controller/update_name">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" value="" required onpaste="return false" onkeypress="return validar(event)" name="name">
            <span class="text-danger"><?php echo form_error('name'); ?></span>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- line modal password  -->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content col-lg-10 col-md-11 col-sm-11 col-xs-12 ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Close</span>
        </button>
        <h3 class="" id="lineModalLabel">Update Password</h3>
      </div>
      <div class="modal-body">
        <!-- content goes here -->
        <form method="post" action="<?php echo base_url() ?>Profile_controller/update_password">
          <div class="form-group">
            <label for="last_password">Last Password:</label>
            <input type="password" class="form-control" value="" required onpaste="return false" onkeypress="return validar(event)" name="last_password">
            <span class="text-danger"><?php echo form_error('last_password'); ?></span>
            <label for="new_password">New Password:</label>
            <input type="password" class="form-control" value="" required onpaste="return false" onkeypress="return validar(event)" name="new_password">
            <span class="text-danger"><?php echo form_error('new_password'); ?></span>
            <label for="repeat_password">Repeat Password:</label>
            <input type="password" class="form-control" value="" required onpaste="return false" onkeypress="return validar(event)" name="repeat_password">
            <span class="text-danger"><?php echo form_error('repeat_password'); ?></span>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>





<div class="container margin-top ">
  <div class="row">
    <div class="col-lg-10 col-md-11 col-sm-11 col-xs-12 col-center">
      <section class="relative row">
        <img class="img-fluid img-size" src="/assets/img/blog.jpg" alt="img-blog"/>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 position">
          <img class="size-profile img-fluid" src="/assets/img/profile-blog.jpg" alt="img-profile"/>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 position-name word-break">
          <span><?php echo htmlentities($user);?><span>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 options">

            <!-- SIDEBAR BUTTONS -->
            <?php if ($this->session->userdata('admin') && $this->session->userdata('username') != $user) {?>
              <div class="profile-userbuttons">
                <a href="<?php echo base_url(); ?>index.php/Security/logout">
                  <button type="button" class="btn btn-danger btn-sm size-boton"><i class="fa fa-trash"> Delete user</button></i>
                </a>
              </div>
              <?php } ?><!-- END SIDEBAR BUTTONS -->

              <ul class="nav">
                <a href="#" onclick="myFunctionO()">
                  <li class="display-inline line">
                    <i class="fa fa-home"></i> Overview
                  </li>
                </a>
                <?php if ($this->session->userdata('username') === $user){ ?>
                  <a href="#settings" onclick="myFunctionS()">
                    <li class="display-inline">
                      <i class="fa fa-user"></i> Account Settings
                    </li>
                  </a>
                  <?php } ?>
                </ul>
              </div>
            </section>
          </div>

          <!-- 	col -->
          <div class="col-lg-11 col-md-10 col-sm-10 col-xs-12 col-center margin-container">
            <!-- Overview -->
            <div id="overview" class="container-style">
              <!-- Form Name -->
              <legend class="post-user">Posts of <?php echo $user ?></legend>

              <?php foreach ($posts as $my_posts):
                $mostrar = substr($my_posts->description, 0,65);
                $mostrarTitle = substr($my_posts->title, 0,55);
                $url = 'post/' . $my_posts->url_post;;?>
                <div class=" col-lg-4 col-md-6 col-sm-12 col-xs-12 post relative">
                  <!-- img -->
                  <img class="img-fluid down" src="/assets/img/category/<?php echo $my_posts->name.'.jpg'?>" alt="<?php echo $my_posts->name ?>">
                  <!-- description -->
                  <div class="caption">
                    <h3 class="description word-break">
                      <?php echo anchor($url, htmlentities($mostrarTitle."..."));?>
                    </h3>
                    <!-- content -->
                    <p class="content word-break">
                      <?php echo htmlentities($mostrar."..."); ?>
                    </p>
                    <!-- button read -->
                    <div class="position-button">
                      <a href="<?php echo base_url().$url ?>" class="btn btn-primary btn-sm" role="button">Read more</a>
                    </div>
                  </div>
                  <?php if ($this->session->userdata('username') === $user || $this->session->userdata('admin')): ?>
                    <div class="position-delete">
                      <form action="<?php echo base_url()?>Profile_controller/delete_post" method="post">
                        <input type="hidden" name="id_post" value="<?php echo $my_posts->id_post;?>"/>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete</i></button>
                      </form>
                    </div>
                  <?php endif ?>
                </div>
              <?php endforeach; ?>
            </div> <!-- overview -->
            <?php if ($this->session->userdata('username') === $user){ ?>
              <!-- Account Settings -->
              <div id="settings" class=" settings" >
                <!-- Form Name -->
                <legend class="post-user">Account setting</legend>

                <fieldset class="padding-left">

                  <!-- username input-->
                  <div class="form-group">
                    <label class="col-lg-3 col-md-2 col-sm-3 col-xs-4 control-label margin-span{" for="textinput">Username:</label>
                    <button data-toggle="modal" data-target="#userNameModal" class="btn color">
                      <i class="fa fa-pencil-square-o"></i>
                    </button>
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                      <span class="form-control input-md min-area margin-span" onpaste="return false" onkeypress="return validar(event)" ><?php echo $this->session->userdata('username');?></span>

                      <span class="text-danger"></span>

                    </div>
                  </div>
                  <!-- Email input-->
                  <div class="form-group">
                    <label class="col-lg-3 col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Email:</label>
                    <button data-toggle="modal" data-target="#emailModal" class="btn color	">
                      <i class="fa fa-pencil-square-o"></i>
                    </button>
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                      <span class="form-control input-md min-area margin-span"><?php echo $this->session->userdata('email');?></span>
                    </div>
                  </div>
                  <!-- name input-->
                  <div class="form-group">
                    <label class="col-lg-3 col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Name:</label>
                    <button data-toggle="modal" data-target="#nameModal" class="btn color	">
                      <i class="fa fa-pencil-square-o"></i>
                    </button>
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 ">
                      <span onpaste="return false" onkeypress="return validar(event)" class="form-control input-md min-area margin-span"><?php echo html_escape($user_info->name); ?></span>
                    </div>
                  </div>
                  <!-- Password input-->
                  <div class="form-group">
                    <label class="col-lg-3 col-md-2 col-sm-3 col-xs-4 control-label" for="passwordinput">New password:</label>
                    <button data-toggle="modal" data-target="#passwordModal" class="btn color	">
                      <i class="fa fa-pencil-square-o"></i>
                    </button>
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                      <span onpaste="return false" onkeypress="return validar(event)" class="form-control input-md min-area margin-span">********</span>
                    </div>
                  </div>

                  <!-- Gender input-->
                  <div class="form-group">
                    <label class="col-lg-3 col-md-12 col-sm-12 col-xs-12 control-label" for="textinput">Gender:</label>
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                      <span class="form-control input-md min-area margin-span"><?php echo $user_info->gender; ?></span>
                    </div>
                  </div>


                  <!-- Delete Button -->
                  <div class="form-group display-inline">
                    <div class="col-md-3 margin-left margin-bottons">
                      <button name="singlebutton" class="btn btn-danger ">Remove my account</button>
                    </div>
                  </div>

                </fieldset>

              </div> <!--End Account Settings -->
              <?php } ?>
            </div> <!-- col-lg-10 -->


          </div> <!-- row -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $('form.formUsername').on('submit', function(form){
    form.preventDefault();
    $.post("<?php echo base_url() ?>Profile_controller/update_username", $('form.formUsername').serialize(), function(data){
    $('div.ero').html(data);
    });
  });
  /*$("#username").focusin(function(){
    $.ajax({
      url : $(this).attr("action"),
      type: $(this).attr("method"),
      data: $(this).serialize(),
      beforeSend: function(){
        console.log("Verificando...");
      },
      success: function(){
        $("#msgUser").html("<span>Correcto</span>");
      }
    });
  });*/
});
</script>
