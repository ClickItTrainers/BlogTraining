<title><?php echo $title ?></title>
<link href="<?php echo base_url(); ?>assets/css/details.css" rel="stylesheet">
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
        <form method="post" action="<?php echo base_url();?>update">
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" value="<?php echo $details->title ?>" name="title">
            <span class="text-danger"><?php echo form_error('title'); ?></span>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <input type="texts" class="form-control" value="<?php echo $details->description ?>" name="description">
            <span class="text-danger"><?php echo form_error('description'); ?></span>
          </div>
          <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" rows="8" name="content" style="resize: none;"><?php echo $details->content ?></textarea>
            <span class="text-danger"><?php echo form_error('content'); ?></span>

          </div>
          <?php echo form_hidden('id_post', $details->id_post); ?>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
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
                    <h1 class="word-break"> <?php echo htmlentities($details->title); ?> </h1>
               </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 absolute-author absolute">
                    <a href="<?php echo base_url()?>profile/user/<?php echo $details->id_user; ?>">

                      <img class="img-fluid display-in media-object size-img-main" src="http://placehold.it/64x64" alt=""/>
                        


                        <span><?php echo htmlentities($username); ?></span>
                    

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
                    <form method="post"  class="display-in" action="<?php echo base_url();?>Profile_controller/delete_post">
                         <?php echo form_hidden('id_post', $details->id_post); ?>
                        <div class="center display-in">
                            <button class="btn btn-danger ">
                              <i class="fa fa-trash"> Delete Post</i>
                          </button>
                        </div>
                    </form>
                    <?php } ?>
              </div>
      <!-- Post Content -->
      <p class="lead word-break"> <?php echo htmlentities($details->description); ?></p>
      <p class="font-content word-break"> <?php echo htmlentities($details->content); ?> </p>

      <hr>
        <!-- Blog Comments -->
        <?php if ($this->session->userdata('is_logued_in') == TRUE) { ?>

          <!-- Comments Form -->
          <div class="well">
            <h4><i class="fa fa-commenting-o"></i>Leave a Comment:</h4>
            <form role="form" action="<?php echo base_url(); ?>Mailgun_controller/comment" method="post">
              <div class="form-group">
                <textarea maxlength="255" name="comment" class="form-control" rows="3" style="resize: none;"></textarea>
              </div>
              <?php echo form_hidden('id_post', $this->uri->segment(2)) ?>
              <?php echo form_hidden('tit', $details->title) ?>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>

          <?php } ?>

        <?php if (!empty($comments)) {
          foreach ($comentarios as $item): ?>
          <!-- Comment -->
          <div class="media padding-container border">
              <div class="media-body">
                <a class="pull-left margin-right" href="#">
                  <img class="media-object size-img" src="http://placehold.it/64x64" alt="">
                </a>
                <div>
                  <h3 class="display-in"><?php echo htmlentities($item->username); ?></h3>
                  <?php if ($this->session->userdata('username') == $item->username || $this->session->userdata('admin') || $this->session->userdata('username') == $username ){ ?>
                    <form action="<?php echo base_url()?>Home/delete" method="POST">
                    <input type="hidden" name="red" value="<?php echo $details->id_post?>">
                    <input type="hidden" name="id_comm" value="<?php echo $item->id_comment?>">
                  <a href="">
                    <button type="submit" class="btn btn-danger btn-sm float"><i class="fa fa-trash"> Delete</button></i>
                  </a>
                  <?php } ?>
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
</div>