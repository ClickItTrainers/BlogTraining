<?php
{
	if($this->session->userdata('is_logued_in')===null){
		redirect(base_url());
	}
}?>


<title><?php echo $title ?></title>
<link href="<?php echo base_url(); ?>assets/css/usersA.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container">
         <div class="row">
            <!-- Blog Sidebar Widgets Column -->
            <div class=" col-lg-5 col-md-8 col-sm-10 col-xs-9 col-center padding-top">
                <!-- Blog Search Well -->
                     <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                          <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <!-- /.input-group -->
            </div>
         </div>

        <div class="row ">
          <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 border table-responsive padding-bottom">
             <table class="table table-hover">
                <thead class="head-table">
                  <tr>
                    <th>ID user</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th></th>
                    <th>Gender</th>
                    <th></th>

                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($users as $item): ?>
                  <tr>
                    <form action="<?php echo base_url()?>Admin_controller/delete_user" method="post">
                    <td scope="row"><?php echo $item->id_user; ?></td>
                    <input type="hidden" name="id" value="<?php echo $item->id_user;?>">
                    <td><?php echo $item->username; ?></td>
                    <td><?php echo htmlentities($item->email); ?></td>
                    <td></td>
                    <td><?php echo $item->gender; ?></td>
                    <td><button type="submit"><i class="fa fa-trash font-i"></i></a></td>
                    </form>
                  </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div> <!-- col -->
    </div> <!-- row -->

