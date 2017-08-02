<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">
<style type="text/css">
    .img-size{
        height: 118px;
        width: 190px;
        margin: 0px auto;
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
                            <h4> <b>  <i class="fa fa-money"></i> Total Credit </b> <?php echo '$'.$lendarDetails['inAmount']; ?></h4>
                        </li>
                        <li class="list-group-item">
                             <b><i class="fa fa-crosshairs"></i>User Name </b>      
                           <a class="pull-right "><?php echo (!empty( $lendarDetails['user_name']))? $lendarDetails['user_name']:''; ?></a> 
                        </li>
                        <li class="list-group-item">
                             <b><i class="fa fa-crosshairs"></i>Location</b>      
                           <a class="pull-right ">
                                <cite title="state, country">
                                    <?php echo $lendarDetails['state']; ?>, <?php
                                    $data = get_data('countries', array('id' => $lendarDetails['country']));
                                    echo $data['name'];
                                    ?> <i class="glyphicon glyphicon-map-marker"></i>
                                </cite>
                           </a> 
                        </li>
                        <li class="list-group-item">
                             <b><i class="fa fa-crosshairs"></i>Email </b>      
                           <a class="pull-right "><?php echo (!empty( $lendarDetails['email']))? $lendarDetails['email']:''; ?></a> 
                        </li>
                        <li class="list-group-item">
                             <b><i class="fa fa-crosshairs"></i>First Name </b>      
                           <a class="pull-right "><?php echo (!empty( $lendarDetails['first_name']))? $lendarDetails['first_name']:''; ?></a> 
                        </li>
                        <li class="list-group-item">
                             <b><i class="fa fa-crosshairs"></i>Middle Name </b>      
                           <a class="pull-right "><?php echo (!empty( $lendarDetails['middle_name']))? $lendarDetails['middle_name']:''; ?></a> 
                        </li>
                        <li class="list-group-item">
                             <b><i class="fa fa-crosshairs"></i>Last Name</b>      
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
                <strong><i class="fa fa-book margin-r-5"></i> Gender</strong>
                    <p class="text-muted">
                       <?php echo $lendarDetails['gender']; ?>
                    </p>
                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> Date of Birth</strong>
                    <p class="text-muted">
                       <?php echo $lendarDetails['dateofbirth']; ?>
                    </p>
                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> Address</strong>
                    <p class="text-muted">
                      <?php echo $lendarDetails['address']; ?>
                    </p>
                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> Country</strong>
                    <p class="text-muted">
                      <?php
                        $data = get_data('countries', array('id' => $lendarDetails['country']));
                        echo $data['name'];
                        ?>
                    </p>
                <hr>                
                <strong><i class="fa fa-book margin-r-5"></i> State</strong>
                    <p class="text-muted">
                      <?php echo $lendarDetails['state']; ?>
                    </p>
                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> City</strong>
                    <p class="text-muted">
                      <?php echo $lendarDetails['city']; ?>
                    </p>
                <hr>
            </div>
            <!-- /.box-body -->
        </div>
    </div>




<?php //print_r($allfundedproject);?>
<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Funded Projects List</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Tab 2</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Tab 3</a></li>
        
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <section class="content">
            <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Funded Projects<?php if(!empty($page_title)){echo $page_title;}else{    echo '';}?> </h3>
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

                                        <th class="numeric"><?php echo 'Project Image';?></th>
                                        


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
                                                    class="numeric"><span class="label label-success"><?php echo substr($row->shortDescription, 0, 30); ?></span>
                                                </td>
                                                <td data-title="<?php echo 'Loan Term'; ?>"
                                                    class="numeric"><span class="label label-success"><?php echo $row->loanTerm; ?></span>
                                                </td>
                                                <td data-title="<?php echo 'Goal'; ?>"
                                                    class="numeric"><span class="label label-success"><?php echo $row->neededAmount; ?></span>
                                                </td>
                                                <td data-title="<?php echo 'Project End Date'; ?>"
                                                    class="numeric"><span class="label label-info"><?php echo date("d-m-Y h:i:sa", strtotime($row->projectEndDate)); ?></span>
                                                </td>
                                                <td data-title="<?php echo 'Total Funded'; ?>"
                                                    <?php $data =$this->global_model->total_sum_amount('project_fund_history', array('projectID'=>$row->projectID)); ?>
                                                    class="numeric"><span class="label label-warning"><?php if(!empty($data[0]->fundedAmount)){echo '$'.$data[0]->fundedAmount;}else{echo '$0.00';}  ?></span></td>
                                                
                                                <td class="numeric"><span class="label bg-purple"><img src="<?php echo base_url() . '/assets/file/project/' .$row->mainImage; ?>" alt="" width="50" height="50" class="img-circle " /></span></td>
                                               
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