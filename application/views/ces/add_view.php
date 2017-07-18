<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/18/2016
 * Time: 11:32 PM
 */
?>
<style>
    .error{
        color: red;
        font-size: 12px;
    }
</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            CES
            <small>Add</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">CSE</a></li>
            <li class="active">Add</li>
        </ol>
    </section>

    <?php echo $this->session->flashdata('msg');?>
    <?php if(isset($msg) && $msg!='') echo $msg;?>

    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" id="cesform" enctype="multipart/form-data" action="<?php echo base_url().'ces/create'; ?>">
                                <div class="col-lg-6">
                                    <input type="hidden" name="uid" value="<?php echo $login_id; ?>">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <?php $v = (set_value('title')!='')?set_value('title'):'';?>
                                            <label>Title<span class="error">*</span></label>
                                            <input name="title" type="text" placeholder="Title" value="<?php echo $v?>"  class="form-control">
                                            <?php echo form_error('title');?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <?php $v = (set_value('description')!='')?set_value('description'):'';?>
                                            <label>Description<span class="error">*</span></label>
                                            <textarea  name="description" placeholder="description" class="form-control"><?php echo $v;?></textarea>
                                            <?php echo form_error('description');?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>CE Type</label>
                                            <?php $ce_type = array('type1','type2','type3');?>
                                            <select name="ce_type" class="form-control chosen-select" id="ce_type">
                                                <option value="">Select CE</option>
                                                <?php foreach ($ce_type as $row) {?>
                                                    <option value="<?php echo $row;?>"><?php echo $row?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="number" name="price" placeholder="Price"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Special Price</label>
                                            <input type="number" name="special_price" placeholder="Special Price"  class="form-control">
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
                                    </div>

                                    <div class="col-lg-12">
                                        <div id="result">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Post Code</label>
                                            <input name="postcode" type="text" placeholder="Post Code"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Address 1</label>
                                            <input name="address1" type="text" placeholder="Address1"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <input name="address2" type="text" placeholder="Address2"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group" id="photo_id">
                                            <label>Picture One</label>
                                            <?php $v = (set_value('primary_image') != '')?set_value('primary_image'):'';?>
                                            <input class="btn btn-default" name="primary_image" type="file" value="<?php echo $v;?>">

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Picture Two</label>
                                            <?php $v = (set_value('image2') != '')?set_value('image2'):'';?>
                                            <input class="btn btn-default" name="image2" type="file" value="<?php echo $v;?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Picture Three</label>
                                            <?php $v = (set_value('image3') != '')?set_value('image3'):'';?>
                                            <input class="btn btn-default" name="image3" type="file" value="<?php echo $v;?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Business Name</label>
                                            <input name="business_name" type="text" placeholder="Business Name"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Business Email</label>
                                            <input name="business_email" type="text" placeholder="Business Email"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Business Phone</label>
                                            <input name="business_phone" type="text" placeholder="Business phone"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Business Fax</label>
                                            <input name="business_fax" type="text" placeholder="Business Fax"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Business Website</label>
                                            <input name="business_website" type="text" placeholder="Business website"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Profession<span class="error">*</span></label><span id='profession_view-error' class='error' for='profession_view'></span>
                                            <select multiple name="profession[]" class="selectpicker form-control" id="validateprof">
                                                <option value="">All Profession</option>
                                                <?php
                                                if (is_array($profession)) {
                                                    foreach ($profession as $row) {
                                                        ?>
                                                        <option  value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Primary Video</label>
                                            <input class="btn btn-default" name="primary_video" type="file">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Video1</label>
                                            <input class="btn btn-default" name="video1" type="file">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group" id="primary_file_id">
                                            <label>File One</label>
                                            <input class="btn btn-default" name="primary_file" type="file">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group" id="file2">
                                            <label>File Two</label>
                                            <input class="btn btn-default" name="file2" type="file">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Primary Sound</label>
                                            <input class="btn btn-default" name="primary_sound" type="file">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Sound</label><span id='audio-error' class='error' for='audio'></span>
                                            <input class="btn btn-default" name="sound1" type="file">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <div style="text-align: center">
                                        <input type="submit" name="submit" class="btn btn-info" value="Save">
                                        <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>



<script>
    jQuery(document).ready(function() {
        /*$('#photo').click(function() {
            $("#photo_id").append('<input class="btn btn-default" name="photo2" type="file">');
        });

        $('#file').click(function() {
            $("#file_id").append('<input class="btn btn-default" name="file2" type="file">');
        });*/
        $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
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
    $('#cesform').validate({
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

            ce_type:{
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
            validateprof:{
                required:true
            },

            'primary_image': {
                required: true,
                extension: "png,jpg,jpeg,gif,bmp"
            },
            'image2': {

                extension: "png,jpg,jpeg,gif,bmp"
            },
            'image3': {

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

            ce_type: {
                required: "CES Type is Required",},

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
            validateprof: {
                required: "prof is Required",
            },
            'primary_image':{
                required : "<p class='text-danger'>Please upload atleast 1 photo</p>",
                extension:"Only Image Format  file is allowed!"
            },
            'image2':{

                extension:"Only Image Format  file is allowed!"
            },
            'image3':{

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

