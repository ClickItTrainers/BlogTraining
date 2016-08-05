<div class="container">
         <div class="row padding">
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-lg-5 col-md-8 col-sm-10 col-xs-9">
                <!-- Blog Search Well -->
                     <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">Buscar!</button>
                      </span>
                    </div>
                    <!-- /.input-group -->
            </div>
    </div>
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 right">
        	<title> <?php echo $title ?> </title>
        	<h1 class="page-header tittle down">
                Welcome to my Blog
                <small class="size "><?php echo $this->session->userdata('username');?></small>
          </h1>
        	<?php
        		foreach ($posts_arr as $item):
        			$url = 'post/' . $item->id_post . '/';
        			$url .= url_title(convert_accented_characters($item->title), '-', TRUE);
        	?>
        			<!-- Blog Post List -->
                        <h2>
                            <?php echo anchor($url, $item->title) ?>
                        </h2>
                        <p class="lead display-inline size-small">
                            by <a href="index.php"> autor<!-- <?php echo $item->username ?>  --></a> <!-- nombre de autor -->
                        </p>
                        <p class="display-inline size-small"><span class="glyphicon glyphicon-time "></span> <?php echo $item->date ?></p>
                        <img class="img-fluid down" src="http://placehold.it/900x300" alt="">
                        <p><?php echo $item->description ?></p>
                        <a class="btn btn-primary" href="index.php/<?php echo $url ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
        	<?php
        		endforeach;
        	?>
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
                        </nav>
            </div>
