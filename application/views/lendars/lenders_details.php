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
<?php //print_r($lendarDetails);?>




<div class="col-md-12 no-padding">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#fundedProjectList" data-toggle="tab" aria-expanded="true">Funded Projects List</a></li>
        <li class=""><a href="#bilingInfo" data-toggle="tab" aria-expanded="false">Billing Information</a></li>        
        <li class=""><a href="#lenderProfileDeatails" data-toggle="tab" aria-expanded="false">Lender Profile Deatails</a></li>        
        
        
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="fundedProjectList">
            
            <div class="row">
            <div class="col-md-12 ">
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

                                        <th class="numeric"><?php echo 'Borrower Name';?></th> 
                                        
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
                                                <td data-title="<?php echo 'Borrower Name'; ?>"
                                                    class="numeric"><span><?php echo $row->borrowerName; ?></span>
                                                </td>
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
        <div class="tab-pane active" id="bilingInfo">
            
        </div>
        <div class="tab-pane" id="lenderProfileDeatails">
          <div class="row">

              <div class="col-md-4 col-md-offset-1">
                  <div class="box box-primary">
                      <div class="box-body">

                              <?php
                              if($lendarDetails['profilepicture'] == 0) {?>
                                  <img src="<?php echo base_url() . '/assets/user-demo.jpg'?>" alt="" class="img-responsive circular profile-user-img img-responsive img-circle img-size" />
                              <?php }
                              else {?>
                                  <img src="<?php echo base_url() . '/assets/file/' .$lendarDetails['profilepicture']; ?>" alt=""  class="img-responsive circular profile-user-img img-responsive img-circle img-size" />  <?php
                              }
                              ?>


                            <h3 class="profile-username text-center">Total Credit <?php echo '$'.$lendarDetails['inAmount']; ?></h3>

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
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['first_name']))? $lendarDetails['first_name']:''; ?></a>
                            </li>

                            <li class="list-group-item">
                                <b> Email </b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['email']))? $lendarDetails['email']:''; ?></a>
                            </li>

                            <li class="list-group-item">
                                <b>Phone</b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['phone']))? $lendarDetails['phone']:''; ?></a>
                            </li>

                            <li class="list-group-item">
                                <b>Gender</b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['gender']))? $lendarDetails['gender']:''; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Date of Birth</b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['dateofbirth']))? $lendarDetails['dateofbirth']:''; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Country</b>
                                <a class="pull-right "><?php
                                    $data = get_data('countries', array('id' => $lendarDetails['country']));
                                    echo $data['name'];
                                    ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>State</b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['state']))? $lendarDetails['state']:''; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>City</b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['city']))? $lendarDetails['city']:''; ?></a>
                            </li>

                            <li class="list-group-item">
                                <b>Address</b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['address']))? $lendarDetails['address']:''; ?></a>
                            </li>



                        </ul>
                    </div>
                    <!-- /.box-body -->
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
        //var personaltable = document.getElementById("js_personal_table");
        $('#fundedProjectsDataTable').DataTable({
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
        
    });
</script>