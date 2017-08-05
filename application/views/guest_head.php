<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Heera.org</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/css/slick-theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/font-awesome/css/font-awesome.min.css">
    
    <link href="<?php echo base_url(); ?>backend/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Latest compiled and minified JavaScript -->
    

    <script src="<?php echo base_url(); ?>comp/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <script src="<?php echo base_url(); ?>comp/js/vendor/jquery-1.11.2.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<header class="header-wrapper">
    <nav class="navbar" role="navigation">
        <div class="container">

            <div class="row">
                <div class="col-md-8 pdl pdr">
                    <div class="row">
                        <div class="col-md-4 pdl pdr">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>comp/img/logo.png" class="img-responsive" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-md-8 pdl pdr">
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav primary-nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lend <i class="fa fa-angle-down"></i></a>
                                        <div class="dropdown-menu mega-menu">
                                            <div class="row">
                                                <div class="col-sm-6 entry-single item">
                                                    <h4 class="title">Categories</h4>
                                                    <ul class="entry-list">
                                                        <li><a href="">Woman</a></li>
                                                        <li><a href="">Agriculture</a></li>
                                                        <li><a href="">Education</a></li>
                                                        <li><a href="">Health</a></li>
                                                        <li><a href="">Single Parents</a></li>
                                                        <li><a href="">Social</a></li>
                                                        <li><a href="">Retail</a></li>
                                                        <li><a href="">Shelter</a></li>
                                                        <li><a href="">Food</a></li>
                                                        <li><a href="">All Loans</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6 item">
                                                    <h4 class="title">Top Countries</h4>
                                                    <ul class="entry-list">
                                                        <li><a href="">India</a></li>
                                                        <li><a href="">South Africa</a></li>
                                                        <li><a href="">South America</a></li>
                                                        <li><a href="">Nepal</a></li>
                                                        <li><a href="">China</a></li>
                                                        <li><a href="">Indonesia</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown">
                                        <a href="<?php echo base_url();?>home/borrow" >Borrow</a>
                                    </li>
                                </ul>
                            </div><!--/.navbar-collapse -->
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mobile-nav pdl pdr">
                    <ul class="nav navbar-nav navbar-right secondary-nav">
                        
                        <li class="active hidden-xs"><a href="<?php echo base_url(); ?>page/about">About</a></li>
                        <?php   $loginId = $this->session->userdata('login_id'); ?>
                        <?php if($loginId == 0)
                        {?>
                            <li class="active hidden-xs" ><a href="<?php echo base_url(); ?>home/registration">Join Now</a></li>
                            <li><a href="<?php echo base_url(); ?>home/login">Login</a></li>
                        <?php
                        }
                        else{
                            ?>
                            <li class="hidden-xs"><a href="<?php echo base_url(); ?>profile/dashboard">Panel</a></li>
                            <li><a href="<?php echo base_url(); ?>home/log_out">Log out</a></li>
                        <?php  }  ?>
                        <li class="hidden-xs"><a href="#"><img src="<?php echo base_url(); ?>comp/img/search-icon.png" class="img-responsive" alt="Search"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>  <!--header wrapper-->