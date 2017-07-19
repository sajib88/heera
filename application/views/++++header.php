<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php //echo $pageTitle; ?>ForAlldoctors.com </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>script-assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>script-assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>script-assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>script-assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>script-assets/dist/css/skins/skin-green-light.css" rel="stylesheet" type="text/css" />


    <link href="<?php echo base_url(); ?>script-assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>script-assets/custom.css" rel="stylesheet" type="text/css" />
       <!-- Time pick Css-->

     <!-- jQuery UI 1.11.2 -->
    <!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.2 JS -->


    <script src="<?php echo base_url(); ?>script-assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>script-assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>script-assets/dist/js/app.min.js" type="text/javascript"></script>
       <!-- jquery validation -->
   <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js" ></script>
       <!-- jquery validation -->
     <!-- jquery DATE + TIME -->
     <script src="<?php echo base_url(); ?>script-assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>script-assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
      <!-- jquery DATE + TIME -->

    </head>
  <body class="skin-purple-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>FA</b>D</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ForAll</b> Doctors</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <?php
                    if($user_info['profilepicture'] == 0) {?>
                    <img src="<?php echo base_url(); ?>assets/user-demo.jpg" alt="" class="user-image" />
                    <?php }
                    else {?>
                    <img src="<?php echo base_url() . '/assets/file/' .$user_info['profilepicture']; ?>" alt="" width="160" class="user-image" />
                    <?php }
                    ?>

                  <span class="hidden-xs"> <?php echo $user_info['user_name']; ?><?php //print_r($user_info);?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">

                    <?php
                   if($user_info['profilepicture'] == 0) {?>
                    <img src="<?php echo base_url(); ?>assets/user-demo.jpg" alt="" class="img-circle" />
                    <?php }
                    else {?>
                    <img src="<?php echo base_url() . '/assets/file/' .$user_info['profilepicture']; ?>" alt="" width="160" class="img-circle" />
                    <?php }
                    ?>
                    <p>
                      User Name :<?php echo $user_info['user_name']; ?>

                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url('profile/profile/index'); ?>" class="btn btn-default btn-flat">Update Information</a>


                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url('home/log_out'); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
       <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo base_url('profile/dashboard'); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>

            <li class="treeview">
              <a href="#" >
                <i class="fa fa-globe"></i>
                <span>My Profile</span>
              </a>

                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url('profile/myprofile'); ?>"><i class="fa fa-circle-o"></i>View Profile</a></li>
                    <li><a href="<?php echo base_url('profile/update'); ?>"><i class="fa fa-circle-o"></i> Update My Profile</a></li>

                </ul>

            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-fw fa-user-md"></i>
                <span>Public Web Site</span>
              </a>

                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url('pub/add'); ?>"><i class="fa fa-circle-o"></i> Create Public webiste</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('pub/viewedit'); ?>"><i class="fa fa-circle-o"></i> Edit  Public webiste</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('pub/details'); ?>"> <i class="fa fa-circle-o"></i>View My Public Site</a>
                        </li>
                    </ul>

            </li>



            <li class="treeview">
              <a href="#">
                <i class="fa fa-fw fa-list-alt "></i>
                <span>Classified</span>
              </a>

                    <ul class="treeview-menu">
                         <li>
                            <a href="<?php echo base_url('classifieds/classifieds/add'); ?>"><i class="fa fa-circle-o"></i>Add New Classified</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('classifieds/classifieds/viewmyclassfied'); ?>"><i class="fa fa-circle-o"></i>Manage All My Classified</a>
                        </li>
                         <li>
                         <a href="<?php echo base_url('classifieds/classifieds/viewall'); ?>"><i class="fa fa-circle-o"></i>Show All List Classified</a>
                         </li>


                    </ul>

            </li>

          <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar"></i>
                <span>Event</span>
              </a>

                    <ul class="treeview-menu">
                         <li>
                            <a href="<?php echo base_url('event/event/index'); ?>"><i class="fa fa-circle-o"></i> Create New Event</a>
                        </li>
                        <li>
                         <a href="<?php echo base_url('event/event/viewall'); ?>"><i class="fa fa-circle-o"></i>
                             View All Events</a>
                         </li>

                        <li>
                            <a href="<?php echo base_url('event/event/myevent'); ?>"><i class="fa fa-circle-o"></i>Manage Event List</a>
                        </li>


                    </ul>

            </li>

                <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-user"></i>
                <span>Personals</span>
              </a>

                    <ul class="treeview-menu">
                         <li>
                            <a href="<?php echo base_url('personal/Personal/add'); ?>"><i class="fa fa-circle-o"></i> Add New Personals</a>
                        </li>
                        <li>
                         <a href="<?php echo base_url('personal/Personal/grid'); ?>"><i class="fa fa-circle-o"></i>
                             Show All Personals</a>
                         </li>

                        <li>
                            <a href="<?php echo base_url('personal/Personal/all'); ?>"><i class="fa fa-circle-o"></i>Manage My Personals</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('personal/Personal/search'); ?>"><i class="fa fa-circle-o"></i>Search Personals</a>
                        </li>


                    </ul>

            </li>


          <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-picture"></i>
                <span>Photos</span>
              </a>

                    <ul class="treeview-menu">
                         <li>
                            <a href="<?php echo base_url('Photo/Photo/index'); ?>"><i class="fa fa-circle-o"></i> Create New Album</a>
                        </li>
                        <li>
                         <a href="<?php echo base_url('Photo/Photo/viewall'); ?>"><i class="fa fa-circle-o"></i>
                             View All Photos</a>
                         </li>



                    </ul>

            </li>




            <li class="treeview">
              <a href="#" >
                <i class="fa fa-book"></i>
                <span>CES</span>
              </a>

                    <ul class="treeview-menu">
                         <li>
                            <a href="<?php echo base_url('ces/add'); ?>"><i class="fa fa-circle-o"></i> Create New CES</a>
                        </li>
                        <li>
                         <a href="<?php echo base_url('ces/ces_controller/grid'); ?>"><i class="fa fa-circle-o"></i>
                             View All CES</a>
                         </li>

                        <li>
                            <a href="<?php echo base_url('ces/allces'); ?>"><i class="fa fa-circle-o"></i>My CES List</a>
                        </li>

                         <li>
                            <a href="<?php echo base_url('ces/search'); ?>"><i class="fa fa-circle-o"></i>Search CES </a>
                        </li>


                    </ul>

            </li>



          <li class="treeview">
              <a href="#">
                <i class="fa fa-group"></i>
                <span>Group</span>
              </a>

                    <ul class="treeview-menu">
                         <li>
                            <a href="<?php echo base_url('group/group/index'); ?>"><i class="fa fa-circle-o"></i> Create New Group</a>
                        </li>
                        <li>
                         <a href="<?php echo base_url('group/group/viewall'); ?>"><i class="fa fa-circle-o"></i>
                             View All Group</a>
                         </li>

                        <li>
                            <a href="<?php echo base_url('group/group/mygroup'); ?>"><i class="fa fa-circle-o"></i>My Group List</a>
                        </li>


                    </ul>

            </li>


          <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-tags"></i>
                <span>Product</span>
              </a>

                    <ul class="treeview-menu">
                         <li>
                            <a href="<?php echo base_url('product/products/add'); ?>"><i class="fa fa-circle-o"></i> Create New Product</a>
                        </li>
                        <li>
                         <a href="<?php echo base_url('product/products/allProductGrid'); ?>"><i class="fa fa-circle-o"></i>
                             View All Product</a>
                         </li>

                        <li>
                            <a href="<?php echo base_url('product/products/myproduct'); ?>"><i class="fa fa-circle-o"></i>My Product List</a>
                        </li>


                    </ul>

            </li>









            <li class="treeview">
              <a href="#" >
                <i class="fa fa-shield"></i>
                <span>Private Profile</span>
              </a>
                <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url('private_web/privateweb/index'); ?>"><i class="fa fa-circle-o"></i> Create Private  webiste</a>
                        </li>
                     <li>
                            <a href="#"> <i class="fa fa-circle-o"></i>Search Private Profile</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('private_web/privateweb/viewForEdit'); ?>"><i class="fa fa-circle-o"></i> View  Private  webiste</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('private_web/privateweb/view'); ?>"> <i class="fa fa-circle-o"></i>View My Private Site</a>
                        </li>


                    </ul>


            </li>



          <li class="treeview">
              <a href="#" >
                <i class="fa fa-file-video-o"></i>
                <span>Video</span>
              </a>
            </li>

          <li class="treeview">
              <a href="#" >
                <i class="fa fa-file-pdf-o"></i>
                <span>Files</span>
              </a>
            </li>

          <li class="treeview">
              <a href="#" >
                <i class="fa fa-file-audio-o"></i>
                <span>Lecture/Audio</span>
              </a>
            </li>




          <li class="treeview">
              <a href="<?php echo base_url('/home/log_out'); ?>" >
                <i class="fa fa-sign-out text-red"></i>
                <span>Logout</span>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
       

<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>{title_site}</title>

        <meta name="description" content="uAdmin is a Professional, Responsive and Flat Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="../backend/img/favicon.ico">
        <link rel="apple-touch-icon" href="../backend/img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="../backend/img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="../backend/img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="../backend/img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="../backend/img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="../backend/img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="../backend/img/icon152.png" sizes="152x152">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- The roboto font is included from Google Web Fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic">

        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?php echo base_url();?>script-assets/backend/css/bootstrap.css">

        <!-- Related styles of various javascript plugins -->
        <link rel="stylesheet" href="<?php echo base_url();?>script-assets/backend/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?php echo base_url();?>script-assets/backend/css/main.css">

        <!-- Load a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?php echo base_url();?>script-assets/backend/css/themes.css">

        <link rel="stylesheet" href="<?php echo base_url();?>script-assets/backend/css/custom_trp.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (Browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support them) -->
        <script src="<?php echo base_url();?>script-assets/backend/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <!-- Excanvas for canvas support on IE8 -->
        <!--[if lte IE 8]><script src="../js/helpers/excanvas.min.js"></script><![endif]-->
        <!-- Bootstrap.js -->

        <!-- Get Jquery library from Google but if something goes wrong get Jquery from local file - Remove 'http:' if you have SSL -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(unescape('%3Cscript src="../backend/js/vendor/jquery-1.9.1.min.js"%3E%3C/script%3E'));</script>  

        <script src="<?php echo base_url();?>script-assets/backend/js/vendor/bootstrap.min.js"></script>

        <!-- Jquery plugins and custom javascript code -->
        <script src="<?php echo base_url();?>script-assets/backend/js/plugins.js"></script>
        <script src="<?php echo base_url();?>script-assets/backend/js/main.js"></script>
        <script src="<?php echo base_url();?>script-assets/backend/js/custom_trp.js"></script>
        

    </head>

    <!-- Add the class .fixed to <body> for a fixed layout on large resolutions (min: 1200px) -->
    <!-- <body class="fixed"> -->
    <body>
        <!-- Page Container -->
        <div id="page-container" class="{title_page}">
            <!-- Header -->
            <!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively -->
            <!-- <header class="navbar navbar-inverse navbar-fixed-top"> -->
            <!-- <header class="navbar navbar-inverse navbar-fixed-bottom"> -->
            {account_content}
            <!-- Inner Container -->
            <div id="inner-container">
                <!-- Sidebar -->
                <aside id="page-sidebar" class="collapse navbar-collapse navbar-main-collapse">
                    <!-- Sidebar search -->
                    <!--<form id="sidebar-search" action="page_search_results.html" method="post">
                        <div class="input-group">
                            <input type="text" id="sidebar-search-term" name="sidebar-search-term" placeholder="Search..">
                            <button><i class="icon-search"></i></button>
                        </div>
                    </form>-->
                    <!-- END Sidebar search -->

                    <!-- Primary Navigation -->
                    <nav id="primary-nav">
                        <ul class="sub-menu">

                            <li>
                                <a id="home" href="#"><i class="glyphicon-home"></i>Home</a>
                            </li>
                            <li>
                                <a id="menu-banking" href="#"><i class="glyphicon-bank"></i>Banking</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a class="menu-banking" href="index.php/admin/bankapp"><i class=""></i>Bank Apps</a> 
                                    </li>
                                    <li>
                                        <a href="index.php/admin/loans"><i class=""></i>Loans</a>     
                                    </li>
                                    <li>
                                        <a href="index.php/admin/bankaccount"><i class=""></i>Bank Accounts</a>  
                                    </li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a id="menu-benefits"  href="index.php/admin/benefits" class="benefits"><i class="glyphicon-money"></i>Benefits</a>  
                            </li>
                            <li>
                                <a id="menu-orders" href="index.php/admin/orders"><i class="glyphicon-cart_in"></i>Orders</a>  
                            </li>

                            <li>
                                <a id="menu-reporting" href="index.php/admin/reporting"><i class="filetype-doc"></i>Reporting</a>  
                               
                            </li>

                            <li>
                                <a id="menu-accounts" href="#"><i class="glyphicon-address_book"></i>Accounts</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a id="menu-ero" href="index.php/admin/ero"><i class=""></i>ERO</a>  
                                    </li>
                                    <li>
                                        <a id="menu-service" href="index.php/admin/bureau"><i class=""></i>Service Bureau</a> 
                                    </li> 
                                </ul>
                            </li>

                            <li>
                                <a id="menu-training" href="index.php/admin/training" ><i class="icon-comments-alt"></i>Training</a>  <!--index.php/admin/training-->
                            </li>
                            <li>
                                <a id="menu-content" href="index.php/admin/content"><i class="glyphicon-database_plus"></i>Content</a>
                            </li>
                            <li>
                                <a id="menu-setting" href="index.php/admin/settings"><i class="glyphicon-settings"></i>Settings</a>
                            </li>

                            <!--<li>
                                <a href="#"><i class="glyphicon-parents"></i>User Management</a>
                                <ul>
                                    <li>
                                        <a href="page_tables.html"><i class="glyphicon-user"></i>Administrator</a>
                                    </li>
                                    <li>
                                        <a href="index.php/admin/mycompany"><i class="icon-user"></i>ERO</a>
                                    </li>
                                </ul>
                            </li>-->


                        </ul>
                    </nav>
                    <!-- END Primary Navigation -->
                </aside>
                <!-- END Sidebar -->
