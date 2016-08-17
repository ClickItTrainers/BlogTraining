
<div class="container margin-top">

<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 right">

        	<title> <?php echo $title ?> </title>
        	<h1 class="page-header tittle down">
                Welcome to the BBlog
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
                            by <a href="profile/user/<?php echo $item->id_user; ?>">
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

                        <!-- Tag -->
                        <div class=" display float-right">
                            <span> <?php echo $item->name ?> </span>
                        </div>

                        <img class="img-fluid down" src="/assets/img/category/<?php echo $item->name.'.jpg'?>" alt="<?php echo $item->name ?>">

                        <p><?php echo $item->description ?></p>
                        <a class="btn btn-primary" href="<?php echo base_url().$url ?>">Read More <i class="fa fa-angle-right "></i></a>
                        <hr>
        	<?php
        		endforeach;

        	?>


            <div class="pagination col-center">
                <?php
                echo $this->pagination->create_links();
                ?>
            </div>
    </div><!-- col -->
