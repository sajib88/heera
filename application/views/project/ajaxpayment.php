
    <?php
    if(!empty($repaymentSchedule)){?>
    <section class="content">

        <div class="row">
            <div class="col-md-6 dash-widget">
                <div class="info-box info-box-dash">
                    <span class="widget-user-image pull-left"> <img src="<?php echo base_url();?>backend/img/dash/im1.gif" /></span>

                    <div class="info-box-content">
                        <h2 class="count">$<?= $totalRepaidAmount?></h2>
                        <h3>Amount Paid</h3>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>

            <div class="col-md-6 dash-widget">
                <div class="info-box info-box-dash">
                    <span class="widget-user-image pull-left">
                        <img src="<?php echo base_url();?>backend/img/dash/im3.gif" /></span>

                    <div class="info-box-content">
                        <h2 class="count">$<?= $remainingAmount; ?></h2>
                        <h3>Amount Remaining</h3>

                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-default">

                    <div class="box-body">
                        <div id=tables">
                            <div class="col-md-12">
                            <table class="table table table-striped table-bordered dataTable no-footer" id="data-table">
                                <thead>
                                <tr>
                                    <th class="numeric">#</th>
                                    <th class="numeric">Due Date</th>
                                    <th class="numeric">Amount Due</th>
                                    <th class="numeric">Payment Date</th>
                                    <th class="numeric">Payment amount</th>
                                    <th class="numeric">Loan Balance</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                $TotalLoanBalance = 0;
                                foreach ($repaymentSchedule as $row) {
                                $amountPaid = $row->amountPaid;
                                if($TotalLoanBalance == 0){
                                    $TotalLoanBalance = (!empty($amountPaid))?floatval($fundedAmount - $amountPaid):'0';
                                }else{
                                    $TotalLoanBalance = floatval($TotalLoanBalance-$amountPaid);
                                }

                                $paymentDate = (!empty($row->repaidDateTime)) ?date('m-d-Y',strtotime($row->repaidDateTime)):'';

                                 ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td data-title="Due Date" class="numeric"><span><?php echo date('m-d-Y',strtotime($row->schedualeDateTime)); ?></span></td>
                                        <td data-title="Amount Due" class="numeric"><span>$<?php echo $row->repaidAmount; ?></span></td>
                                        <td data-title="Payment Date" class="numeric"><span><?php echo $paymentDate; ?></span></td>
                                        <td data-title="Payment amount" class="numeric"><span><?php echo (!empty($amountPaid))?'$'.$amountPaid:''; ?></span></td>
                                        <td data-title="Loan Balance" class="numeric"><span><?php echo (!empty($paymentDate))?$TotalLoanBalance:''; ?></span></td>
                                    </tr>
                                <?php $i++;
                                }
                                ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php }?>
</div>

<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/dataTables.bootstrap.js"></script>
<script rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>




    <script type="text/javascript">
        $(document).ready(function(){
            //var personaltable = document.getElementById("js_personal_table");
            $('#data-table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": false,
                "info": true,
                "autoWidth": false,
                "lengthMenu": [[12, 25, 50, -1], [12, 25, 50, "All"]]

            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            //var personaltable = document.getElementById("js_personal_table");
            $('#bata-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "info": false,
                "autoWidth": false,
                "lengthMenu": [[12, 25, 50, -1], [12, 25, 50, "All"]]

            });
        });
    </script>
