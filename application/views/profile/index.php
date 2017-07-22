<style type="text/css">
    .thumbnail{
        margin-bottom: 0px;
    }
</style>

<div id="page-content">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Profile Edit
        <small>Modify Your Profile Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
    
   <section class="content">
      <div class="row">

    </div>
    <!-- /.row -->
    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('profile/profile/index'); ?>">
        <div class="col-lg-6 ">
            <div class="panel panel-default box box-primary">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            
                                <h3>Personal Information</h3>
                                
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input disabled  name="email" value="<?php echo $user_info['email']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input name="first_name" value="<?php echo $user_info['first_name']; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="last_name" value="<?php echo!empty($user_info['last_name']) ? $user_info['last_name'] : ''; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input name="middle_name" value="<?php echo!empty($user_info['middle_name']) ? $user_info['middle_name'] : ''; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="<?php echo!empty($user_info['gender']) ? $user_info['gender'] : ''; ?>">Male</option>
                                        <option value="<?php echo!empty($user_info['gender']) ? $user_info['gender'] : ''; ?>">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth<span class="error">*</span></label><span id='dateofbirth' class='error' for='dateofbirth'></span>
                                    <input name="dateofbirth" type="text" value="<?php echo $user_info['dateofbirth']; ?>" class="form-control pull-right" id="datepicker">                                  
                                </div>
                                <div class="form-group">
                                    <label>About Me<span class="error">*</span></label><span id='aboutme' class='error' for='aboutme'></span>
                                    <textarea  name="aboutme" class="form-control"><?php echo $user_info['aboutme']; ?></textarea>
                                </div>
<!--                                <div class="form-group">
                                    <label>Profession Type</label>
                                    <select disabled name="profession" class="form-control">

                                        <?php
//                                        if (is_array($profession)) {
//                                            foreach ($profession as $row) {
//                                                ?>
                                                <option //<?php //if ($row->id == $user_info['profession']) echo 'selected'; ?>  value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                            //<?php
//                                            }
//                                        }
                                        ?>
                                    </select>
                                </div>-->
<!--

                                <div class="form-group">
                                               <label>Password</label>
                                                                       <input name="password" class="form-control" disabled>
                                     <button class="btn btn-success">Change Your Password</button>
                                </div>
                                <div class="form-group">
                                    <label>Change Password</label>
                                    <input   name="password" type="password" value="" class="form-control">
                                </div>-->

                                <input type="submit" name="submit" class="btn btn-success" value="Update">

                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
            
        <div class="col-lg-6 ">
            <div class="panel panel-default box box-primary">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                           
                            <h3>Address</h3>                            
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address" value="<?php echo!empty($user_info['address']) ? $user_info['address'] : ''; ?>" class="form-control">
                            </div>                            
                            <div class="form-group">
                                <label>Country</label>
                                <select onchange="getComboA(this)" name="country" class="form-control">
                                    <?php
                                    if (is_array($countries)) {
                                        foreach ($countries as $country) {
                                            ?>
                                            <option <?php if ($country->id == $user_info['country']) echo 'selected'; ?> value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div id="result">
                                <div class="form-group">
                                    <label>State</label>
                                    <select name="state" class="form-control">
                                        <?php
                                        if (is_array($states)) {
                                            foreach ($states as $row) {
                                                ?>
                                                <option <?php if ($row->name == $user_info['state']) echo 'selected'; ?> value="<?php echo $row->name ?>"><?php echo $row->name ?> </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input name="city" value="<?php echo!empty($user_info['city']) ? $user_info['city'] : ''; ?>"  class="form-control">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="panel panel-default box box-success">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-10">
                                <h3 class="page-header">Update Your Profile <small>Picture Now</small></h3>
                            </div>
                            <div class="col-sm-6 col-md-5 thumbnail">
                                <?php
                                if($user_info['profilepicture'] == 0) {?>
                                    <img src="<?php echo base_url() . '/assets/user-demo.png'?>" alt="" class="img-responsive" />
                                <?php }
                                else {?>
                                    <div class="thumbnail">
                                        <img src="<?php echo base_url() . '/assets/file/' .$user_info['profilepicture']; ?>" alt=""  class="img-responsive" />
                                    </div>
                                <?php }
                                ?>
                            </div>    
                            <div class="form-group" id="profilepicture">
                                <label>Your Profile picture Format <small> jpg,gif,png format </small></label>
                                <input name="profilepicture" type="file">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
        </form>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.container-fluid -->
</div>
</div>

<script>

                                        function getComboA(sel) {
                                            var value = sel.value;
                                            var base_url = '<?php echo base_url() ?>';
                                            var da = {state: value};
                                            $.ajax({
                                                type: 'POST',
                                                url: base_url + "profile/profile/getStateByAjax",
                                                data: da,
                                                dataType: "text",
                                                success: function(resultData) {
                                                    $("#result").html(resultData);
                                                }
                                            });

                                        }

</script>

<script type="text/javascript">


jQuery(document).ready(function() {
    //Date picker
    $('#datepicker2').datepicker({
        autoclose: true
    });
    $('#datepicker').datepicker({
        autoclose: true
    });



    //Timepicker
    $(".timepicker").timepicker({
        showInputs: false
    });

    $(".timepickerend").timepicker({
        showInputs: false
    });



});



</script>
