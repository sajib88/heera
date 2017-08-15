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
            <i class="fa fa-credit-card"></i> Transactions

        </h1>

    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Of All Transactions </h3>
                    </div>
                    <div class="box-body">
                        <?php if(count($allTransactions)<=0){?>
                            <div class="alert alert-info">No Personal</div>
                        <?php }else{?>
                            <div id="no-more-tables">

                                <table class="table table-striped table-bordered dataTable no-footer" id="js_personal_table">
                                    <thead>
                                    <tr>

                                        <th class="numeric">#</th>

                                        <th class="numeric"><?php echo 'Transaction Reason';?></th>

                                        <th class="numeric"><?php echo 'Transaction Date & Time';?></th>

                                        <th class="numeric"><?php echo 'In Amount';?></th>

                                        <th class="numeric"><?php echo 'Out Amount';?></th>

                                        <th class="numeric"><?php echo 'Status';?></th>





                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($allTransactions)) {
                                        $i = 1;
                                        foreach ($allTransactions as $row) {
                                            ?>



                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td data-title="<?php echo 'Transaction Reason'; ?>"
                                                    class="numeric"><?php echo $row->transactionReason; ?></td>
                                                <td data-title="<?php echo 'Transaction Date & Time'; ?>"
                                                    class="numeric"><?php
                                                    $phpdate = strtotime( $row->transactionDateTime);
                                                   echo  $mysqldate = date( 'M-d-Y | H:i:s', $phpdate );
                                                    ?></td>
                                                <td data-title="<?php echo 'Amount in'; ?>"
                                                    class="numeric">$<?php echo $row->inAmount; ?></td>
                                                <td data-title="<?php echo 'Amount out'; ?>"
                                                    class="numeric">$<?php echo $row->outAmount; ?></td>

                                                <?php


                                                ?>
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
        $('#js_personal_table').DataTable();
    });
</script>


