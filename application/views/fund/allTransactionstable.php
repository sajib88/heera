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




<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Transactions
            <small>List of All Transactions</small>
        </h1>
        <ol class="breadcrumb">
            <span class="btn btn-block bg-fund btn-flat"> <i class="fa fa-money"></i>&nbsp; &nbsp; Current Balance : $<?php if($user_info['inAmount']>= 0){echo $user_info['inAmount'];}else{echo '0.00';}?> </span></a>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Of All Transactions </h3>
                    </div>
                    <div class="box-body no-padding">
                        <?php if(count($allTransactions)<=0){?>
                            <div class="alert alert-info">No Personal</div>
                        <?php }else{?>
                            <div id="no-more-tables">

                                <table class="table table-hover" id="js_personal_table">
                                    <thead>
                                    <tr>

                                        <th class="numeric">#</th>

                                        <th class="numeric"><?php echo 'Transaction Reason';?></th>

                                        <th class="numeric"><?php echo 'Transaction Date & Time';?></th>

                                        <th class="numeric"><?php echo 'inAmount';?></th>

                                        <th class="numeric"><?php echo 'outAmount';?></th>

                                        <th class="numeric"><?php echo 'transactionStatus';?></th>





                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($allTransactions)) {
                                        $i = 1;
                                        foreach ($allTransactions as $row) {

                                            if($row->inAmount != '0' )
                                            {

                                                $class = "label-success";
                                            }
                                            elseif($row->outAmount != '0')
                                            {
                                                $class = "label-danger";
                                            }

                                            else{}

                                            ?>



                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td data-title="<?php echo 'Transaction Reason'; ?>"
                                                    class="numeric"><?php echo $row->transactionReason; ?></td>
                                                <td data-title="<?php echo 'Transaction Date & Time'; ?>"
                                                    class="numeric"><span class="label label-info"><?php echo $row->transactionDateTime; ?></span></td>
                                                <td data-title="<?php echo 'Amount in'; ?>"
                                                    class="numeric"><span class="label <?php echo $class; ?>"><?php echo $row->inAmount; ?></span></td>
                                                <td data-title="<?php echo 'Amount out'; ?>"
                                                    class="numeric"><span class="label <?php echo $class; ?>"><?php echo $row->outAmount; ?></span></td>
                                                <td data-title="<?php echo 'transactionStatus'; ?>"
                                                    class="numeric"><span class="label bg-purple"><?php echo $row->transactionStatus; ?></span></td>





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

<script type="text/javascript">
    $(document).ready(function(){
        var personaltable = document.getElementById("js_personal_table");
        $(personaltable).dataTable();
    });
</script>


