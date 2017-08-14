<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-briefcase"></i> Project Funding

        </h1>

    </section>
    <section class="content">
        <div class="row">
<div class="col-md-12 no-padding">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#fundingProjects" data-toggle="tab" aria-expanded="true">Project Funding</a></li>
            <li class=""><a href="#repaid" data-toggle="tab" aria-expanded="false">Repaid</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="fundingProjects">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body no-padding">
                                <?php if(empty($fundHistory)){?>
                                    <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php echo 'No project funded yet.';?></div>
                                <?php }else{?>
                                    <div id="no-more-tables">

                                        <table class="table table-hover" id="fundingProject">
                                            <thead>
                                            <tr>

                                                <th class="numeric">#</th>

                                                <th class="numeric"><?php echo 'Date';?></th>

                                                <th class="numeric"><?php echo 'Project Name';?></th>

                                                <th class="numeric"><?php echo 'Funded Amount';?></th>

                                                <th class="numeric"><?php echo 'Funded By';?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($fundHistory)) {
                                                $i = 1;
                                                foreach ($fundHistory as $row) {                                            //print_r($row);die; ?>

                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td data-title="<?php echo 'Date'; ?>"
                                                            class="numeric"><?php echo date('d-M-y', strtotime($row->fundedDateTime)); ?></td>

                                                        <td data-title="<?php echo 'Project Name'; ?>"
                                                            class="numeric"><span><?php echo $row->name; ?></span>
                                                        </td>
                                                        <td data-title="<?php echo 'Funded Amount'; ?>"
                                                            class="numeric"><span>$<?php echo $row->fundedAmount; ?></span></td>
                                                        <td data-title="<?php echo 'Funded By'; ?>"
                                                            class="numeric"><span><?php echo $row->lenderName; ?></span>
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
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="repaid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body no-padding">
                                <?php if(empty($repaid)){?>
                                    <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php echo 'No project funded yet.';?></div>
                                <?php }else{?>
                                    <div id="no-more-tables">

                                        <table class="table table-hover" id="repaidFunding">
                                            <thead>
                                            <tr>

                                                <th class="numeric">#</th>

                                                <th class="numeric"><?php echo 'Repaid Date';?></th>

                                                <th class="numeric"><?php echo 'Project Name';?></th>

                                                <th class="numeric"><?php echo 'Repaid Amount';?></th>

                                                <th class="numeric"><?php echo 'Status';?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($repaid)) {
                                               $i = 1;
                                                foreach ($repaid as $row) {                                            //print_r($row);die; ?>

                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td data-title="<?php echo 'Repaid Date'; ?>"
                                                            class="numeric"><?php echo date('d-M-y', strtotime($row->repaidDateTime)); ?></td>
                                                        <td data-title="<?php echo 'Project Name'; ?>"
                                                            class="numeric"><span><?php echo $row->name; ?></span>
                                                        </td>
                                                        <td data-title="<?php echo 'Repaid Amount'; ?>"
                                                            class="numeric"><span>$<?php echo $row->repaidAmount; ?></span></td>

                                                        <td data-title="<?php echo 'Status'; ?>"
                                                            class="numeric"><span><?php echo $row->repaidStatus; ?></span>
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
            </div>
        </div>
    </div>

    <!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
        </div>
    </section>
</div>


<script type="text/javascript">
    $(document).ready(function(){

        $('#fundingProject').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,

        });

        $('#repaidFunding').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });


    });
</script>