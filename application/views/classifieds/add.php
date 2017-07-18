
    <div class="content-wrapper">

    <section class="content-header">
        <h1>
            Classified
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Classified</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <section class="content">
    <div class="row">
        <div class="col-lg-7">
            <div class="box box-primary">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" id="classifiedform" enctype="multipart/form-data" action="<?php echo base_url('classifieds/classifieds/add'); ?>">
                                <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Title<span class="error">*</span></label><span id='title-error' class='error' for='title'></span>
                                        <input name="title" value="<?php echo ''; ?>"  class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Main Category <span class="error">*</span></label><span id='main_category-error' class='error' for='main_category'></span>
                                        <select onchange="getSubCat(this)" name="main_category" class="form-control">
                                        <option value="">Select</option>
                                            <?php
                                            if (is_array($main_cat)) {
                                                foreach ($main_cat as $country) {
                                                    ?>
                                                    <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
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
                                        <textarea  name="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Price<span class="error">*</span></label><span id='price-error' class='error' for='price'></span>
                                        <input type="number" name="price"  class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select onchange="getComboA(this)" name="country" class="form-control">
                                            <option value="">Select</option>
                                            <?php
                                            if (is_array($countries)) {
                                                foreach ($countries as $country) {
                                                    ?>
                                                    <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div id="result">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input name="city" value="<?php echo ''; ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Postal</label>
                                        <input name="postal" value="<?php echo ''; ?>"  class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Address 1</label>
                                        <input name="address_1" value="<?php echo ''; ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Address 2</label>
                                        <input name="address_2" value="<?php echo ''; ?>"  class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" value="<?php echo $user_info['first_name']; ?>" class="form-control" readonly >
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" value="<?php echo $user_info['email']; ?>" class="form-control" readonly >
                                    </div>
                                 </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input name="phone" name="phone" value="<?php echo ''; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Fax</label>
                                        <input name="fax" value="<?php echo ''; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Web site </label>
                                        <input name="website" value="<?php echo ''; ?>" class="form-control">
                                    </div>
                                </div>



<!--                                <div class="col-lg-12">-->
<!--                                    <div class="form-group">-->
<!--                                        <label>Who can view this Classified?</label>-->
<!--                                        <select multiple name="classified[]" class="selectpicker form-control" id="prof">-->
<!--                                            <option value="">All Profession</option>-->
<!--                                            --><?php
//                                            if (is_array($profession)) {
//                                                foreach ($profession as $row) {
//                                                    ?>
<!--                                                    <option  value="--><?php //echo $row->id; ?><!--">--><?php //echo $row->name; ?><!--</option>-->
<!--                                                --><?php
//                                                }
//                                            }
//                                            ?>
<!--                                        </select>-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->

                                    <div class="col-lg-12">
                                        <div class="form-group" id="photo_id">

                                            <label>Picture One<span class="error">*</span></label><span id='Picture-error' class='error' for='Picture'></span>
                                            <input class="btn btn-default" id='primary_photo' name="photo_primary" onchange="validateImage()" type="file">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                                            <input class="btn btn-default" name="photo_2" onchange="validateImage()" type="file">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Picture Three</label><span id='picture3-error' class='error' for='picture3'></span>
                                            <input class="btn btn-default" name="photo_3" onchange="validateImage()" type="file">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Picture Four</label><span id='picture4-error' class='error' for='picture3'></span>
                                            <input class="btn btn-default" name="photo_4" type="file">
                                        </div>
                                    </div>




                                    <div class="col-lg-12">
                                        <div class="form-group" id="file_id">
                                            <label>File One<span class="error">*</span></label><span id='file1-error' class='error' for='file1'></span>
                                            <input class="btn btn-default" name="primary_file" type="file">
                                        </div>
                                    </div>






                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Sound</label><span id='audio-error' class='error' for='audio'></span>
                                            <input class="btn btn-default" name="primary_sound" type="file">
                                        </div>
                                    </div>





                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Videos</label><span id='videos-error' class='error' for='videos'></span>
                                            <input class="btn btn-default" name="primary_video" type="file">
                                        </div>
                                    </div>






                                <div class="col-lg-12">
                                    <input type="submit" name="submit" class="btn btn-info" value="Save">
                                    <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                </div>



                        </div>
                        </form>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
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

        </section>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.container-fluid -->
</div>

<script type="text/javascript">





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
        $('#classifiedform').validate({
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

                'photo_primary': {
                    required: true,
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
                title: {
                    required: "Classified Title is Required",},

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





