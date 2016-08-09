<div class="center"><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-warning center-block">Edit Post</button></div>


<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="lineModalLabel">Update Post</h3>
      </div>
      <div class="modal-body">

        <!-- content goes here -->
        <form method="post" action="<?php base_url()?>/Admin_controller/update_post">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="<?php echo $details->title ?>" name="title">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="texts" class="form-control" value="<?php echo $details->description ?>" name="description">
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" rows="8" name="content">
              <?php echo $details->content ?>
            </textarea>
          </div>
          <?php echo form_hidden('id_post', $this->uri->segment(2)) ?>
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="submit" class="btn btn-danger">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <title> <?php echo $title; ?> </title>

      <!-- Blog Post -->

      <!-- Title -->
      <h1> <?php echo $details->title; ?> </h1>

      <!-- Author -->
      <p class="lead">
        by <a href="#"><?php echo $username ?></a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p><span class="glyphicon glyphicon-time"></span> <?php echo $details->date; ?> </p>

      <hr>

      <!-- Preview Image -->
      <img class="img-fluid" src="http://placehold.it/900x300" alt="">

      <hr>

      <!-- Post Content -->
      <p class="lead"> <?php echo $details->description; ?> </p>
      <p> <?php echo $details->content; ?> </p>

      <hr>

      <!-- Blog Comments -->

      <?php if ($this->session->userdata('is_logued_in') == TRUE) { ?>

        <!-- Comments Form -->
        <div class="well" style="background-color: #B0B0B0;">
          <h4>Leave a Comment:</h4>
          <form role="form" action="<?php echo base_url(); ?>index.php/Home/comment" method="post">
            <div class="form-group">
              <textarea maxlength="255" name="comment" class="form-control" rows="3" style="resize: none;"></textarea>
            </div>
            <?php echo form_hidden('id_post', $this->uri->segment(2)) ?>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>

        <?php } ?>

        <hr>

        <!-- Posted Comments -->

        <?php if (empty($comments)) {
          foreach ($comentarios as $item): ?>
          <!-- Comment -->
          <div class="media">
            <a class="pull-left" href="#">
              <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
              <h4 class="media-heading"><?php echo $item->username; ?>
                <small><?php echo $item->date; ?></small>
              </h4>
              <?php echo $item->comment; ?>
            </div>
          </div>

        <?php endforeach; ?>

        <?php }else{ ?>

          <div class="media">
            <div class="media-body">
              <?php echo "No hay comentarios" ?>
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
</div>
