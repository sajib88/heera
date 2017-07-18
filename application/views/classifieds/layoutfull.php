

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Classifieds
            <small>Details Layout </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Classifieds</a></li>
            <li class="active">View All</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">

            <?php //print_r($layoutfull);


            ?>





            <div class="col-lg-4">
                <!-- /.info-box -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="glyphicon glyphicon-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Email</span>
                        <span class="info-box-number"><?php echo $layoutfull['email']; ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                  <span class="progress-description">
                    Contact For This Classified
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>

            <div class="col-lg-4">
                <!-- /.info-box -->
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-phone"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Contact</span>
                        <span class="info-box-number"><?php echo $layoutfull['phone']; ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                  <span class="progress-description">
                   Call Now  For This Classified
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>

            <div class="col-lg-4 ">


                <!-- /.info-box -->
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-globe"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Location</span>
                        <span class="info-box-number"><?php
                            $data = get_data('countries', array('id' => $layoutfull['country']));
                            echo $data['name'];
                            ?>, <?php echo $layoutfull['state']; ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                  <span class="progress-description">
                    Location This Classified
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>

            <!-- PRODUCT LIST -->

            <!-- /.box -->


            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">


                            <img src="<?php echo base_url() . '/assets/file/' .$layoutfull['photo_primary']; ?>" alt="" width="150" height="150" class="img-circle center-block" />



                        <h3 class="profile-username text-center"> <?php echo $layoutfull['title']; ?></h3>



                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Main Category </b> <a class="pull-right"><?php
                                    $data = get_data('classified_main_cat', array('id' => $layoutfull['main_cat']));
                                    echo $data['name'];
                                    ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Price</b> <a class="pull-right"> <?php echo $layoutfull['price']; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>	Country</b> <a class="pull-right"><?php
                                    $data = get_data('countries', array('id' => $layoutfull['country']));
                                    echo $data['name'];
                                    ?></a>
                            </li>

                            <li class="list-group-item">
                                <b>	State</b> <a class="pull-right"><?php echo $layoutfull['state']; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>	city</b> <a class="pull-right"><?php echo $layoutfull['city']; ?></a>
                            </li>



                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Classified Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Description</strong>

                        <p class="text-muted">
                            <?php echo $layoutfull['description']; ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted"><?php
                            $data = get_data('countries', array('id' => $layoutfull['country']));
                            echo $data['name'];
                            ?>, <?php echo $layoutfull['state']; ?>, <?php echo $layoutfull['city']; ?></p>

                        <strong> Address 1</strong>
                        <p> <?php echo $layoutfull['address_1']; ?></p>

                        <strong> Address 2</strong>
                        <p> <?php echo $layoutfull['address_2']; ?></p>

                        <hr>


                        <strong><i class="fa fa-pencil margin-r-5"></i> Category </strong>

                        <p>

                            <span class="label label-success"><?php
                                $data = get_data('classified_main_cat', array('id' => $layoutfull['main_cat']));
                                echo $data['name'];
                                ?></span>

                        </p>

                        <hr>

                        <strong><i class="fa fa-laptop"></i> website</strong>

                        <p><?php echo $layoutfull['website']; ?></p>

                        <hr>

                        <strong><i class="fa fa fa-envelope"></i> email</strong>

                        <p><?php echo $layoutfull['email']; ?></p>
                        <hr>
                        <strong><i class="fa fa-mobile-phone"></i> phone</strong>

                        <p><?php echo $layoutfull['phone']; ?></p>
                        <hr>
                        <strong><i class="fa fa-fax"></i> fax</strong>

                        <p><?php echo $layoutfull['fax']; ?></p>
                        <hr>



                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>



            <div class="col-lg-8">

                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-file-picture-o"></i>
                        <h3 class="box-title">Classified Photos</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

                            <img src="<?php echo base_url() . '/assets/file/' . $layoutfull['photo_primary'] ?>" width="130" height="130"">


                        <?php if($layoutfull['photo_2'] != 0){?>
                        <img src="<?php echo base_url() . '/assets/file/' . $layoutfull['photo_2'] ?>" width="130" height="130">
                        <?php }?>
                        <?php if($layoutfull['photo_3'] != 0){?>
                        <img src="<?php echo base_url() . '/assets/file/' . $layoutfull['photo_3'] ?>" width="130" height="130"">
                        <?php }?>
                        <?php if($layoutfull['photo_4'] != 0){?>
                            <img src="<?php echo base_url() . '/assets/file/' . $layoutfull['photo_4'] ?>" width="130" height="130"">
                        <?php }?>

                    </div>


                </div>



                <?php if($layoutfull['primary_video'] != 0){?>
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <i class="fa fa-file-video-o"></i>
                            <h3 class="box-title">Public Website Video</h3>
                        </div>
                        <div class="box-body">



                            <video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
                                   poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                                <source src="<?php echo base_url() . '/assets/file/' . $layoutfull['primary_video'];?>" type='video/mp4'>
                                <source src="<?php echo base_url() . '/assets/file/' . $layoutfull['primary_video'];?>" type='video/webm'>
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                </p>
                            </video>



                        </div>


                    </div>
                <?php }
                ?>




                <?php if($layoutfull['primary_sound'] != 0){?>
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <i class="fa fa-file-sound-o"></i>
                            <h3 class="box-title">Public Website Sound/audio</h3>
                        </div>
                        <div class="box-body">

                            <audio src="<?php echo base_url() . 'assets/file/' . $layoutfull['primary_sound']; ?>" preload="auto" />



                        </div>


                    </div>
                <?php }
                ?>



                <?php if($layoutfull['primary_file'] != 0){?>
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <i class="fa fa-file-word-o"></i>
                            <h3 class="box-title">Public Website Attachment</h3>
                        </div>
                        <div class="box-body">


                                    <a href="<?php echo base_url() . '/assets/file/' . $layoutfull['primary_file'];?>">Download File  </a><br/>



                        </div>


                    </div>
                <?php }
                ?>



            </div>




        </div>
        </div>
    </section>

</div>
<!-- THIS css/JS USE ONLY VIDEO PLAYER -->
<link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
<!-- THIS css/JS USE ONLY VIDEO PLAYER -->

<!-- THIS css/JS Sound -->
<script src="<?php echo base_url(); ?>script-assets/audiojs/audio.min.js"></script>

<script>
    audiojs.events.ready(function() {
        var as = audiojs.createAll();
    });
</script>
<!-- THIS css/JS Sound -->

