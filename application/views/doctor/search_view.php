<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/25/2016
 * Time: 4:24 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Developed By foralldoctors">
    <meta name="author" content="foralldoctors">
    <meta name="keywords" content="Bootstrap 3, Template, Theme, Responsive, Corporate, Business">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>
        ForallDoctors | Only One Website For All Doctors In The World
    </title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>front/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>front/css/theme.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>front/css/bootstrap-reset.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/flexslider.css"/>
    <link href="<?php echo base_url(); ?>/front/css/superfish.css" rel="stylesheet" media="screen">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">-->
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front/css/component.css">
    <link href="<?php echo base_url(); ?>front/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>front/css/style-responsive.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <!--assets css-->
    <link href="<?php echo base_url(); ?>front/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>front/assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:200,300,400,700' rel='stylesheet' type='text/css'>

    <!-- assets -->

    <!--admin-->
    <!--<link href='<?php /*echo base_url(); */?>/script-assets/dist/css/AdminLTE.css' rel='stylesheet'>-->
    <link href='<?php echo base_url(); ?>script-assets/dist/css/admincustom.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>script-assets/custom.css' rel='stylesheet'>

    <script src="<?php echo base_url(); ?>/front/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url(); ?>/front/js/bootstrap.min.js"></script>
    <script defer src="<?php echo base_url(); ?>/front/js/jquery.flexslider.js"></script>
    <script type="text/javascript">
        $('a.info').tooltip();
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider) {
                    $('body').removeClass('loading');
                }
            });
        });

        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                items: 4
            });



        });

        jQuery(document).ready(function() {
            jQuery('ul.superfish').superfish();
        });
        new WOW().init();


        function getComboA(sel) {
            var html = '';
            var value = sel.value;
            var base_url = '<?php echo base_url() ?>';
            var da = {state: value};
            /*$.ajax({
             type: 'POST',
             url: base_url + "doctor/docController/getStateByAjax",
             data: da,
             success: function(resultData) {
             //$("#result").html(resultData);
             //console.log(resultData);
             var data = JSON.parse(resultData);
             $('#result').empty();
             for(var i=0;i<data.length();i++){
             html+='<option value="">'+data[i]['name']+'</option>';
             }
             $('#result').append(html);


             }
             });*/


            $.getJSON( "<?php echo base_url().'doctor/docController/getStateByAjax'?>", { state:  value} )
                .done(function( json ) {
                    $('#result').empty();
                    html+='<option value="">Select State</option>';
                    for(var i=0; i<json.length ; i++)
                    {
                        html+='<option value="'+json[i]['id']+'">'+json[i]['name']+'</option>';
                    }
                    $('#result').append(html);
                })
                .fail(function( jqxhr, textStatus, error ) {
                    var err = textStatus + ", " + error;
                    console.log( "Request Failed: " + err );
                });

        }
    </script>

    <style>
        .css_height{
            padding-top: 20px;
        }
        #da-grid{
            padding-top: 90px;
        }
    </style>
</head>

<body>
<!--header start-->
<header class="head-section">
    <div class="navbar navbar-default navbar-static-top container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/front/img/lgmain.png" class="img-responsive" alt="logo"> </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>

                    <a href="contact.html">HOME</a>
                </li>

                <li>

                    <a href="contact.html">ABOUT US</a>
                </li>

                <li>
                    <a href="contact.html">EMAIL</a>
                </li>

                <li>
                    <a class="loginblue" href="<?php echo base_url('home/login'); ?>">LOGIN</a>
                </li>

                <li>
                    <a class="signuppurple" href="<?php echo base_url('home/registration'); ?>">SIGNUP</a>
                </li>
            </ul>
        </div>
    </div>
</header>




<div id="da-grid">
    <div class="container">
            <div class="col-md-12 text-center">
                <h3>
                    Search Result
                </h3>
            </div>
            <?php if(!empty($searchData)) {
                foreach ($searchData as $row) {
                    ?>
                    <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-aqua-active">
                                <h3 class="widget-user-username"><?php echo $row->title ?></h3>
                                <h5 class="widget-user-desc"><?php echo getProfessionById($row->profession); ?></h5>
                            </div>
                            <?php $img = (!(empty($row->user_id)) ? getImage('public_web', $row->user_id) : '') ?>
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?php echo base_url() . 'assets/file/' . $img ?>"
                                     alt="User Avatar">
                            </div>
                            <div class="box-footer">
                                <ul class="nav nav-stacked">
                                    <li><a href="#">Appointment <span class="pull-right badge bg-blue"><?php echo (($row->appointment)>0) ? 'Yes' : 'No'; ?></span></a></li>
                                    <li><a href="#">Business Name <span class="pull-right badge bg-aqua"><?php echo (!(empty($row->business_name)) ? $row->business_name : '') ?></span></a></li>
                                    <li><a href="#">Business Email <span class="pull-right badge bg-green"><?php echo (!(empty($row->business_email)) ? $row->business_email : '') ?></span></a></li>
                                    <li><a href="#">Country <span class="pull-right badge bg-red"><?php echo (!(empty($row->country)) ? countryNameByID($row->country) : '') ?></span></a></li>
                                    <li><a href="#">State <span class="pull-right badge bg-yellow"><?php echo (!(empty($row->state)) ? $row->state : '') ?></span></a></li>
                                    <li><a href="#">Country <span class="pull-right badge bg-purple"><?php echo (!(empty($row->city)) ? $row->city : '') ?></span></a></li>

                                </ul>

                            </div>
                            <div class="small-box bg-aqua">
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>

                <?php }
            }else{?>
                <div class="alert alert-danger">No Search Result Found </div>
         <?php }?>
    </div>

</div>

<div id="home-services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    Some of our free features
                </h2>
            </div>
            <div class="col-md-3">
                <ul class="professional">
                    <li>
                        <figure>
                            <img src="<?php echo base_url(); ?>/front/img/proffesional-color.png" alt=""/>
                            <figcaption>
                                <h2>Free Professional Profile</h2>
                                <p>
                                    Link With doctors, lawyers and PhD professionals worldwide with your FREE Professional Profile.</p>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="demo-3">
                    <li>
                        <figure>
                            <img src="<?php echo base_url(); ?>/front/img/freelist-color.png" alt=""/>
                            <figcaption>
                                <h2>Free Directory Listings</h2>
                                <p>
                                    Learn the Secret for Building A Strong Client Base, Instead of losing them to your competitors.</p>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="col-md-6">
                    <ul class="smallimages videochat">
                        <li>
                            <figure>
                                <img src="<?php echo base_url(); ?>/front/img/videochat.png" alt=""/>
                                <figcaption>
                                    <p>
                                        The power of Face-to-Face interactions cannot be overstated. Use our seamless instant chat and video chat features to grow your relationships and enhance your credibility. Distance is no longer a Barrier.</p>
                                </figcaption>
                            </figure>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <ul class="smallimages public-color">
                        <li>
                            <figure>
                                <img src="<?php echo base_url(); ?>/front/img/public-color.png" alt=""/>
                                <figcaption>

                                    <p>
                                        Your ForAllDoctors.com website comes with a host of features that let you Exploit The Full Potential Of Internet Marketing.</p>
                                </figcaption>
                            </figure>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="smallimages blogandvideo">
                        <li>
                            <figure>
                                <img src="<?php echo base_url(); ?>/front/img/blogandvideo.png" alt=""/>
                                <figcaption>

                                    <p>Posting to a regular classifieds website can place you among a clutter of irrelevant, unprofessional ads. Welcome to ForAllDoctors.com Classifieds - The Smarter Way For Doctors To Post Classifieds.</p>
                                </figcaption>
                            </figure>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="smallimages classified">
                        <li>
                            <figure>
                                <img src="<?php echo base_url(); ?>/front/img/classified.png" alt=""/>
                                <figcaption class="classified">
                                    <p>If a picture is worth a thousand words, imagine the Power of a Video. And yet, texts have their own importance. Using our Free Blogs and Video Blogs, you can share things that must be shown, written and/or talked about.</p>
                                </figcaption>
                            </figure>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        </div>
        <div class="col-md-4">
            <ul class="largebottomimg freeproduct">
                <li>
                    <figure  class="freeproduct">
                        <img src="<?php echo base_url(); ?>/front/img/freeproduct.png" alt=""/>
                        <figcaption class="freeproduct">
                            <h2>Discounts And Free Products</h2>
                            <p>
                                Look among a range of products and services that doctors, lawyers and other professionals will be interested in.</p>
                        </figcaption>
                    </figure>
                </li>
            </ul>
        </div>

        <div class="col-md-4">
            <ul class="largebottomimg freepersonals">
                <li>
                    <figure class="freepersonals">
                        <img src="<?php echo base_url(); ?>/front/img/freepersonals.png" alt=""/>
                        <figcaption class="freepersonals">
                            <h2>Free Personals</h2>
                            <p>
                                Love is always in the air at our Free Personals - the secure and exclusive place where doctors can find their intimate partners among doctors of their own or other professions.</p>
                        </figcaption>
                    </figure>
                </li>
            </ul>

        </div>
        <div class="col-md-4">
            <ul class="largebottomimg morecolor">
                <li>
                    <figure class="morecolor">
                        <img src="<?php echo base_url(); ?>/front/img/more.png" alt=""/>
                        <figcaption class="morecolor">

                            <p>
                                MORE.....</p>
                        </figcaption>
                    </figure>
                </li>
            </ul>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
</br>
<!--	purple border-->
<div class="purpleborder">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-1">
                <h2>Join and Contribute to Global Advancement  </h2>
            </div>
            <div class="col-md-2 col-md-offset-0">
                <div class="joinbuttondiv">
                    <a class="joinbutton" href="contact.html">Join Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--	purple border-->
<!--property start-->
<div class="property">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 text-center wow fadeInLeft">
                <img src="<?php echo base_url(); ?>/front/img/tab1.png" alt="">
            </div>
            <div class="col-lg-6 col-sm-6 wow fadeInRight">
                <h1>
                    Mobile ready
                </h1>
                <hr>
                <p>
                    <i class="fa fa-check fa-lg pr-10">
                    </i>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantiu.
                </p>
                <p>
                    <i class="fa fa-check fa-lg pr-10">
                    </i>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantiu.
                </p>
                <p>
                    <i class="fa fa-check fa-lg pr-10">
                    </i>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener.
                </p>
                <hr>
                <img alt="" src="<?php echo base_url(); ?>/front/img/mobilefriendly.png">
            </div>
        </div>
    </div>
</div>
<!--property end-->
<div class="container">
    <div class="row mar-b-60">
        <div class="col-lg-6">
            <!--tab start-->
            <section class="tab wow fadeInLeft">
                <header class="panel-heading tab-bg-dark-navy-blue">
                    <ul class="nav nav-tabs nav-justified ">
                        <li class="active">
                            <a data-toggle="tab" href="#news">
                                Medical News
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#events">
                                International Events
                            </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#notice-board">
                                How To Use
                            </a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content tasi-tab">
                        <div id="news" class="tab-pane fade in active">
                            <article class="media">
                                <a class="pull-left thumb p-thumb">
                                    <img src="<?php echo base_url(); ?>/front/img/product1.jpg" alt="">
                                </a>
                                <div class="media-body b-btm">
                                    <a href="#" class=" p-head">
                                        News Tittle goes here
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </p>
                                </div>
                            </article>
                            <article class="media">
                                <a class="pull-left thumb p-thumb">
                                    <img src="<?php echo base_url(); ?>/front/img/product2.jpg" alt="">
                                </a>
                                <div class="media-body b-btm">
                                    <a href="#" class=" p-head">
                                        News Tittle goes here 2
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. simsut dorlor
                                    </p>
                                </div>
                            </article>
                            <article class="media">
                                <a class="pull-left thumb p-thumb">
                                    <img src="<?php echo base_url(); ?>/front/img/product1.jpg" alt="">
                                </a>
                                <div class="media-body b-btm">
                                    <a href="#" class=" p-head">
                                        News Tittle goes here 3
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. sumon ahmed
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div id="events" class="tab-pane fade">
                            <article class="media">
                                <a class="pull-left thumb p-thumb">
                                    <!--image goes here-->
                                </a>
                                <div class="media-body b-btm">
                                    <a href="#" class="cmt-head">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </a>
                                    <p>

                                        <i class="fa fa-time">
                                        </i>
                                        1 hours ago
                                    </p>
                                </div>
                            </article>
                            <article class="media">
                                <a class="pull-left thumb p-thumb">
                                    <!--image goes here-->
                                </a>
                                <div class="media-body b-btm">
                                    <a href="#" class="cmt-head">
                                        Nulla vel metus scelerisque ante sollicitudin commodo
                                    </a>
                                    <p>

                                        <i class="fa fa-time">
                                        </i>
                                        23 mins ago
                                    </p>
                                </div>
                            </article>
                            <article class="media">
                                <a class="pull-left thumb p-thumb">
                                    <!--image goes here-->
                                </a>
                                <div class="media-body b-btm">
                                    <a href="#" class="cmt-head">
                                        Donec lacinia congue felis in faucibus.
                                    </a>
                                    <p>

                                        <i class="fa fa-time">
                                        </i>
                                        15 mins ago
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div id="notice-board" class="tab-pane fade">
                            <p>
                                Notice board goes here Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener.
                            </p>
                            <p>
                                Notice board goes here Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!--tab end-->
        </div>
        <div class="col-lg-6">
            <!--container start-->

            <div class="row">
                <div class="col-lg-12">

                    <div class="about-carousel wow fadeInLeft">
                        <div id="myCarousel" class="carousel slide">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="active item">
                                    <img src="<?php echo base_url(); ?>/front/img/event1.png" alt="">
                                    <div class="carousel-caption">
                                        <p>
                                            International Events 2015
                                        </p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="<?php echo base_url(); ?>/front/img/event2.png" alt="">
                                    <div class="carousel-caption">
                                        <p>
                                            International Events 2015
                                        </p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="<?php echo base_url(); ?>/front/img/event3.png" alt="">
                                    <div class="carousel-caption">
                                        <p>
                                            International Events 2015
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Carousel nav -->
                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                <i class="fa fa-angle-left">
                                </i>
                            </a>
                            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                <i class="fa fa-angle-right">
                                </i>
                            </a>
                        </div>
                    </div>
                </div> </div> </div>
    </div>
</div>
</div>
</div>

<div id="testomonial">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!--                     <img src="img/testomonilatext.png" class="img-responsive" alt="Cinque Terre"> -->

                <div class="col-lg-12">
                    <!--testimonial start-->
                    <div class="about-testimonial boxed-style about-flexslider ">
                        <section class="slider wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;" data-wow-animation-name="fadeInRight">
                            <div class="flexslider">

                                <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides about-flex-slides" style="width: 800%; transition-duration: 0s; transform: translate3d(-555px, 0px, 0px);"><li class="clone" style="width: 555px; float: left; display: block;">
                                            <div class="about-testimonial-image ">
                                                <h1>What Doctors Say</h1>
                                            </div>

                                            <div class="about-testimonial-content">
                                                <p class="about-testimonial-quote">
                                                    Pellentesque et pulvinar enim. Quisque at tempor ligula. Maecenas augue ante, euismod vitae egestas sit amet, accumsan eu nulla. Nullam tempor lectus a ligula lobortis pretium. Donec ut purus sed tortor malesuada venenatis eget eget lorem.
                                                </p>
                                                <a class="about-testimonial-author" href="#">
                                                    Donald Smith,  Physician
                                                </a>
                                            </div>
                                        </li>
                                        <li style="width: 555px; float: left; display: block;" class="flex-active-slide">
                                            <div class="about-testimonial-image ">
                                                <h1>What Doctors Say</h1>
                                            </div>

                                            <div class="about-testimonial-content">
                                                <p class="about-testimonial-quote">
                                                    Donec ut purus sed tortor malesuada venenatis eget eget lorem. Nullam tempor lectus a ligula lobortis pretium. Donec ut purus sed tortor malesuada venenatis eget eget lorem.
                                                </p>
                                                <a class="about-testimonial-author" href="#">
                                                    Donald Smith,  Physician
                                                </a>
                                            </div>
                                        </li>
                                    </ul></div><ol class="flex-control-nav flex-control-paging"><li><a class="flex-active">1</a></li><li><a class="">2</a></li></ol><ul class="flex-direction-nav"><li><a href="#" class="flex-prev">Previous</a></li><li><a href="#" class="flex-next">Next</a></li></ul></div>
                        </section>
                    </div>
                    <!--testimonial end-->
                </div>
            </div>
        </div>
    </div>
</div>
<div id="home-services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    In case you need any help
                </h2>
            </div>
            <div class="col-md-4">
                <div class="h-service">
                    <div class="icon-wrap ico-bg round-fifty wow fadeInDown">
                        <i class="fa fa-question">
                        </i>
                    </div>
                    <div class="h-service-content wow fadeInUp">
                        <h3>
                            CONTACT US
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim  laborum.
                            <br>
                            <a href="javascript:;" class="btn btn-purchase">
                                CLICK HERE
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-service">
                    <div class="icon-wrap ico-bg round-fifty wow fadeInDown">
                        <i class="fa fa-h-square">
                        </i>
                    </div>
                    <div class="h-service-content wow fadeInUp">
                        <h3>
                            NEED HELP?
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim  laborum.
                            <br>
                            <a href="javascript:;" class="btn btn-purchase">
                                CLICK HERE
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-service">
                    <div class="icon-wrap ico-bg round-fifty wow fadeInDown">
                        <i class="fa fa-users">
                        </i>
                    </div>
                    <div class="h-service-content wow fadeInUp">
                        <h3>
                            REGISTRATION HELP
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim  laborum.
                            <br>
                            <a href="javascript:;" class="btn btn-purchase">
                                CLICK HERE
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!--container end-->
<!--small footer start -->
<footer class="footer-small">
    <div class="container">
        <div class="row">
            <!--
                            <div class="col-lg-6 col-sm-6 pull-right">
                                <ul class="social-link-footer list-unstyled">
                                    <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".1s"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".2s"><a href="#"><i class="fa fa-google-plus"></i></a></li>

                                    <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".4s"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".5s"><a href="#"><i class="fa fa-twitter"></i></a></li>

                                </ul>
                            </div>
            -->
            <div class="col-md-6">
                <div class="copyright">
                    <p>Copyright © 2010 - 2016 ForAllDoctors.com. Patent Pending. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>


