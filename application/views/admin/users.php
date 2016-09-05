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
//   $(function (){ 
//     $('#form').submit(function(event){
//       event.preventDefault();
//        swal({   
//           title: "Are you sure?",   
//           text: "You will delete this user!",   
//           type: "warning",   
//           showCancelButton: true,   
//           confirmButtonColor: "#DD6B55",   
//           confirmButtonText: "Yes, delete it!",   
//           closeOnConfirm: false 
//         },
//           function(isConfirm){
//          if (isConfirm)
//          {
//           $.post("<?php echo base_url()?>Admin_controller/delete_user", $("#form").serializeArray()).done(function(){
//           // swal("Deleted!", "Your user has been deleted.", "success");
//           // swal({   title: "Your user has been deleted!",  timer: 3000,   showConfirmButton: false });
//           window.location.href='<?php echo base_url();?>admin/users'; 
//           });
//          }
//       });
//     });
//   });

// /*search users*/
//    $(function() {    
//         $('#search').on('keyup', function() {
//           var rex = new RegExp($(this).val(), 'i');
//           // console.log(rex);
//           // var $user = document.getElementById('user');
            
//             $('.data-user').hide();
//             $('.data-user').filter(function() {
//                 return rex.test($(this).text());
//             }).show(); 
//         });
//     });


$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});

</script>



<div class="container">
    <div class="row padding-top">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border table-responsive padding-bottom panel panel-primary filterable">
            <div class="panel-heading">
               <h3 class="panel-title display"> <i class="fa fa-user"></i> Users</h3>
                    <button class="btn btn-default btn-xs btn-filter pull-right"><i class="fa fa-search"></i> Search</button>
                    
            </div>
             <div class="AreaTablaAdmin-scrollAdmin custab">
                <table class="table table-hover">
                    <thead class="head-table">
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="ID user" disabled></th>
                            <th><input type="text" class="form-control" placeholder="username" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Gender" disabled></th>
                        </tr>
                    </thead>
                    <tbody>
                          <form id="form" action="<?php echo base_url()?>Admin_controller/delete_user" method="post">
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
            </div> <!-- scrol -->
        </div> <!-- col -->
    </div> <!-- row -->

