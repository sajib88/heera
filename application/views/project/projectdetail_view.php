<style>

    .circular {
        width: 170px;
        height: 170px;
        border-radius: 150px;
        -webkit-border-radius: 150px;
        -moz-border-radius: 150px;
        padding: 3px;
        border: 3px solid #d2d6de;
    }
</style>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-md-6 no-padding">
            <h1>
               <i class="fa fa-tasks"></i> &nbsp; Project Details
            </h1>
        </div>
        <div class="col-md-6 no-padding" style="text-align: right;">
            <?php
            if($layoutfull['adminApprovalStatus'] == null){
            ?>
           <a href="#" class="btn btn-success" id="approveProject">  <i class="fa fa-check"></i> Approved</a>
            <a class="btn btn-danger" id="rejectProject" href="#"> <i class="fa fa-trash-o"></i> Reject</a>&nbsp;
            <?php }?>

            <a href="<?php echo base_url('project/Project/edit/' . $layoutfull['projectID']); ?>" class="btn btn-default">  <i class="fa fa-edit"></i> Edit</a>

        </div>
        <div style="clear: both;"></div>
    </section>
    <div id="foo"></div>
    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-md-4">



                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Project Image</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div style="text-align: center">
                            <img  src="<?php echo base_url() . 'assets/file/project/' .$layoutfull['mainImage']; ?>" alt="projet"  class="circular">
                        </div>



                        <hr>

                    </div>

                    <!-- /.box-body -->
                </div>

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Project Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-check"></i> Project Name</strong>
                        <p class="text-muted">
                            <?php echo (!empty( $layoutfull['name']))? $layoutfull['name']:''?>
                        </p>
                        <hr>


                        <strong><i class="fa fa-crosshairs"></i> Purpose </strong>
                        <p class="text-muted">

                            <?php
                            $data = get_data('purpose_lookup', array('purposeID' => $layoutfull['purposeID']));
                            echo $data['purposeTitle'];
                            ?>
                        </p>
                        <hr>
                        <strong><i class="fa fa-book margin-r-5"></i> Short Description</strong>

                        <p class="text-muted">
                            <?php echo (!empty( $layoutfull['shortDescription']))? $layoutfull['shortDescription']:''?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-book margin-r-5"></i> Long Description</strong>

                        <p class="text-muted">
                            <?php echo (!empty( $layoutfull['detailsDescription']))? $layoutfull['shortDescription']:''?>
                        </p>

                        <hr>







                    </div>
                    <!-- /.box-body -->
                </div>

                <!-- About Me Box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->



            <div class="col-md-4">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lending</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-arrow-circle-o-up"></i> Credit Score</strong>
                        <p class="text-muted">
                            <?php echo (!empty( $layoutfull['creditScore']))? $layoutfull['creditScore']:''?>
                        </p>
                        <hr>


                        <strong><i class="fa fa-arrows-h"></i> Loan Term </strong>
                        <p class="text-muted">

                            <?php echo (!empty( $layoutfull['loanTerm']))? $layoutfull['loanTerm']:''?>
                        </p>
                        <hr>
                        <strong><i class="fa fa-book margin-r-5"></i> RepaymentScheduleID</strong>

                        <p class="text-muted">

                            <?php
                            $data = get_data('repaymentschedulelookup', array('RepaymentScheduleID' => $layoutfull['RepaymentScheduleID']));
                            echo $data['repaymentScheduleTitle'];
                            ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-usd"></i> Needed Amount</strong>

                        <p class="text-muted">
                            <span class="badge bg-yellow"><?php echo (!empty( $layoutfull['neededAmount']))? $layoutfull['neededAmount']:''?></span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-usd"></i> Minimum Amount</strong>

                        <p class="text-muted">
                            <span class="badge bg-aqua"><?php echo (!empty( $layoutfull['minimumAmount']))? $layoutfull['minimumAmount']:''?></span>
                        </p>

                        <hr>


                        <strong><i class="fa fa-arrow-right"></i> Payment Method</strong>

                        <p class="text-muted">
                            <span class="badge bg-blue"><?php echo (!empty( $layoutfull['paymentMethodID']))? $layoutfull['paymentMethodID']:''?></span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-arrow-right"></i> Interest Rate</strong>

                        <p class="text-muted">
                            <span class="badge bg-red"><?php echo $layoutfull['interestRate'];?></span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-calendar"></i> Project End Date</strong>

                        <p class="text-muted">
                            <span class="badge bg-red"><?php echo (!empty( $layoutfull['projectEndDate']))? $layoutfull['projectEndDate']:''?></span>
                        </p>

                        <hr>





                    </div>
                    <!-- /.box-body -->
                </div>

            </div>





            <div class="col-md-4">



                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Location</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">
                            <?php echo (!empty( $layoutfull['country']))? countryNameByID($layoutfull['country']).',':''?>
                            <?php echo (!empty( $layoutfull['state']))? $layoutfull['state'].',':''?>
                            <?php echo (!empty( $layoutfull['city']))? $layoutfull['city']:''?>
                        </p>

                        <p class="text-muted">

                            <?php echo (!empty( $layoutfull['address1']))? $layoutfull['address1']:''?>
                        </p>

                        <hr>

                    </div>

                    <!-- /.box-body -->
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Personal Details</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Monthly Income ($)</b> <span class="pull-right badge bg-blue"><?php echo (!empty( $layoutfull['monthlyIncome']))? $layoutfull['monthlyIncome']:''?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Total Expenses ($)</b> <span class="pull-right badge bg-red"><?php echo (!empty( $layoutfull['totalExpenses']))? $layoutfull['totalExpenses']:'Not selected'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Home Ownership</b> <span class="pull-right badge bg-yellow"><?php echo (!empty( $layoutfull['homeOwnership']))? $layoutfull['homeOwnership']:'Not selected'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Length of Employment</b> <span class="pull-right badge bg-aqua"><?php echo (!empty( $layoutfull['lengthOfEmployment']))? $layoutfull['lengthOfEmployment']:'Not selected'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Debt to Income ($)</b> <span class="pull-right badge bg-blue"><?php echo (!empty( $layoutfull['debtToIncome']))? $layoutfull['debtToIncome']:'Not selected'?></span>
                            </li>


                            <li class="list-group-item">
                                <b>Monthly Expenses  ($)</b> <span class="pull-right badge bg-red"><?php echo (!empty( $layoutfull['monthlyExpenses']))? $layoutfull['monthlyExpenses']:'Not selected'?></span>
                            </li>

                            <li class="list-group-item">
                                <b>Other Loan Repayments ($)</b> <span class="pull-right badge bg-light-blue"><?php echo (!empty( $layoutfull['otherLoanRepayment']))? $layoutfull['otherLoanRepayment']:'Not selected'?></span>
                            </li>

                            <li class="list-group-item">
                                <b>Transport Charges ($)</b> <span class="pull-right badge bg-light-blue"><?php echo (!empty( $layoutfull['transportCharge']))? $layoutfull['transportCharge']:'Not selected'?></span>
                            </li>

                            <li class="list-group-item">
                                <b>Insurance ($)</b> <span class="pull-right badge bg-light-blue"><?php echo (!empty( $layoutfull['insurance']))? $layoutfull['insurance']:'Not selected'?></span>
                            </li>

                            <li class="list-group-item">
                                <b>Courses/School Fees ($)</b> <span class="pull-right badge bg-light-blue"><?php echo (!empty( $layoutfull['coursesSchoolFees']))? $layoutfull['coursesSchoolFees']:'Not selected'?></span>
                            </li>

                            <li class="list-group-item">
                                <b>Tax/NI Provisions ($)</b> <span class="pull-right badge bg-light-blue"><?php echo (!empty( $layoutfull['TaxNIProvisions']))? $layoutfull['TaxNIProvisions']:'Not selected'?></span>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>

                <!-- /.box -->
            </div>

            <!-- Modal -->




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





            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>


<input type="hidden" id='pid' data-project='<?php echo $layoutfull['projectID']; ?>'></input>
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

                alert(sendpid);
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
