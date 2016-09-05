<?php
{
	if($this->session->userdata('is_logued_in')===null){
		redirect(base_url());
	}
}?>


<title><?php echo $title ?></title>
<link href="<?php echo base_url(); ?>assets/css/usersA.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>

<script type="text/javascript">
/*sweet alert*/
  $(function (){ 
    $('#form').submit(function(event){
      event.preventDefault();
       swal({   
          title: "Are you sure?",   
          text: "You will delete this user!",   
          type: "warning",   
          showCancelButton: true,   
          confirmButtonColor: "#DD6B55",   
          confirmButtonText: "Yes, delete it!",   
          closeOnConfirm: false 
        },
          function(isConfirm){
         if (isConfirm)
         {
          $.post("<?php echo base_url()?>Admin_controller/delete_user", $("#form").serializeArray()).done(function(){
          // swal("Deleted!", "Your user has been deleted.", "success");
          // swal({   title: "Your user has been deleted!",  timer: 3000,   showConfirmButton: false });
          window.location.href='<?php echo base_url();?>admin/users'; 
          });
         }
      });
    });
  });

/*search users*/
   $(function() {    
        $('#search').on('keyup', function() {
          var rex = new RegExp($(this).val(), 'i');
          // console.log(rex);
          // var $user = document.getElementById('user');
            
            $('.data-user').hide();
            $('.data-user').filter(function() {
                return rex.test($(this).text());
            }).show(); 
        });
    });

</script>


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
             
               <div class="AreaTablaAdmin-scrollAdmin">
                 <table class="table table-hover">
                     <thead class="head-table">
                        <tr>
                          <th>ID user</th>
                          <th>Username</th>
                          <th>Email</th>
                          
                          <th>Gender</th>
                          <th></th>
                        </tr>
                      </thead>

                    <tbody>
                        <form id="form" action="" method="post">
                          <?php foreach ($users as $item): ?>
                          <tr class="data-user">
                           <!--  <?php echo $ID = $item->id_user; ?> -->
                            <td class="user" scope="row"><?php echo $item->id_user; ?></td>
                            <input type="hidden" name="id" value="<?php echo $item->id_user;?>">
                            <td class="username"><?php echo $item->username; ?></td>
                            <td class="email"><?php echo htmlentities($item->email); ?></td>
                            
                            <td class="gender"><?php echo $item->gender; ?></td>
                           <!--  <td><button type="submit"><i class="fa fa-trash font-i"></i></td> -->
                            <td><button id="submit" type="submit"><i class="fa fa-trash font-i"></i></td>
                          </tr>
                          <?php endforeach; ?>
                        </form>
                      </tbody>
                </table>
              </div>
        </div> <!-- col -->
    </div> <!-- row -->

