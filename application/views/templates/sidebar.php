    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
        <!-- Blog Categories Well -->
        <div class="card bg-faded card-block">
             <h4>Blog Categories</h4>
            <div class="row">
                <!-- /.col-xl-6 -->
                    <div class="col-xl-2 display">
                        <ul class="list-unstyled">

                            <li>
                                 <i class="fa fa-space-shuttle"></i>
                            </li>
                             <li>
                                 <i class="fa fa-gamepad"></i>
                            </li>
                             <li>
                                 <i class="fa fa-linux"></i>
                            </li>
                             <li>
                                 <i class="fa fa-windows "></i>
                            </li>
                             <li>
                                 <i class="fa fa-apple"></i>
                            </li>
                             <li>
                                 <i class="fa fa-android"></i>
                            </li>
                             <li>
                                 <i class="fa fa-mobile"></i>
                            </li>
                             <li>
                                 <i class="fa fa-rss"></i>
                            </li>
                             <li>
                                 <i class="fa fa-clock-o "></i>
                            </li>
                             <li>
                                 <i class="fa fa-laptop"></i>
                            </li>
                             <li>
                                 <i class="fa fa-cloud-download"></i>
                            </li>
                             <li>
                                 <i class="fa fa-desktop"></i>
                            </li>
                             <li>
                                 <i class="fa fa-globe"></i>
                            </li>
                             <li>
                                 <i class="fa fa-google "></i>
                            </li>
                        </ul>
                  </div>
                    <div class="col-xl-6 display">
                            <ul class="list-unstyled">
                                    <?php foreach ($category_arr as $item){ ?>
                                        <li>
                                            <a href="posts/by_category/<?php echo $item->id_category;?>"> <?php echo $item->name ?> </a>
                                        </li>
                                    <?php } ?>
                            </ul>
                    </div>
                <!-- /.col-xl-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- Side Widget Well -->
        <div class="card bg-faded card-block">
             <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis
                adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur
                vero.</p>
         </div>
    </div>
</div>
