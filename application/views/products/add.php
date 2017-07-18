
<div class="content-wrapper">

<section class="content-header">
    <h1>
        Products
        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Products</a></li>
        <li class="active">Create</li>
    </ol>
</section>

<?php if($this->session->flashdata('message')){ ?>
    <div class="col-lg-10">
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success! New product  Add successfully.</strong>
        </div>
    </div>
<?php } ?>

<section class="content">
<div class="row">
<div class="col-lg-7">
<div class="box box-primary">
<div class="panel-body">
<div class="row">
<div class="col-lg-12">
<form role="form" method="post" id="classifiedform" enctype="multipart/form-data" action="<?php echo base_url('product/products/add'); ?>">
<input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
<div class="col-lg-12">
    <div class="form-group">
        <?php $v = (set_value('name')!='')?set_value('name'):'';?>
        <label>Product Name<span class="error">*</span></label>
        <input name="name" type="text" id="name" placeholder="Name" value="<?php echo $v?>"  class="form-control">
        <?php echo form_error('name');?>
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <?php $v = (set_value('description')!='')?set_value('description'):'';?>
        <label>Description<span class="error">*</span></label>
        <textarea  name="description" class="form-control"><?php echo $v?></textarea>
        <?php echo form_error('description');?>
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label>Type<span class="error">*</span></label><span id='type-error' class='error' for='type'></span>

        <?php $types = array('For Sales','Exchange','Free','Urgent');?>
        <select name="type" class="form-control chosen-select" id="type">
            <option value="">Select Type</option>
            <?php foreach ($types as $row) {?>
                <option value="<?php echo $row;?>"><?php echo $row?></option>
            <?php }?>
        </select>
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label>Price<span class="error">*</span></label><span id='price-error' class='error' for='price'></span>
        <input type="number" name="price"  class="form-control" id="price">
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Special Price<span class="error">*</span></label><span id='special-price-error' class='error' for='special_price'></span>
        <input type="number" name="special_price"  class="form-control"  id="special_price">
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
        <label>City</label>
        <input name="city" value="<?php echo '';?>" id="city" class="form-control">
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label>zip</label>
        <input name="zip" value="<?php echo ''; ?>"  class="form-control">
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label>Seller Address 1</label>
        <input name="seller_address1" value="<?php echo '';?>"  class="form-control">
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label>Seller Address 2</label>
        <input name="seller_address2" value="<?php echo ''; ?>"  class="form-control">
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label>Seller Name</label>
        <input name="seller_name" value="<?php echo '';?>" class="form-control" >
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Seller Email</label>
        <input name="seller_email" value="<?php echo '';?>" class="form-control" >
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label>Seller Website</label>
        <input name="seller_website" value="<?php echo '';?>" class="form-control" >
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Seller Phone</label>
        <input name="seller_phone" type="tel" value="<?php echo '';?>" class="form-control" >
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Seller Fax</label>
        <input name="seller_fax" value="<?php echo ''; ?>" class="form-control">
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Profession<span class="error">*</span></label><span id='profession_view-error' class='error' for='profession_view'></span>
        <select multiple name="profession_view[]" class="selectpicker form-control">
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
    <div class="form-group" id="photo_id">
        <label>Picture One<span class="error">*</span></label><span id='picture1-error' class='error' for='picture1'></span>
        <input class="btn btn-default" name="photo_primary" type="file">
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
        <input class="btn btn-default" name="photo_2" type="file">
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label>Picture Three</label><span id='picture3-error' class='error' for='picture3'></span>
        <input class="btn btn-default" name="photo_3" type="file">
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
        <label>File Two<span class="error">*</span></label><span id='file1-error' class='error' for='file1'></span>
        <input class="btn btn-default" name="file_2" type="file">
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
    <input type="submit" name="submit" class="btn btn-info" value="Save">
    <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
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
<div class="col-md-5 col-sm-6 col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <i class="fa fa-bullhorn"></i>

            <h3 class="box-title">Products Help</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="callout bg-purple-active">


                <p>
                <ul>
                    <li>Get FREE products from brands sampling to professionals</li>

                    <li>Enjoy remarkable discounts, special offers and coupons on a variety of products</li>

                    <li>Easily find products using our quick search feature</li>

                    <li>Easily find products using our quick search feature</li>

                    <li>View newly posted, Free, Discounted, Coupon, or retail priced products</li>


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

</div>
</section>

</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>


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
