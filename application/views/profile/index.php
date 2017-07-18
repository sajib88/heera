
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
        <div class="col-lg-6 ">
            <div class="panel panel-default box box-primary">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('profile/profile/index'); ?>">
                                <h3>Basic Information</h3>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input name="user_name" value="<?php echo $user_info['user_name']; ?>" disabled class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input disabled  name="email" value="<?php echo $user_info['email']; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Profession Type</label>
                                    <select disabled name="profession" class="form-control">

                                        <?php
                                        if (is_array($profession)) {
                                            foreach ($profession as $row) {
                                                ?>
                                                <option <?php if ($row->id == $user_info['profession']) echo 'selected'; ?>  value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <!--           <label>Password</label>
                                                                       <input name="password" class="form-control" disabled>-->
                                     <button class="btn btn-success">Change Your Password</button>
                                </div>
                                <div class="form-group">
                                    <label>Change Password</label>
                                    <input   name="password" type="password" value="" class="form-control">
                                </div>

                                <hr>
                                <h3>Profile Information</h3>


                                <div class="form-group">
                                    <label>First Name</label>
                                    <input name="first_name" value="<?php echo $user_info['first_name']; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="last_name" value="<?php echo!empty($user_info['last_name']) ? $user_info['last_name'] : ''; ?>" class="form-control">
                                </div>



                                <div class="form-group">
                                    <label>Professional Licensing Country</label>
                                    <input name="plc" value="<?php echo!empty($user_info['plc']) ? $user_info['plc'] : ''; ?>"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Professional Licensing State</label>
                                    <input name="pls" value="<?php echo!empty($user_info['pls']) ? $user_info['pls'] : ''; ?>"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>NPI</label>
                                    <input name="npi" value="<?php echo!empty($user_info['npi']) ? $user_info['npi'] : ''; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Professional License Number</label>
                                    <input name="pln" value="<?php echo!empty($user_info['pln']) ? $user_info['pln'] : ''; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
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

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" value="<?php echo!empty($user_info['phone']) ? $user_info['phone'] : ''; ?>"  class="form-control">
                                </div>



                                <input type="submit" name="submit" class="btn btn-success" value="Update">

                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>


        <div class="col-lg-6">
            

            <div class="panel panel-default box box-success">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-10">
                                <h3 class="page-header">Update Your Profile <small>Picture Now</small></h3>
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


<script>

                                        function getComboA(sel) {
                                            var value = sel.value;
                                            var base_url = '<?php echo base_url() ?>';
                                            var da = {state: value};
                                            $.ajax({
                                                type: 'POST',
                                                url: base_url + "public_web/publicweb/getStateByAjax",
                                                data: da,
                                                dataType: "text",
                                                success: function(resultData) {
                                                    $("#result").html(resultData);
                                                }
                                            });

                                        }

</script>
