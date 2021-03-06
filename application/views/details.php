<title><?php echo $title ?></title>
<link href="<?php echo base_url(); ?>assets/css/details.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/sweetalert.css" rel="stylesheet">
<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title text-center" id="lineModalLabel">Update Post</h3>
      </div>
      <div class="modal-body">
        <!-- content goes here -->
        <?php echo form_open(base_url().'update/'. $details->url_post, 'class="form_Update"'); ?>
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" value="<?php echo $details->title ?>" name="title">
            <span class="text-danger Title_error"><?php echo form_error('title') ?></span>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <input type="texts" class="form-control" value="<?php echo $details->description ?>" name="description">
            <span class="text-danger Desc_error"><?php echo form_error('description') ?></span>
          </div>
          <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" rows="8" name="content" style="resize: none;"><?php echo $details->content ?></textarea>
            <span class="text-danger Cont_error"><?php echo form_error('content') ?></span>

          </div>
          <button type="submit" class="btn btn-success">Submit</button>
          <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>


<div class="container margin-top">
  <div class="row">
    <div class="col-lg-9 margin-bottom">
      <title> <?php echo $title; ?> </title>

      <section class="relative row">
        <!-- Preview Image -->
        <img class="img-fluid" src="/assets/img/category/<?php echo $details->name.'.jpg'?>" alt="<?php echo $details->name ?>">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 absolute-tittle absolute">
          <h1 class="word-break "> <?php echo htmlentities($details->title); ?> </h1>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 absolute-author absolute word-break ">
          <a href="<?php echo base_url().'profile/user/'.$username; ?>">

            <img class="img-fluid display-in media-object size-img-main" src="/assets/img/profile-blog.jpg" alt="img-profile"/>
            <span><?php echo $username; ?></span>
          </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-7 absolute-date absolute">
          <span class=""><i class="fa fa-clock-o"></i> <?php echo $date; ?>
          </span>
        </div>
      </section>

      <!-- Tag -->
      <div class="display float-right">
        <span><?php echo $details->name ?></span >
        </div>


        <div class="bottons">
          <?php if($this->session->userdata('admin') || $this->session->userdata('username') == $username)
          {?>
            <div class="center display-in">
              <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-warning">
                <i class="fa fa-pencil-square-o"> Edit Post</i>
              </button>
            </div>
            <!--form method="post"  class="display-in" action=""-->
            <?php echo form_open(base_url().'delete_post/'.$details->url_post, 'class="display-in"');?>
              <div class="center display-in">
                <button class="btn btn-danger ">
                  <i class="fa fa-trash"> Delete Post</i>
                </button>
              </div>
            <?php echo form_close(); } ?>
          </div>
          <!-- Post Content -->
          <p class="lead word-break"> <?php echo $details->description; ?></p>
          <p class="font-content word-break"> <?php echo $details->content; ?> </p>

          <hr>
          <!-- Blog Comments -->
          <?php if ($this->session->userdata('is_logued_in') == TRUE) { ?>

            <!-- Comments Form -->
            <div class="well">
              <h4><i class="fa fa-commenting-o"></i>Leave a Comment:</h4>
                <?php echo form_open(base_url().'Mailgun_controller/comment', 'class="form_comment"'); ?>
                <div class="form-group">
                  <textarea maxlength="255" name="comment" class="form-control" rows="3" style="resize: none;"></textarea>
                </div>
                <?php echo form_hidden('url_post', $details->url_post); ?>
                <button type="submit" class="btn btn-primary">Submit</button>

              <?php echo form_close(); ?>
            </div>

            <?php } ?>

            <?php if($comentarios){
              foreach ($comentarios as $item): ?>
              <!-- Comment -->
              <div class="media padding-container border">
                <div class="media-body">
                  <a class="pull-left margin-right" href="#">
                    <img class="media-object size-img" src="/assets/img/profile-blog.jpg" alt="img-profile">
                  </a>
                  <div>
                    <h3 class="display-in"><?php echo $item->username; ?></h3>
                    <?php if ($this->session->userdata('username') == $item->username || $this->session->userdata('admin') || $this->session->userdata('username') == $username ){
                          echo form_open(base_url().'delete_comment/'.$item->id_comment);?>
                          <?php echo form_hidden('url_post', $details->url_post); ?>
                        <a href="">
                          <button type="submit" class="btn btn-danger btn-sm float"><i class="fa fa-trash"> Delete</button></i>
                        </a>
                        <?php
                        echo form_close();
                      } ?>
                      </div>
                      <h4 class="media-heading size-font">
                        <small><?php echo $dates; ?></small>
                      </h4>
                    </div>
                    <div class="padding-container word-break">
                      <?php echo htmlentities($item->comment); ?>
                    </div>
                  </div>

                <?php endforeach; ?>

                <?php }else{ ?>

                  <div class="media">
                    <div class="media-body">
                      <strong><?php echo "There are no comments, leave yours..." ?></strong>
                    </div>
                  </div>
                  <?php } ?>

                  <!-- Comment on comment
                  <div class="media">
                  <a class="pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
              </h4>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              Nested Comment
              <div class="media">
              <a class="pull-left" href="#">
              <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
            <h4 class="media-heading">Nested Start Bootstrap
            <small>August 25, 2014 at 9:30 PM</small>
          </h4>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
      </div>
      End Nested Comment
    </div>
  </div> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/sweetalert.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/sweetalert.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/sweetalert-dev.js"></script>
  <script type="text/javascript">
  /*$(document).ready(function(){
    //Cuando el usuario da submit al btn por el metodo post se envian los datos y se recibe
    //la respuesta del controlador para asi mostar las reglas si no se cumplieron
    $('form.form_Update').on('submit', function(form){
      form.preventDefault();
      $.post("<?php echo base_url().'update/'.$details->url_post?>", $('form.form_Update').serialize(), function(data){
        $('span.Title_error').html(data.title);
        $('span.Desc_error').html(data.description);
        $('span.Cont_error').html(data.content);

        if(data.st === 1)
        {
          swal({
            title: data.msg,
            type: "success"
          },
          function()
        {
          window.location.href=data.url;
        });
          //swal(data.msg);
          //setTimeout(function(){window.location.href=data.url; }, 2500);
        }
      }, 'json');
    });
  });*/
  </script>
</div>
