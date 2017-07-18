<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 09-Dec-16
 * Time: 10:31 PM
 */
/*print '<pre>';
print_r($user_info);die;*/

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
            Personal Info
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">PersonalInfo</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <?php if($this->session->flashdata('message')){ ?>
        <div class="col-lg-10">
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success! Personal Information Create successfully.</strong>
            </div>
        </div>
    <?php } ?>


    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="panel-body">
                        <div class="row">

                            <form role="form" method="post" id="personalform" enctype="multipart/form-data" action="<?php echo base_url('personal/Personal/add'); ?>">
                            <div class="col-lg-6">
                                <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
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
                                        <label>Body</label>
                                        <?php $body = array('N/A','Athletic','Average','Cuddly','Disabled','Few Extra Pounds','Full','Large','Muscular','Petit','Slim');?>
                                        <select name="body" class="form-control chosen-select">
                                            <option value="">Select Body</option>
                                            <?php foreach ($body as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Height</label>
                                        <?php $height = array('4-fit-7 (140cm) or below','4-fit-8 - 4-fit-11 (141-150cm)','5-fit - 5-fit-3 (151-160cm)','5-fit-4 - 5-fit-7 (161-170cm)','5-fit-8 - 5-fit-11 (171-180cm)','6-fit  - 6-fit-3 (181-190cm)','6-fit-4 (191cm) or above');?>
                                        <select name="height" class="form-control chosen-select">
                                            <option value="0">N/A</option>
                                            <?php foreach ($height as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="number" name="age"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Child</label>
                                        <input type="number" name="child"  class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Ethnicity</label>
                                        <?php $ethnicity= array('African American','Asian','Caucasian','East Indian','Islander','Hispanic','Middle Eastern','Mixed');?>
                                        <select name="ethnicity" class="form-control chosen-select">
                                            <option value="0">N/A</option>
                                            <?php foreach ($ethnicity as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Marital status</label>
                                        <?php $maritalstatus= array('Single','Attached','Divorced','Married','Separated','Widow','It\'s Complicated');?>
                                        <select name="maritalstatus" class="form-control chosen-select">
                                            <?php foreach ($maritalstatus as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Language</label>
                                        <?php $languages = array('English','Afrikaans','Arabic','Bulgarian','Burmese','Cantonese','Croatian','Danish','Dutch','Esperanto','Estonian','Finnish','French','German','Greek','Gujrati','Hebrew','Hindi','Hungarian','Icelandic','Indian','Indonesian','Italian','Japanese','Korean','Latvian','Lithuanian','Malay','Mandarin','Marathi','Moldovian','Nepalese','Norwegian','Persian','Polish','Portuguese','Punjabi','Romanian','Russian','Serbian','Spanish','Swedish','Tagalog','Taiwanese','Tamil','Telugu','Thai','Tongan','Turkish','Ukrainian','Urdu','Vietnamese','Visayan');?>
                                        <select name="lang" class="form-control chosen-select">
                                            <?php foreach ($languages as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">`
                                    <div class="form-group">
                                        <label>Profession<span class="error">*</span></label><span id='profession_view-error' class='error' for='profession_view'></span>
                                        <select multiple name="profession[]" class="selectpicker form-control">
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
                                        <label>I AM A</label>
                                        <?php $iam= array('MAN','WOMAN');?>
                                        <select name="iam" class="form-control chosen-select">
                                            <option value="">Select</option>
                                            <?php foreach ($iam as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>LOOKING FOR A </label>
                                        <?php $iam= array('MAN','WOMAN');?>
                                        <select name="interestedin" class="form-control chosen-select">
                                            <option value="">Select</option>
                                            <?php foreach ($iam as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group" id="photo_id">
                                        <label>Picture One</label>
                                        <?php $v = (set_value('primary_photo') != '')?set_value('primary_photo'):'';?>
                                        <input class="btn btn-default" name="primary_photo" type="file" value="<?php echo $v;?>">
                                        <?php /*echo form_error('primary_photo');*/?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Picture Two</label>
                                        <input class="btn btn-default" name="photo_2" type="file">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Picture Three</label><span id='picture3-error' class='error' for='picture3'></span>
                                        <input class="btn btn-default" name="photo_3" type="file">
                                    </div>
                                </div>


                            </div>

                            <div class="col-lg-6">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Religion</label>
                                        <?php $religion= array('Agnostic','Atheist','Buddhist','Catholic','Christian','Hindu','Jewish','Mormon','Muslim','Spiritual' );?>
                                        <select name="religion" class="form-control chosen-select">
                                            <option value="0">N/A</option>
                                            <?php foreach ($religion as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Smoker</label>
                                        <?php $smoker = array('No','Rarely','Often','Very Often' );?>
                                        <select name="smoker" class="form-control chosen-select">
                                            <?php foreach ($smoker as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Drinker</label>
                                        <?php $drinker = array('No','Rarely','Often','Very Often' );?>
                                        <select name="drinker" class="form-control chosen-select">
                                            <?php foreach ($drinker as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Intimacy/Preference</label>
                                        <?php $intimacy = array('Like to experiment','Don\'t like to experiment','Soul mate','Lifemate but no marriage','Lifemate and marriage','Casual affair only' );?>
                                        <select name="entimicyorpreference" class="form-control chosen-select">
                                            <option value="0">N/A</option>
                                            <?php foreach ($intimacy as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Eye Color</label>
                                        <?php $eyecolor = array('Amber','Black','Blue','Brown','Gray','Green','Hazel','Red','Violet');?>
                                        <select name="eyecolor" class="form-control chosen-select">
                                            <option value="0">N/A</option>
                                            <?php foreach ($eyecolor as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Hair Color</label>
                                        <?php $haircolor = array('Amber','Black','Blond','Brown','Chestnut','Red','Grey and white');?>
                                        <select name="haircolor" class="form-control chosen-select">
                                            <option value="0">N/A</option>
                                            <?php foreach ($haircolor as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
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
                                            <input name="city" type="text" placeholder="City" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Zip/label</label>
                                        <input name="zip" type="text" placeholder="Zip" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group" id="primary_file_id">
                                        <label>File One<span class="error">*</span></label><span id='file1-error' class='error' for='file1'></span>
                                        <input class="btn btn-default" name="primary_files" type="file">
                                    </div>
                                </div>



                                <div class="col-lg-12">
                                    <div class="form-group" id="file_2">
                                        <label>File Two</label>
                                        <input class="btn btn-default" name="file_2" type="file">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Primary Sound</label><span id='primary_audio-error' class='error' for='audio'></span>
                                        <input class="btn btn-default" name="primary_sounds" type="file">
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
                                        <input class="btn btn-default" name="primary_videos" type="file">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Videos1</label><span id='video1-error' class='error' for='video1_video'></span>
                                        <input class="btn btn-default" name="video1" type="file">
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

<!--<script type="text/javascript">
    $(function() {
        $("#personalform").validate({
            rules: {
                title: {
                    required:true
                },
                description:{
                    required:true
                }
            },
            messages: {
                title: {
                    required: "Title is Required",},
                description: {
                    required: "Description is Required",}
            }
        });

    });
</script>-->

<script>
    jQuery(document).ready(function() {
        $('#photo').click(function() {
            $("#photo_id").append('<input class="btn btn-default" name="photo2" type="file">');
        });

        $('#file').click(function() {
            $("#file_id").append('<input class="btn btn-default" name="file2" type="file">');
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
