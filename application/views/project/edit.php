
<div class="content-wrapper">

    <section class="content-header">
        <h1>
           Edit Project
            <small>Update Project</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Project</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

<?php if($this->session->flashdata('message')){ ?>
    <div class="col-lg-12">
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success! Your Project Updated successfully.</strong>
        </div>
    </div>
<?php } $this->session->unset_userdata('message'); ?>

<section class="content">
<div class="row">
<div class="col-lg-7">
<div class="box box-primary">
    <div class="box-header with-border">
        <i class="fa fa-bullhorn"></i>

        <h3 class="box-title">Project Steps </h3>
    </div>
<div class="panel-body">
<div class="row">
<div class="col-lg-12">
<form role="form" method="post" id="classifiedform" enctype="multipart/form-data" action="<?php echo base_url('project/Project/edit/'. $editProject['projectID']); ?>">
<input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
<div class="col-lg-12">
    <div class="form-group">
        
        <label>Project Name<span class="error">*</span></label>
        <input name="name" type="text" id="name" placeholder="Name" value="<?php echo $editProject['name']; ?>"  class="form-control">
        <?php echo form_error('name');?>
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Purpose<span class="error">*</span></label><span id='type-error' class='error' for='type'></span>
        <select name="purposeID" class="form-control chosen-select" id="type">
            <option value="">Select Purpose Type</option>
            <?php
                if (is_array($purpose) and (!empty($purpose))) {
                    foreach ($purpose as $row) {
                        $v = (set_value('purposeID')!='')?set_value('purposeID'):$editProject['purposeID'];
                        $sel = ($v == $row->purposeID)?'selected="selected"':'';
                        ?>
                        <option  value="<?php echo $row->purposeID; ?>" <?php echo $sel;?>><?php echo $row->purposeTitle; ?></option>
                    <?php
                    }
                }
            ?>
        </select>
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        
        <label>Short Description<span class="error">*</span></label>
        <textarea  name="shortDescription" class="form-control"><?php echo $editProject['shortDescription']; ?></textarea>
        <?php echo form_error('shortDescription');?>
    </div>
</div>


<div class="col-lg-12">
    <div class="form-group">
        
        <label>Details Description<span class="error">*</span></label>
        <textarea  name="detailsDescription" class="form-control"><?php echo $editProject['detailsDescription']; ?></textarea>
        <?php echo form_error('detailsDescription');?>
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group" id="photo_id">
        <label>Upload Image<span class="error">*</span></label><span id='picture1-error' class='error' for='picture1'></span>
        <input class="btn btn-default" name="mainImage" type="file">
    </div>
    
    <?php if (!empty($editProject['mainImage'])) { ?>
        <div class="col-lg-6 pull-right">
            <img src="<?php echo base_url() . '/assets/file/project/' .$editProject['mainImage']; ?>" alt="" width="100" class="img-circle img-responsive" />
        </div>
    <?php }
    ?>
</div>

<div class="col-lg-12">
    <div class="form-group" id="photo_id">
       <h2><label>Lending</label></h2>
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Credit Score<span class="error">*</span></label><span id='type-error' class='error' ></span>

        <?php $types2 = array('A','A+','B','C','Y');?>
        <select name="creditScore" class="form-control chosen-select" id="type">
            <option value="">Select Credit Score</option>
            <?php
                if (is_array($types2) and (!empty($types2))) {
                    foreach ($types2 as $key=>$value) {
                        $v = (set_value('creditScore')!='')?set_value('creditScore'):$editProject['creditScore'];
                        $sel = ($v == $value)?'selected="selected"':'';
                        ?>
                        <option  value="<?php echo $value; ?>" <?php echo $sel;?>><?php echo $value; ?></option>
                    <?php
                    }
                }
            ?>
        </select>
    </div>
</div>


<div class="col-lg-12">
    <div class="form-group">
        <label>Loan Term<span class="error">*</span></label><span id='type-error' class='error' ></span>

        <?php $types3 = array('1 Year','2 Years','3 Years','4 Years','5 Years');?>
        
        <select name="loanTerm" class="form-control chosen-select" id="type">
            <option value="">Select Loan Term</option>
            <?php
                if (is_array($types3) and (!empty($types3))) {
                    foreach ($types3 as $key=>$value) {
                        $v = (set_value('loanTerm')!='')?set_value('loanTerm'):$editProject['loanTerm'];
                        $sel = ($v == $value)?'selected="selected"':'';
                        ?>
                        <option  value="<?php echo $value; ?>" <?php echo $sel;?>><?php echo $value; ?></option>
                    <?php
                    }
                }
            ?>
        </select>
    </div>
</div>


    <div class="col-lg-12">
        <div class="form-group">
            <label>Repayment Schedule<span class="error">*</span></label><span id='type-error' class='error' ></span>

           
            
            <select name="RepaymentScheduleID" class="form-control chosen-select" id="type">
            <option value="">Select Loan Term</option>
                <?php
                    if (is_array($repaymentschedule) and (!empty($repaymentschedule))) {
                        foreach ($repaymentschedule as $row) {
                            $v = (set_value('RepaymentScheduleID')!='')?set_value('RepaymentScheduleID'):$editProject['RepaymentScheduleID'];
                            $sel = ($v == $row->repaymentScheduleID)?'selected="selected"':'';
                            ?>
                            <option  value="<?php echo $row->repaymentScheduleID; ?>" <?php echo $sel;?>><?php echo $row->repaymentScheduleTitle; ?></option>
                        <?php
                        }
                    }
                ?>
            </select>
        </div>
    </div>



<div class="col-lg-12">
    <div class="form-group">
        <label>Needed Amount ($)<span class="error">*</span></label><span id='price-error' class='error' for='price'></span>
        <input type="number" name="neededAmount"   step="0.01" class="form-control" id="neededAmount" value="<?php echo $editProject['neededAmount']; ?>">
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Payment Method Select <span class="error">*</span></label><span id='type-error' class='error' ></span>

        <?php $typespm = array('Fixed Funding','Flexible Funding');?>
        
         <select name="paymentMethodID" class="form-control chosen-select" id="type">
            <option value="">Select Loan Term</option>
                <?php
                    if (is_array($typespm) and (!empty($typespm))) {
                        foreach ($typespm as $key=>$value) {
                            $v = (set_value('paymentMethodID')!='')?set_value('paymentMethodID'):$editProject['paymentMethodID'];
                            $sel = ($v == $value)?'selected="selected"':'';
                            ?>
                            <option  value="<?php echo $value; ?>" <?php echo $sel;?>><?php echo $value; ?></option>
                        <?php
                        }
                    }
                ?>
        </select>
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Interest Rate<span class="error">*</span></label><span id='special-price-error' class='error' for='special_price'></span>
        <input type="number" name="interestRate"  class="form-control"  id="special_price" value="<?php echo $editProject['interestRate']; ?>">
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Project End Date<span class="error">*</span></label><span id='projectEndDate' class='error' for='projectEndDate'></span>

        <input name="projectEndDate" type="text" class="form-control" id="datepicker" value="<?php echo $editProject['projectEndDate']; ?>">
    </div>
</div>



<div class="col-lg-12">
    <div class="form-group">
        <label> Address 1</label>
        <input name="address1" value="<?php echo $editProject['address1']; ?>"  class="form-control">
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label> Address 2</label>
        <input name="address2" value="<?php echo $editProject['address2']; ?>"  class="form-control">
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
                        $v = (set_value('country')!='')?set_value('country'):$editProject['country'];
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
                        $v = (set_value('state')!='')?set_value('state'):$editProject['state'];
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
    <div id="result">
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>City</label>
        <input name="city" value="<?php echo $editProject['city']; ?>" id="city" class="form-control">
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label>Feed URL</label>
        <input name="feedURL" value="<?php echo $editProject['feedURL']; ?>"  class="form-control">
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label>Video URL</label>
        <input name="videoURL" value="<?php echo $editProject['videoURL']; ?>"  class="form-control">
    </div>
</div>


<div class="col-lg-12">
    <div class="form-group">
        <label>Monthly Income<span class="error">*</span></label><span id='monthlyIncome-price-error' class='error' for='monthlyIncome'></span>
        <input type="number" name="monthlyIncome"  class="form-control"  id="monthlyIncome" value="<?php echo $editProject['monthlyIncome']; ?>">
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Total Expensese<span class="error">*</span></label><span id='totalExpenses-price-error' class='error' for='totalExpenses'></span>
        <input type="number" name="totalExpenses"  class="form-control"  id="totalExpenses" value="<?php echo $editProject['totalExpenses']; ?>">
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Home Ownership</label>

        <?php $typesyn = array('Yes','No');?>
        
        <select name="homeOwnership" class="form-control chosen-select" id="type">
            <option value="">Select Home Ownership</option>
                <?php
                    if (is_array($typesyn) and (!empty($typesyn))) {
                        foreach ($typesyn as $key=>$value) {
                            $v = (set_value('homeOwnership')!='')?set_value('homeOwnership'):$editProject['homeOwnership'];
                            $sel = ($v == $value)?'selected="selected"':'';
                            ?>
                            <option  value="<?php echo $value; ?>" <?php echo $sel;?>><?php echo $value; ?></option>
                        <?php
                        }
                    }
                ?>
        </select>
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Length Of Employment</label>
        <input type="number" name="lengthOfEmployment" value="<?php echo $editProject['lengthOfEmployment']; ?>" class="form-control" >
    </div>
</div>


<div class="col-lg-12">
    <div class="form-group">
        <label>Debt To Income<span class="error">*</span></label><span id='debtToIncome-error' class='error' for='debtToIncome'></span>
        <input type="number" name="debtToIncome"  class="form-control"  id="debtToIncome" value="<?php echo $editProject['debtToIncome']; ?>">
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Employment Self Employment</label>
        <input name="employmentSelfemployment" value="<?php echo $editProject['employmentSelfemployment']; ?>" class="form-control" >
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Monthly Expenses<span class="error">*</span></label><span id='monthlyExpenses-error' class='error' for='monthlyExpenses'></span>
        <input type="number" name="monthlyExpenses"  class="form-control"  id="monthlyExpenses" value="<?php echo $editProject['monthlyExpenses']; ?>">
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Other Loan Repayment</label>
        <input type="number" name="otherLoanRepayment"  class="form-control"  id="otherLoanRepayment" value="<?php echo $editProject['otherLoanRepayment']; ?>">
    </div>
</div>



<div class="col-lg-12">
    <div class="form-group">
        <label>Transport Charge</label>
        <input type="number" name="transportCharge"  class="form-control"  id="transportCharge" value="<?php echo $editProject['transportCharge']; ?>">
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Insurance</label>
        <input type="number" name="insurance"  class="form-control"  id="insurance" value="<?php echo $editProject['insurance']; ?>">
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Courses School Fees</label>
        <input type="number" name="coursesSchoolFees"  class="form-control"  id="coursesSchoolFees" value="<?php echo $editProject['coursesSchoolFees']; ?>">
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>TaxNIProvisions</label>
        <input type="number" name="TaxNIProvisions"  class="form-control"  id="TaxNIProvisions" value="<?php echo $editProject['TaxNIProvisions']; ?>">
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
            purposeID:{
                required:true
            },
            shortDescription:{
                required:true
            },

            creditScore:{
               required:true
              },

            loanTerm:{
                required:true
            },
            RepaymentScheduleID:{
                required:true
            },
            paymentMethodID:{
                required:true
            },


            country:{
                required:true
            },
            neededAmount:{
                required:true,
                number: true
            },
            interestRate:{
                required:true,
                number: true
            },
            monthlyIncome:{
                required:true,
                number: true
            },

            totalExpenses:{
                required:true,
                number: true
            },

            debtToIncome:{
                required:true,
                number: true
            },

            city:{
                required:true

            },

            monthlyExpenses:{
                number: true
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
                required: "Project Name is Required",
            },


            shortDescription: {
                required: "Short Description is Required",
            },


            country: {
                required: "Project Country is Important !",
            },
            neededAmount: {
                required: "Needed Amount is Required, 0-9 Number digit only allow",
            },
            city: {
                required: "City is Required",
            },


            interestRate: {
                required: "Interest Rate Price is Required, 0-9 Number digit only allow",
            },

            monthlyIncome: {
                required: "Total Expenses is Required, 0-9 Number digit only allow",
            },

            totalExpenses: {
                required: "Total Expenses is Required, 0-9 Number digit only allow",
            },
            debtToIncome: {
                required: "Debt To Income is Required, 0-9 Number digit only allow",
            },
            monthlyExpenses: {
                required: "0-9 Number digit only allow",
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


<script type="text/javascript">


    jQuery(document).ready(function() {
        //Date picker
        $('#datepicker2').datepicker({
            autoclose: true
        });
        $('#datepicker').datepicker({
            autoclose: true
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
            url: base_url + "project/project/getStateByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#result").html(resultData);
            }
        });

    }

</script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js" ></script>

