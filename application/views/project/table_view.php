<style type="text/css">
    
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
                        <h3 class="box-title">List All My <?php if(!empty($page_title)){echo $page_title;}else{    echo '';}?> </h3>
                    </div>
                    <div class="box-body no-padding">
                        <?php if(empty($allprojects)){?>
                        <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php echo $no_data;?></div>
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
                                        <th class="numeric"><?php echo 'Status';?></th>
                                        <th class="sorting1"><?php echo 'Action';?></th>


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
                                                <td data-title="<?php echo 'Status'; ?>"
                                                    class="numeric"><span class="label bg-purple"><?php echo getStatusById($row->status); ?></span></td>

                                               
                                                <td data-title="<?php echo 'Action'; ?>" class="numeric">
                                                   <div class="btn-group">
                                                        <button type="button" class="btn btn-success">Action</button>
                                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                                          <span class="caret"></span>
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                          <li><a href="<?php echo base_url('project/Project/edit/' . $row->projectID); ?>">Edit</a></li>
                                                          <li><a href="<?php echo base_url('project/Project/detail/' . $row->projectID); ?>">View</a></li>
                                                          <li><a class="changeStatus" data-toggle="modal" href="#myModal" data-id="<?php echo $row->projectID; ?>">Change Status</a></li>
                                                        </ul>
                                                    </div>
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

<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
     
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Project Status</h4>                
            </div>
            

            <form role="form" name="update_status_frm" method="post" id="update_status_frm" enctype="multipart/form-data"
                  action="#">

                <div class="modal-body">
                    <input name="projectID" id="projectID" value="" type="hidden" class="form-control">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Project Name<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>
                            <p id="pojectID">
                               
                            </p>
                                
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Status<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>
                            <select name="status" id="statusID" class="form-control">
                                <option value="">Status Select</option>
                                <?php
                                    if (is_array($project_status)) {
                                        foreach ($project_status as $project_status) {
                                            $sel = ($project_status->statusID == set_value('statusID'))?'selected="selected"':'';
                                            ?>
                                <option class="stat" data-statas="<?php echo $project_status->statusID; ?>" value="<?php echo $project_status->statusID; ?>" <?php echo $sel;?> ><?php echo $project_status->statusTitle; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>  
                        </div>
                    </div> 
                </div>

                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger" type="button">Cancel</button>
                    
<!--                    <a  class="btn  btn-success loadingStaate">Submit</a>-->
                            <?php $id = $this->uri->segment('4');?>
                    <input class="btn  btn-success close-modal" data-stat="<?php echo $id; ?>" type="submit" id="loadingStaate" name="loginStatus" value="Submit">
                </div>
                
            </form>
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


