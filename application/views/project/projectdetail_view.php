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
    .img-size{
        margin: 0 auto;
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


                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b> Project Name</b> <span class="pull-right">  <?php echo (!empty( $layoutfull['name']))? $layoutfull['name']:''?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Purpose</b> <span class="pull-right"> <?php
                                    $data = get_data('purpose_lookup', array('purposeID' => $layoutfull['purposeID']));
                                    echo $data['purposeTitle'];
                                    ?></span>
                            </li>

                        </ul>


                        <hr>
                        <strong>Short Description</strong>

                        <p class="text-muted">
                            <?php echo (!empty( $layoutfull['shortDescription']))? $layoutfull['shortDescription']:''?>
                        </p>

                        <hr>

                        <strong> Long Description</strong>

                        <p class="text-muted">
                            <?php echo (!empty( $layoutfull['detailsDescription']))? $layoutfull['shortDescription']:''?>
                        </p>

                        <hr>







                    </div>
                    <!-- /.box-body -->
                </div>


                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Borrower Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Full name</b> <span class="pull-right">  <?php echo (!empty( $layoutfull['first_name']))? $layoutfull['first_name']:''?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Date of Birth</b> <span class="pull-right">  <?php echo (!empty( $layoutfull['dateofbirth']))? $layoutfull['dateofbirth']:''?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <span class="pull-right">  <?php echo (!empty( $layoutfull['email']))? $layoutfull['email']:''?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Phone number</b> <span class="pull-right">  <?php echo (!empty( $layoutfull['phone']))? $layoutfull['phone']:''?></span>
                            </li>

                        </ul>


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

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Loan Term</b> <span class="pull-right"><?php echo (!empty( $layoutfull['loanTerm']))? $layoutfull['loanTerm']:''?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Repayment Schedule</b> <span class="pull-right"><?php  $data = get_data('repaymentschedulelookup', array('RepaymentScheduleID' => $layoutfull['RepaymentScheduleID']));
                                    echo $data['repaymentScheduleTitle']; ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Needed Amount</b> <span class="pull-right"><?php echo (!empty( $layoutfull['neededAmount']))? $layoutfull['neededAmount']:'Not selected'?></span>
                            </li>
                            <li class="list-group-item">
                                <b> Minimum Amount</b> <span class="pull-right"><?php echo (!empty( $layoutfull['minimumAmount']))? $layoutfull['minimumAmount']:'Not selected'?></span>
                            </li>

                            <li class="list-group-item">
                                <b> Payment Method</b> <span class="pull-right"><?php echo (!empty( $layoutfull['paymentMethodID']))? $layoutfull['paymentMethodID']:'Not selected'?></span>
                            </li>
                            <li class="list-group-item">
                                <b> Interest Rate</b> <span class="pull-right"><?php echo (!empty( $layoutfull['interestRate']))? $layoutfull['interestRate']:'Not selected'?></span>
                            </li>

                            <li class="list-group-item">
                                <b> Project End Date</b> <span class="pull-right"><?php $dbdate = new DateTime($layoutfull['projectEndDate']);
                                   echo  $date = $dbdate->format('m-d-Y');?></span>
                            </li>


                        </ul>






                    </div>
                    <!-- /.box-body -->
                </div>





                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Lender</h3>
                        </div>
                        <div class="box-body">
                            <?php if(empty($lenders)){

                                ?>
                                <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i> Project Not Funded Yet.</div>
                            <?php }else{?>
                                <table class="table table table-striped table-bordered dataTable no-footer" id="js_personal_table">
                                    <thead>
                                    <tr>
                                        <th class="numeric">Lender Name</th>

                                        <th class="numeric">Amount Funded</th>

                                        <th class="numeric">View</th>
                                        <th class="numeric">Refund</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($lenders)) {

                                        foreach ($lenders as $row) {
                                            // print_r($data);


                                            ?>
                                            <tr>
                                                <td class="numeric"><?php echo $row->lenderName; ?></td>
                                                <td class="numeric">$<?php echo $row->fundedAmount; ?></td>
                                                <td class="numeric"><a class="viewprojects btn btn-block btn-info"  data-landerID='<?=$row->fundedBy?>' href="javascript:" > View</a></td>
                                                <td class="numeric"><a class="btn btn-block btn-warning" href="<?php ///echo base_url('project/Project/edit/' . $row->projectID); ?>" > Refund </a></td>
                                            </tr>
                                            <?php
                                        }
                                    }else{
                                        echo 'No data Found';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            <?php }?>
                        </div>
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

                        <hr>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b> <?php echo (!empty( $layoutfull['country']))? countryNameByID($layoutfull['country']).',':''?>
                                    <?php echo (!empty( $layoutfull['state']))? $layoutfull['state'].',':''?>
                                    <?php echo (!empty( $layoutfull['city']))? $layoutfull['city']:''?></span>
                            </li>

                        </ul>




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
                                <b>Monthly Income ($)</b> <span class="pull-right"><?php echo (!empty( $layoutfull['monthlyIncome']))? $layoutfull['monthlyIncome']:''?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Monthly Expenses  ($)</b> <span class="pull-right"><?php echo (!empty( $layoutfull['monthlyExpenses']))? $layoutfull['monthlyExpenses']:'Not selected'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Home Ownership</b> <span class="pull-right"><?php echo (!empty( $layoutfull['homeOwnership']))? $layoutfull['homeOwnership']:'Not selected'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Current Employment</b> <span class="pull-right"><?php echo (!empty( $layoutfull['employmentSelfemployment']))? $layoutfull['employmentSelfemployment']:'Not selected'?></span>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->



                </div>


                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Project Images</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row padd">
                                <div class="col-sm-12">
                                    <?php if(!empty($layoutfull['photo1'])){ ?>
                                        <img  src="<?php echo base_url() . 'assets/file/project/' .$layoutfull['photo1']; ?>" alt="projet"  class="img-responsive circular img-size">
                                    <?php } else{}?>
                                </div>
                                <div class="col-sm-12">
                                    <?php if(!empty($layoutfull['photo2'])){ ?>
                                        <img  src="<?php echo base_url() . 'assets/file/project/' .$layoutfull['photo2']; ?>" alt="projet"  class="img-responsive circular img-size">
                                    <?php } else{}?>
                                </div>
                                <div class="col-sm-12">
                                    <?php if(!empty($layoutfull['photo3'])){ ?>
                                        <img  src="<?php echo base_url() . 'assets/file/project/' .$layoutfull['photo3']; ?>" alt="projet"  class="img-responsive circular img-size">
                                    <?php } else{}?>
                                </div>
                            </div>
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



            <div id="viewModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa  fa-child"></i> &nbsp;  Lendar Profile</h4>



                        </div>
                        <div class="modal-body">
                            <div id="showview"></div>
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
                            var msg = "<div class='alert alert-danger'>Project end date not allow to blank. Please add project end date first </div>";
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


<script type="application/javascript">
   // var pid = document.getElementById('pid');
    //var sendpid = pid.getAttribute('data-view');
    $(".viewprojects").click(function(e) {

    var base_url = '<?php echo base_url() ?>';
    var selectedLanderID = $(this).data('landerid');
    //var id=sendpid;
    $.ajax({
    type: 'GET',
    url: base_url + "project/project/lenderProfile/"+selectedLanderID, //this file has the calculator function code
    //data: id,
    success:function(data){
    $('#showview').html(data);
    $('#viewModal').modal('show');

    }
    });

    });

</script>


