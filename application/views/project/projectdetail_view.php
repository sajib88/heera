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
        <h1>
            Project Detials
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Project</a></li>
            <li class="active">Detials</li>
        </ol>
    </section>

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







            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
