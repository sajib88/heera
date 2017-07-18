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


<link href="<?php echo base_url('assets/datatable/dataTables.bootstrap.css');?>" rel="stylesheet">

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            All Personals
            <small>Personals</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Personals</a></li>
            <li class="active">All</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List All My Personal Info</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <?php if(count($allpersonals)<=0){?>
                            <div class="alert alert-info">No Personal</div>
                        <?php }else{?>

                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th class="numeric">#</th>

                                    <th class="numeric"><?php echo 'title';?></th>

                                    <th class="numeric"><?php echo 'Status';?></th>

                                    <th class="numeric"><?php echo 'Interested';?></th>

                                    <th class="numeric"><?php echo 'maritalstatus';?></th>

                                    <th class="numeric"><?php echo 'age';?></th>

                                    <th class="numeric"><?php echo 'Edit';?></th>
                                    <th class="numeric"><?php echo 'View';?></th>
                                    <th class="numeric"><?php echo 'Delete';?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($allpersonals)) {
                                    $i = 1;
                                    foreach ($allpersonals as $row) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td data-title="<?php echo 'title'; ?>"
                                                class="numeric"><?php echo $row->title; ?></td>
                                            <td data-title="<?php echo 'body'; ?>"
                                                class="numeric"><span class="label label-success"><?php echo $row->iam; ?></span></td>
                                            <td data-title="<?php echo 'ethnicity'; ?>"
                                                class="numeric"><span class="label label-info"><?php echo $row->interestedin; ?></span></td>
                                            <td data-title="<?php echo 'maritalstatus'; ?>"
                                                class="numeric"><span class="label label-warning"><?php echo $row->maritalstatus; ?></span></td>
                                            <td data-title="<?php echo 'age'; ?>"
                                                class="numeric"><span class="label bg-purple"><?php echo $row->age; ?></span></td>

                                            <td><a href="<?php echo base_url('personal/Personal/edit/' . $row->id); ?>" class="btn btn-block btn-primary"> Edit</a></td>
                                            <td><a href="<?php echo base_url('personal/Personal/detail/' . $row->id); ?>" class="btn btn-block btn-success"> View</a></td>
                                            <td><a href="<?php echo base_url('product/products/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a></td>
                                        </tr>
                                        <?php $i++;
                                    }
                                }?>
                                </tbody>
                            </table>
                        <?php }?>
                    </div>
                    </div>
                </div>
            </div>

    </section>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/datatable/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatable/dataTables.bootstrap.js');?>"></script>
<!--<script type="text/javascript">
    $(document).ready(function(){
        $('#all-posts').dataTable();
    });
</script>-->

