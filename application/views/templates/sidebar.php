    <div class="col-lg-3 col-md-4 col-sm-9 col-xs-9">
        <!-- Blog Categories Well -->
        <div class="card bg-faded card-block">
             <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-xl-6">
                    <ul class="list-unstyled">

                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>

                    </ul>
                </div>
                <!-- /.col-xl-6 -->
                <div class="col-xl-6">
                    <ul class="list-unstyled">

                        <?php foreach ($category_arr as $item){ ?>
                            <li>
                                <a href="#"> <?php echo $item->name ?> </a>
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
