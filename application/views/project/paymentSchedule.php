
<div class="content-wrapper">

    <section class="content-header">
        <div class="col-md-6 no-padding">
            <h1>
                <i class="fa fa-tasks"></i> &nbsp;  Project Schedule
            </h1>
        </div>

        <div style="clear: both;"></div>

    </section>

    <?php if(!empty($this->session->flashdata('message'))){?>
        <div class="col-lg-12 msg-hide">
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $this->session->flashdata('message'); ?></strong>
            </div>
        </div>
    <?php }elseif(!empty($this->session->flashdata('error'))){ ?>
    <?php  //$this->session->unset_userdata('message'); ?>
    <?php ?>
        <div class="col-lg-12 msg-hide">
            <div class="alert alert-error alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
            </div>
        </div>
    <?php }elseif(empty($repaymentSchedule)){ ?>
        <form role="form" method="post" id="repayment" enctype="multipart/form-data" action="<?php echo base_url('project/Project/paymentschedule/'. $projectData['projectID']); ?>"><input type="hidden" name="projectID" value="<?php echo $projectData['projectID'] ?>">
<section class="content">
<div class="row">
    <div class="col-md-6">
        <div class="col-md-12 no-padding">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-th"></i>
                    <h3 class="box-title">Project Info </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">                                        
                                        <label>Project Name</label> : <label><strong><?php echo $projectData['name']; ?></label></strong>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Needed Amount </label> : <label><strong>$<?php echo $projectData['neededAmount']; ?></label></strong>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Total Funded Amount </label> : <label><strong>$<?php echo $projectData['totalRaisedAmount']; ?></label></strong>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Project EndDate </label> : <label><strong><?php echo $projectData['projectEndDate']; ?></label></strong>
                                </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo anchor('profile/dashboard',"<i class='fa fa-undo'></i> &nbsp; &nbsp; Cancel",array('class' => 'btn btn-danger btn-lg'));?>
                                </div>
                                <div class="col-lg-6 ">
                                    <button class="btn  btn-success  btn-lg pull-right"  name="submit" type="submit">
                                        <i class="fa fa-check"></i> &nbsp; &nbsp; Schedule Now</button>
                                </div>
                                <!-- /.Lending -->
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
</div>
    </form>
    <?php }?>

</section>
    <?php if(!empty($repaymentSchedule)){?>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title">Repayment Schedule</h3>
                    </div>
                    <div class="box-body">
                        <div id="no-more-tables">
                            <table class="table table table-striped table-bordered dataTable no-footer" id="js_personal_table">
                                <thead>
                                <tr>
                                    <th class="numeric">#</th>
                                    <th class="numeric"><?php echo 'Repaid Amount';?></th>
                                    <th class="numeric"><?php echo 'Repayment Schedule Date';?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($repaymentSchedule as $row) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td data-title="<?php echo 'Repaid Amount'; ?>"
                                                class="numeric"><span><?php echo $row->repaidAmount; ?></span></td>
                                            <td data-title="<?php echo 'Repayment Schedule Date'; ?>"
                                                class="numeric"><span><?php echo date('d-M-y',strtotime($row->schedualeDateTime)); ?></span></td>
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
    </section>
    <?php }?>
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
                "targets": 2,
                "orderable": false
            } ]
        });
    });
</script>


