<style type="text/css">
    .no-padding {
        padding: 10px !important;
    }
    table.dataTable thead > tr > th:last-child:after{
            display: none;
    }
</style>



<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">



<div class="content-wrapper">
    
    

    <section class="content-header">
        <h1>
            <?php echo $page_title;?>
            
        </h1>
        <ol class="breadcrumb">
            <a href="<?php echo base_url('project/project/add'); ?>"><span class="btn btn-block bg-fund btn-flat"> <i class="fa fa-plus"></i>Add  New Project</span></a>
        </ol>
    </section>
    <section class="content">
        <?php if(!empty($this->session->flashdata('message'))){?>
            <div class="col-lg-12 msg-hide">
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $this->session->flashdata('message'); ?></strong>
                </div>
            </div>
        <?php } ?>
        <?php  $this->session->unset_userdata('message'); ?>
        <?php if(!empty($this->session->flashdata('error'))){?>
            <div class="col-lg-12 msg-hide">
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
            </div>
        <?php } ?>
        <?php  $this->session->unset_userdata('error'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> <?php if(!empty($page_title)){echo $page_title;}else{    echo '';}?> List</h3>
                    </div>
                    <div class="box-body no-padding">
                        <?php if(empty($borrowers)){?>
                        <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php echo $no_data;?></div>
                        <?php }else{?>
                            <div id="no-more-tables">

                                <table class="table table-hover" id="js_personal_table">
                                    <thead>
                                    <tr>

                                        <th class="numeric">#</th>

                                        <th class="numeric"><?php echo 'Borrowers Name';?></th>

                                        <th class="numeric"><?php echo 'Join Date';?></th>

                                        <th class="numeric"><?php echo 'Last Active Date';?></th>
                                        
                                        <th class="numeric"><?php echo 'Project Qty';?></th>

                                        <th class="numeric"><?php echo 'Amount Received';?></th>

                                        <th class="numeric"><?php echo 'Total Repaid';?></th>
                                        
                                        <th class="sorting1"><?php echo 'Action';?></th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($borrowers)) {
                                        $i = 1;
                                        foreach ($borrowers as $row) {                                            //print_r($row);die; ?>
                                        
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td data-title="<?php echo 'Lendar Name'; ?>"
                                                    class="numeric"><?php echo $row->user_name; ?></td>
                                                <td data-title="<?php echo 'Join Date'; ?>"
                                                    class="numeric"><span><?php echo date("d-m-Y", strtotime($row->created)); ?></span>
                                                </td>                                               </td>
                                                <td data-title="<?php echo 'Last Active Date'; ?>"
                                                    class="numeric"><span><?php echo date("d-m-Y h:i:sa", strtotime($row->lastLogin)); ?></span>
                                                </td>
                                                
                                                <td data-title="<?php echo 'Project Qty'; ?>"
                                                    class="numeric"><span><?php echo count_project($row->id); ?></span></td>
                                                <td data-title="<?php echo 'Amount Received'; ?>"
                                                    <?php $data =$this->global_model->total_sum_amount('project_fund_history', array('fundedBy'=>$row->id)); ?>
                                                    class="numeric"><span><?php if(!empty($data[0]->fundedAmount)){echo '$'.$data[0]->fundedAmount;}else{echo '$0.00';}  ?></span></td>
                                                
                                                <td data-title="<?php echo 'Total Repaid'; ?>"
                                                    class="numeric"><span><?php echo 'Total Repaid'; ?></span></td>
                                                
                                                <td data-title="<?php echo 'View'; ?>" class="numeric">
                                                    <a class="allFundedProject btn btn-block btn-primary" href="#myModal" data-toggle="modal" data-id="<?php echo $row->id; ?>" > View </a>
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

<div id="lodingState">
    
</div>

<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1"  id="myModal" class="modal fade">
     
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Lendars Deatails</h4>                
            </div>
            
                <div class="modal-body">
                    <div id="borrowerDeatails"></div>
                </div>

                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger pull-left" type="button">Cancel</button>
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
        $(personaltable).dataTable();
    });
</script>

<script type="text/javascript">
$('.changeStatus').click(function(){
    
    var base_url = '<?php echo base_url() ?>';
   
    var id=$(this).data('id');
    
    $.ajax({
        type: 'POST',
        url: base_url + "project/Project/getStatus/"+id,
        data: id,
        datatype: "json",
        success: function(rsp){
            var repData = JSON.parse(rsp);
            console.log(repData);
            $('#pojectID').html(repData['name']);
            $('#statusID').val(repData['status']);
            $('#projectID').val(repData['projectID']);            
        }
    });       
});

$("#update_status_frm").submit(function(e){
    
    e.preventDefault();
    var $form = $(this);
    var base_url = '<?php echo base_url() ?>';
   
    //var id=$('.stat').data('statas');
    var id = $("#statusID").val();
    var data = $("#update_status_frm").serialize();
    
    // check if the input is valid
    if(! $form.valid()) return false;
    $.ajax({
        type: 'POST',
        url: base_url + "project/Project/updateStatus/",
        data: data,
        //datatype: "json",
        success: function(msg){  console.log(msg);          
            if(msg == 'success'){               
                // show success meessage
                //$('#myModal').attr('aria-hidden', 'true');     
                //$('.close-modal').;  
               
                window.location.href=base_url + "project/Project/all/"+id;
                
                
            }else{
                // show error meessage
                window.location.href=base_url + "project/Project/all/";
                 
            }
            //console.log(msg);
//            var repData = JSON.parse(rsp);
//            $('#pojectID').html(repData['name']);
//            $('#statusID').val(repData['status']);
//            $('#projectID').val(repData['projectID']); 
        }
    });  
    
});

$('.allFundedProject').click(function(){
    var id=$(this).data('id');
        var site_url = "<?php echo base_url('borrowers/Borrowers/allFundedProject/'); ?>/" +id; //append id at end
        $("#borrowerDeatails").load(site_url);
});




</script>

<script type="application/javascript">
    $('#update_status_frm').validate({
        rules: {
            status: {
                required:true,
            }
        },
        messages:{
            status: {
                required: "Status is Required",
            }
        }
    });


</script>

<script type="application/javascript">

setTimeout(function(){$('.msg-hide').fadeOut('slow');}, 3000);

</script> 


