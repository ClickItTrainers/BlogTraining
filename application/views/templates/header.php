<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- fonts -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Home css -->
    <link href="<?php echo base_url(); ?>assets/css/home.css" rel="stylesheet">
 </head>
<body>
    <div class="row">
      <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
          <!-- Navigation -->
          <nav class="navbar navbar-dark bg-inverse tall-header" role="navigation">
              <div class="container">
                  <!-- Brand and toggle get grouped for better mobile display -->
                     <nav class="navbar navbar-light ">
                        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
                          &#9776;
                        </button>
                        <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                          <ul class="nav navbar-nav">
                            <li class="nav-item ">
                               <a class=" nav bar-brand nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item ">
                              <a class="nav-link" href="<?php echo base_url();?>contact">Contact <span class="sr-only">(current)</span></a>
                            </li>
                           <?php if ($this->session->userdata('is_logued_in') == TRUE) { ?>
                            <li class="nav-item ">
                              <a class="nav-link" href="<?php echo base_url();?>Profile_controller" >My Profile <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item ">
                              <a class="nav-link" href="<?php echo base_url();?>new" >Add Post<span class="sr-only">(current)</span></a>
                            </li>
                            <?php if ($this->session->userdata('username') == 'Alejandro') { ?>
                            <li class="nav-item ">
                              <a class="nav-link" href="<?php echo base_url();?>Home/admin_index">Panel<span class="sr-only">(current)</span></a>
                            </li>
                            <?php }
                            }?>
                          </ul>
                          <!-- Collect the nav links, forms, and other content for toggling -->
                      <!--  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> -->
                      <div class="container-login">
                      <ul class="nav navbar-nav navbar-right text-xs-right">
                      <?php if ($this->session->userdata('is_logued_in') == FALSE) { ?>
                          <li class="right">
                              <a class="nav-link" href="<?php echo base_url();?>login">Login</a>
                          </li>
                          <li class="right">
                              <a class="nav-link" href="<?php echo base_url();?>register">Sign-Up</a>
                          </li>
                      <?php } else { ?>
                          <li >
                              <a class="nav-link" href="<?php echo base_url();?>logout">Logout</a>
                          </li>
                      <?php } ?>
                      </ul>
                   </nav>
              </div>
          </nav>
      </div>
    </div>
