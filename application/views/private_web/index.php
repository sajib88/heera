
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Private Website
        <small>Create</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Private website</a></li>
        <li class="active">Create</li>
      </ol>
    </section>
    
   <section class="content">
       <!-- /.row -->


       <div class="row">
          <div class="col-lg-6">
                <div class="panel-body box box-primary">
                            <form role="form" id="website" method="post" enctype="multipart/form-data" action="<?php echo base_url('private_web/Privateweb/index'); ?>">


                                <div class="form-group">
                                    <label>Title</label>
                                    <small class="label label-danger"><i class="fa fa-star-o"></i> Title is  Required </small>
                                    <input name="title" value="<?php echo ''; ?>"  class="form-control" required>
                                </div>



                                <div class="form-group">
                                    <label>Description</label>
                                    <small class="label label-danger"><i class="fa fa-star-o"></i> Description is  Required </small>
                                    <textarea  name="description" class="form-control" required></textarea>
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
                                    <small class="label label-danger"><i class="fa fa-star-o"></i> Address is  Required </small>
                                    <input name="address_1" value="<?php echo ''; ?>"  class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Address 2</label>
                                    <input name="address_2" value="<?php echo ''; ?>"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Zip/postal</label>
                                    <input name="postal" value="<?php echo ''; ?>"  class="form-control" required>
                                </div>

                                
                                <div class="form-group">
                                    <label> Business Name </label>
                                    <input name="business_name" value="<?php echo ''; ?>" class="form-control required">
                                </div>

                                <div class="form-group">
                                    <label> Business Web site </label>
                                    <input name="business_website" value="<?php echo ''; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Business Email</label>
                                    <input name="business_email" value="<?php echo ''; ?>" class="form-control required">
                                </div>

                                <div class="form-group">
                                    <label>Business Telephone</label>
                                    <input name="business_telephone" value="<?php echo ''; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Business Fax</label>
                                    <input name="business_fax" value="<?php echo ''; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Specialty</label>
                                    <input name="specialty" value="<?php echo ''; ?>" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Special Interest</label>
                                    <input name="special_interest" value="<?php echo ''; ?>" class="form-control">
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
                                <input type="submit" name="submit" class="btn btn-block btn-primary" value="Save">

                        </div>

                    </div>

                    <!-- /.row (nested) -->
          <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="box box-primary">
                  <div class="box-header with-border">
                      <i class="fa fa-bullhorn"></i>

                      <h3 class="box-title">Private Website  Help</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <div class="callout bg-purple-active">

                          <h4>FREE PROFESSIONAL PROFILE FOR ALL DOCTORS</h4>
                          <p> Link With all doctors and specialist doctors, lawyers and PhD professionals worldwide with your FREE Professional Profile.
                          </p>
                          <p></p>
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




          <!-- /.panel-body -->
            </div>
       </form>
            <!-- /.panel -->


</section>

 <!-- /.col-lg-12 -->
    </div>
    <!-- /.container-fluid -->


<script>



    function getSubCat(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {state: value};
        $.ajax({
            type: 'POST',
            url: base_url + "classifieds/classifieds/getSubCatByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#subcat").html(resultData);
            }
        });

    }

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
            title: {
                required:true
            },
            main_category:{
                required:true
            },
            description:{
                required:true
            },

            category:{
                required:true
            },

            seats_no:{
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
            title: {
                required: "Title is Required",},

            description: {
                required: "Description is Required",},

            category: {
                required: "Classified Category is Required",},

            seats_no: {
                required: "Seats no is Required, Number digit provide",
            },

            country: {
                required: "Classified Country is Required",
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


</script>