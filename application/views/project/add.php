
<div class="content-wrapper">

    <section class="content-header">
        <h1>
          <i class="fa fa-tasks"></i> New Project
        </h1>

    </section>

<?php if($this->session->flashdata('message')){ ?>
    <div class="col-lg-12">
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success! New Project  Add successfully.</strong>
        </div>
    </div>
<?php } $this->session->unset_userdata('message'); ?>
    <form role="form" method="post" id="classifiedform" enctype="multipart/form-data" action="<?php echo base_url('project/Project/add'); ?>">
        <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
<section class="content">
<div class="row">
    <div class="col-md-6">
        <div class="col-md-12 no-padding">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-th"></i>

                    <h3 class="box-title">Project Info </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php $v = (set_value('name')!='')?set_value('name'):'';?>
                                        <label>Project Name<span class="error">*</span></label>
                                        <input name="name" type="text" id="name" placeholder="Name" value="<?php echo $v?>"  class="form-control">
                                        <?php echo form_error('name');?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Purpose<span class="error">*</span></label><span id='purposeID-error' class='error' for='purposeID'></span>
                                        <select name="purposeID" id="purposeID" class="form-control">
                                            <option value="">Select Please</option>
                                            <?php
                                            if (is_array($purpose)) {
                                                foreach ($purpose as $purpose) {
                                                    $sel = ($purpose->purposeID == set_value('purposeID'))?'selected="selected"':'';
                                                    ?>
                                                    <option  value="<?php echo $purpose->purposeID; ?>" <?php echo $sel;?> ><?php echo $purpose->purposeTitle; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php echo form_error('purposeID');?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <?php $v = (set_value('short Description')!='')?set_value('shortDescription'):'';?>
                                        <label>Short Description<span class="error">*</span></label>
                                        <textarea  name="shortDescription" class="form-control"><?php echo $v?></textarea>
                                        <?php echo form_error('shortDescription');?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <?php $v = (set_value('detailsDescription')!='')?set_value('detailsDescription'):'';?>
                                        <label>Details Description</label>
                                        <textarea  name="detailsDescription" class="form-control"><?php echo $v?></textarea>
                                        <?php echo form_error('detailsDescription');?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 ">
                                    <div class="form-group" id="photo_id">
                                        <label>Upload Image<span class="error">*</span></label><span id='picture1-error' class='error' for='picture1'></span>
                                        <input class="btn btn-default" name="mainImage" type="file">
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                                        <input class="btn btn-default" name="photo1" type="file">
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>Picture Three</label><span id='picture2-error' class='error' for='picture2'></span>
                                        <input class="btn btn-default" name="photo2" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>Picture Four</label><span id='picture3-error' class='error' for='picture3'></span>
                                        <input class="btn btn-default" name="photo3" type="file">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

        <div class="col-md-12 no-padding">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-map-marker"></i>

                    <h3 class="box-title">Location</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">

                        <div class="col-lg-12">
                            <!-- /Lending -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Address 1</label>
                                        <input name="address1" value="<?php echo '';?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Address 2</label>
                                        <input name="address2" value="<?php echo ''; ?>"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select onchange="getComboA(this)" name="country" id="js_country" class="form-control">
                                            <option value="">Select Please</option>
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
                                <div class="col-lg-6">
                                    <div id="result">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input name="city" value="<?php echo '';?>" id="city" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <!-- /.Lending -->
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="col-md-6">


        <div class="col-md-12 no-padding">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-building"></i>

                    <h3 class="box-title">Lending</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- /Lending -->
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Loan Term<span class="error">*</span></label><span id='type-error' class='error' ></span>
                                        <?php $types3 = array('1 Year','2 Years','3 Years','4 Years','5 Years');?>
                                        <select name="loanTerm" class="form-control chosen-select" id="type">
                                            <option value="">Select Loan Term</option>
                                            <?php foreach ($types3 as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Repayment Schedule<span class="error">*</span></label><span id='type-error' class='error' ></span>

                                        <select onchange="getComboA(this)" name="RepaymentScheduleID" id="RepaymentScheduleID" class="form-control">
                                            <option value="">Select Please</option>
                                            <?php
                                            if (is_array($repaymentschedule)) {
                                                foreach ($repaymentschedule as $repaymentschedule) {
                                                    $sel = ($repaymentschedule->repaymentScheduleID == set_value('RepaymentScheduleID'))?'selected="selected"':'';
                                                    ?>
                                                    <option  value="<?php echo $repaymentschedule->repaymentScheduleID; ?>" <?php echo $sel;?> ><?php echo $repaymentschedule->repaymentScheduleTitle; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('RepaymentScheduleID');?>
                                    </div>


                                </div>


                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Needed Amount ($)<span class="error">*</span></label><span id='price-error' class='error' for='price'></span>
                                        <input type="number" name="neededAmount"   step="0.01" class="form-control" id="neededAmount">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Minimum Amount ($)</label>
                                        <input type="number" name="minimumAmount"   step="0.01" class="form-control" id="minimumAmount">
                                    </div>
                                </div>


                            </div>

                            <div class="row">


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Interest Rate</label>
                                        <input type="number" name="interestRate"  class="form-control"  id="special_price">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Type of Funding <span class="error">*</span></label><span id='type-error' class='error' ></span>

                                        <?php $typespmth = array('Fixed Funding','Flexible Funding');?>
                                        <select name="paymentMethodID" class="form-control chosen-select" id="type">
                                            <option value="">Select Loan Term</option>
                                            <?php foreach ($typespmth as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Project End Date</label>
                                        <div class="input-group">
                                            <input name="projectEndDate" type="text" class="form-control" id="datepicker">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /.Lending -->
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-md-12 no-padding">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-user"></i>

                    <h3 class="box-title">Personal Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- /Lending -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Monthly Income</label>
                                        <input type="number" name="monthlyIncome"  class="form-control"  id="monthlyIncome">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Monthly Expenses</label>
                                        <input type="number" name="monthlyExpenses"  class="form-control"  id="monthlyExpenses" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Home Ownership</label>

                                        <?php $types4 = array('Own','Rent');?>
                                        <select name="homeOwnership" class="form-control chosen-select" id="type">
                                            <option value="">Select Home Ownership</option>
                                            <?php foreach ($types4 as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Current Profession</label>
                                        <input name="employmentSelfemployment" value="<?php echo '';?>" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Employment Status</label>
                                        <?php $types4 = array('Part-Time Employed','Full-Time Employed', 'Unemployed');?>
                                        <select name="employmentSelfemployment" class="form-control chosen-select" id="type">
                                            <option value="">Select Employment Status</option>
                                            <?php foreach ($types4 as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>

                                </div>
                            </div>


                            <!-- /.Lending -->
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>



    <div class="col-md-12">
        <div class="box box-primary">

            <!-- /.box-header -->
            <div class="box-body">


                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- /Lending -->


                            <div class="col-lg-6">

                                <?php echo anchor('profile/dashboard',"<i class='fa fa-undo'></i> &nbsp; &nbsp; Cancel",array('class' => 'btn btn-danger btn-lg'));?>
                            </div>
                            <div class="col-lg-6 ">
                                <button class="btn  btn-success  btn-lg pull-right"  name="submit" type="submit">
                                    <i class="fa fa-check"></i> &nbsp; &nbsp; Save</button>
                            </div>

                            <!-- /.Lending -->
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>





</div>
    </form>
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
            purposeID:{
                required:true
            },
            shortDescription:{
                required:true
            },
            loanTerm:{
                required:true
            },
            RepaymentScheduleID:{
                required:true
            },
            neededAmount:{
                required:true,
                number: true
            },

            'mainImage': {

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
                required: "Project Name is Required",
            },


            shortDescription: {
                required: "Short Description is Required",
            },



            neededAmount: {
                required: "Needed Amount is Required, 0-9 Number digit only allow",
            },

            'mainImage':{

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


<script type="text/javascript">


    jQuery(document).ready(function() {

        $('#datepicker').datepicker({
            autoclose: true,
            startDate: new Date(),
            todayHighlight: true
        });
    });

</script>

<script>

    function getComboA(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {state: value};
        $.ajax({
            type: 'POST',
            url: base_url + "profile/profile/getStateByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#result").html(resultData);
            }
        });

    }


</script>

<script language="javascript">

</script>





