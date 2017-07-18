
    <div class="content-wrapper">

    <section class="content-header">
        <h1>
            Edit Classified
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Classified</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content">
    <div class="row">
        <div class="col-lg-7">
            <div class="box box-primary">
                <div class="panel-body">

                                <form role="form" method="post" id="classifiedform" enctype="multipart/form-data" action="<?php echo base_url('classifieds/classifieds/edit/'. $editclassified['id']); ?>">
                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Title<span class="error">*</span></label><span id='title-error' class='error' for='title'></span>
                                            <input name="title" value="<?php echo $editclassified['title']; ?>"  class="form-control">
                                        </div>
                                    </div>
                              
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Main Category <span class="error">*</span></label><span id='main_category-error' class='error' for='main_category'></span>
                                            <select onchange="getSubCat(this)" name="main_category" class="form-control">
                                                <option value="">Select</option>
                                                <?php
                                                if (is_array($main_cat)) {
                                                    foreach ($main_cat as $maincat) {
                                                        ?>
                                                        <option <?php if ($maincat->id == $editclassified['main_cat']) echo 'selected'; ?> value="<?php echo $maincat->id; ?>"><?php echo $maincat->name; ?></option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Description<span class="error">*</span></label><span id='description-error' class='error' for='description'></span>
                                            <textarea  name="description" class="form-control"><?php echo $editclassified['description']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Price<span class="error">*</span></label><span id='price-error' class='error' for='price'></span>
                                            <input type="number" name="price" value="<?php echo $editclassified['price']; ?>"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Country<span class="error">*</span></label>
                                            <select onchange="getComboA(this)" name="country" id="js_country" class="form-control">
                                                <option value="">Select</option>
                                                <?php
                                                if (is_array($countries)) {
                                                    foreach ($countries as $country) {
                                                        $v = (set_value('country')!='')?set_value('country'):$personaldata['country'];
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
                                    </div>

                                    <div class="col-lg-12">
                                        <div id="result">
                                            <label>State<span class="error"></span></label>
                                            <select name="state"  class="form-control">
                                                <option value="">Select state</option>
                                                <?php
                                                if (is_array($states) and (!empty($states))) {
                                                    foreach ($states as $row) {
                                                        $v = (set_value('state')!='')?set_value('state'):$personaldata['state'];
                                                        $sel = ($v == $row->name)?'selected="selected"':'';
                                                        ?>
                                                        <option  value="<?php echo $row->name; ?>" <?php echo $sel;?>><?php echo $row->name; ?></option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>






                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input name="city" value="<?php echo $editclassified['city']; ?>"   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Postal</label>
                                            <input name="postal" value="<?php echo $editclassified['postal']; ?>"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Address 1</label>
                                            <input name="address_1"  value="<?php echo $editclassified['address_1']; ?>"   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <input name="address_2"  value="<?php echo $editclassified['address_2']; ?>"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input readonly name="name" value="<?php echo $editclassified['name']; ?>" value="<?php echo $user_info['first_name']; ?>" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input readonly name="email" value="<?php echo $editclassified['email']; ?>" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input name="phone" name="phone" value="<?php echo $editclassified['phone']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Fax</label>
                                            <input name="fax" value="<?php echo $editclassified['fax']; ?>"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Web site </label>
                                            <input name="website"  value="<?php echo $editclassified['website']; ?>"  class="form-control">
                                        </div>
                                    </div>




                                        <div class="col-lg-12">

                                            <div class="form-group" id="photo_id">
                                                <label>Picture One<span class="error">*</span></label><span id='picture1-error' class='error' for='picture1'></span>
                                                <input class="btn btn-default" name="photo_primary" type="file">
                                                <small class="label bg-green"> JPG, GIF, PNG Format allow</small>
                                            </div>



                                            <?php if (!empty($editclassified['photo_primary'])) { ?>
                                                <div class="col-lg-6 pull-right">
                                                    <img src="<?php echo base_url() . '/assets/file/' .$editclassified['photo_primary']; ?>" alt="" width="100" class="img-circle img-responsive" />
                                                </div>
                                            <?php }
                                            ?>

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                                                <input class="btn btn-default" name="photo_2" type="file">
                                                <small class="label bg-green"> JPG, GIF, PNG Format allow</small>
                                                <?php if (!empty($editclassified['photo_2'])) { ?>
                                                    <div class="col-lg-6 pull-right">
                                                        <img src="<?php echo base_url() . '/assets/file/' .$editclassified['photo_2']; ?>" alt="" width="100" class="img-circle img-responsive" />
                                                    </div>
                                                <?php }
                                                ?>
                                        </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Picture Three</label><span id='picture3-error' class='error' for='picture3'></span>
                                                <input class="btn btn-default" name="photo_3" type="file">
                                                <small class="label bg-green"> JPG, GIF, PNG Format allow</small>
                                                <?php if (!empty($editclassified['photo_3'])) { ?>
                                                    <a href="<?php echo base_url() . '/assets/file/' . $editclassified['photo_3'] ?>"><?php echo!empty($editclassified['photo_3']) ? $editclassified['photo_3'] : '' ?></a>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Picture Four</label><span id='picture3-error' class='error' for='picture3'></span>
                                            <input class="btn btn-default" name="photo_4" type="file">
                                            <small class="label bg-green"> JPG, GIF, PNG Format allow</small>
                                            <?php if (!empty($editclassified['photo_4'])) { ?>
                                                <a href="<?php echo base_url() . '/assets/file/' . $editclassified['photo_4'] ?>"><?php echo!empty($editclassified['photo_4']) ? $editclassified['photo_4'] : '' ?></a>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>




                                        <div class="col-lg-12">
                                            <div class="form-group" id="file_id">
                                                <label>File One<span class="error">*</span></label><span id='file1-error' class='error' for='file1'></span>
                                                <input class="btn btn-default" name="primary_file" type="file">
                                                <small class="label bg-green"> DOCX,XLS,PDF, TXT, EXCEL Format allow</small>
                                                <?php if (!empty($editclassified['primary_file'])) { ?>
                                                    <a href="<?php echo base_url() . '/assets/file/' . $editclassified['primary_file'] ?>"><?php echo!empty($editclassified['primary_file']) ? $editclassified['primary_file'] : '' ?></a>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="file_id">
                                                <label>File Two</label><span id='file2-error' class='error' for='file2'></span>
                                                <input class="btn btn-default" name="file_2" type="file">
                                                <small class="label bg-green"> DOCX,XLS,PDF, TXT, EXCEL Format allow</small>
                                                <?php if (!empty($editclassified['file_2'])) { ?>
                                                    <a href="<?php echo base_url() . '/assets/file/' . $editclassified['file_2'] ?>"><?php echo!empty($editclassified['file_2']) ? $editclassified['file_2'] : '' ?></a>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>




                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Audio</label><span id='audio-error' class='error' for='audio'></span>
                                                <input class="btn btn-default" name="primary_sound" type="file">
                                                <small class="label bg-green"> MP3, OGG Format allow</small>
                                                <?php if (!empty($editclassified['primary_sound'])) { ?>
                                                    <a href="<?php echo base_url() . '/assets/file/' . $editclassified['primary_sound'] ?>"><?php echo!empty($editclassified['primary_sound']) ? $editclassified['primary_sound'] : '' ?></a>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>


                                    <div class="col-lg-12">

                                            <div class="form-group">
                                                <label>Videos</label><span id='videos-error' class='error' for='videos'></span>
                                                <input class="btn btn-default" name="primary_video" type="file">
                                                <small class="label bg-green"> MP4, WMV Format allow</small>
                                                <?php if (!empty($editclassified['primary_video'])) { ?>
                                                    <a href="<?php echo base_url() . '/assets/file/' . $editclassified['primary_video'] ?>"><?php echo!empty($editclassified['primary_video']) ? $editclassified['primary_video'] : '' ?></a>
                                                <?php }
                                                ?>
                                            </div>


                                    </div>

                                    <div class="col-lg-12">
                                        </br> </br>
                                        <input type="submit" name="submit" class="btn btn-info" value="Save">
                                        <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                    </div>


                                </form>
                    </div>
            <!-- /.row (nested) -->
            </div>
    <!-- /.panel-body -->
         </div>

        <div class="col-md-5 col-sm-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bullhorn"></i>

                    <h3 class="box-title">Classified Help</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="callout callout-success">


                        <p>
                        <ul>
                            <li><b>Exclusive </b> — viewed by doctors, posted by doctors</li>

                            <li><b>Targeted </b>— you can target your own or other professions </li>

                            <li><b>Secure—only </b>viewed by verified and interested individuals </li>

                            <li><b>Responsive</b>—get instant response from interested, well-off buyers</li>

                            <li><b>Multimedia</b>—you can attach videos, sound clips, photos, and audio</li>

                            <li><b>Fast—post </b>your ad with ForAllDoctors.com and be seen instantly</li>

                            <li><b>Free—you </b>can post and view classified absolutely free</li>
                        </ul>
                        </p>
                    </div>
                    <div class="callout callout-info">
                        <h4>More Help </h4>

                        <p>Contact Us : <b> info@foralldoctors.com</b> </p>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    <!-- /.panel -->
    </section>
    </div>





    <!-- /.col-lg-12 -->






    <script type="application/javascript">
        $('#classifiedform').validate({
            rules: {
                name: {
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

                type:{
                    required:true
                },
                country:{
                    required:true
                },
                price:{
                    required:true,
                    number: true
                },
                special_price:{
                    required:true,
                    number: true
                },
                city:{
                    required:true

                },


                'photo_primary': {

                    extension: "png,jpg,jpeg,gif,bmp"
                },
                'photo_2': {

                    extension: "png,jpg,jpeg,gif,bmp"
                },
                'photo_3': {

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
                name: {
                    required: "Product Name is Required",},

                description: {
                    required: "Description is Required",},

                category: {
                    required: "Classified Category is Required",},

                type: {
                    required: "Type  is Required",
                },

                country: {
                    required: "Product Country is Required",
                },
                price: {
                    required: "Price is Required, 0-9 Number digit only allow",
                },
                city: {
                    required: "City is Required",
                },


                special_price: {
                    required: "Special Price is Required, 0-9 Number digit only allow",
                },
                'photo_primary':{
                    required : "<p class='text-danger'>Please upload atleast 1 photo</p>",
                    extension:"Only Image Format  file is allowed!"
                },
                'photo_2':{

                    extension:"Only Image Format  file is allowed!"
                },
                'photo_3':{

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




