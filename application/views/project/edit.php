
<div class="content-wrapper">

    <section class="content-header">
        <div class="col-md-6 no-padding">
            <h1>
                <i class="fa fa-tasks"></i> &nbsp; Edit Project Details
            </h1>
        </div>
        <div class="col-md-6 no-padding" style="text-align: right;">
            <?php
             if($editProject['adminApprovalStatus'] == null){
                ?>
                <a href="#" class="btn btn-success" id="approveProject">  <i class="fa fa-check"></i> Approved</a>
                <a class="btn btn-danger" id="rejectProject" href="#"> <i class="fa fa-trash-o"></i> Reject</a>&nbsp;
            <?php   }?>

            <a href="<?php echo base_url('project/Project/detail/' . $editProject['projectID']); ?>" class="btn btn-default">  <i class="fa fa-eye"></i> View</a>

        </div>
        <div style="clear: both;"></div>

    </section>
<?php if($this->session->flashdata('message')){ ?>
    <div class="col-lg-12">
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success! Your Project Updated successfully.</strong>
        </div>
    </div>
<?php } $this->session->unset_userdata('message'); ?>

    <div id="foo"></div>
    <form role="form" method="post" id="classifiedform" enctype="multipart/form-data" action="<?php echo base_url('project/Project/edit/'. $editProject['projectID']); ?>">
        <input type="hidden" name="login_id" value="<?php echo $editProject['userID']; ?>">
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
                                        <label>Project Name<span class="error">*</span></label>
                                        <input name="name" type="text" id="name" placeholder="Name" value="<?php echo $editProject['name']; ?>"  class="form-control">
                                        <?php echo form_error('name');?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Purpose<span class="error">*</span></label><span id='purposeID-error' class='error' for='purposeID'></span>
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
                            </div>

                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">                                        
                                        <label>Short Description<span class="error">*</span></label>
                                        <textarea  name="shortDescription" class="form-control"><?php echo $editProject['shortDescription']; ?></textarea>
                                        <?php echo form_error('shortDescription');?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">                                        
                                        <label>Details Description</label>
                                        <textarea  name="detailsDescription" class="form-control"><?php echo $editProject['detailsDescription']; ?></textarea>
                                        <?php echo form_error('detailsDescription');?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 ">
                                    <div class="form-group" id="photo_id">
                                        <label>Upload Image<span class="error">*</span></label><span id='picture1-error' class='error' for='picture1'></span>
                                        <input class="btn btn-default" name="mainImage" type="file">
                                        <?php if(!empty($editProject['mainImage'])){?>
                                        <a href="javascript:;"  class="mask tt"  photoss="<?php echo $editProject['mainImage'];?>" >  &nbsp &nbsp View Picture</a>
                                        <?php }else{ } ?>
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="form-group">                                        
                                        <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                                        <input class="btn btn-default" name="photo1" type="file">
                                        <?php if(!empty($editProject['photo1'])){?>
                                        <a href="javascript:;"  class="mask tt"  photoss="<?php echo $editProject['photo1'];?>" > &nbsp &nbsp View Picture</a>
                                        <?php }else{ } ?>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>Picture Three</label><span id='picture2-error' class='error' for='picture2'></span>
                                        <input class="btn btn-default" name="photo2" type="file">
                                        <?php if(!empty($editProject['photo2'])){?>
                                        <a href="javascript:;"  class="mask tt"  photoss="<?php echo $editProject['photo2'];?>" > &nbsp &nbsp View Picture</a>
                                        <?php }else{ } ?>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>Picture Four</label><span id='picture3-error' class='error' for='picture3'></span>
                                        <input class="btn btn-default" name="photo3" type="file">
                                        <?php if(!empty($editProject['photo3'])){?>
                                        <a href="javascript:;"  class="mask tt"  photoss="<?php echo $editProject['photo3'];?>" > &nbsp &nbsp View Picture</a>                                  
                                        <?php }else{ } ?>
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
                                        <input name="address1" value="<?php echo $editProject['address1']; ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Address 2</label>
                                        <input name="address2" value="<?php echo $editProject['address2']; ?>"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Country</label>
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
                                <div class="col-lg-6">
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
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input name="city" value="<?php echo $editProject['city']; ?>" id="city" class="form-control">
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
                                <div class="col-lg-6">
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
                                        <?php echo form_error('RepaymentScheduleID');?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Needed Amount ($)</label>
                                        <input type="number" name="neededAmount"   step="0.01" class="form-control" id="neededAmount" value="<?php echo $editProject['neededAmount']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Minimum Amount ($)</label>
                                        <input type="number" name="minimumAmount"   step="0.01" class="form-control" id="minimumAmount" value="<?php echo $editProject['minimumAmount']; ?>">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Type of Funding </label>

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

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Interest Rate</label>
                                        <input type="number" name="interestRate"  class="form-control"  id="special_price" value="<?php echo $editProject['interestRate']; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Project End Date</label>

                                        <input name="projectEndDate" type="text" class="form-control" id="datepicker" value="<?php echo $editProject['projectEndDate']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">








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
                                        <input type="number" name="monthlyIncome"  class="form-control"  id="monthlyIncome" value="<?php echo $editProject['monthlyIncome']; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Monthly Expenses</label>
                                        <input type="number" name="monthlyExpenses" value="<?php echo $editProject['monthlyExpenses']; ?>"  class="form-control"  id="monthlyExpenses" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Home Ownership</label>
                                        <?php $typesyn =  array('Own','Rent');?>
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

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Current Profession</label>
                                        <input type="number" name="lengthOfEmployment" value="<?php echo $editProject['lengthOfEmployment']; ?>" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Employment Status</label>
                                        <?php $types4 = array('Part-Time Employed','Full-Time Employed', 'Unemployed');?>
                                        <select name="employmentSelfemployment" class="form-control chosen-select" id="type">
                                            <option value="">Select Home Ownership</option>
                                            <?php
                                            if (is_array($types4) and (!empty($types4))) {
                                                foreach ($types4 as $key=>$value) {
                                                    $v = (set_value('employmentSelfemployment')!='')?set_value('employmentSelfemployment'):$editProject['employmentSelfemployment'];
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

                    <h3 class="box-title">Project Assign To Borrow</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Borrow Select<span class="error">*</span></label><span id='purposeID-error' class='error' for='purposeID'></span>
                                    <select name="userID" class="form-control chosen-select" id="type">
                                        <option value="">Select Borrow</option>
                                        <?php
                                        if (is_array($allborrowers) and (!empty($allborrowers))) {

                                            foreach ($allborrowers as $borrow) {
                                                $v = (set_value('id')!='')?set_value('id'):$editProject['userID'];
                                                $sel = ($v == $borrow->id)?'selected="selected"':'';
                                                ?>
                                                <option  value="<?php echo $borrow->id; ?>" <?php echo $sel;?>><?php echo $borrow->first_name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>



                            <!-- /.Lending -->
                        </div>
                    </div>
                </div>

            </div>


    </div>



    <div class="col-md-12">
        <div class="box box-primary">

            <!-- /.box-header -->
            <div class="box-body">

                    <div class="row">

                            <!-- /Lending -->


                            <div class="col-lg-6">

                                <?php echo anchor('profile/dashboard',"<i class='fa fa-undo'></i> &nbsp; &nbsp; Cancel",array('class' => 'btn btn-danger btn-lg'));?>
                            </div>
                            <div class="col-lg-6 ">
                                <button class="btn  btn-success  btn-lg pull-right"  name="submit" type="submit">
                                    <i class="fa fa-check"></i> &nbsp; &nbsp; Update</button>
                            </div>

                            <!-- /.Lending -->

                    </div>

            </div>

        </div>
    </div>


    <input type="hidden" id='pid' data-project='<?php echo $editProject['projectID']; ?>'></input>


</div>
    </form>
</section>

</div>



<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="photomodal" class="modal fade">
  <style>
    .carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img{
        height: 450px;
    }

    .modal-header .close{
        margin-top: -10px;
        color: #fff;
    }

  </style>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="photoss" id="photoss">

             </div>

        </div>
    </div>





</div>




<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-tasks"></i> &nbsp; Update Project Status</h4>



            </div>
            <div class="modal-body">
                <div id="showcal"></div>
            </div>

        </div>
    </div>
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

            userID:{
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

 <script type="text/javascript">

            $(document).ready(function(){

              $(document).on("click",".tt",function(){

                var ss  =    $(this).attr("photoss");
                var base_url = "<?php echo base_url();?>";


                 $('#photoss').html('<img src="'+base_url+'/assets/file/project/'+ss+'" class="img-responsive">');


                 $("#photomodal").modal("show");

               });
             });   
          </script>









<script>


    var pid = document.getElementById('pid');
    var sendpid = pid.getAttribute('data-project');

    $(document).ready(function() {


        $("#approveProject").click(function(e){
            var r = confirm('Do you want to Appreove this Project');
            if(r == true){
                var base_url = '<?php echo base_url() ?>';
                var id=sendpid;
                $.ajax({
                    type: 'GET',
                    url: base_url + "project/project/approvedProject/"+id, //this file has the calculator function code
                    //data: id,
                    success: function(msg) {

                        if (msg == 'success') {
                            // show success meessage
                            var msg = "<div class='alert alert-success'>Your Project Approved Successfully.  </div>";
                            $('#foo').html(msg);
                        }
                        else {
                            var msg = "<div class='alert alert-danger'>Project end date not allow to blank. Please add project end date first  </div>";
                            $('#foo').html(msg);
                        }

                    }



                });
                // alert('Your project status Approved successfully');

            }else{
                //alert('Canceled');
            }
        });

        $("#rejectProject").click(function(e) {
            var r = confirm('Do you want to Reject this Project');
            if (r == true) {


                var base_url = '<?php echo base_url() ?>';
                var id=sendpid;
                $.ajax({
                    type: 'GET',
                    url: base_url + "project/project/ajaxreject/"+id, //this file has the calculator function code
                    //data: id,
                    success:function(data){
                        $('#showcal').html(data);
                        $('#myModal').modal('show');

                    }
                });


            }
        });


    });

</script>



<script type="application/javascript">

    $('#rejectform').validate({
        rules: {
            shortDescription: {
                required:true,

            }
        },
        messages:{
            shortDescription: {
                required: "Rejected Reason Is Required",
            }
        }
    });




</script>
