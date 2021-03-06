<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Heera.org : <?php echo!empty($page_title) ? $page_title : ''; ?> </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>backend/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Data Tables-->
    <link href="<?php echo base_url(); ?>backend/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>backend/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>backend/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>backend/dist/css/skins/skin-green-light.css" rel="stylesheet" type="text/css" />


    <link href="<?php echo base_url(); ?>backend/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>backend/custom.css" rel="stylesheet" type="text/css" />
       <!-- Time pick Css-->

     <!-- jQuery UI 1.11.2 -->
    <!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.2 JS -->


    <script src="<?php echo base_url(); ?>backend/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>backend/plugins/fastclick/fastclick.js"></script>
    <!-- DataTables-->
      <script src="<?php echo base_url(); ?>backend/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url(); ?>backend/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>backend/dist/js/app.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>backend/dist/js/demo.js" type="text/javascript"></script>
       <!-- jquery validation -->
   <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js" ></script>
       <!-- jquery validation -->
     <!-- jquery DATE + TIME -->
     <script src="<?php echo base_url(); ?>backend/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>backend/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url(); ?>backend/plugins/timepicker/bootstrap-timepicker.min.js"></script>
      <!-- jquery DATE + TIME -->

    </head>

  <body class="skin-black-light sidebar-mini">
    <div id="loadingState">
        <img class="loader" src="<?php echo base_url()?>/assets/ajax-loader.gif" />
    </div>
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <img src="<?php echo base_url();?>backend/img/admin_logo.png" />
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

         <!--  <?php

          // $this->load->database();
          // $this->load->model('global_model');

          //   $loginId = $this->session->userdata('login_id');
          //   $data['doctor_appointment'] = $this->global_model->get('appointment', array('doctor_id' => $loginId, 'date' => date("Y-m-d")));
          //   echo '<pre>';
          //   print_r($data);
          //   echo '</pre>';
          ?> -->

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
                <?php if($user_info['profession'] == 1){?>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="amount" style="position: relative;"> 
                            <span class="text-info"> <i class="fa fa-money"></i> 
                                $<?php if($user_info['inAmount']>= 0){echo $user_info['inAmount'];}else{echo '0.00';}?>
                            </span> 
                        </div>

                    </a>

                </li>
                <?php }else{}?>

                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img width="17" height="17" src="<?php echo base_url();?>/backend/img/dash/notify.png" />
                        <span class="label label-warning"><?php echo (!empty($doctor_appointment))?count($doctor_appointment):""?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have No<?php echo (!empty($doctor_appointment))?count($doctor_appointment):""?> Message</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php if(!empty($doctor_appointment)){
                                    foreach ($doctor_appointment as $row){
                                ?>
                                <li>
                                    <a href="<?php echo base_url('doctor/docController/allappointment')?>">
                                        <i class="fa fa-users text-aqua"></i> <?php echo $row->first_name;?> appointment request to you
                                    </a>
                                </li>
                                <?php
                                  }
                                }?>
                            </ul>
                        </li>
                        <li class="footer"><a href="<?php echo base_url('doctor/docController/allappointment')?>">View all</a></li>
                    </ul>
                </li>







              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <?php
                    if($user_info['profilepicture'] == 0) {?>
                    <img src="<?php echo base_url(); ?>assets/user-demo.png" alt="" class="user-image" />
                    <?php }
                    else {?>
                    <img src="<?php echo base_url() . '/assets/file/' .$user_info['profilepicture']; ?>" alt="" width="160" class="user-image" />
                    <?php }
                    ?>

                  <span class="hidden-xs"> <?php echo $user_info['first_name']; ?><?php //print_r($user_info);?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">

                    <?php
                   if($user_info['profilepicture'] == 0) {?>
                    <img src="<?php echo base_url(); ?>assets/user-demo.png" alt="" class="img-circle" />
                    <p>Please Upload a profile picture</p>
                    <?php }
                    else {?>
                    <img src="<?php echo base_url() . '/assets/file/' .$user_info['profilepicture']; ?>" alt="" width="160" class="img-circle" />
                    <?php }
                    ?>
                    <p>
                      User Name :<?php echo $user_info['first_name']; ?>

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
                <li class="treeview <?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>">
                  <a href="<?php echo base_url('profile/dashboard'); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                  </a>
                </li>

                <?php if($user_info['profession'] == 1){?>
                <li class="treeview <?php if($this->uri->segment(2)=="landerproject"){echo "active";}?>">
                  <a href="#" >
                    <i class="fa fa-tasks"></i>
                    <span>Projects</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(3)==""){echo "active";}?>">
                            <a href="<?php echo base_url('project/landerproject'); ?>"><i class="fa fa-circle-o"></i>All</a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="4"){echo "active";}?>">
                            <a href="<?php echo base_url('project/landerproject/4'); ?>"><i class="fa fa-circle-o"></i>Funded</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview <?php if($this->uri->segment(1)=="fund"){echo "active";}?>">
                  <a href="#" >
                    <i class="fa fa-credit-card"></i>
                    <span>Payments</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(2)=="transactions"){echo "active";}?>">
                            <a href="<?php echo base_url('fund/transactions'); ?>"><i class="fa fa-circle-o"></i>Transactions</a>
                        </li>
                        <li class="<?php if($this->uri->segment(2)=="addfund"){echo "active";}?>">
                            <a href="<?php echo base_url('fund/addfund'); ?>"><i class="fa fa-circle-o"></i>Add Funds</a>
                        </li>
                        <li class="<?php if($this->uri->segment(2)=="withdraw"){echo "active";}?>">
                            <a href="<?php echo base_url('fund/withdraw'); ?>"><i class="fa fa-circle-o"></i>Withdraw Funds</a>
                        </li>

                    </ul>
                </li>

                <li class="treeview <?php if($this->uri->segment(2)=="myprofile"){echo "active";}?>">
                  <a href="#" >
                    <i class="fa fa-list"></i>
                    <span>Repayment Schedule</span>
                  </a>
                </li>

                <li class="treeview <?php if($this->uri->segment(2)=="profile" or $this->uri->segment(2)=="listofPayment"){echo "active";}?>">
                    <a href="#">
                      <i class="fa fa-cog"></i>
                      <span>Settings</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                          <ul class="treeview-menu">
                              <li class="<?php if($this->uri->segment(3)=="index"){echo "active";}?>">
                                  <a href="<?php echo base_url('profile/profile/index');?>"><i class="fa fa-circle-o"></i>User Profile</a>
                              </li>
                              <li class="<?php if($this->uri->segment(2)=="listofPayment"){echo "active";}?>">
                                  <a href="<?php echo base_url('payment/listofPayment'); ?>"><i class="fa fa-circle-o"></i>Payment Methods</a>
                              </li>
                          </ul>

                 </li>

                <li class="treeview">
                        <a href="<?php echo base_url('/home/log_out'); ?>" >
                        <i class="fa fa-sign-out "></i>
                        <span>Logout</span>
                    </a>
                </li>

<!--                <div class="gap"> </div>

                    


                <a class="btn btn-block bg-fund  btn-lg" href=""><i class="glyphicon glyphicon-plus-sign"></i> &nbsp; ADD FUNDS</a>

                   
                <div class="gap2"> </div>-->
                <div class="gap"> </div>
                <div class="col-lg-12">
                 <button class="btn btn-success btn-lg addFund"> <i class="glyphicon glyphicon-plus-sign"></i> &nbsp; ADD FUNDS </button>
<!--                        <a  href="</a>-->
                  </div>
                 <div style="clear:both"></div>
                <div class="gap2"> </div>


                <?php } ?>

                <?php if($user_info['profession'] == 2){?>
                <li class="treeview <?php if($this->uri->segment(2)=="allProjects"){echo "active";}?>">
                  <a href="#" >
                    <i class="fa fa-tasks"></i>
                    <span>Projects</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(3)==""){echo "active";}?>">
                            <a href="<?php echo base_url('borrow/allProjects'); ?>"><i class="fa fa-circle-o"></i>My Projects</a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="3"){echo "active";}?>">
                            <a href="<?php echo base_url('borrow/allProjects/3'); ?>"><i class="fa fa-circle-o"></i>Currently Funding</a>
                        </li>
                         <li class="<?php if($this->uri->segment(3)=="4"){echo "active";}?>">
                            <a href="<?php echo base_url('borrow/allProjects/4'); ?>"><i class="fa fa-circle-o"></i>Funded</a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="10"){echo "active";}?>">
                            <a href="<?php echo base_url('borrow/allProjects/10'); ?>"><i class="fa fa-circle-o"></i>Closed</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview <?php if($this->uri->segment(2)=="repaymentShchedule"){echo "active";}?>">
                  <a href="<?php echo base_url('borrow/repaymentShchedule'); ?>" >
                    <i class="fa fa-list"></i>
                    <span>Repayment Schedule</span>
                  </a>
                </li>

                <li class="treeview <?php if($this->uri->segment(2)=="myprofile"){echo "active";}?>">
                  <a href="#" >
                    <i class="fa fa-credit-card"></i>
                    <span>Payments</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(3)=="projectFunding"){echo "active";}?>">
                            <a href="<?php echo base_url('borrow/Borrow/projectFunding'); ?>"><i class="fa fa-circle-o"></i>Transactions</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview <?php if($this->uri->segment(3)=="index" or $this->uri->segment(2)=="listofPayment"){echo "active";}?>">
                    <a href="#">
                      <i class="fa fa-cog"></i>
                      <span>Settings</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(3)=="index"){echo "active";}?>">
                            <a href="<?php echo base_url('profile/profile/index');?>"><i class="fa fa-circle-o"></i>User Profile</a>
                        </li>
                        <li class="<?php if($this->uri->segment(2)=="listofPayment"){echo "active";}?>">
                            <a href="<?php echo base_url('payment/listofPayment'); ?>"><i class="fa fa-circle-o"></i>Payment Methods</a>
                        </li>
                    </ul>
                 </li>

                <li class="treeview">
                        <a href="<?php echo base_url('/home/log_out'); ?>" >
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
                
                <div class="gap"> </div>                   
                 <div class="col-lg-12">
                    <button class="btn btn-success btn-lg addProject"> <i class="glyphicon glyphicon-plus-sign"></i> &nbsp; ADD PROJECT </button>                   
                 </div>
                 <div style="clear:both"></div>
                <div class="gap2"> </div>
                
                <?php } ?>

                <?php if($user_info['profession'] == 3){?>
<!--                <pre>
                    <?php //print_r($allprojects);?>
                </pre>-->
                <li class="treeview <?php if($this->uri->segment(2)=="all"){echo "active";}?>">
                  <a href="#" >
                    <i class="fa fa-tasks"></i>
                    <span>Projects <?php if(!empty($count)){ echo '('.$count.')';}else{}?></span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(3)==""){echo "active";}?>">
                            <a href="<?php echo base_url('project/all/'); ?>"><i class="fa fa-circle-o"></i>New <?php if(!empty($count)){ echo '('.$count.')';}else{}?></a>
                        </li>

                        <li class="<?php if($this->uri->segment(3)=="3"){echo "active";}?>">
                            <a href="<?php echo base_url('project/all/3'); ?>"><i class="fa fa-circle-o"></i>Active </a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="8"){echo "active";}?>">
                            <a href="<?php echo base_url('project/all/8'); ?>"><i class="fa fa-circle-o"></i>Rejected </a>
                        </li>

                        <li class="<?php if($this->uri->segment(3)=="2"){echo "active";}?>">
                            <a href="<?php echo base_url('project/all/2'); ?>"><i class="fa fa-circle-o"></i>Not Funded </a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="4"){echo "active";}?>">
                            <a href="<?php echo base_url('project/all/4'); ?>"><i class="fa fa-circle-o"></i>Funded </a>
                        </li>
                        <!--

                        <li class="<?php // if($this->uri->segment(3)=="9"){echo "active";}?>">
                            <a href="<?php // echo base_url('project/all/9'); ?>"><i class="fa fa-circle-o"></i>Repayment Progress</a>
                        </li> -->
                        <!--

                        <li class="<?php // if($this->uri->segment(3)=="5"){echo "active";}?>">
                            <a href="<?php //echo base_url('project/all/5'); ?>"><i class="fa fa-circle-o"></i>Partial Repaid </a>
                        </li>
                        -->
                        <li class="<?php if($this->uri->segment(3)=="6"){echo "active";}?>">
                            <a href="<?php echo base_url('project/all/6'); ?>"><i class="fa fa-circle-o"></i>Repaid </a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="7"){echo "active";}?>">
                            <a href="<?php echo base_url('project/all/7'); ?>"><i class="fa fa-circle-o"></i>Defaulted </a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="10"){echo "active";}?>">
                            <a href="<?php echo base_url('project/all/10'); ?>"><i class="fa fa-circle-o"></i>Canceled </a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="88"){echo "active";}?>">
                            <a href="<?php echo base_url('project/all/88'); ?>"><i class="fa fa-circle-o"></i>All </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview <?php if($this->uri->segment(2)=="alllendars"){echo "active";}?>">
                  <a href="<?php echo base_url('lendars/alllendars'); ?>" >
                    <i class="fa  fa-child"></i>
                    <span>Lenders</span>
                  </a>
                </li>

                <li class="treeview <?php if($this->uri->segment(2)=="allBorrowers"){echo "active";}?>">
                  <a href="<?php echo base_url('borrowers/allBorrowers'); ?>" >
                    <i class="fa fa-briefcase"></i>
                    <span>Borrowers</span>
                  </a>
                </li>

                <li class="treeview <?php if($this->uri->segment(2)=="billing"){echo "active";}?>">
                  <a href="<?php echo base_url('lendars/billing'); ?>" >
                    <i class="fa fa-credit-card"></i>
                    <span>Billing</span>
                  </a>
                </li>

                <li class="treeview <?php if($this->uri->segment(1)=="repaymentprocess"){echo "active";}?>">
                    <a href="<?php echo base_url('repaymentprocess'); ?>" >
                        <i class="fa fa-list"></i>
                        <span>Repayment List</span>
                    </a>
                </li>

                <li class="treeview <?php if($this->uri->segment(3)=="index"){echo "active";}?>">
                    <a href="#">
                      <i class="fa fa-cog"></i>
                      <span>Settings</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(3)=="index"){echo "active";}?>">
                            <a href="<?php echo base_url('profile/profile/index');?>"><i class="fa fa-circle-o"></i>User Profile</a>
                        </li>
                    </ul>
                 </li>

                <li class="treeview">
                        <a href="<?php echo base_url('/home/log_out'); ?>" >
                        <i class="fa fa-sign-out "></i>
                        <span>Logout</span>
                    </a>
                </li>
                
                 <div class="gap"> </div>                   
                 <div class="col-lg-12">
                    <button class="btn btn-success btn-lg addProject"> <i class="glyphicon glyphicon-plus-sign"></i> &nbsp; ADD PROJECT </button>                   
                 </div>
                 <div style="clear:both"></div>
                <div class="gap2"> </div>
                
                <?php } ?>

            </ul>
        </section>
        <!-- /.sidebar -->
      </aside>


       