<?php
/**
 * Created by PhpStorm.
 * User: nur.alam
 * Date: 12/21/2016
 * Time: 1:01 PM
 */
/*print '<pre>';
print_r($value);
die;*/
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Edit CES
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">CES</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content">
        <?php echo $this->session->flashdata('msg');?>
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="panel-body">
                        <div class="row">

                            <form role="form" method="post" id="personalform" enctype="multipart/form-data" action="<?php echo base_url('ces/updateCES'); ?>">
                                <div class="col-lg-6">
                                    <input type="hidden" name="uid" value="<?php echo $value['uid']; ?>">
                                    <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <?php $v = (set_value('title')!='')?set_value('title'):$value['title'];?>
                                            <label>Title<span class="error">*</span></label>
                                            <input name="title" type="text" placeholder="Title" value="<?php echo $v?>"  class="form-control">
                                            <?php echo form_error('title');?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <?php $v = (set_value('description')!='')?set_value('description'):$value['description'];?>
                                            <label>Description<span class="error">*</span></label>
                                            <textarea  name="description" placeholder="description" class="form-control"> <?php echo $v;?></textarea>
                                            <?php echo form_error('description');?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>CE Type</label>
                                            <?php $ce_type = array('type1','type2','type3');?>
                                            <select name="ce_type" class="form-control chosen-select">
                                                <option value="">Select Body</option>
                                                <?php foreach ($ce_type as $row) {
                                                    $v = (set_value('ce_type')!='')?set_value('ce_type'):$value['ce_type'];
                                                    $sel = ($v == $row)?'selected="selected"':'';?>
                                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <?php $v = (set_value('price')!='')?set_value('price'):$value['price'];?>
                                            <input name="price" type="text" placeholder="Price" value="<?php echo $v?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Special Price</label>
                                            <?php $v = (set_value('special_price')!='')?set_value('special_price'):$value['special_price'];?>
                                            <input name="special_price" type="text" placeholder="Special Price" value="<?php echo $v?>" class="form-control">
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
                                                        $v = (set_value('country')!='')?set_value('country'):$value['country'];
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
                                                        $v = (set_value('state')!='')?set_value('state'):$value['state'];
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
                                            <label>Post Code</label>
                                            <?php $v = (set_value('postcode')!='')?set_value('postcode'):$value['postcode'];?>
                                            <input name="postcode" type="text" placeholder="Postcode" value="<?php echo $v?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Address1</label>
                                            <?php $v = (set_value('address1')!='')?set_value('address1'):$value['address1'];?>
                                            <input name="address1" type="text" placeholder="Address1" value="<?php echo $v?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Address2</label>
                                            <?php $v = (set_value('address2')!='')?set_value('address2'):$value['address2'];?>
                                            <input name="address2" type="text" placeholder="Address2" value="<?php echo $v?>" class="form-control">
                                        </div>
                                    </div>



                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group" id="photo_id">
                                                <label>Picture One</label>
                                                <?php $v = (set_value('primary_image') != '')?set_value('primary_image'):$value['primary_image'];?>
                                                <input class="btn btn-default" name="primary_image" type="file" value="<?php echo $v;?>">
                                                <?php /*echo form_error('primary_photo');*/?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <?php if (!empty($value['primary_image'])) { ?>
                                                <img src="<?php echo base_url() . 'assets/file/' .$value['primary_image']; ?>" alt="" width="100" class="img-circle img-responsive" />
                                            <?php }?>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Picture Two</label>
                                                <?php $v = (set_value('image2') != '')?set_value('image2'):$value['image2'];?>
                                                <input class="btn btn-default" name="image2" type="file">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <?php if (!empty($value['image2'])) { ?>
                                                <img src="<?php echo base_url() . 'assets/file/' .$value['image2']; ?>" alt="" width="100" class="img-circle img-responsive" />
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Picture Three</label>
                                                <?php $v = (set_value('image3') != '')?set_value('image3'):$value['image3'];?>
                                                <input class="btn btn-default" name="image3" type="file">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <?php if (!empty($value['image3'])) { ?>
                                                <img src="<?php echo base_url() . 'assets/file/' .$value['image3']; ?>" alt="" width="100" class="img-circle img-responsive" />
                                            <?php }?>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-lg-6">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Business Name</label>
                                            <?php $v = (set_value('business_name')!='')?set_value('business_name'):$value['business_name'];?>
                                            <input name="business_name" type="text" placeholder="Business Name" value="<?php echo $v?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Business Email</label>
                                            <?php $v = (set_value('business_email')!='')?set_value('business_email'):$value['business_email'];?>
                                            <input name="business_email" type="text" placeholder="Business Email" value="<?php echo $v?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Business Phone</label>
                                            <?php $v = (set_value('business_phone')!='')?set_value('business_phone'):$value['business_phone'];?>
                                            <input name="business_phone" type="text" placeholder="Business Phone" value="<?php echo $v?>" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Business Fax</label>
                                            <?php $v = (set_value('business_fax')!='')?set_value('business_fax'):$value['business_fax'];?>
                                            <input name="business_fax" type="text" placeholder="Business Fax" value="<?php echo $v?>" class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Business Website</label>
                                            <?php $v = (set_value('business_website')!='')?set_value('business_website'):$value['business_website'];?>
                                            <input name="business_website" type="text" placeholder="Business Website" value="<?php echo $v?>" class="form-control">

                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Profession<span class="error">*</span></label><span id='profession_view-error' class='error' for='profession_view'></span>
                                            <select multiple name="profession[]" class="selectpicker form-control">
                                                <option value="">All Profession</option>
                                                <?php
                                                if (is_array($profession)) {
                                                    foreach ($profession as $row) {
                                                        $v = (set_value('profession')!='')?set_value('profession'):$value['profession'];
                                                        $sel = ($v == $row)?'selected="selected"':'';
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
                                            <label>Primary Videos</label><span id='primary_video-error' class='error' for='primary_video'></span>
                                            <input class="btn btn-default" name="primary_video" type="file">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Videos1</label><span id='video1-error' class='error' for='video1_video'></span>
                                            <input class="btn btn-default" name="video1" type="file">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group" id="primary_file_id">
                                            <label>File One<span class="error">*</span></label><span id='file1-error' class='error' for='file1'></span>
                                            <input class="btn btn-default" name="primary_file" type="file">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group" id="file_2">
                                            <label>File Two</label>
                                            <input class="btn btn-default" name="file2" type="file">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Primary Sound</label><span id='primary_audio-error' class='error' for='audio'></span>
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
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </section>
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js" ></script>


<script>
    jQuery(document).ready(function() {
        $('#photo').click(function() {
            $("#photo_id").append('<input class="btn btn-default" name="photo1" type="file">');
        });

        $('#file').click(function() {
            $("#file_id").append('<input class="btn btn-default" name="file2" type="file">');
        });

        $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });


    });


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
