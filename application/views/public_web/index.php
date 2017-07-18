<div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Public Website
        <small>Create Your Public Website</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Public website</a></li>
        <li class="active">Create</li>
      </ol>
    </section>
    
    <section class="content">
   
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" id="website" enctype="multipart/form-data" action="<?php echo base_url('public_web/Publicweb/index'); ?>">
                                <div class="form-group">
                                    <label>Appointment</label>
                                    <select name="appointment" class="form-control" id="appointment" >
                                        <option value="">Please Select Appointment</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div id="set_date_time" style="display: none">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Appointment Start Date<span class="error">*</span></label><span id='start_date' class='error' for='start_date'></span>
                                        <input name="start_date" type="text" class="form-control pull-right" id="datepicker">
                                    </div>
                                </div>

                                <div class="col-lg-6 bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Start Appointment Time :</label>

                                        <div class="input-group">
                                            <input name="start_time" type="text" class="form-control timepicker">

                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Appointment End Date<span class="error">*</span></label><span id='end_date' class='error' for='start_date'></span>
                                        <input name="end_date" type="text" class="form-control pull-right" id="datepicker2">
                                    </div>
                                </div>

                                <div class="col-lg-6 bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>End Appointment  Time:</label>

                                        <div class="input-group">
                                            <input name="end_time" type="text" class="form-control timepickerend">

                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                </div>

                                <div class="form-group">
                                    <label>Profession</label>
                                    <select name="profession" class="form-control" id="profession">
                                        <option value="">Select Profession</option>
                                        <?php
                                        if (!empty($profession)) {
                                            foreach ($profession as $row) {
                                                ?>
                                                <option  value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label>Public Website Title</label>
                                    <input name="title" value="<?php echo set_value('title'); ?>"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Choose Public Website URL</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input disabled name="url" value="<?php echo base_url(); ?>"  class="form-control">
                                        </div>
                                        <div class="col-lg-4">
                                            <input name="url_name" value="<?php echo $user_info['user_name']; ?>"  class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea  name="description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input readonly name="first_name" value="<?php echo $user_info['first_name']; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input readonly name="last_name" value="<?php echo!empty($user_info['last_name']) ? $user_info['last_name'] : ''; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Country<span class="error">*</span></label>
                                    <select onchange="getComboA(this)" name="country" id="js_country" class="form-control">
                                        <option value="">Select</option>
                                        <?php
                                        if (is_array($countries)) {
                                            foreach ($countries as $country) {
                                                $sel = ($country->id == set_value('country'))?'selected="selected"':'';
                                                ?>
                                                <option  value="<?php echo $country->id; ?>" <?php echo $sel;?> ><?php echo $country->name; ?></option>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('country');?>
                                </div>

                                <div id="result">
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <input   name="city" value="<?php echo ''; ?>"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address 1</label>
                                    <input name="address_1" value="<?php echo set_value('address_1'); ?>"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Address 2</label>
                                    <input name="address_2" value="<?php echo set_value('address_2'); ?>"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Zip/postal</label>
                                    <input name="postal" value="<?php echo set_value('postal'); ?>"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label> Business Name </label>
                                    <input name="business_name" value="<?php echo set_value('business_name'); ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label> Business Web site </label>
                                    <input name="business_website" value="<?php echo set_value('business_website'); ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Business Email</label>
                                    <input name="business_email" value="<?php echo set_value('business_email'); ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Business Telephone</label>
                                    <input name="business_telephone" value="<?php echo set_value('business_telephone'); ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Business Fax</label>
                                    <input name="business_fax" value="<?php echo set_value('business_fax'); ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Specialty</label>
                                    <input name="specialty" value="<?php echo set_value('specialty'); ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Special Interest</label>
                                    <input name="special_interest" value="<?php echo set_value('special_interest'); ?>" class="form-control">
                                </div>

                                <div class="form-group" id="photo_id">
                                    <label>Photo</label>
                                    <small class="label label-danger"><i class="fa fa-star-o"></i> Must be Upload 1 Image </small>
                                    <input name="photo1" type="file" required>
                                    <small class="label bg-green"> JPG, GIF, PNG Format allow</small>
                                </div>

                                <div class="form-group" id="photo_id">
                                    <label>Photo 2</label>
                                    <input name="photo2" type="file">
                                    <small class="label bg-green"> JPG, GIF, PNG Format allow</small>

                                </div>





                                <div class="form-group" id="file_id">
                                    <label>Files</label>
                                    <input name="file1" type="file" >
                                    <small class="label bg-green"> DOCX,XLS,PDF, TXT, EXCEL Format allow</small>
                                </div>

                                <div class="form-group" id="file_id">
                                    <label>Files</label>
                                    <input name="file2" type="file">
                                    <small class="label bg-green"> DOCX,XLS,PDF, TXT, EXCEL Format allow</small>
                                </div>


                                <div class="form-group">
                                    <label>Audio</label>
                                    <input name="audio" type="file">
                                    <small class="label bg-green"> MP3, OGG Format allow</small>
                                </div>

                                <div class="form-group">
                                    <label>Video</label>
                                    <input name="video" type="file">
                                    <small class="label bg-green"> MP4, WMV Format allow</small>
                                </div>
                                <input type="submit" name="submit" class="btn btn-success" value="Save">
                            </form>
                        </div>




                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

        <!-- /.row (nested) -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bullhorn"></i>

                    <h3 class="box-title">Public Website  Help</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Appointment Settings</span>
                            <span class="info-box-number">Public Website Appointment </span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                  <span class="progress-description">
                   Setup Your Appointment Public Contact You Directly
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>

                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Store Settings</span>
                            <span class="info-box-number">Public Website Store </span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                              <span class="progress-description">
                               Setup Your Online Store Public Contact You Directly
                              </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>



                    <div class="callout callout-info">
                        <h4>More Help </h4>

                        <p>Contact Us : <b> info@foralldoctors.com</b> </p>
                    </div>

                </div>


                <!-- /.box-body -->
            </div>
        </div>


        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Profile Information</h3>
                </div>


                <div class="box-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>First Name</label>
                            <input  readonly   name="first_name" value="<?php echo $user_info['first_name']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input readonly name="last_name" value="<?php echo!empty($user_info['last_name']) ? $user_info['last_name'] : ''; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <?php
                            $data = get_data('countries', array('id' => $user_info['country']));
                            ?>
                            <input name="" disabled value="<?php echo $data['name']; ?>"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>state</label>
                            <input name="" disabled value="<?php echo $user_info['state']; ?>"  class="form-control">
                        </div>

                        <div class="form-group">
                            <input name="" type="hidden"  value="<?php echo $data['name']; ?>"  class="form-control">
                        </div>





                    </div>

                </div>



            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.container-fluid -->
    </section>
</div>

<script>
    jQuery(document).ready(function() {
        $('#photo').click(function() {
            $("#photo_id").append('<input name="photo2" type="file">');
        });

        $('#file').click(function() {
            $("#file_id").append('<input name="file2" type="file">');
        });
    });

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

<script type="application/javascript">
    $('#website').validate({
        rules: {
            appointment: {
                required:true
            },
            profession: {
                required:true
            },
            title: {
                required:true
            },
            main_category:{
                required:true
            },
            description:{
                required:true
            },

            business_name:{
                required:true
            },

            business_email:{
                required:true
            },
            country:{
                required:true
            },
            prof:{
                required:true
            },

            'photo1': {
                required: true,
                extension: "png,jpg,jpeg,gif,bmp"
            },
            'photo2': {

                extension: "png,jpg,jpeg,gif,bmp"
            },
            'photo3': {

                extension: "png,jpg,jpeg,gif,bmp"
            },
            'primary_file': {

                extension: "jpg,png,bmp,gif,pdf,tif,tiff,txt,csv,doc,docx,xls,xlsx,xlt,pps,ppt,pptx,ods"
            },

            'primary_sound': {

                extension: "mp3,aac,ogg,wma"
            },
            'primary_video': {

                extension: "mp4,avi,mov"
            }


        },
        messages:{
            appointment: {
                required: "Set Appointment Yes / No ",},

            profession: {
                required: "Select any profession ",},

            title: {
                required: "Title is Required",},

            description: {
                required: "Description is Required",},

            business_name: {
                required: "Business_name  is Required",},

            business_email: {
                required: "Business Email is Required",
            },

            country: {
                required: "Public Website Country is Required",
            },
            prof: {
                required: "prof is Required",
            },
            'photo1':{
                required : "<p class='text-danger'>Please upload atleast 1 photo</p>",
                extension:"Only Image Format  file is allowed!"
            },
            'photo2':{

                extension:"Only Image Format  file is allowed!"
            },
            'photo3':{

                extension:"Only Image Format  file is allowed!"
            },

            'primary_file':{
                extension:"Only File Format  file is allowed!"
            },
            'primary_sound':{
                extension:"Only Sound/Audio Format  file is allowed!"
            },
            'primary_video':{
                extension:"Only Video Format  file is allowed!"
            }

        }
    });

    jQuery(document).ready(function () {

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


        //show hide time picker
        $('#appointment').on('change',function(){
            //alert($(this).val());
            if( $(this).val()== 1){
                $("#set_date_time").show('slow');
            }
            else{
                $("#set_date_time").hide('slow');
            }
        });

    });


</script>

<link rel="stylesheet" href="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.css">