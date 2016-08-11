<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- fonts -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Home css -->
    <link href="<?php echo base_url(); ?>assets/css/homeA.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
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
                         <a class=" nav bar-brand nav-link" href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only"></span></a>
                      </li>

                    </ul>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <!--  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> -->
                    <div class="container-login">
                      <ul class="nav navbar-nav navbar-right text-xs-right">
                          <li >
                                                            <a class="nav-link" href="<?php echo base_url();?>logout"><i class="fa fa-times" aria-hidden="true"></i> Logout</a>
                          </li>
                      </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                  </div>
                </nav>

              </div>
              <!-- /.container -->
            </nav>
