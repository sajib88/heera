<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">
<style type="text/css">
    .img-size{
        height: 120px;
        width: 120px;
        margin: 0px auto;
    }
/*    table.dataTable thead > tr > th:last-child:after{
        display: none;
    }*/
</style>
<?php //print_r($borrowersDetails);?>

<?php //print_r($allfundedproject);?>
<div class="col-md-12 no-padding">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#cretedProjects" data-toggle="tab" aria-expanded="true">All Projects Created Chart</a></li>
        <li class=""><a href="#fundedProjects" data-toggle="tab" aria-expanded="false">All projects Funded Chart</a></li>
        <li class=""><a href="#borrowerProfile" data-toggle="tab" aria-expanded="false">Borrower profile</a></li>
        
        
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="cretedProjects">
            
            <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body no-padding">
                        <?php if(empty($allCreatedProject)){?>
                        <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php echo 'No project funded yet.';?></div>
                        <?php }else{?>
                            <div id="no-more-tables">

                                <table class="table table-hover" id="createdProjectDataTable">
                                    <thead>
                                    <tr>

                                        <th class="numeric">#</th>

                                        <th class="numeric"><?php echo 'Project Name';?></th>
                                        
                                        <th class="numeric"><?php echo 'Amount Needed';?></th>

                                        <th class="numeric"><?php echo 'Amount Collected';?></th>

                                        <th class="numeric"><?php echo 'Status';?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($allCreatedProject)) {
                                        $i = 1;
                                        foreach ($allCreatedProject as $row) {                                            //print_r($row);die; ?>
                                        
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td data-title="<?php echo 'Project Name'; ?>"
                                                    class="numeric"><?php echo $row->name; ?></td>
                                                
                                                <td data-title="<?php echo 'Amount Needed'; ?>"
                                                    class="numeric"><span><?php echo '$'.$row->neededAmount; ?></span>
                                                </td>
                                                <td data-title="<?php echo 'Amount Collected'; ?>"
                                                    <?php $data =$this->global_model->total_sum_amount('project_fund_history', array('projectID'=>$row->projectID)); ?>
                                                    class="numeric"><span><?php if(!empty($data[0]->fundedAmount)){echo '$'.$data[0]->fundedAmount;}else{echo '$0.00';}  ?></span></td> 
                                                <td data-title="<?php echo 'Status'; ?>"
                                                    class="numeric"><span><?php if(!empty($row->statusID)){ echo getStatusById($row->statusID);}else{ echo 'New';} ?></span>
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
        <div class="tab-pane" id="fundedProjects">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                      <div class="box-body no-padding">
                          <?php if(empty($allfundedproject)){?>
                          <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php echo 'No project funded yet.';?></div>
                          <?php }else{?>
                              <div id="no-more-tables">

                                  <table class="table table-hover" id="fundedProjectsDataTable">
                                      <thead>
                                      <tr>

                                          <th class="numeric">#</th>

                                          <th class="numeric"><?php echo 'Project Name';?></th>                                          

                                          <th class="numeric"><?php echo 'Amount Needed';?></th>                                          

                                          <th class="numeric"><?php echo 'Amount Collected';?></th>
                                          
                                          <th class="numeric"><?php echo 'Status';?></th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php if(!empty($allfundedproject)) {
                                          $i = 1;
                                          foreach ($allfundedproject as $row) {                                            //print_r($row);die; ?>

                                              <tr>
                                                  <td><?php echo $i; ?></td>
                                                  <td data-title="<?php echo 'Project Name'; ?>"
                                                      class="numeric"><?php echo $row->name; ?></td>                                                  
                                                  
                                                  <td data-title="<?php echo 'Amount Needed'; ?>"
                                                      class="numeric"><span><?php echo $row->neededAmount; ?></span>
                                                  </td>
                                                  
                                                  <td data-title="<?php echo 'Amount Collected'; ?>"
                                                      <?php $data =$this->global_model->total_sum_amount('project_fund_history', array('projectID'=>$row->projectID)); ?>
                                                      class="numeric"><span><?php if(!empty($data[0]->fundedAmount)){echo '$'.$data[0]->fundedAmount;}else{echo '$0.00';}  ?></span></td>
                                                  
                                                  <td data-title="<?php echo 'Status'; ?>"
                                                    class="numeric"><span><?php if(!empty($row->statusID)){ echo getStatusById($row->statusID);}else{ echo 'New';} ?></span>
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
        <div class="tab-pane" id="borrowerProfile">
            <div class="row">

                    <div class="col-md-4 col-md-offset-1">
                        <div class="box box-primary">
                            <div class="box-body">

                                <?php
                                if($borrowersDetails['profilepicture'] == 0) {?>
                                    <img src="<?php echo base_url() . '/assets/user-demo.jpg'?>" alt="" class="img-responsive circular profile-user-img img-responsive img-circle img-size" />
                                <?php }
                                else {?>
                                    <img src="<?php echo base_url() . '/assets/file/' .$borrowersDetails['profilepicture']; ?>" alt=""  class="img-responsive circular profile-user-img img-responsive img-circle img-size" />  <?php
                                }
                                ?>


                                <h3 class="profile-username text-center">Total Credit <?php echo '$'.$borrowersDetails['inAmount']; ?></h3>

                            </div>
                        </div>
                    </div>


    
    
                <div class="col-md-6">

                        <div class="box-body box-profile no-padding">

                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="list-group list-group-unbordered">

                                    <li class="list-group-item">
                                        <b>Name </b>
                                        <a class="pull-right "><?php echo (!empty( $borrowersDetails['first_name']))? $borrowersDetails['first_name']:''; ?></a>
                                    </li>

                                    <li class="list-group-item">
                                        <b> Email </b>
                                        <a class="pull-right "><?php echo (!empty( $borrowersDetails['email']))? $borrowersDetails['email']:''; ?></a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Phone</b>
                                        <a class="pull-right "><?php echo (!empty( $borrowersDetails['phone']))? $borrowersDetails['phone']:''; ?></a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Gender</b>
                                        <a class="pull-right "><?php echo (!empty( $borrowersDetails['gender']))? $borrowersDetails['gender']:''; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Date of Birth</b>
                                        <a class="pull-right "><?php echo (!empty( $borrowersDetails['dateofbirth']))? $borrowersDetails['dateofbirth']:''; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Country</b>
                                        <a class="pull-right "><?php
                                            $data = get_data('countries', array('id' => $borrowersDetails['country']));
                                            echo $data['name'];
                                            ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>State</b>
                                        <a class="pull-right "><?php echo (!empty( $borrowersDetails['state']))? $borrowersDetails['state']:''; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>City</b>
                                        <a class="pull-right "><?php echo (!empty( $borrowersDetails['city']))? $borrowersDetails['city']:''; ?></a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Address</b>
                                        <a class="pull-right "><?php echo (!empty( $borrowersDetails['address']))? $borrowersDetails['address']:''; ?></a>
                                    </li>



                                </ul>
                            </div>
                            <!-- /.box-body -->
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
    <!-- nav-tabs-custom -->
</div>


<script type="text/javascript">
    $(document).ready(function(){

         $('#createdProjectDataTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "columnDefs": [ {
            "targets": 0,
            "orderable": false
            } ]

        });
        
        $('#fundedProjectsDataTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });
        
        
    });
</script>