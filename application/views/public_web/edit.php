<div class="content-wrapper">
<section class="content-header">
    <h1>
        Public Website
        <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Public website</a></li>
        <li class="active">Edit</li>
    </ol>
</section>


     <section class="content">

         <div class="row">
             <div class="col-lg-6">
                 <div class="box box-info">

                     <div class="box-body">


                         <form  id="website" role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('public_web/publicweb/edit'); ?>" >
                             <div class="form-group">
                                 <label>Your Public Website URL</label>
                                 <input  disabled value="<?php echo!empty($user_info['user_name']) ? $user_info['user_name'] : ''; ?>"  class="form-control">
                             </div>
                             <div class="form-group">
                                 <label>Your Appointment</label>
                                 <select  name="appointment" class="form-control" id="appointment">
                                     <option <?php if ($website_info['appointment'] == '1') echo 'selected'; ?> value="1">Yes</option>
                                     <option <?php if ($website_info['appointment'] == '0') echo 'selected'; ?> value="0">No</option>
                                 </select>
                             </div>

                             <div id="set_date_time" style="display: none">

                                 <div class="col-lg-6">
                                     <div class="form-group">
                                         <label>Appointment Start Date<span class="error">*</span></label><span id='start_date' class='error' for='start_date'></span>
                                         <input name="start_date" type="text" class="form-control pull-right" id="datepicker" value="<?php echo !empty($website_info['start_date']) ? $website_info['start_date'] : ''; ?>" >
                                     </div>
                                 </div>

                                 <div class="col-lg-6 bootstrap-timepicker">
                                     <div class="form-group">
                                         <label>Start Appointment Time :</label>

                                         <div class="input-group">
                                             <input name="start_time" type="text" class="form-control timepicker" value="<?php echo !empty($website_info['start_time']) ? $website_info['start_time'] : ''; ?>" >

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
                                         <input name="end_date" type="text" class="form-control pull-right" id="datepicker2" value="<?php echo !empty($website_info['end_date']) ? $website_info['end_date'] : ''; ?>" >
                                     </div>
                                 </div>

                                 <div class="col-lg-6 bootstrap-timepicker">
                                     <div class="form-group">
                                         <label>End Appointment  Time:</label>

                                         <div class="input-group">
                                             <input name="end_time" type="text" class="form-control timepickerend" value="<?php echo !empty($website_info['end_time']) ? $website_info['end_time'] : ''; ?>" >

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
                                             $v = (set_value('profession')!='')?set_value('profession'):$website_info['profession'];
                                             $sel = ($v == $row->id)?'selected="selected"':'';
                                             ?>
                                             <option value="<?php echo $row->id; ?>" <?php echo $sel;?>><?php echo $row->name; ?></option>
                                             <?php
                                         }
                                     }
                                     ?>
                                 </select>
                             </div>

                             <div class="form-group">
                                 <label>Title</label>
                                 <input name="title" value="<?php echo!empty($website_info['title']) ? $website_info['title'] : ''; ?>"  class="form-control">
                             </div>

                             <div class="form-group">
                                 <label>Description</label>
                                 <textarea  name="description" value="" class="form-control"><?php echo!empty($website_info['description']) ? $website_info['description'] : ''; ?></textarea>
                             </div>

                             <div class="form-group">
                                 <label>Country<span class="error">*</span></label>
                                 <select onchange="getComboA(this)" name="country" id="js_country" class="form-control">
                                     <option value="">Select</option>
                                     <?php
                                     if (is_array($countries)) {
                                         foreach ($countries as $country) {
                                             $v = (set_value('country')!='')?set_value('country'):$website_info['country'];
                                             $sel = ($v == $country->id)?'selected="selected"':'';
                                             ?>
                                             <option  value="<?php echo $country->id; ?>" <?php echo $sel;?>><?php echo $country->name; ?></option>
                                         <?php
                                         }
                                     }
                                     ?>
                                 </select>
                                 <?php echo form_error('country');?>
                             </div>



                             <div id="result">
                                 <label>State<span class="error"></span></label>
                                 <select name="state"  class="form-control">
                                     <option value="">Select state</option>
                                     <?php
                                     if (is_array($states) and (!empty($states))) {
                                         foreach ($states as $row) {
                                             $v = (set_value('state')!='')?set_value('state'):$website_info['state'];
                                             $sel = ($v == $row->name)?'selected="selected"':'';
                                             ?>
                                             <option  value="<?php echo $row->name; ?>" <?php echo $sel;?>><?php echo $row->name; ?></option>
                                         <?php
                                         }
                                     }
                                     ?>
                                 </select>
                             </div>

                             <div class="form-group">
                                 <label>City</label>
                                 <input name="city" type="text" placeholder="City" value="<?php echo!empty($website_info['city']) ? $website_info['city'] : ''; ?>" class="form-control">
                             </div>

                             <div class="form-group">
                                 <label>Address 1</label>
                                 <input name="address_1" value="<?php echo!empty($website_info['address_1']) ? $website_info['address_1'] : ''; ?>"  class="form-control">
                             </div>

                             <div class="form-group">
                                 <label>Address 2</label>
                                 <input name="address_2" value="<?php echo!empty($website_info['address_2']) ? $website_info['address_2'] : ''; ?>"  class="form-control">
                             </div>

                             <div class="form-group">
                                 <label>Zip/postal</label>
                                 <input name="postal" value="<?php
                                 echo!empty($website_info['postal']) ? $website_info['postal'] : '';
                                 ?>"  class="form-control">
                             </div>

                             <div class="form-group">
                                 <label> Business Name </label>
                                 <input name="business_name" value="<?php
                                 echo!empty($website_info['business_name']) ? $website_info['business_name'] : '';
                                 ?>" class="form-control">
                             </div>

                             <div class="form-group">
                                 <label> Business Web site </label>
                                 <input name="business_website" value="<?php echo!empty($website_info['business_website']) ? $website_info['business_website'] : ''; ?>" class="form-control">
                             </div>

                             <div class="form-group">
                                 <label>Business Email</label>
                                 <input name="business_email" value="<?php echo!empty($website_info['business_email']) ? $website_info['business_email'] : ''; ?>" class="form-control">
                             </div>

                             <div class="form-group">
                                 <label>Business Telephone</label>
                                 <input name="business_telephone" value="<?php
                                 echo!empty($website_info['business_telephone']) ? $website_info['business_telephone'] : '';
                                 ?>" class="form-control">
                             </div>

                             <div class="form-group">
                                 <label>Business Fax</label>
                                 <input name="business_fax" value="<?php
                                 echo!empty($website_info['business_fax']) ? $website_info['business_fax'] : '';
                                 ?>" class="form-control">
                             </div>

                             <div class="form-group">
                                 <label>Specialty</label>
                                 <input name="specialty" value="<?php echo!empty($website_info['specialty']) ? $website_info['specialty'] : ''; ?>" class="form-control">
                             </div>

                             <div class="form-group">
                                 <label>Special Interest</label>
                                 <input name="special_interest" value="<?php echo!empty($website_info['special_interest']) ? $website_info['special_interest'] : ''; ?>" class="form-control">
                             </div>


                             <div class="form-group" id="photo_id">
                                 <label>Photos</label>
                             </div>

                             <div class="form-group" id="photo_id">
                                 <?php if (is_array($photos) && !empty($photos[0])) { ?>
                                     <img src="<?php echo base_url() . '/assets/file/' . $photos[0]->name ?>" width="100px;">
                                 <?php }
                                 ?>
                                 <input name="photo1" type="file">
                             </div>
                             <div class="form-group" id="photo_id">
                                 <?php if (is_array($photos) && !empty($photos[1])) { ?>
                                     <img src="<?php echo base_url() . '/assets/file/' . $photos[1]->name ?>" width="100px;">
                                 <?php }
                                 ?>
                                 <input name="photo2" type="file">
                             </div>
                             <!--<a href="javascript:void(0)" id="photo">Add More</a>-->

                             <div class="form-group" id="photo_id">
                                 <label>Files</label>
                             </div>

                             <?php if (is_array($files) && !empty($files[0])) { ?>
                                 <a href="<?php echo base_url() . '/assets/file/' . $files[0]->name ?>"><?php echo!empty($files[0]->name) ? $files[0]->name : '' ?></a>
                             <?php }
                             ?>

                             <div class="form-group" id="file_id">
                                 <input name="file1" type="file">
                             </div>
                             <?php if (is_array($files) && !empty($files[1])) { ?>
                                 <a href="<?php echo base_url() . '/assets/file/' . $files[0]->name ?>"><?php echo!empty($files[1]->name) ? $files[1]->name : '' ?></a>
                             <?php }
                             ?>
                             <div class="form-group" id="file_id">
                                 <input name="file2" type="file">
                             </div>

                             <!--<a href="javascript:void(0)" id="file">Add More</a>-->
                             <div class="form-group">
                                 <label>Audio</label>

                                 <input name="audio" type="file">
                             </div>
                             <div class="form-group">
                                 <label>Video</label>
                                 <input name="video" type="file">
                             </div>

                             <input type="submit" name="submit" class="btn btn-success" value="Update">
                         </form>



                     </div>

                 </div>

             </div>
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

         </div>


     </section>
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

     <script type="application/javascript">
         $('#website').validate({
             rules: {
                 appointment: {
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
             
             <?php if ($website_info['appointment'] == '1'){?>
             $("#set_date_time").show('slow');
             <?php }else{ ?>
                $("#set_date_time").hide('slow');
             <?php }?>


             //show hide time picker
             $('#appointment').on('change',function(){
                 var val =  jQuery('#appointment').val();
                 //alert(val);
                 if( val== 1){
                     $("#set_date_time").show('slow');
                 }
                 else{
                     $("#set_date_time").hide('slow');                     
                 }
             });

         });


     </script>
<link rel="stylesheet" href="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.css">