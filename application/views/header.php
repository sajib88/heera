<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>HEERA</title>

        <meta name="description" content="uAdmin is a Professional, Responsive and Flat Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="../backend/favicon.ico">
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
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic">

        
     <!--external fauk css-->   

<!--external css-->
<link href="<?php echo base_url();?>/backend/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="all" type="text/css"  href="<?php echo base_url();?>/backend/css/style.css" />
    
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?php echo base_url();?>/backend/css/bootstrap.css">

        <!-- Related styles of various javascript plugins -->
        <link rel="stylesheet" href="<?php echo base_url();?>/backend/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url();?>/backend/css/main.css">

        <!-- Load a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?php echo base_url();?>/backend/css/themes.css">

        <link rel="stylesheet" href="<?php echo base_url();?>/backend/css/custom_trp.css">
        
        <link rel="stylesheet" href="<?php echo base_url();?>/backend/css/TableTools.css">
        
        <link rel="stylesheet" href="<?php echo base_url();?>/backend/font-awesome/css/font-awesome.min.css">
        <!-- END Stylesheets -->
        
        <link rel="stylesheet" href="<?php echo base_url();?>/backend/css/font_style.css">

		<link href="<?php echo base_url();?>/backend/css/jquery-ui.css" rel="stylesheet" />
		
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/backend/css/selectric.css">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/backend/css/bootstrap-multiselect.css">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/backend/css/daterangepicker-bs3.css">
		

        <!-- Modernizr (Browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support them) -->
        <script src="<?php echo base_url();?>/backend/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src="<?php echo base_url();?>/backend/js/vendor/modernizr.custom.79639.js"></script>
        <!-- Excanvas for canvas support on IE8 -->
        <!--[if lte IE 8]><script src="../js/helpers/excanvas.min.js"></script><![endif]-->
        <!-- Bootstrap.js -->

        <!-- Get Jquery library from Google but if something goes wrong get Jquery from local file - Remove 'http:' if you have SSL -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(unescape('%3Cscript src="../backend/js/vendor/jquery-1.9.1.min.js"%3E%3C/script%3E'));</script>
          

        <script src="<?php echo base_url();?>/backend/js/vendor/bootstrap.min.js"></script>

        <!-- Jquery plugins and custom javascript code -->
        <script src="<?php echo base_url();?>/backend/js/plugins.js"></script>
        <script src="<?php echo base_url();?>/backend/js/main.js"></script>
        <script src="<?php echo base_url();?>/backend/js/custom_trp.js"></script>
        <script src="<?php echo base_url();?>/backend/js/jquery.printElement.min.js"></script>
        <script src="<?php echo base_url();?>/backend/js/ZeroClipboard.js"></script>
        <script src="<?php echo base_url();?>/backend/js/TableTools.js"></script>
        <script src="<?php echo base_url();?>/backend/js/jquery.maskedinput.js"></script>
        
		<script src="<?php echo base_url();?>/backend/js/calculator.js" type="text/javascript"></script>
	   <!-- <script src="../backend/js/flot/jquery.flot.js"></script> -->
	   
	   <script src="<?php echo base_url();?>/backend/js/jquery.selectric.js"></script>
	   <script src="<?php echo base_url();?>/backend/js/bootstrap-multiselect.js"></script>
	   
	   <script src="<?php echo base_url();?>/backend/js/moment.js"></script>
	   <script src="<?php echo base_url();?>/backend/js/daterangepicker.js"></script>
           
       
   
   
   
   <!-- <script src="../backend/js/jquery.lazyload.js" type="text/javascript"></script>
   <script type="text/javascript" src="../backend/js/jquery.lazyload-any.js"></script> -->
    
    </head>

    <!-- Add the class .fixed to <body> for a fixed layout on large resolutions (min: 1200px) -->
    <!-- <body class="fixed"> -->
    <body>
    <a href="" id="top"></a>
        <!-- Page Container -->
        <div id="page-container" class="{title_page}">
            <!-- Header -->
            <!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively -->
            <!-- <header class="navbar navbar-inverse navbar-fixed-top"> -->
            <!-- <header class="navbar navbar-inverse navbar-fixed-bottom"> -->
            
            <!-- Inner Container -->
            <div id="inner-container">
                
                
         <header class="navbar navbar-inverse">
            <!-- Mobile Navigation, Shows up  on smaller screens -->
            <ul class="navbar-nav-custom pull-right hidden-md hidden-lg">
                <li class="divider-vertical"></li>
                <li>
                    <!-- It is set to open and close the main navigation on smaller screens. The class .navbar-main-collapse was added to aside#page-sidebar -->
                    <a href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-main-collapse">
                        <i class="icon-reorder"></i>
                    </a>
                </li>
            </ul>
            <!-- END Mobile Navigation -->

            <!-- Logo -->
<!--            <a href="index.html" class="navbar-brand"><span>TRP LOGO</span></a>-->

            <!-- Loading Indicator, Used for demostrating how loading of widgets could happen, check main.js - uiDemo() -->
            <div id="loading" class="pull-left"><i class="icon-certificate icon-spin"></i></div>

            <!-- Header Widgets -->
            <!-- You can create the widgets you want by replicating the following. Each one exists in a <li> element -->
            <ul id="widgets" class="navbar-nav-custom pull-right">
                <!-- Just a divider -->

                <!-- RSS Widget -->
                <!-- Add .dropdown-left-responsive class to align the dropdown menu left (so its visible on mobile) -->
                <!--<li id="rss-widget" class="dropdown dropdown-left-responsive">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-rss"></i>
                        <span class="badge badge-warning display-none"></span>
                    </a>

                    <ul class="dropdown-menu pull-right widget widget-fluid">
                        <li class="widget-heading text-center">Web Design</li>
                        <li class="li-hover"><a href="javascript:void(0)" class="widget-link"><i class="icon-umbrella"></i>This is a headline</a></li>
                        <li class="divider"></li>
                        <li class="li-hover"><a href="javascript:void(0)" class="widget-link"><i class="icon-trophy"></i>Another headline</a></li>
                        <li class="divider"></li>
                        <li class="li-hover"><a href="javascript:void(0)" class="widget-link"><i class="icon-suitcase"></i>Headlines keep coming!</a></li>
                        <li class="widget-heading text-center">Web Developent</li>
                        <li class="li-hover"><a href="javascript:void(0)" class="widget-link"><i class="icon-phone"></i>New headline</a></li>
                        <li class="divider"></li>
                        <li class="li-hover"><a href="javascript:void(0)" class="widget-link"><i class="icon-pencil"></i>Another one</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)" class="text-center">All News</a></li>
                    </ul>
                </li>-->
                <!-- END RSS Widget -->

                <!--<li class="divider-vertical"></li>-->

                <!-- Twitter Widget -->
                <!-- Add .dropdown-left-responsive class to align the dropdown menu left (so its visible on mobile) -->
                <!--<li id="twitter-widget" class="dropdown dropdown-left-responsive">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-twitter"></i>
                        <span class="badge badge-info display-none"></span>
                    </a>
                    <ul class="dropdown-menu pull-right widget">
                        <li class="widget-heading"><i class="icon-comments-alt pull-right"></i>Latest Tweets</li>
                        <li class="li-hover">
                            <div class="media">
                                <a class="pull-left" href="javascript:void(0)">
                                    <img src="../img/placeholders/image_dark_64x64.png" alt="fakeimg">
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="javascript:void(0)">Michael</a><span class="label label-info">just now</span></h6>
                                    <div class="media">Web design all the way!</div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li class="li-hover">
                            <div class="media">
                                <a class="pull-left" href="javascript:void(0)">
                                    <img src="../img/placeholders/image_dark_64x64.png" alt="fakeimg">
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="javascript:void(0)">Monica</a><span class="label label-info">3 min ago</span></h6>
                                    <div class="media">Download free PSDs at <a href="http://bit.ly/YUs4SQ" target="_blank">http://bit.ly/YUs4SQ</a></div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li class="li-hover">
                            <div class="media">
                                <a class="pull-left" href="javascript:void(0)">
                                    <img src="../img/placeholders/image_dark_64x64.png" alt="fakeimg">
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="javascript:void(0)">Steven</a><span class="label label-info">45 min ago</span></h6>
                                    <div class="media">Be sure to check out my portfolio!</div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li class="li-hover">
                            <div class="media">
                                <a class="pull-left" href="javascript:void(0)">
                                    <img src="../img/placeholders/image_dark_64x64.png" alt="fakeimg">
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="javascript:void(0)">Tim</a><span class="label label-info">1 hour ago</span></h6>
                                    <div class="media">Get all our themes for free for the next 2 hours! <a href="javascript:void(0)">#freebies</a></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>-->
                <!-- END Twitter Widget -->

                
               
                      
               

                <!-- Messages Widget -->
                <!-- Add .dropdown-left-responsive class to align the dropdown menu left (so its visible on mobile) -->
                <li id="messages-widget" class="dropdown dropdown-left-responsive">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <i class=""><img src="<?php echo base_url();?>backend/img/dash/notify.png" /></i>
                        <!-- If the <span> element with .badge class has no content it will disappear (not in IE8 and below because of using :empty in CSS) -->
                        <span class="badge badge-danger">1</span>
                    </a>
                    <ul class="dropdown-menu pull-right widget">
                        <li class="widget-heading"><i class="icon-comment pull-right"></i>Latest Messages</li>
                        <li class="new-on">
                            <div class="media">
                                <a class="pull-left" href="javascript:void(0)">
                                    <img src="../img/placeholders/image_light_64x64.png" alt="fakeimg">
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="javascript:void(0)">George</a><span class="label label-success">2 min ago</span></h6>
                                    <div class="media">Thanks for your help! The tutorial really helped me a lot!</div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="media">
                                <a class="pull-left" href="javascript:void(0)">
                                    <img src="../img/placeholders/image_light_64x64.png" alt="fakeimg">
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="javascript:void(0)">Mike</a><span class="label label-default">6 hours ago</span></h6>
                                    <div class="media">The logo is ready, have a look and let me know what you think!</div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="media">
                                <a class="pull-left" href="javascript:void(0)">
                                    <img src="../img/placeholders/image_light_64x64.png" alt="fakeimg">
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="javascript:void(0)">Julia</a><span class="label label-default">1 day ago</span></h6>
                                    <div class="media">We should better consider our social media marketing strategy!</div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li class="text-center"><a href="page_inbox.html">View All Messages</a></li>
                    </ul>
                </li>
                <!-- END Messages Widget -->
                <li class="divider-vertical"></li>

                <!-- User Menu -->
                <li class="dropdown pull-right dropdown-user">
                    
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        if($user_info['profilepicture'] == 0) {?>
                            <img src="<?php echo base_url();?>/backend/img/template/user-demo.jpg" alt="avatar" class="avatar">
                        <?php }
                        else {?>
                            <img src="<?php echo base_url() . '/assets/file/' .$user_info['profilepicture']; ?>" alt="" width="160" class="user-image round-img" />
                        <?php }
                        ?>
                        <span><?php echo $user_info['user_name']; ?></span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- Just a button demostrating how loading of widgets could happen, check main.js- - uiDemo() -->
                        <li>
                            <a href="javascript:void(0)" class="loading-on"><i class="icon-refresh"></i> Refresh</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <!-- Modal div is at the bottom of the page before including javascript code -->
                            <a href="<?php echo base_url('profile/profile/index'); ?>" role="button" data-toggle="modal"><i class="icon-user"></i> User Profile</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="icon-wrench"></i> App Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url();?>home/log_out"><i class="icon-lock"></i> Log out</a>
                        </li>
                    </ul>
                </li>
                <!-- END User Menu -->
            </ul>
            <!-- END Header Widgets -->
        </header>
<!-- END Header -->
                
                
<!--            {account_content}-->
                <!-- Sidebar -->
                <aside id="page-sidebar" class="collapse navbar-collapse navbar-main-collapse">
                    <a href="<?php echo base_url();?>profile/dashboard"  class=""><img alt="" style="margin-left: 16px; margin-top: 15px;" src="<?php echo base_url();?>/backend/img/admin_logo.png"></a>
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
                    <div class="menu_divider">&nbsp;</div>
                    	<div style=" color: #66738F; height: 107px; margin-bottom: 2px; padding: 4px 0 11px 17px; ">
    				<h6 style="text-transform: uppercase; font-weight: bold; ">Client Center</h6>
                    	
                    	<button class="btn btn-success" style="font-size: 13px; font-weight: bold;" type="button" onclick="top.location='index.php/admin/clientcenter/newapp'"><i class="icon-plus-sign"></i> &nbsp; New Application</button>
                                <span style="padding:0px 0px 0px 40px; color:#DCDCDD;"></span>
                    	</div>
                    	<div class="menu_divider">&nbsp;</div>
                    	<h6 style="text-transform: uppercase; color: #66738F; margin-bottom: 2px; padding: 0px 11px 11px 17px;  font-weight: bold;">Navigation</h6>
                    
                    <!--  <nav id="primary-nav"> -->
                    <div class="sidebarmenu">
                        <ul class="" id="sidebarmenu1">

							<!--<li>
                                <a   class="active" id="menu-clientCenter" href="index.php/admin/clientcenter"><i class="glyphicon-client_center"></i>Client Center </a>
                                
                            </li>-->
                            <li>
                                <a id="home" href="#"><i class="icon-meter"></i>Dashboard</a>
                            </li>
                            
                          <!--    lenderd menu start -->
                            
                            <li>
                                <a id="menu-bank-product" href="#"><i class="fa fa-product-hunt"></i>Projects</a>
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-product-hunt"></i>All Projects</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-product-hunt"></i>Funded Projects</a>
                                    </li>                   
                                 </ul>
                            </li>
                            
                            <li>
                                <a id="menu-bank-product" href="#"><i class="fa fa-credit-card"></i>Payments</a>
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-credit-card-alt"></i>Transactions</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-plus-sign"></i>Add Funds</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-credit-card-alt"></i>Withdraw Funds</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-credit-card-alt"></i>Payment Methods</a>
                                    </li>
                                 </ul>
                            </li>
                            
                       
                            <li>
                                <a id="menu-insurance" href="index.php/admin/services/insurancePolicies"><i class="fa fa-clock-o"></i>Repayment Schedule</a>
                                <ul>
                                    <li>
                                        <a href="index.php/admin/services/insurance"><i class="fa fa-product-hunt"></i>Project Name</a>
                                    </li>
                                    <li>
                                        <a href="index.php/admin/services/insurancePolicies"><i class="fa fa-user-circle"></i>Borrower Name</a>
                                    </li>
                                    <li>
                                        <a href="index.php/admin/services/insurancePolicies"><i class="fa fa-credit-card-alt"></i>Amount Funded</a>
                                    </li>
                                    <li>
                                        <a href="index.php/admin/services/insurancePolicies"><i class="fa fa-credit-card-alt"></i>Amount Repaid</a>
                                    </li>
                                 </ul>   
                            </li>
                            
              
                            <li>
                                <a id="menu-setting" href="index.php/admin/settings"><i class="icon-cog3"></i>Settings</a>
                                <ul>
                                    <li>
                                        <a href="index.php/admin/services/insurance"><i class="fa fa-product-hunt"></i>User Profile</a>
                                    </li>
                                    <li>
                                        <a href="index.php/admin/services/insurancePolicies"><i class="fa fa-user-circle"></i>Payment Options</a>
                                    </li>
                                   
                                 </ul>   
                            </li>
                            <li>
                                <a id="menu-setting" href="<?php echo base_url('home/log_out'); ?>" ><i class="fa fa-sign-out"></i>Sign out</a>			
                            </li>

                        </ul>
                    
                    </div>
                     </nav>
                    <!-- END Primary Navigation -->
                    <!-- 
                    <div class="menu_divider">&nbsp;</div>
                    <div>
                    	<h6 style="text-transform: uppercase; color: #66738F; margin-bottom: 16px; padding: 0px 11px 11px 17px;  font-weight: bold;">Application</h6>
                    	<div style="margin-left:18px;">
                    		<div class="input-group date input-datepicker" data-date="" data-date-format="yyyy-mm-dd" style="width: 145px">
                                        <input type="text" id="example-input-datepicker2" name="example-input-datepicker2" class="form-control">
                                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                              </div>
                    	</div>
                    	
                    	<div class="application_summary">
                    		<ul>
                    			<li> <i class="icon-circle2 bankproicon"></i> BANK PRODUCTS <span>[0]</span></li>
                    			<li><i class="icon-circle2 benefitsicon"></i>BENEFITS <span>[0]</span></li>
                    			<li><i class="icon-circle2 insrenceicon"></i>INSURANCE <span>[0]</span></li>
                    		</ul>
                    	</div>
                    	<img src="../backend/img/menu_application.png" alt="">
                    	
                    	<div class="application_total">
                    		<ul >
                    			<li><i class="icon-coins coinicon"></i><span>TOTAL FEES</span></li>
                    			<li class="amount">[ $1500 ]</li>
                    		</ul>
                    	</div>
                    </div>
                    -->
                    <div class="menu_divider">&nbsp;</div>
                    
                    
                    
                    <footer>
					    <div class="copyright">
                    	<a href="http://scalefinancial.com" class="trp">2014 &copy; scalefinancial.com</a>
                    	<p><a href="#">Privacy</a> &nbsp; <a href="#">Terms</a> &nbsp; <a href="#">Support</a></p>
                    </div>
					</footer>

                </aside>
                <!-- END Sidebar -->