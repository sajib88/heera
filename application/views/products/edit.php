<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 09-Dec-16
 * Time: 3:57 PM
 */
/*print '<pre>';
print_r($editProduct);die;*/

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
            Edit Product
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <?php if($this->session->flashdata('message')){ ?>
        <div class="col-lg-10">
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success! product Create successfully.</strong>
            </div>
        </div>
    <?php } ?>

    <section class="content">

        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" method="post" id="classifiedform" enctype="multipart/form-data" action="<?php echo base_url('product/products/add'); ?>">
                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Product Name<span class="error">*</span></label><span id='name-error' class='error' for='name'></span>
                                            <input name="name" value="<?php echo $editProduct['name']; ?>"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Description<span class="error">*</span></label><span id='description-error' class='error' for='description'></span>
                                            <textarea  name="description" class="form-control"><?php echo $editProduct['description']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Type<span class="error">*</span></label><span id='type-error' class='error' for='type'></span>

                                            <?php $types = array('For Sales','Exchange','Free','Free');?>


                                            <select name="type" class="form-control chosen-select">
                                                <option value="">Select Type</option>
                                                <?php foreach ($types as $row) {?>
                                                    <option <?php if ($row == $editProduct['type']) echo 'selected'; ?> value="<?php echo $row;?>"><?php echo $row?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Price<span class="error">*</span></label><span id='price-error' class='error' for='price'></span>
                                            <input type="number" name="price" value="<?php echo $editProduct['price']; ?>"  class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Special Price<span class="error">*</span></label><span id='special-price-error' class='error' for='special_price'></span>
                                            <input type="number" name="special_price" value="<?php echo $editProduct['special_price']; ?>"   class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select onchange="getComboA(this)" onload="getComboA($editProduct['country'])" name="country" id="js_country" class="form-control">
                                                <option value="">Select</option>
                                                <?php
                                                if (is_array($countries)) {
                                                    foreach ($countries as $country) {
                                                        ?>
                                                        <option <?php if ($country->id == $editProduct['country']) echo 'selected'; ?> value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <select name="state" class="form-control">
                                            <option value="<?php echo $editProduct['state']; ?>"><?php echo $editProduct['state']; ?></option>
                                        </select>
                                        <div id="result">

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input name="city" value="<?php echo $editProduct['city'];?>"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>zip</label>
                                            <input name="zip" value="<?php echo $editProduct['zip']; ?>"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Seller Address 1</label>
                                            <input name="seller_address1" value="<?php echo $editProduct['seller_address1'];?>"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Seller Address 2</label>
                                            <input name="seller_address2" value="<?php echo $editProduct['seller_address2']; ?>"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Seller Name</label>
                                            <input name="seller_name" value="<?php echo $editProduct['seller_name'];?>" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Seller Email</label>
                                            <input name="seller_email" value="<?php echo $editProduct['seller_email'];?>" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Seller Website</label>
                                            <input name="seller_website" value="<?php echo $editProduct['seller_website'];?>" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Seller Phone</label>
                                            <input name="seller_phone" type="tel" value="<?php echo $editProduct['seller_phone'];?>" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Seller Fax</label>
                                            <input name="seller_fax" value="<?php echo $editProduct['seller_fax']; ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Profession<span class="error">*</span></label> <span id='profession-view-error' class='error' for='profession_view'></span>
                                            <select multiple name="profession_view[]" class="selectpicker form-control">
                                                <option value="">All Profession</option>
                                                <?php
                                                if (is_array($profession)) {
                                                    foreach ($profession as $row) {
                                                        ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group" id="photo_id">
                                                <label>Picture One<span class="error">*</span></label><span id='picture1-error' class='error' for='picture1'></span>
                                                <input class="btn btn-default" name="photo_primary" type="file">
                                                <small class="label bg-green"> JPG, GIF, PNG Format allow</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <?php if (!empty($editProduct['photo_primary'])) { ?>
                                            <img src="<?php echo base_url() . 'assets/file/' .$editProduct['photo_primary']; ?>" alt="" width="100" class="img-circle img-responsive" />
                                            <?php }?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                                                <input class="btn btn-default" name="photo_2" type="file">
                                                <small class="label bg-green"> JPG, GIF, PNG Format allow</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <?php if (!empty($editProduct['photo_2'])) { ?>
                                                <img  src="<?php echo base_url() . 'assets/file/' . $editProduct['photo_2'] ?>" alt="" width="100" class="img-circle img-responsive"  />
                                            <?php }?>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Picture Three</label><span id='picture3-error' class='error' for='picture3'></span>
                                                <input class="btn btn-default" name="photo_3" type="file">
                                                <small class="label bg-green"> JPG, GIF, PNG Format allow</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <?php if (!empty($editProduct['photo_3'])) { ?>
                                                <img src="<?php echo base_url() . 'assets/file/' . $editProduct['photo_3'] ?>" alt="" width="100" class="img-circle img-responsive" />
                                            <?php }
                                            ?>

                                        </div>

                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group" id="primary_file_id">
                                            <label>File One<span class="error">*</span></label><span id='file1-error' class='error' for='file1'></span>
                                            <input class="btn btn-default" name="primary_file" type="file">
                                            <small class="label bg-green"> DOCX,XLS,PDF, TXT, EXCEL Format allow</small>
                                            <?php if (!empty($editProduct['primary_file'])) { ?>
                                                <a href="<?php echo base_url() . 'assets/file/' . $editProduct['primary_file'] ?>"><?php echo (!empty($editProduct['primary_file'])) ? $editProduct['primary_file'] : '' ?></a>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group" id="file_2">
                                            <label>File Two<span class="error">*</span></label><span id='file1-error' class='error' for='file1'></span>
                                            <input class="btn btn-default" name="file_2" type="file">
                                            <small class="label bg-green"> DOCX,XLS,PDF, TXT, EXCEL Format allow</small>
                                            <?php if (!empty($editclassified['file_2'])) { ?>
                                                <a href="<?php echo base_url() . 'assets/file/' . $editProduct['file_2'] ?>"><?php echo (!empty($editProduct['file_2'])) ? $editProduct['file_2'] : '' ?></a>
                                            <?php }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Primary Sound</label><span id='primary_audio-error' class='error' for='audio'></span>
                                            <input class="btn btn-default" name="primary_sound" type="file">
                                            <small class="label bg-green"> MP3, OGG Format allow</small>
                                            <?php if (!empty($editProduct['primary_sound'])) { ?>
                                                <a href="<?php echo base_url() . '/assets/file/' . $editProduct['primary_sound'] ?>"><?php echo (!empty($editProduct['primary_sound'])) ? $editProduct['primary_sound'] : '' ?></a>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Sound</label><span id='audio-error' class='error' for='audio'></span>
                                            <input class="btn btn-default" name="sound1" type="file">
                                            <small class="label bg-green"> MP3, OGG Format allow</small>
                                            <?php if (!empty($editProduct['sound1'])) { ?>
                                                <a href="<?php echo base_url() . 'assets/file/' . $editProduct['sound1'] ?>"><?php echo (!empty($editProduct['sound1'])) ? $editProduct['sound1'] : '' ?></a>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Primary Videos</label><span id='primary_video-error' class='error' for='primary_video'></span>
                                            <input class="btn btn-default" name="primary_video" type="file">
                                            <small class="label bg-green"> MP4, WMV Format allow</small>
                                            <?php if (!empty($editProduct['primary_video'])) { ?>
                                                <a href="<?php echo base_url() . 'assets/file/' . $editProduct['primary_video'] ?>"><?php echo(!empty($editProduct['primary_video'])) ? $editProduct['primary_video'] : '' ?></a>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Videos1</label><span id='video1-error' class='error' for='video1_video'></span>
                                            <input class="btn btn-default" name="video1" type="file">
                                            <small class="label bg-green"> MP4, WMV Format allow</small>
                                            <?php if (!empty($editProduct['video1'])) { ?>
                                                <a href="<?php echo base_url() . 'assets/file/' . $editProduct['video1'] ?>"><?php echo(!empty($editProduct['video1'])) ? $editProduct['video1'] : '' ?></a>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>



                                    <div class="col-lg-12">
                                        <input type="submit" name="submit" class="btn btn-info" value="Save">
                                        <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                    </div>




                                </form>


                             </div>
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
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js" ></script>

<script type="text/javascript">
    $(function() {
        $("#classifiedform").validate({
            rules: {
                name: {
                    required:true
                },
                description:{
                    required:true
                },
                type:{
                    required:true
                },
                price:{
                    required:true
                },
                special_price:{
                    required:true
                },
                profession_view:{
                    required:true
                },
                picture1:{
                    required:true,
                    accept:"image/jpeg,image/gif,image/png",
                },
                picture2:{
                    accept:"image/jpeg,image/gif,image/png",
                },
                picture3:{
                    accept:"image/jpeg,image/gif,image/png",
                },
                file1:{
                    required:true,
                    extension: 'docx|doc|pdf|csv|xlsx|xls',
                },
                file2:{
                    extension: 'docx|doc|pdf|csv|xlsx|xls',
                },
                audio:{
                    accept: 'audio/*',
                },
                videos:{
                    accept: 'video/x-msvideo|video/x-ms-wmv|video/x-m4v|video/x-flv|video/webm|video/quicktime|video/mpeg|video/mp4|video/3gpp',
                }

            },
            messages: {
                title: {
                    required: "Product Name is Required",},
                description: {
                    required: "Description is Required",},
                type: {
                    required: "Type is Required",},
                price: {
                    required: "Price is Required",},
                special_price: {
                    required: "Special price is Required",},

                profession_view: {
                    required: "profession is Required",},

                picture1: {
                    required: "Picture is Required",
                    accept:"Please Select Appropiate File",
                },
                picture2: {
                    accept:"Please Select Appropiate File",
                },
                picture3: {
                    accept:"Please Select Appropiate File",
                },
                file1: {
                    required: "File is Required",
                    extension:"Please Select Appropiate File",
                },
                file2: {
                    extension:"Please Select Appropiate File",
                },
                audio: {
                    accept:"Please Select audios File",
                },
                videos: {
                    accept:"Please Select videos File",
                }
            }
        });

    });
</script>

<script>
    jQuery(document).ready(function() {
        $('#photo').click(function() {
            $("#photo_id").append('<input class="btn btn-default" name="photo2" type="file">');
        });

        $('#file').click(function() {
            $("#file_id").append('<input class="btn btn-default" name="file2" type="file">');
        });
        var e = document.getElementById("js_country");
        var strUser = e.options[e.selectedIndex].value;
        getComboA(strUser);
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
        //alert(sel.value);
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
