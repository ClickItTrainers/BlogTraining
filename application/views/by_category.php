<div class="container">
         <div class="row padding">
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-11 col-center">
                <!-- Blog Search Well -->
                     <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                    <!-- /.input-group -->
            </div>
    </div>
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 right">
        	<title> <?php echo $title ?> </title>
        	<h1 class="page-header tittle down">
                By category
          </h1>
        	<?php
        		foreach ($By_category as $item):
        			$url = 'post/' . $item->id_post . '/';
        			$url .= url_title(convert_accented_characters($item->title), '-', TRUE);
        	?>
        			<!-- Blog Post List -->
                        <h2>
                            <?php echo anchor($url, $item->title) ?>
                        </h2>
                        <p class="lead display-inline size-small">
                            by <a href="<?php echo base_url()?>profile/user/<?php echo $item->id_user; ?>">
                              <?php
                                foreach ($users_arr as $key) {
                                    if ($item->id_user == $key->id_user){
                                        echo $key->username;
                                    }
                                }
                                ?>
                                </a>
                        </p>
                        <p class="display-inline size-small"><i class="fa fa-clock-o"></i> <?php echo $date ?></p>
                        <div class=" display float-right">
                            <span>Internet</span >
                        </div>
                        <img class="img-fluid down" src="<?php base_url() ?>assets/img/hitman.jpg" alt="">
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