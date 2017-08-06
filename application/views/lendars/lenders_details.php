<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">
<style type="text/css">
    .img-size{
        height: 118px;
        width: 190px;
        margin: 0px auto;
    }
    table.dataTable thead > tr > th:last-child:after{
        display: none;
    }
</style>
<?php //print_r($lendarDetails);?>
<section class="content">
<div class="row">
    <div class="col-md-6">          
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Lender Profile Information</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div style="text-align: center">
                        <?php
                            if($lendarDetails['profilepicture'] == 0) {?>
                                <img src="<?php echo base_url() . '/assets/user-demo.jpg'?>" alt="" class="img-responsive circular img-size" />
                            <?php }
                            else {?>
                                <img src="<?php echo base_url() . '/assets/file/' .$lendarDetails['profilepicture']; ?>" alt=""  class="img-responsive circular img-size" />  <?php 
                           }
                            ?>
                    </div>
                    <hr>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <h4> Total Credit </b> <?php echo '$'.$lendarDetails['inAmount']; ?></h4>
                        </li>
                        <li class="list-group-item">
                             <b>User Name </b>      
                           <a class="pull-right "><?php echo (!empty( $lendarDetails['user_name']))? $lendarDetails['user_name']:''; ?></a> 
                        </li>
                        <li class="list-group-item">
                             <b>Location</b>      
                           <a class="pull-right ">
                                <cite title="state, country">
                                    <?php echo $lendarDetails['state']; ?>, <?php
                                    $data = get_data('countries', array('id' => $lendarDetails['country']));
                                    echo $data['name'];
                                    ?> 
                                </cite>
                           </a> 
                        </li>
                        <li class="list-group-item">
                             <b> Email </b>      
                           <a class="pull-right "><?php echo (!empty( $lendarDetails['email']))? $lendarDetails['email']:''; ?></a> 
                        </li>
                        <li class="list-group-item">
                             <b> First Name </b>      
                           <a class="pull-right "><?php echo (!empty( $lendarDetails['first_name']))? $lendarDetails['first_name']:''; ?></a> 
                        </li>
                        <li class="list-group-item">
                             <b> Middle Name </b>      
                           <a class="pull-right "><?php echo (!empty( $lendarDetails['middle_name']))? $lendarDetails['middle_name']:''; ?></a> 
                        </li>
                        <li class="list-group-item">
                             <b>Last Name</b>      
                           <a class="pull-right "><?php echo (!empty( $lendarDetails['last_name']))? $lendarDetails['last_name']:''; ?></a> 
                        </li>
                        
                    </ul>
                    
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    
    
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">More Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">                
                <strong> Gender</strong>
                    <p class="text-muted">
                       <?php echo $lendarDetails['gender']; ?>
                    </p>
                <hr>
                <strong> Date of Birth</strong>
                    <p class="text-muted">
                       <?php echo $lendarDetails['dateofbirth']; ?>
                    </p>
                <hr>
                <strong> Address</strong>
                    <p class="text-muted">
                      <?php echo $lendarDetails['address']; ?>
                    </p>
                <hr>
                <strong> Country</strong>
                    <p class="text-muted">
                      <?php
                        $data = get_data('countries', array('id' => $lendarDetails['country']));
                        echo $data['name'];
                        ?>
                    </p>
                <hr>                
                <strong> State</strong>
                    <p class="text-muted">
                      <?php echo $lendarDetails['state']; ?>
                    </p>
                <hr>
                <strong> City</strong>
                    <p class="text-muted">
                      <?php echo $lendarDetails['city']; ?>
                    </p>
                <hr>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

</div>



<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Funded Projects List</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Lender Profile</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Billing Information</a></li>
        
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            
            <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> <i class="fa fa-tasks"></i> All Funded Projects</h3>
                    </div>
                    <div class="box-body no-padding">
                        <?php if(empty($allfundedproject)){?>
                        <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php echo 'No project funded yet.';?></div>
                        <?php }else{?>
                            <div id="no-more-tables">

                                <table class="table table-hover" id="js_personal_table">
                                    <thead>
                                    <tr>

                                        <th class="numeric">#</th>

                                        <th class="numeric"><?php echo 'Name';?></th>

                                        <th class="numeric"><?php echo 'ShortDescription';?></th>
                                        
                                        <th class="numeric"><?php echo 'Loan Term';?></th>
                                        
                                        <th class="numeric"><?php echo 'Goal';?></th>

                                        <th class="numeric"><?php echo 'Project End Date';?></th>

                                        <th class="numeric"><?php echo 'Total Funded';?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($allfundedproject)) {
                                        $i = 1;
                                        foreach ($allfundedproject as $row) {                                            //print_r($row);die; ?>
                                        
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td data-title="<?php echo 'Name'; ?>"
                                                    class="numeric"><?php echo $row->name; ?></td>
                                                <td data-title="<?php echo 'ShortDescription'; ?>"
                                                    class="numeric"><span><?php echo substr($row->shortDescription, 0, 30); ?></span>
                                                </td>
                                                <td data-title="<?php echo 'Loan Term'; ?>"
                                                    class="numeric"><span><?php echo $row->loanTerm; ?></span>
                                                </td>
                                                <td data-title="<?php echo 'Goal'; ?>"
                                                    class="numeric"><span><?php echo '$'.$row->neededAmount; ?></span>
                                                </td>
                                                <td data-title="<?php echo 'Project End Date'; ?>"
                                                    class="numeric"><span><?php echo date("d-m-Y h:i:sa", strtotime($row->projectEndDate)); ?></span>
                                                </td>
                                                <td data-title="<?php echo 'Total Funded'; ?>"
                                                    <?php $data =$this->global_model->total_sum_amount('project_fund_history', array('projectID'=>$row->projectID)); ?>
                                                    class="numeric"><span><?php if(!empty($data[0]->fundedAmount)){echo '$'.$data[0]->fundedAmount;}else{echo '$0.00';}  ?></span></td>
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
        <div class="tab-pane" id="tab_2">
          The European languages are members of the same family. Their separate existence is a myth.
          For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
          in their grammar, their pronunciation and their most common words. Everyone realizes why a
          new common language would be desirable: one could refuse to pay expensive translators. To
          achieve this, it would be necessary to have uniform grammar, pronunciation and more common
          words. If several languages coalesce, the grammar of the resulting language is more simple
          and regular than that of the individual languages.
        </div>        
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>
</section>

<script type="text/javascript">
    $(document).ready(function(){
        var personaltable = document.getElementById("js_personal_table");
        $(personaltable).dataTable();
    });
</script>