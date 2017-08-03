<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">
<style type="text/css">
    .img-size{
        height: 118px;
        width: 190px;
        margin: 0px auto;
    }
</style>
<?php //print_r($borrowersDetails);?>
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
                            if($borrowersDetails['profilepicture'] == 0) {?>
                                <img src="<?php echo base_url() . '/assets/user-demo.jpg'?>" alt="" class="img-responsive circular img-size" />
                            <?php }
                            else {?>
                                <img src="<?php echo base_url() . '/assets/file/' .$borrowersDetails['profilepicture']; ?>" alt=""  class="img-responsive circular img-size" />  <?php 
                           }
                            ?>
                    </div>
                    <hr>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <h4> <b> Total Credit </b> <?php echo '$'.$borrowersDetails['inAmount']; ?></h4>
                        </li>
                        <li class="list-group-item">
                             <b>User Name </b>      
                           <a class="pull-right text-black"><?php echo (!empty( $borrowersDetails['user_name']))? $borrowersDetails['user_name']:''; ?></a> 
                        </li>
                        <li class="list-group-item">
                             <b>Location</b>      
                           <a class="pull-right text-black">
                                <cite title="state, country">
                                    <?php echo $borrowersDetails['state']; ?>, <?php
                                    $data = get_data('countries', array('id' => $borrowersDetails['country']));
                                    echo $data['name'];
                                    ?>
                                </cite>
                           </a> 
                        </li>
                        <li class="list-group-item">
                             <b>Email </b>      
                           <a class="pull-right text-black"><?php echo (!empty( $borrowersDetails['email']))? $borrowersDetails['email']:''; ?></a> 
                        </li>
                        <li class="list-group-item">
                             <b>First Name </b>      
                           <a class="pull-right text-black"><?php echo (!empty( $borrowersDetails['first_name']))? $borrowersDetails['first_name']:''; ?></a> 
                        </li>
                        <li class="list-group-item">
                             <b>Middle Name </b>      
                           <a class="pull-right text-black"><?php echo (!empty( $borrowersDetails['middle_name']))? $borrowersDetails['middle_name']:''; ?></a> 
                        </li>
                        <li class="list-group-item">
                             <b>Last Name</b>      
                           <a class="pull-right text-black"><?php echo (!empty( $borrowersDetails['last_name']))? $borrowersDetails['last_name']:''; ?></a> 
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
                       <?php echo $borrowersDetails['gender']; ?>
                    </p>
                <hr>
                <strong> Date of Birth</strong>
                    <p class="text-muted">
                       <?php echo $borrowersDetails['dateofbirth']; ?>
                    </p>
                <hr>
                <strong> Address</strong>
                    <p class="text-muted">
                      <?php echo $borrowersDetails['address']; ?>
                    </p>
                <hr>
                <strong> Country</strong>
                    <p class="text-muted">
                      <?php
                        $data = get_data('countries', array('id' => $borrowersDetails['country']));
                        echo $data['name'];
                        ?>
                    </p>
                <hr>                
                <strong> State</strong>
                    <p class="text-muted">
                      <?php echo $borrowersDetails['state']; ?>
                    </p>
                <hr>
                <strong> City</strong>
                    <p class="text-muted">
                      <?php echo $borrowersDetails['city']; ?>
                    </p>
                <hr>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>



<?php //print_r($allfundedproject);?>
<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">All Projects Created Chart</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">All projects Funded Chart</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Borrower profile</a></li>
        
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            
            <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Created Projects</h3>
                    </div>
                    <div class="box-body no-padding">
                        <?php if(empty($allCreatedProject)){?>
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
                                    <?php if(!empty($allCreatedProject)) {
                                        $i = 1;
                                        foreach ($allCreatedProject as $row) {                                            //print_r($row);die; ?>
                                        
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
                                                    class="numeric"><span><?php echo $row->neededAmount; ?></span>
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
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                      <div class="box-header">
                          <h3 class="box-title">All Funded Projects</h3>
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
        </div>        
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
            
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