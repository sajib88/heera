<style type="text/css">
    .label{
        color: #333;
    }
</style>
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
            <i class="fa fa-list"></i>  <?php if(!empty($page_title)){ echo $page_title;} else {}?>

        </h1>

    </section>



    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title"> All Repayment List </h3>
                    </div>
                    <div class="box-body">

                        <?php if(empty($allRepaymentList)){?>
                            <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php if(!empty($no_data)){ echo $no_data ; }else{}?></div>
                        <?php }else{?>
                            <div id="no-more-tables">

                                <table class="table table table-striped table-bordered dataTable no-footer" id="js_personal_table">
                                    <thead>
                                    <tr>

                                        <th class="numeric">#</th>

                                        <th class="numeric"><?php echo 'Project Name';?></th>

                                        <th class="numeric"><?php echo 'Repaid Amount';?></th>

                                        <th class="numeric"><?php echo 'Borrower Name';?></th>

                                        <th class="numeric"><?php echo 'Repaid Date';?></th>

                                        <th class="numeric"><?php echo 'Repaid Status';?></th>

                                        <th class="numeric"><?php echo 'Payment Process By';?></th>

                                        <th class="numeric"><?php echo 'Payment Process Time';?></th>

                                        <th class="numeric text-center"><?php echo 'Action';?></th>



                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($allRepaymentList)) {
                                        $i = 1;
                                        foreach ($allRepaymentList as $row) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td data-title="<?php echo 'Project Name'; ?>"
                                                    class="numeric"><span><?php echo $row->projectName; ?></span></td>
                                                <td data-title="<?php echo 'Repaid Amount'; ?>"
                                                    class="numeric"><span>$<?php echo $row->repaidAmount; ?></span></td>
                                                <td data-title="<?php echo 'Borrower Name'; ?>"
                                                    class="numeric"><span class="label"> <?php echo $row->borrowerName; ?> </span></td>
                                                <td data-title="<?php echo 'Repaid Date'; ?>"
                                                    class="numeric"><span class="label"> <?php echo date('M-d-Y',strtotime($row->repaidDateTime)); ?> </span></td>
                                                <td data-title="<?php echo 'Repaid Status'; ?>"
                                                    class="numeric"><span class="label"> <?php echo $row->repaidStatus; ?> </span></td>
                                                <td data-title="<?php echo 'Payment Process By'; ?>"
                                                    class="numeric"><span class="label"> <?php echo $row->processBy; ?> </span></td>
                                                <td data-title="<?php echo 'Payment Process Time'; ?>"
                                                    class="numeric"><span class="label"> <?php echo date('M-d-Y',strtotime($row->paymentProcessTime)); ?> </span></td>

                                                <td data-title="<?php echo 'Action'; ?>" class="numeric text-center">
                                                    <?php if($row->repaidStatus == 'Pending') {?>
                                                    <a class="viewprojects btn btn-block btn-info"  data-projectid='<?=$row->projectRepaidID?>' href="javascript:" > Approved </a>
                                                <?php } else {?>

                                                        <button class="btn btn-block btn-primary"   href="javascript:" > Done </button>

                                                    <?php }?>
                                                </td>


                                            </tr>
                                            <?php $i++;
                                        }
                                    }else{
                                        echo 'No data Found';
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

<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/dataTables.bootstrap.js"></script>
<script rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var personaltable = document.getElementById("js_personal_table");
        $(personaltable).dataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "columnDefs": [ {
                "targets": 4,
                "orderable": false
            } ]
        });
    });
</script>



<script type="application/javascript">

    $(".viewprojects").click(function(e) {

        var base_url = '<?php echo base_url() ?>';
        var fundedprojectID = $(this).data('projectid');

        $.ajax({
            type: 'GET',
            url: base_url + "borrowers/borrowers/getRepayment/"+fundedprojectID, //this file has the calculator function code
            //data: id,
            success:function(data){
                $('#showview').html(data);
                $('#viewModal').modal('show');

            }
        });

    });

</script>



