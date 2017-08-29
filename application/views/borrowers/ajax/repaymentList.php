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
                        <td data-title="Loan balance" class="numeric"><span>$<?php echo $row->loanbalance; ?></span></td>
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