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

    <?php if($this->session->flashdata('message')){ ?>
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $this->session->flashdata('message'); ?></strong>
            </div>
        </div>
    <?php } $this->session->unset_userdata('message'); ?>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title">Repayment Schedule (<?php if(!empty($repaymentSchedule[0]->projectName)){ echo $repaymentSchedule[0]->projectName;}else{} ?>)</h3>
                    </div>
                    <div class="box-body">

                        <?php if(empty($repaymentSchedule)){?>
                        <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php if(!empty($no_data)){ echo $no_data ; }else{}?></div>
                        <?php }else{?>
                            <div id="no-more-tables">

                                <table class="table table table-striped table-bordered dataTable no-footer" id="js_personal_table">
                                    <thead>
                                    <tr>

                                        <th class="numeric">#</th>

                                        <th class="numeric"><?php echo 'Repaid Amount';?></th>

                                        <th class="numeric"><?php echo 'Repayment Schedule Date';?></th>

                                        <th class="numeric"><?php echo 'Status';?></th>

                                        <th class="numeric text-center"><?php echo 'Action';?></th>



                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($repaymentSchedule))

                                    {
                                        $i = 1;
                                        foreach ($repaymentSchedule as $row) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td data-title="<?php echo 'Repaid Amount'; ?>"
                                                    class="numeric"><span><?php echo $row->repaidAmount; ?></span></td>
                                                <td data-title="<?php echo 'Repayment Schedule Date'; ?>"
                                                    class="numeric"><span><?php echo date('M-d-Y',strtotime($row->schedualeDateTime)); ?></span></td>
                                                <td data-title="<?php echo 'Status'; ?>"
                                                    class="numeric"><span class="label"> <?php echo $row->repaidStatus; ?> </span></td>
                                                <?php
                                               // $repDate = date('m-Y',strtotime($row->schedualeDateTime));
                                               // $currentdate = date('m-Y');
                                                if($row->repaidStatus != 'Pending'){
                                                ?>
                                                <td data-title="<?php echo 'Action'; ?>" class="numeric text-center">
                                                    <a href="<?php echo base_url('borrow/Borrow/borrowerRepayment/' . $row->projectID .'/'.$row->repaidAmount .'/'. date('Y-m-d',strtotime($row->schedualeDateTime)) .'/Pending/' . $row->repaymentScheduleID);?>" class="btn btn-warning ">Make Payment </a>
                                                </td>
                                                <?php }else{?>
                                                <td data-title="<?php echo 'Action'; ?>" class="numeric text-center">
                                                    <a class="btn btn-success" disabled><?php echo $row->repaidStatus;?></a></td>
                                                <?php }?>
                                            </tr>
                                            <?php $i++;
                                        }
                                    }else{
                                        echo 'No data Found';
                                    } ?>

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



