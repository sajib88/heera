<style type="text/css">
    .label{
        color: #333;
    }
</style>

<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-list"></i>  <?php if(!empty($page_title)){ echo $page_title;} else {}?>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 no-padding">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">

                        <ul class="nav nav-tabs">
                            <li class="active"><a class="tabaction" data-tabdata='<?php echo 'past'; ?>'  href="#pastDue" data-toggle="tab" aria-expanded="true">Past Due</a></li>
                            <li class=""><a class="tabaction" data-tabdata='<?php echo 'due'; ?>' href="#due" data-toggle="tab" aria-expanded="false">Due</a></li>
                            <li class=""><a class="tabaction" data-tabdata='<?php echo 'current'; ?>' href="#current" data-toggle="tab" aria-expanded="false">Current</a></li>
                            <li class=""><a class="tabaction" data-tabdata='<?php echo 'all'; ?>' href="#all" data-toggle="tab" aria-expanded="false">All</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="pastDue">
                                <?php if(empty($pastDueArr)){?>
                                    <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php if(!empty($no_data)){ echo $no_data ; }else{}?></div>
                                <?php }else{?>
                                <div id="no-more-tables">

                                    <table class="table table table-striped table-bordered dataTable no-footer " id="js_personal_table">
                                        <thead>
                                        <tr>
                                            <th class="numeric">#</th>
                                            <th class="numeric">Project Name</th>
                                            <th class="numeric">Borrower Name</th>
                                            <th class="numeric">Payment Date</th>
                                            <th class="numeric">Payment amount</th>
                                            <th class="numeric">Loan balance</th>
                                            <th class="numeric">Status</th>
                                            <th class="numeric">View</th>
                                            <!-- <th class="numeric">--><?php //echo 'Payment Process By';?><!--</th>-->
                                            <!-- <th class="numeric">--><?php //echo 'Payment Process Time';?><!--</th>-->
                                            <th class="numeric text-center">Make Payment</th>
                                            <th class="numeric text-center">Defaulted</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($pastDueArr)) {
                                            $i = 1;
                                            foreach ($pastDueArr as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td data-title="Project Name" class="numeric"><span><?php echo $row->projectName; ?></span></td>
                                                    <td data-title="Borrower Name" class="numeric"><span class="label"> <?php echo $row->borrowerName; ?> </span></td>
                                                    <td data-title="Payment Date" class="numeric"><span class="label"> <?php echo date('m-d-Y',strtotime($row->schedualeDateTime)); ?> </span></td>
                                                    <td data-title="Payment amount>" class="numeric"><span>$<?php echo $row->repaidAmount; ?></span></td>
                                                    <td data-title="Loan balance" class="numeric"><span>$<?php echo '0.00'; ?></span></td>
                                                    <td data-title="Status" class="numeric"><span class="label"> <?php echo $row->repaidStatus; ?> </span></td>
                                                    <!--                                                <td data-title="--><?php //echo 'Payment Process By'; ?><!--"-->
                                                    <!--                                                    class="numeric"><span class="label"> --><?php //echo $row->processBy; ?><!-- </span></td>-->
                                                    <!--                                                <td data-title="--><?php //echo 'Payment Process Time'; ?><!--"-->
                                                    <!--                                                    class="numeric"><span class="label"> --><?php //echo date('M-d-Y',strtotime($row->paymentProcessTime)); ?><!-- </span></td>-->
                                                    <td data-title="View" class="numeric"> <a  class="btn btn-block btn-info"   href="<?php echo base_url('project/Project/detail/'); ?>/<?=$row->projectID?>" > View </a></td>

                                                    <td data-title="Make Payment" class="numeric text-center">
                                                        <?php  if($row->repaidStatus == 'Unpaid' || $row->repaidStatus == 'Due') {?>
                                                            <a class="makepaymentAct btn btn-block btn-success"  data-scheduleid='<?=$row->repaymentScheduleID?>' href="javascript:" > Make payment </a>
                                                        <?php } else {?>

                                                            <button class="btn btn-block btn-primary"   href="javascript:" > Done </button>

                                                        <?php }?>
                                                    </td>
                                                    <td data-title="Defaulted" class="numeric"> <a  class="defaulted btn btn-block btn-warning" data-projectid='<?=$row->projectID?>'   href="javascript:" > Defaulted </a></td>
                                                </tr>
                                                <?php $i++;
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php }?>
                            </div>

                            <div class="tab-pane" id="due">
                                <?php if(empty($dueArr)){?>
                                    <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php if(!empty($no_data)){ echo $no_data ; }else{}?></div>
                                <?php }else{?>
                                    <div id="no-more-tables">

                                        <table class="table table table-striped table-bordered dataTable no-footer" id="js_personal_table">
                                            <thead>
                                            <tr>
                                                <th class="numeric">#</th>
                                                <th class="numeric">Project Name</th>
                                                <th class="numeric">Borrower Name</th>
                                                <th class="numeric">Payment Date</th>
                                                <th class="numeric">Payment amount</th>
                                                <th class="numeric">Loan balance</th>
                                                <th class="numeric">Status</th>
                                                <th class="numeric">View</th>
                                                <!-- <th class="numeric">--><?php //echo 'Payment Process By';?><!--</th>-->
                                                <!-- <th class="numeric">--><?php //echo 'Payment Process Time';?><!--</th>-->
                                                <th class="numeric text-center">Make Payment</th>
                                                <th class="numeric text-center">Defaulted</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($dueArr)) {
                                                $i = 1;
                                                foreach ($dueArr as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td data-title="Project Name" class="numeric"><span><?php echo $row->projectName; ?></span></td>
                                                        <td data-title="Borrower Name" class="numeric"><span class="label"> <?php echo $row->borrowerName; ?> </span></td>
                                                        <td data-title="Payment Date" class="numeric"><span class="label"> <?php echo date('m-d-Y',strtotime($row->schedualeDateTime)); ?> </span></td>
                                                        <td data-title="Payment amount>" class="numeric"><span>$<?php echo $row->repaidAmount; ?></span></td>
                                                        <td data-title="Loan balance" class="numeric"><span>$<?php echo '0.00'; ?></span></td>
                                                        <td data-title="Status" class="numeric"><span class="label"> <?php echo $row->repaidStatus; ?> </span></td>
                                                        <!--                                                <td data-title="--><?php //echo 'Payment Process By'; ?><!--"-->
                                                        <!--                                                    class="numeric"><span class="label"> --><?php //echo $row->processBy; ?><!-- </span></td>-->
                                                        <!--                                                <td data-title="--><?php //echo 'Payment Process Time'; ?><!--"-->
                                                        <!--                                                    class="numeric"><span class="label"> --><?php //echo date('M-d-Y',strtotime($row->paymentProcessTime)); ?><!-- </span></td>-->
                                                        <td data-title="View" class="numeric"> <a  class="btn btn-block btn-info"   href="<?php echo base_url('project/Project/detail/'); ?>/<?=$row->projectID?>" > View </a></td>

                                                        <td data-title="Make Payment" class="numeric text-center">
                                                            <?php  if($row->repaidStatus == 'Unpaid' || $row->repaidStatus == 'Due') {?>
                                                                <a class="makepaymentAct btn btn-block btn-success"  data-scheduleid='<?=$row->repaymentScheduleID?>' href="javascript:" > Make payment </a>
                                                            <?php } else {?>

                                                                <button class="btn btn-block btn-primary"   href="javascript:" > Done </button>

                                                            <?php }?>
                                                        </td>
                                                        <td data-title="Defaulted" class="numeric"> <a  class="defaulted btn btn-block btn-warning" data-projectid='<?=$row->projectID?>'   href="javascript:" > Defaulted </a></td>
                                                    </tr>
                                                    <?php $i++;
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php }?>
                            </div>

                            <div class="tab-pane" id="current">
                                <?php if(empty($currentArr)){?>
                                    <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php if(!empty($no_data)){ echo $no_data ; }else{}?></div>
                                <?php }else{?>
                                    <div id="no-more-tables">

                                        <table class="table table table-striped table-bordered dataTable no-footer" id="js_personal_table">
                                            <thead>
                                            <tr>
                                                <th class="numeric">#</th>
                                                <th class="numeric">Project Name</th>
                                                <th class="numeric">Borrower Name</th>
                                                <th class="numeric">Payment Date</th>
                                                <th class="numeric">Payment amount</th>
                                                <th class="numeric">Loan balance</th>
                                                <th class="numeric">Status</th>
                                                <th class="numeric">View</th>
                                                <!-- <th class="numeric">--><?php //echo 'Payment Process By';?><!--</th>-->
                                                <!-- <th class="numeric">--><?php //echo 'Payment Process Time';?><!--</th>-->
                                                <th class="numeric text-center">Make Payment</th>
                                                <th class="numeric text-center">Defaulted</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($currentArr)) {
                                                $i = 1;
                                                foreach ($currentArr as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td data-title="Project Name" class="numeric"><span><?php echo $row->projectName; ?></span></td>
                                                        <td data-title="Borrower Name" class="numeric"><span class="label"> <?php echo $row->borrowerName; ?> </span></td>
                                                        <td data-title="Payment Date" class="numeric"><span class="label"> <?php echo date('m-d-Y',strtotime($row->schedualeDateTime)); ?> </span></td>
                                                        <td data-title="Payment amount>" class="numeric"><span>$<?php echo $row->repaidAmount; ?></span></td>
                                                        <td data-title="Loan balance" class="numeric"><span>$<?php echo '0.00'; ?></span></td>
                                                        <td data-title="Status" class="numeric"><span class="label"> <?php echo $row->repaidStatus; ?> </span></td>
                                                        <!--                                                <td data-title="--><?php //echo 'Payment Process By'; ?><!--"-->
                                                        <!--                                                    class="numeric"><span class="label"> --><?php //echo $row->processBy; ?><!-- </span></td>-->
                                                        <!--                                                <td data-title="--><?php //echo 'Payment Process Time'; ?><!--"-->
                                                        <!--                                                    class="numeric"><span class="label"> --><?php //echo date('M-d-Y',strtotime($row->paymentProcessTime)); ?><!-- </span></td>-->
                                                        <td data-title="View" class="numeric"> <a  class="btn btn-block btn-info"   href="<?php echo base_url('project/Project/detail/'); ?>/<?=$row->projectID?>" > View </a></td>

                                                        <td data-title="Make Payment" class="numeric text-center">
                                                            <?php if($row->repaidStatus == 'Unpaid') {?>
                                                                <a class="makepaymentAct btn btn-block btn-success"  data-scheduleid='<?=$row->repaymentScheduleID?>' href="javascript:" > Make payment </a>
                                                            <?php } else {?>

                                                                <button class="btn btn-block btn-primary"   href="javascript:" > Done </button>

                                                            <?php }?>
                                                        </td>
                                                        <td data-title="Defaulted" class="numeric"> <a  class="defaulted btn btn-block btn-warning" data-projectid='<?=$row->projectID?>'   href="javascript:" > Defaulted </a></td>
                                                    </tr>
                                                    <?php $i++;
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php }?>
                            </div>

                            <div class="tab-pane" id="all">
                                <?php if(empty($allRepaymentList)){?>
                                    <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php if(!empty($no_data)){ echo $no_data ; }else{}?></div>
                                <?php }else{?>
                                    <div id="no-more-tables">

                                        <table class="table table table-striped table-bordered dataTable no-footer" id="js_personal_table">
                                            <thead>
                                            <tr>
                                                <th class="numeric">#</th>
                                                <th class="numeric">Project Name</th>
                                                <th class="numeric">Borrower Name</th>
                                                <th class="numeric">Payment Date</th>
                                                <th class="numeric">Payment amount</th>
                                                <th class="numeric">Loan balance</th>
                                                <th class="numeric">Status</th>
                                                <th class="numeric">View</th>
                                                <!-- <th class="numeric">--><?php //echo 'Payment Process By';?><!--</th>-->
                                                <!-- <th class="numeric">--><?php //echo 'Payment Process Time';?><!--</th>-->
                                                <th class="numeric text-center">Make Payment</th>
                                                <th class="numeric text-center">Defaulted</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($allRepaymentList)) {
                                                $i = 1;
                                                foreach ($allRepaymentList as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td data-title="Project Name" class="numeric"><span><?php echo $row->projectName; ?></span></td>
                                                        <td data-title="Borrower Name" class="numeric"><span class="label"> <?php echo $row->borrowerName; ?> </span></td>
                                                        <td data-title="Payment Date" class="numeric"><span class="label"> <?php echo date('m-d-Y',strtotime($row->schedualeDateTime)); ?> </span></td>
                                                        <td data-title="Payment amount>" class="numeric"><span>$<?php echo $row->repaidAmount; ?></span></td>
                                                        <td data-title="Loan balance" class="numeric"><span>$ <?php if(!empty($row->dueAmount)){echo $row->dueAmount;}else{echo '0.00';} ?></span></td>
                                                        <td data-title="Status" class="numeric"><span class="label"> <?php echo $row->repaidStatus; ?> </span></td>
                                                        <!--                                                <td data-title="--><?php //echo 'Payment Process By'; ?><!--"-->
                                                        <!--                                                    class="numeric"><span class="label"> --><?php //echo $row->processBy; ?><!-- </span></td>-->
                                                        <!--                                                <td data-title="--><?php //echo 'Payment Process Time'; ?><!--"-->
                                                        <!--                                                    class="numeric"><span class="label"> --><?php //echo date('M-d-Y',strtotime($row->paymentProcessTime)); ?><!-- </span></td>-->
                                                        <td data-title="View" class="numeric"> <a  class="btn btn-block btn-info"   href="<?php echo base_url('project/Project/detail/'); ?>/<?=$row->projectID?>" > View </a></td>

                                                        <td data-title="Make Payment" class="numeric text-center">
                                                            <?php if($row->repaidStatus == 'Unpaid' || $row->repaidStatus == 'Due')  {?>
                                                                <a class="makepaymentAct btn btn-block btn-success"  data-scheduleid='<?=$row->repaymentScheduleID?>' href="javascript:" > Make payment </a>
                                                            <?php } else {?>

                                                                <button class="btn btn-block btn-primary"   href="javascript:" > Done </button>

                                                            <?php }?>
                                                        </td>
                                                        <td data-title="Defaulted" class="numeric"> <a  class="defaulted btn btn-block btn-warning" data-projectid='<?=$row->projectID?>'   href="javascript:" > Defaulted </a></td>
                                                    </tr>
                                                    <?php $i++;
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<div id="viewModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa  fa-list"></i> &nbsp;Repayment Approval</h4>
            </div>
            <div class="modal-body">
                <div id="showview"></div>
            </div>
        </div>
    </div>
</div>


<div id="viewdefaulted" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa  fa-list"></i> &nbsp;Change Status</h4>
            </div>
            <div class="modal-body">
                <div id="viewdefaulteddata"></div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/dataTables.bootstrap.js"></script>
<script rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>



<script type="text/javascript">

        $('.dataTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "autoWidth": false,
            "lengthMenu": [[12, 25, 50, -1], [12, 25, 50, "All"]]

        });
</script>


<script type="application/javascript">

    $(".makepaymentAct").click(function(e) {

        var base_url = '<?php echo base_url() ?>';
        var fundedprojectID = $(this).data('scheduleid');

        $.ajax({
            type: 'GET',
            url: base_url + "repaymentprocess/getRepayment/"+fundedprojectID, //this file has the calculator function code
            //data: id,
            success:function(data){
                $('#showview').html(data);
                $('#viewModal').modal('show');

            }
        });

    });

    $(".defaulted").click(function(e) {

        var base_url = '<?php echo base_url() ?>';
        var projectid = $(this).data('projectid');

        $.ajax({
            type: 'GET',
            url: base_url + "borrowers/borrowers/defaulted/"+projectid, //this file has the calculator function code
            //data: id,
            success:function(data){
                $('#viewdefaulteddata').html(data);
                $('#viewdefaulted').modal('show');

            }
        });

    });


    $(".tabaction").click(function(e) {

        var base_url = '<?php echo base_url() ?>';
        var tabdata = $(this).data('tabdata');

        $.ajax({
            type: 'POST',
            url: base_url + "repaymentprocess/getrepaymentlist", //this file has the calculator function code
            data: 'selectedTab='+tabdata,
            success:function(data){
              $(this).html(data);
               // $('#showview').html(data);
             //   $('#viewModal').modal('show');

            }
        });

    });


</script>



