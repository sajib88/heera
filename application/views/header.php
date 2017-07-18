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