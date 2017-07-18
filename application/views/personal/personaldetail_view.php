<style>

    .circular {
        width: 120px;
        height: 120px;
        border-radius: 150px;
        -webkit-border-radius: 150px;
        -moz-border-radius: 150px;
        padding: 3px;
        border: 3px solid #d2d6de;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Personal</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div style="text-align: center">
                            <img  src="<?php echo base_url() . 'assets/file/' .$layoutfull['primary_photo']; ?>" alt="User profile picture"  class="circular">
                        </div>

                        <h3 class="profile-username text-center"><?php echo (!empty($layoutfull['title']))?$layoutfull['title']:''?></h3>

                        <p class="text-muted text-center"><?php echo (!empty( $layoutfull['ethnicity']))? $layoutfull['ethnicity']:''?></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Body</b> <span class="pull-right badge bg-blue"><?php echo (!empty( $layoutfull['body']))? $layoutfull['body']:''?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Height</b> <span class="pull-right badge bg-aqua"><?php echo (!empty( $layoutfull['height']))? $layoutfull['height']:''?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Marital Status</b> <span class="pull-right badge bg-green"><?php echo (!empty( $layoutfull['maritalstatus']))? $layoutfull['maritalstatus']:''?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Age</b> <span class="pull-right badge bg-red"><?php echo (!empty( $layoutfull['age']))? $layoutfull['age']:''?></span>
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
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Description</strong>

                        <p class="text-muted">
                            <?php echo (!empty( $layoutfull['description']))? $layoutfull['description']:''?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">
                            <?php echo (!empty( $layoutfull['country']))? countryNameByID($layoutfull['country']).',':''?>
                            <?php echo (!empty( $layoutfull['state']))? $layoutfull['state'].',':''?>
                            <?php echo (!empty( $layoutfull['city']))? $layoutfull['city']:''?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Profession</strong>
                        <?php
                        $professionall =  (!empty($layoutfull['profession']))? explode(",",$layoutfull['profession']):'';
                        $levelColor = array("label label-danger","label label-success","label label-info","label label-warning","label label-primary");

                        if(count($professionall)>0){
                            for ($profession=0;$profession < count($professionall);$profession++){?>
                                <p>
                                    <span class='<?php echo $levelColor[$profession];?>'><?php echo (!empty($professionall[$profession]))? getProfessionById($professionall[$profession]):'';?></span>

                                </p>

                                <?php
                            }
                        }

                        ?>




                        <hr>
                        <strong><i class="fa fa-pencil margin-r-5"></i> Other Information </strong>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Child</b> <span class="pull-right badge bg-black"><?php echo (!empty( $layoutfull['child']))? $layoutfull['child']:''?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Language</b> <span class="pull-right badge bg-red"><?php echo (!empty( $layoutfull['language']))? $layoutfull['language']:'Not selected'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Religion</b> <span class="pull-right badge bg-yellow"><?php echo (!empty( $layoutfull['religion']))? $layoutfull['religion']:'Not selected'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Smoker</b> <span class="pull-right badge bg-aqua"><?php echo (!empty( $layoutfull['smoker']))? $layoutfull['smoker']:'Not selected'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Drinker</b> <span class="pull-right badge bg-blue"><?php echo (!empty( $layoutfull['drinker']))? $layoutfull['drinker']:'Not selected'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Entimicyorpreference</b> <span class="pull-right badge bg-light-blue"><?php echo (!empty( $layoutfull['entimicyorpreference']))? $layoutfull['entimicyorpreference']:'Not selected'?></span>
                            </li>
                        </ul>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-lg-8">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-file-picture-o"></i>
                        <h3 class="box-title">Product Photos</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

                        <img src="<?php echo base_url() . '/assets/file/' . $layoutfull['primary_photo'] ?>" width="130" height="130"">


                        <?php if($layoutfull['photo1'] != 0){?>
                            <img src="<?php echo base_url() . '/assets/file/' . $layoutfull['photo1'] ?>" width="130" height="130">
                        <?php }?>
                        <?php if($layoutfull['photo2'] != 0){?>
                            <img src="<?php echo base_url() . '/assets/file/' . $layoutfull['photo2'] ?>" width="130" height="130"">
                        <?php }?>


                    </div>


                </div>



                <?php if($layoutfull['primary_videos'] != 0){?>
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <i class="fa fa-file-video-o"></i>
                            <h3 class="box-title">Product Video</h3>
                        </div>
                        <div class="box-body">



                            <video id="my-video" class="video-js" controls preload="auto" width="340" height="164"
                                   poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                                <source src="<?php echo base_url() . '/assets/file/' . $layoutfull['primary_videos'];?>" type='video/mp4'>
                                <source src="<?php echo base_url() . '/assets/file/' . $layoutfull['primary_videos'];?>" type='video/webm'>
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                </p>
                            </video>



                        </div>


                    </div>
                <?php }
                ?>




                <?php if($layoutfull['primary_sounds'] != 0){?>
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <i class="fa fa-file-sound-o"></i>
                            <h3 class="box-title">Product Sound/audio</h3>
                        </div>
                        <div class="box-body">

                            <audio src="<?php echo base_url() . 'assets/file/' . $layoutfull['primary_sounds']; ?>" preload="auto" />



                        </div>


                    </div>
                <?php }
                ?>



                <?php if($layoutfull['primary_files'] != 0){?>
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <i class="fa fa-file-word-o"></i>
                            <h3 class="box-title">Product Attachment</h3>
                        </div>
                        <div class="box-body">


                            <a href="<?php echo base_url() . '/assets/file/' . $layoutfull['primary_files'];?>">Download File  </a><br/>



                        </div>


                    </div>
                <?php }
                ?>



            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
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