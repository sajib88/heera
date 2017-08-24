<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 10-Dec-16
 * Time: 2:17 AM
 */
/*print '<pre>';
print_r($allpersonals);die;*/
?>

<style>

    #no-more-tables {padding-top:20px; padding-left: px; padding-right: 2px;}
</style>


<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-credit-card"></i> Billable Lenders

        </h1>
    </section>

    <?php if($this->session->flashdata('message')){ ?>
    <div class="col-lg-12">
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><?php echo $this->session->flashdata('message'); ?></strong>
        </div>
    </div>
    <?php } $this->session->unset_userdata('message'); ?>
    <div style="clear: both;"></div>
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#pendingBilling" data-toggle="tab" aria-expanded="true">Pending</a></li>
                <li class=""><a href="#approvedBilling" data-toggle="tab" aria-expanded="false">Approved</a></li>
                <li class=""><a href="#cancelBilling" data-toggle="tab" aria-expanded="false">Cancel</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="pendingBilling">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-body">
                                    <?php if(!empty($pendingBills)<=0){?>
                                        <div class="alert alert-info">Currently no Billable Lender is available.</div>
                                    <?php }else{?>
                                        <div id="no-more-tables">

                                            <table class="table table-striped table-bordered dataTable no-footer" id="pendingDataTable">
                                                <thead>
                                                <tr>

                                                    <th class="numeric">#</th>

                                                    <th class="numeric"><?php echo 'Lender Name';?></th>

                                                    <th class="numeric"><?php echo 'Transaction Reason';?></th>

                                                    <th class="numeric"><?php echo 'Transaction Date & Time';?></th>

                                                    <th class="numeric"><?php echo 'In Amount';?></th>

                                                    <th class="numeric"><?php echo 'Out Amount';?></th>

                                                    <th class="numeric"><?php echo 'Status';?></th>

                                                    <th class="numeric text-center"><?php echo 'Action';?></th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(!empty($pendingBills)) {
                                                    $i = 1;
                                                    foreach ($pendingBills as $row) {
                                                        ?>



                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td data-title="<?php echo 'Lender Name'; ?>"
                                                                class="numeric"><?php echo $row->lenderName; ?></td>
                                                            <td data-title="<?php echo 'Transaction Reason'; ?>"
                                                                class="numeric"><?php echo $row->transactionReason; ?></td>
                                                            <td data-title="<?php echo 'Transaction Date & Time'; ?>"
                                                                class="numeric"><?php
                                                                $phpdate = strtotime( $row->transactionDateTime);
                                                                echo  $mysqldate = date( 'm-d-Y | H:i:sa', $phpdate );
                                                                ?></td>
                                                            <td data-title="<?php echo 'Amount in'; ?>"
                                                                class="numeric">$<?php echo $row->inAmount; ?></td>
                                                            <td data-title="<?php echo 'Amount out'; ?>"
                                                                class="numeric">$<?php echo $row->outAmount; ?></td>

                                                            <td data-title="<?php echo 'transactionStatus'; ?>"
                                                                class="numeric"><?php echo $row->transactionStatus; ?></td>

                                                            <td data-title="<?php echo 'Action'; ?>" class="numeric text-center">
                                                                <a href="<?php echo base_url('lendars/Lendars/changePaymentStatus/' . $row->transactionID . '/done/' .$row->outAmount .'/'. $row->inAmount.'/'. $row->userID); ?>" class="btn btn-success">Approve</a>
                                                                <a href="<?php echo base_url('lendars/Lendars/changePaymentStatus/' . $row->transactionID . '/cancel'); ?>" class="btn btn-danger">Cancel</a>
                                                            </td>

                                                        </tr>
                                                        <?php $i++;
                                                    }
                                                }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="approvedBilling">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-body">
                                    <?php if(!empty($doneBills)<=0){?>
                                        <div class="alert alert-info">Currently no Billable Lender is available.</div>
                                    <?php }else{?>
                                        <div id="no-more-tables">

                                            <table class="table table-striped table-bordered dataTable no-footer" id="doneDataTable">
                                                <thead>
                                                <tr>

                                                    <th class="numeric">#</th>

                                                    <th class="numeric"><?php echo 'Lender Name';?></th>

                                                    <th class="numeric"><?php echo 'Transaction Reason';?></th>

                                                    <th class="numeric"><?php echo 'Transaction Date & Time';?></th>

                                                    <th class="numeric"><?php echo 'In Amount';?></th>

                                                    <th class="numeric"><?php echo 'Out Amount';?></th>

                                                    <th class="numeric"><?php echo 'Status';?></th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(!empty($doneBills)) {
                                                    $i = 1;
                                                    foreach ($doneBills as $row) {
                                                        ?>



                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td data-title="<?php echo 'Lender Name'; ?>"
                                                                class="numeric"><?php echo $row->lenderName; ?></td>
                                                            <td data-title="<?php echo 'Transaction Reason'; ?>"
                                                                class="numeric"><?php echo $row->transactionReason; ?></td>
                                                            <td data-title="<?php echo 'Transaction Date & Time'; ?>"
                                                                class="numeric"><?php
                                                                $phpdate = strtotime( $row->transactionDateTime);
                                                                echo  $mysqldate = date( 'm-d-Y | H:i:sa', $phpdate );
                                                                ?></td>
                                                            <td data-title="<?php echo 'Amount in'; ?>"
                                                                class="numeric">$<?php echo $row->inAmount; ?></td>
                                                            <td data-title="<?php echo 'Amount out'; ?>"
                                                                class="numeric">$<?php echo $row->outAmount; ?></td>

                                                            <td data-title="<?php echo 'transactionStatus'; ?>"
                                                                class="numeric"><?php echo $row->transactionStatus; ?></td>


                                                        </tr>
                                                        <?php $i++;
                                                    }
                                                }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="cancelBilling">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-body">
                                    <?php if(!empty($cancelBills)<=0){?>
                                        <div class="alert alert-info">Currently no Billable Lender is available.</div>
                                    <?php }else{?>
                                        <div id="no-more-tables">

                                            <table class="table table-striped table-bordered dataTable no-footer" id="cancelDataTable">
                                                <thead>
                                                <tr>

                                                    <th class="numeric">#</th>

                                                    <th class="numeric"><?php echo 'Lender Name';?></th>

                                                    <th class="numeric"><?php echo 'Transaction Reason';?></th>

                                                    <th class="numeric"><?php echo 'Transaction Date & Time';?></th>

                                                    <th class="numeric"><?php echo 'In Amount';?></th>

                                                    <th class="numeric"><?php echo 'Out Amount';?></th>

                                                    <th class="numeric"><?php echo 'Status';?></th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(!empty($cancelBills)) {
                                                    $i = 1;
                                                    foreach ($cancelBills as $row) {
                                                        ?>



                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td data-title="<?php echo 'Lender Name'; ?>"
                                                                class="numeric"><?php echo $row->lenderName; ?></td>
                                                            <td data-title="<?php echo 'Transaction Reason'; ?>"
                                                                class="numeric"><?php echo $row->transactionReason; ?></td>
                                                            <td data-title="<?php echo 'Transaction Date & Time'; ?>"
                                                                class="numeric"><?php
                                                                $phpdate = strtotime( $row->transactionDateTime);
                                                                echo  $mysqldate = date( 'm-d-Y | H:i:sa', $phpdate );
                                                                ?></td>
                                                            <td data-title="<?php echo 'Amount in'; ?>"
                                                                class="numeric">$<?php echo $row->inAmount; ?></td>
                                                            <td data-title="<?php echo 'Amount out'; ?>"
                                                                class="numeric">$<?php echo $row->outAmount; ?></td>

                                                            <td data-title="<?php echo 'transactionStatus'; ?>"
                                                                class="numeric"><?php echo $row->transactionStatus; ?></td>


                                                        </tr>
                                                        <?php $i++;
                                                    }
                                                }?>
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

        </div>





    </section>
</div>

<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/dataTables.bootstrap.js"></script>
<script rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>




<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">

<script type="text/javascript">
    $(document).ready(function(){


        $('#pendingDataTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "columnDefs": [ {
             "targets": 7,
             "orderable": false
            } ]
        });

        $('#doneDataTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });

        $('#cancelDataTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });

    });
</script>

