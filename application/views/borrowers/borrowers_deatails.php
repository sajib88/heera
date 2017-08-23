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
        <!--<li class=""><a href="#fundedProjects" data-toggle="tab" aria-expanded="false">All projects Funded Chart</a></li>-->
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
                                        <th class="numeric">Amount Repaid</th>

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
                                                    class="numeric"><a href="<?=base_url()?>project/Project/detail/<?=$row->projectID?>"><?php echo $row->name; ?></a></td>
                                                
                                                <td data-title="<?php echo 'Amount Needed'; ?>"
                                                    class="numeric"><span><?php echo '$'.$row->neededAmount; ?></span>
                                                </td>
                                                <td data-title="<?php echo 'Amount Collected'; ?>"
                                                    <?php $data =$this->global_model->total_sum_amount('project_fund_history', array('projectID'=>$row->projectID)); ?>
                                                    class="numeric"><span><?php if(!empty($data[0]->fundedAmount)){echo '$'.$data[0]->fundedAmount;}else{echo '$0.00';}  ?></span></td>
                                                <td data-title="Amount Repaid" class="numeric"><span><?=(!empty($row->repaidAmount))?'$'.$row->repaidAmount:'$0.00';?></span></td>
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
        <!--<div class="tab-pane" id="fundedProjects">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                      <div class="box-body no-padding">
                          <?php /*if(empty($allfundedproject)){*/?>
                          <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php /*echo 'No project funded yet.';*/?></div>
                          <?php /*}else{*/?>
                              <div id="no-more-tables">

                                  <table class="table table-hover" id="fundedProjectsDataTable">
                                      <thead>
                                      <tr>

                                          <th class="numeric">#</th>

                                          <th class="numeric"><?php /*echo 'Project Name';*/?></th>

                                          <th class="numeric"><?php /*echo 'Amount Needed';*/?></th>

                                          <th class="numeric"><?php /*echo 'Amount Collected';*/?></th>
                                          
                                          <th class="numeric"><?php /*echo 'Status';*/?></th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php /*if(!empty($allfundedproject)) {
                                          $i = 1;
                                          foreach ($allfundedproject as $row) {                                            //print_r($row);die; */?>

                                              <tr>
                                                  <td><?php /*echo $i; */?></td>
                                                  <td data-title="<?php /*echo 'Project Name'; */?>"
                                                      class="numeric"><?php /*echo $row->name; */?></td>
                                                  <td data-title="<?php /*echo 'Amount Needed'; */?>"
                                                      class="numeric"><span>$<?php /*echo $row->neededAmount; */?></span>
                                                  </td>
                                                  <td data-title="<?php /*echo 'Amount Collected'; */?>"
                                                      class="numeric"><span><?php /*if(!empty($row->fundedAmount)){echo '$'.$row->fundedAmount;}else{echo '$0.00';}  */?></span></td>
                                                  
                                                  <td data-title="<?php /*echo 'Status'; */?>"
                                                    class="numeric"><span><?php /*if(!empty($row->statusID)){ echo getStatusById($row->statusID);}else{ echo 'New';} */?></span>
                                                  </td>
                                                 
                                              </tr>
                                              <?php /*$i++;
                                          }
                                      }else{
                                          echo 'No data Found';
                                      }
  */?>
                                      </tbody>
                                  </table>
                              </div>
                          <?php /*}*/?>
                      </div>

                  </div>

              </div>
          </div>
        </div>  -->
        <!-- /.tab-pane -->
        <div class="tab-pane" id="borrowerProfile">
            <div class="row">
                <form id="myForm" name="myForm" role="form" method="post" class="form-horizontal">
                    <div id="foo"></div>
                    <div class="col-md-4 col-md-offset-1">
                        <div class="box box-primary">
                            <div class="box-body padd">

                                <?php
                                if($borrowersDetails['profilepicture'] == 0) {?>
                                    <img src="<?php echo base_url() . '/assets/user-demo.jpg'?>" alt="" class="img-responsive circular profile-user-img img-responsive img-circle img-size" />
                                <?php }
                                else {?>
                                    <img src="<?php echo base_url() . '/assets/file/' .$borrowersDetails['profilepicture']; ?>" alt=""  class="img-responsive circular profile-user-img img-responsive img-circle img-size" />  <?php
                                }
                                ?>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <a class="btn btn-block btn-info"> Add Fund</a>
                            </div>
                            <div class="col-md-6">

                                <a class="btn btn-block btn-warning"> Refund </a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="box box-primary">
                            <!-- /.box-header -->
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="name" class="col-md-4 label-control">Name</label>
                                    <div class="col-md-8">
                                        <input name="first_name" value="<?php echo $borrowersDetails['first_name']; ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 label-control">Email</label>
                                    <div class="col-md-8">
                                        <input name="email" value="<?php echo $borrowersDetails['email']; ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 label-control">Phone</label>
                                    <div class="col-md-8">
                                        <input name="phone" value="<?php echo $borrowersDetails['phone']; ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 label-control">Gender</label>
                                    <div class="col-md-8">
                                        <input name="gender" value="<?php echo $borrowersDetails['gender']; ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 label-control">Date of Birth</label>
                                    <div class="col-md-8">
                                        <input name="dateofbirth" id="datepicker" value="<?php echo date("m/d/Y", strtotime($borrowersDetails['dateofbirth'])); ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 label-control">Country</label>
                                    <div class="col-md-8">
                                        <select onchange="getComboA(this)" name="country" id="js_country" class="form-control">
                                            <option value="">Select</option>
                                            <?php
                                            if (is_array($countries)) {
                                                foreach ($countries as $country) {
                                                    $v = (set_value('country')!='')?set_value('country'):$borrowersDetails['country'];
                                                    $sel = ($v == $country->id)?'selected="selected"':'';
                                                    ?>
                                                    <option  value="<?php echo $country->id; ?>" <?php echo $sel;?>><?php echo $country->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('country');?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="State" class="col-md-4 label-control">State</label>
                                    <div class="col-md-8">
                                        <div id="result">
                                            <select name="state"  class="form-control">
                                                <option value="">Select state</option>
                                                <?php
                                                if (is_array($states) and (!empty($states))) {
                                                    foreach ($states as $row) {
                                                        $v = (set_value('state')!='')?set_value('state'):$borrowersDetails['state'];
                                                        $sel = ($v == $row->name)?'selected="selected"':'';
                                                        ?>
                                                        <option  value="<?php echo $row->name; ?>" <?php echo $sel;?>><?php echo $row->name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 label-control">City</label>
                                    <div class="col-md-8">
                                        <input name="city" value="<?php echo $borrowersDetails['city']; ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 label-control">Address</label>
                                    <div class="col-md-8">
                                        <input name="address" value="<?php echo $borrowersDetails['address']; ?>"  class="form-control">
                                    </div>
                                </div>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>

                      </div>

                        <div class="col-lg-3 col-md-offset-1">

                            <?php echo anchor('profile/dashboard',"<i class='fa fa-undo'></i> &nbsp; &nbsp; Cancel",array('class' => 'btn btn-danger btn-lg'));?>
                        </div>
                        <div class="col-lg-7 ">
                            <button id="updateProfile" class="btn btn-success  btn-lg pull-right" data-id="<?php echo $borrowersDetails['id']; ?>" type="button">
                                <i class="fa fa-check"></i> &nbsp; &nbsp; Update</button>
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

<script>

    function getComboA(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {state: value};
        $.ajax({
            type: 'POST',
            url: base_url + "borrowers/Borrowers/getStateByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#result").html(resultData);
            }
        });

    }

</script>

<script>
    $(function(){
        $("#updateProfile").click(function(e){
            var base_url = '<?php echo base_url() ?>';
            var id=$(this).data('id');

            $.ajax({
                url:base_url + "borrowers/Borrowers/updateBorrowerProfile/"+id,
                type: 'POST',
                data: $("#myForm").serialize(),
                success: function (msg) {

                    if (msg == 'success') {
                        // show success meessage
                        var msg = "<div class='alert alert-success'>Profile Update Successfully.  </div>";
                        $('#foo').html(msg);
                    }
                    else {
                        var msg = "<div class='alert alert-danger'> Profile no updated </div>";
                        $('#foo').html(msg);
                    }
                },

            });
            e.preventDefault();
        });
    });
</script>

<script type="text/javascript">


    jQuery(document).ready(function() {
        //Date picker
        $('#datepicker2').datepicker({
            autoclose: true
        });
        $('#datepicker').datepicker({
            autoclose: true
        });

    });



</script>

