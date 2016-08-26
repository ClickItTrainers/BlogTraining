<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <head>
    <link rel="icon" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- fonts -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Home css -->
    <link href="<?php echo base_url(); ?>assets/css/home.css" rel="stylesheet">
 </head>
<body>

          <nav class="navbar navbar-dark bg-inverse tall-header navbar-fixed-top" role="navigation">
              <div class="container">
                  <!-- Brand and toggle get grouped for better mobile display -->
                     <div class="navbar navbar-light ">
                        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
                          &#9776;
                        </button>

                        <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                          <ul class="nav navbar-nav">
                            <li class="nav-item ">
                               <a class=" nav bar-brand nav-link" href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                            </li>
                            <li class="nav-item ">
                              <a class="nav-link" href="<?php echo base_url();?>contact"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact <span class="sr-only"></span></a>
                            </li>
                           <?php if ($this->session->userdata('is_logued_in') == TRUE) { ?>
                            <li class="nav-item ">
                              <a class="nav-link" href="<?php echo base_url();?>new" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add Post<span class="sr-only"></span></a>
                            </li>
                            <?php } ?>
                          </ul>
                      <div class="container-login">
                        <ul class="nav navbar-nav navbar-right text-xs-right">
                        <?php if ($this->session->userdata('is_logued_in') == FALSE) { ?>
                            <li class="right">
                                <a class="nav-link" href="<?php echo base_url();?>login"><i class="fa fa-check" aria-hidden="true"></i> Login</a>
                            </li>
                            <li class="right">
                                <a class="nav-link" href="<?php echo base_url();?>register"><i class="fa fa-plus" aria-hidden="true"></i> Sign-Up</a>
                            </li>
                        <?php } else { ?>
                          <?php if ($this->session->userdata('admin')) { ?>
                          <li class="right ">
                            <a class="nav-link" href="<?php echo base_url();?>admin" ><i class="fa fa-user" aria-hidden="true"></i> <?php echo $this->session->userdata('username');?> <span class="sr-only">(current)</span></a>
                          </li>
                        <?php } else { ?>
                          <li class="right ">
                            <a class="nav-link" href="<?php echo base_url();?>profile" ><i class="fa fa-user" aria-hidden="true"></i> <?php echo $this->session->userdata('username');?> <span class="sr-only">(current)</span></a>
                          </li>
                        <?php } ?>
                            <li class="right" >
                                <a class="nav-link" href="<?php echo base_url();?>logout"><i class="fa fa-times" aria-hidden="true"></i> Logout</a>
                            </li>
                        <?php } ?>
                        </ul>

                   </div>
              </div>
           </div>
       </div>
     </nav>
