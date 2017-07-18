<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Private Website
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-shield"></i> Private website</a></li>
        <li><a href="#">Preview</a></li>

      </ol>
</section>
<?php //print_r($states); ?>
   <section class="content">

    <div class="row">
        <div class="col-lg-8">
          <div class="box box-info">
                            <div class="box-header">
                              <h3 class="box-title">Edit &amp;Private Website</h3>
                            </div>
            <div class="box-body">


              <form role="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url('private_web/Privateweb/edit'); ?>">

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
                  <?php

                  if (is_array($files) && !empty($files[1])) { ?>
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

                      <?php
                      if (is_array($audio) && !empty($audio[0])) { ?>
                          <a href="<?php echo base_url() . '/assets/file/' . $audio[0]->name ?>"><?php echo!empty($audio[0]->name) ? $audio[0]->name : '' ?></a>
                      <?php }
                      ?>
                  </div>
                  <div class="form-group">
                      <label>Video</label>

                      <input name="video" type="file">

                      <?php


                      if (is_array($video) && !empty($video[0])) { ?>
                          <a href="<?php echo base_url() . '/assets/file/' . $video[0]->name ?>"><?php echo!empty($video[0]->name) ? $video[0]->name : '' ?></a>
                      <?php }
                      ?>
                  </div>


                                <input type="submit" name="submit" class="btn btn-block btn-success" value="Update">

              <!-- /.form group -->


            </div>
            <!-- /.box-body -->
          </div>


                        </div>
                        <div class="col-md-4">
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

        <!-- /.col-lg-12 -->
                        </div>
       </form>
                </div>
            </section>
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
