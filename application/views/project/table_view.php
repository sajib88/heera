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
            All Projects
            <small>List of Active Projects</small>
        </h1>
        <ol class="breadcrumb">
            <a href="<?php echo base_url('project/project/add'); ?>"><span class="btn btn-block bg-fund btn-flat"> <i class="fa fa-plus"></i>Add  New Project</span></a>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List All My Projects </h3>
                    </div>
                    <div class="box-body no-padding">
                        <?php if(count($allprojects)<=0){?>
                            <div class="alert alert-info">No Personal</div>
                        <?php }else{?>
                            <div id="no-more-tables">

                                <table class="table table-hover" id="js_personal_table">
                                    <thead>
                                    <tr>

                                        <th class="numeric">#</th>

                                        <th class="numeric"><?php echo 'Project Name';?></th>

                                        <th class="numeric"><?php echo 'Borrower Name';?></th>

                                        <th class="numeric"><?php echo 'Amount Needed';?></th>

                                        <th class="numeric"><?php echo 'Amount Collected';?></th>

                                        <th class="numeric"><?php echo 'Amount Funded By';?></th>


                                        <th class="numeric"><?php echo 'Edit';?></th>
                                        <th class="numeric"><?php echo 'View';?></th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($allprojects)) {
                                        $i = 1;
                                        foreach ($allprojects as $row) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td data-title="<?php echo 'Project Name'; ?>"
                                                    class="numeric"><?php echo $row->name; ?></td>
                                                <td data-title="<?php echo 'Borrower Name'; ?>"
                                                    class="numeric"><span class="label label-success"><?php echo "Borrower Name"; ?></span></td>
                                                <td data-title="<?php echo 'Amount Needed'; ?>"
                                                    class="numeric"><span class="label label-info"><?php echo $row->neededAmount; ?></span></td>
                                                <td data-title="<?php echo 'Amount Collected'; ?>"
                                                    class="numeric"><span class="label label-warning"><?php echo "0.00"; ?></span></td>
                                                <td data-title="<?php echo 'Amount Funded By'; ?>"
                                                    class="numeric"><span class="label bg-purple"><?php echo "Name of founder"; ?></span></td>

                                                <td data-title="<?php echo 'Edit'; ?>" class="numeric"><a href="<?php echo base_url('project/Project/edit/' . $row->projectID); ?>" class="btn btn-block btn-primary"> Edit</a></td>
                                                <td data-title="<?php echo 'Detail'; ?>" class="numeric"><a href="<?php echo base_url('project/Project/detail/' . $row->projectID); ?>" class="btn btn-block btn-success"> View</a></td>

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


