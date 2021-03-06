<div class="container">
         
    <div class="row" style="margin-top:55px;">
        <!-- Blog Entries Column -->
        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 right">
        	<title> <?php echo $title ?> </title>
        	<h1 class="page-header tittle down">
                By category
          </h1>
        	<?php
        		foreach ($By_category as $item):
        			$url = 'post/' . $item->url_post;
        	?>
        			<!-- Blog Post List -->
                        <h2 class="word-break">
                            <?php echo anchor($url, $item->title) ?>
                        </h2>
                        <p class="lead display-inline size-small">
                            by <a href="<?php echo base_url()?>profile/user/<?php echo $item->username ?>">
                            <?php echo $item->username; ?>
                                </a>
                        </p>
                        <p class="display-inline size-small"><i class="fa fa-clock-o"></i> <?php echo $date ?></p>
                        <div class=" display float-right">
                            <!-- Tag -->
                            <span> <?php echo $item->name ?> </span>
                        </div>
                        <img class="img-fluid down" src="/assets/img/category/<?php echo $item->name.'.jpg'?>" alt="<?php echo $item->name ?>">
                        <p><?php echo $item->description ?></p>
                        <a class="btn btn-primary" href="<?php echo base_url().$url ?>">Read More <i class="fa fa-angle-right "></i></a>
                        <hr>
        	<?php
        		endforeach;

        	?>


            <!-- <div class="pagination col-center">
                <?php
                echo $this->pagination->create_links();
                ?>
            </div>

                       <nav aria-label="Page navigation">
                          <ul class="pagination pagination-sm">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>-->

            </div>
