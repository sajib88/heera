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
            <i class="fa fa-tasks"></i>  <?php if(!empty($page_title)){ echo $page_title;} else {}?>
            
        </h1>

    </section>
    <section class="content">       
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title">List of All Projects</h3>
                    </div>
                    <div class="box-body">
                        <?php if(empty($borrowerAllProjects)){?>
                        <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php if(!empty($no_data)){ echo $no_data ; }else{}?></div>
                        <?php }else{?>
                            <div id="no-more-tables">

                                <table class="table table table-striped table-bordered dataTable no-footer" id="js_personal_table">
                                    <thead>
                                    <tr>

                                        <th class="numeric">#</th>

                                        <th class="numeric"><?php echo 'Project Name';?></th>                                       

                                        <th class="numeric"><?php echo 'Amount Needed';?></th>

                                        <th class="numeric"><?php echo 'Amount Collected';?></th>

                                        <th class="numeric"><?php echo 'Amount Funded By';?></th>
                                        
                                        <th class="numeric"><?php echo 'Status';?></th>
                                        


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($borrowerAllProjects)) {
                                        $i = 1;
                                        foreach ($borrowerAllProjects as $row) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td data-title="<?php echo 'Project Name'; ?>"
                                                    class="numeric"><?php echo $row->name; ?></td>                                                
                                                <td data-title="<?php echo 'Amount Needed'; ?>"
                                                    class="numeric"><span>$<?php echo $row->neededAmount; ?></span></td>
                                                <td data-title="<?php echo 'Amount Collected'; ?>"
                                                    class="numeric"><span><?php if(!empty($row->fundedAmount)){echo '$'.$row->fundedAmount;}else{echo '$0.00';}  ?></span></td>
                                                <td data-title="<?php echo 'Amount Funded By'; ?>"
                                                    class="numeric"><span><?php echo $row->lenderName; ?></span></td>
                                                <td data-title="<?php echo 'Status'; ?>"
                                                    class="numeric"><span class="label"><?php if(!empty($row->statusID)){ echo getStatusById($row->statusID);}else{ echo 'New';} ?></span></td>
                                               

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

<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/dataTables.bootstrap.js"></script>
<script rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        //var personaltable = document.getElementById("js_personal_table");
        $('#js_personal_table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "info": true,
            "autoWidth": false,
            
        });
    });
</script>



