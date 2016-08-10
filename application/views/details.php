<title><?php echo $title ?></title>
<link href="<?php echo base_url(); ?>assets/css/details.css" rel="stylesheet">
<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title text-center" id="lineModalLabel">Update Post</h3>
      </div>
      <div class="modal-body">

        <!-- content goes here -->
        <form method="post" action="<?php echo base_url();?>update">
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" value="<?php echo $details->title ?>" name="title">
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <input type="texts" class="form-control" value="<?php echo $details->description ?>" name="description">
          </div>
          <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" rows="8" name="content"><?php echo $details->content ?></textarea>
          </div>
          <?php echo form_hidden('id_post', $details->id_post); ?>
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="submit" class="btn btn-danger">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-lg-9 margin-bottom">
      <title> <?php echo $title; ?> </title>

      <!-- Blog Post -->

      <!-- Title -->
      <h1> <?php echo $details->title; ?> </h1>

      <!-- Author -->
      <p class="lead display-inline">
        by <a href="#"><?php echo $username ?></a>
        <?php if($this->session->userdata('admin') || $this->session->userdata('username') == $username)
        {?>
          <div class="center display-inline">
            <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-warning">
              <i class="fa fa-pencil-square-o"> Edit Post
              </button>
            </i>
          </div>
          <div class="center display-inline">
            <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-danger ">
              <i class="fa fa-trash"> Delete Post
              </button>
            </i>
          </div>
          <?php } ?>
        </p>

        <div class="center display-inline"><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-warning"><i class="fa fa-pencil-square-o"> Edit Post</button></i></div>
        <div class="center display-inline"><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-danger "><i class="fa fa-trash"> Delete Post</button></i></div>
      </p>

      <hr>

      <!-- Date/Time -->
      <p class="color-date"><i class="fa fa-clock-o"></i> <?php echo $date; ?> </p>

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
          <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form" action="<?php echo base_url(); ?>Mailgun_controller/comment" method="post">
              <div class="form-group">
                <textarea maxlength="255" name="comment" class="form-control" rows="3" style="resize: none;"></textarea>
              </div>
              <?php echo form_hidden('id_post', $this->uri->segment(2)) ?>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>

          <?php } ?>

        <?php if (empty($comments)) {
          foreach ($comentarios as $item): ?>
          <!-- Comment -->
          <div class="media padding-container border">
              <div class="media-body">
                <a class="pull-left margin-right" href="#">
                  <img class="media-object size-img" src="http://placehold.it/64x64" alt="">
                </a>
                  <h3 ><?php echo $item->username; ?></h3>
                  <h4 class="media-heading size-font">
                      <small><?php echo $item->date; ?></small>
                  </h4>
             </div>
              <div class="padding-container">
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
