
    <?php
  // echo "<pre>";
 //   print_r($repaymentSchedule);
  /// echo "<pre>";

//exit;

    $totalfund =  $repaymentSchedule[0]->fundedAmount;
    $amountpaid =  $repaymentSchedule[0]->repaidAmount;
    $remaingtotal = $totalfund - $amountpaid;


    if(!empty($repaymentSchedule)){?>
    <section class="content">

        <div class="row">
            <div class="col-md-6 dash-widget">
                <div class="info-box info-box-dash">
                    <span class="widget-user-image pull-left"> <img src="<?php echo base_url();?>backend/img/dash/im1.gif" /></span>

                    <div class="info-box-content">
                        <h2 class="count">$<?= $amountpaid =  $repaymentSchedule[0]->repaidAmount;?></h2>
                        <h3>Amount Paid</h3>


                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <?php //print_r($projectfunded); ?>

            <div class="col-md-6 dash-widget">
                <div class="info-box info-box-dash">
                    <span class="widget-user-image pull-left">
                        <img src="<?php echo base_url();?>backend/img/dash/im3.gif" /></span>

                    <div class="info-box-content">
                        <h2 class="count">$<?= $remaingtotal; ?></h2>
                        <h3>Amount Remaining</h3>

                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-default">

                    <div class="box-body">
                        <div id=tables">
                            <div class="col-md-6">
                            <table class="table table table-striped table-bordered dataTable no-footer" id="data-table">
                                <thead>
                                <tr>
                                    <th class="numeric">#</th>
                                    <th class="numeric"><?php echo 'Repayment Schedule Date';?></th>
                                    <th class="numeric"><?php echo 'Payment Amount';?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($repaymentSchedule as $row) {

                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>

                                            <td data-title="<?php echo 'Repayment Schedule Date'; ?>"
                                                class="numeric"><span><?php echo date('m-d-Y',strtotime($row->schedualeDateTime)); ?></span>
                                            </td>
                                            <td data-title="<?php echo 'Repaid Amount'; ?>"
                                                class="numeric"><span>$<?php echo $row->paymentAmount; ?></span></td>

                                        </tr>
                                        <?php $i++;
                                    }
                                ?>
                                </tbody>
                            </table>
                            </div>
                                <div class="col-md-6">
                            <table class="table table table-striped table-bordered dataTable no-footer" id="bata-table">
                                <thead>
                                <tr>

                                    <th class="numeric"><?php echo 'Payment Received Date';?></th>
                                    <th class="numeric"><?php echo 'Current Loan Balance';?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($fundcollecttion)){
                                foreach ($fundcollecttion as $row) {

                                    ?>
                                    <tr>

                                        <td data-title="<?php echo 'Payment Received Date'; ?>"
                                            class="numeric"><span><?php echo date('m-d-Y',strtotime($row->repaidDateTime)); ?></span>
                                        </td>
                                        <td data-title="<?php echo 'Current Loan Balance'; ?>"
                                            class="numeric"><span>$<?php echo $row->repaidAmount; ?></span></td>

                                    </tr>
                                    <?php $i++;
                                }}
                                ?>

                                </tbody>
                                <tr>
                                    <td></td>
                                    <td>Amount Remaining $<?= $remaingtotal; ?></td>

                                </tr>
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
