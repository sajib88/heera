

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Profile Information
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
        <li class="active">Preview</li>
      </ol>
</section>
    
   <section class="content">
      <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="well well-sm">
                    <div class="row">
                       
                        <div class="col-sm-6 col-md-5">
                            
                            
                            
                            
                            
                            
                            <?php
                            if($user_info['profilepicture'] == 0) {?>
                                <img src="<?php echo base_url() . '/assets/user-demo.jpg'?>" alt="" class="img-rounded img-responsive" />
                            <?php }
                            else {?>
                                <div class="thumbnail">



                                <img src="<?php echo base_url() . '/assets/file/' .$user_info['profilepicture']; ?>" alt=""  class="img-circle img-responsive" />
                                </div>
                                    <?php }
                            ?>



                        </div>
                        <div class="col-sm-6 col-md-7">


                            <div class="btn-group">
                                <button type="button" class="btn btn-primary">
                                    Action Menu</button>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span><span class="sr-only"><?php echo $user_info['user_name']; ?></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url('profile/profile/index'); ?>">Change Password</a></li>
                                    <li><a href="<?php echo base_url('profile/profile/index'); ?>">Update Information</a></li>


                                </ul>
                            </div>

                            <h4>
                                <?php echo $user_info['user_name']; ?></h4>

                            <small><cite title="state, country"><?php echo $user_info['state']; ?>, <?php
                                    $data = get_data('countries', array('id' => $user_info['country']));
                                    echo $data['name'];
                                    ?> <i class="glyphicon glyphicon-map-marker">
                                    </i></cite></small>
                            <p>
                                <i class="glyphicon glyphicon-envelope"></i><?php echo $user_info['email']; ?>
                                <br />
                                <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                                <br />
                                <i class="glyphicon glyphicon-gift"></i> <b>  Profession </b>  : <?php
                                $data = get_data('profession', array('id' => $user_info['profession']));
                                echo $data['name'];
                                ?><br/></p>

                            <b>  First Name </b>  : <?php echo $user_info['first_name']; ?><br/>
                            <b>  Last Name </b>  : <?php echo $user_info['last_name']; ?><br/>
                            <b>  Professional Licensing Country </b>  : <?php echo $user_info['plc']; ?><br/>
                            <b>  Professional Licensing State </b>  : <?php echo $user_info['pls']; ?><br/>
                            <b>  NPI </b>  : <?php echo $user_info['npi']; ?><br/>
                            <b>  Professional License Number </b>  : <?php echo $user_info['pln']; ?><br/>
                            <b>  Gender </b>  : <?php echo ucfirst($user_info['gender']); ?><br/>
                            <b>  Country </b>  : <?php
                            $data = get_data('countries', array('id' => $user_info['country']));
                            echo $data['name'];
                            ?><br/>
                            <b>  State </b>  : <?php echo $user_info['state']; ?><br/>
                            <b>  City </b>  : <?php echo $user_info['city']; ?><br/>
                            <b>  Phone </b>  : <?php echo $user_info['phone']; ?><br/>

                            <!-- Split button -->

                        </div>
                    </div>
                </div>
                
                
                
                
                
            </div>
        </div>


</section>


</div>




<style>
    .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

    small {
        display: block;
        line-height: 1.428571429;
        color: #999;
    }
</style>


