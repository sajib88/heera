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
                        <?php if(empty($allfundedproject)){

                            ?>
                        <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php echo 'No project funded yet.';?></div>
                        <?php }else{?>
                            <div id="no-more-tables">

                                <table class="table table-hover" id="fundedProjectsDataTable">
                                    <thead>
                                    <tr>

                                        <th class="numeric">#</th>

                                        <th class="numeric"><?php echo 'Project Name';?></th>

                                        <th class="numeric"><?php echo 'Borrower Name';?></th> 
                                        
                                        <th class="numeric"><?php echo 'Amount Lent';?></th>
                                        
                                        <th class="numeric"><?php echo 'Amount Repaid';?></th>

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
                                                    class="numeric"><span><?php if(!empty($row->fundedAmount)){echo '$'.$row->fundedAmount;}else{echo '$0.00';}  ?></span>
                                                </td>
                                                <td data-title="<?php echo 'Amount Collected'; ?>"
                                                    class="numeric"><span><?=(!empty($row->browRepaidAmount))?'$'.$row->browRepaidAmount:'$0.00';?></span></td>
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
        <div class="tab-pane" id="bilingInfo">


            <div class="row">

                <?php if(empty($listpaymethod)){?>
                    <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php echo 'No project funded yet.';?></div>
                <?php }else{?>
                    <?php if(!empty($listpaymethod)) {
                         foreach ($listpaymethod as $row) {
                    ?>
                    <div class="col-md-6 ">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"><?php echo $row->selectPaymentType;?></h3>
                            </div>
                            <div class="box-body no-padding">
                                <ul class="list-group list-group-unbordered">

                                        <?php
                                            if($row->selectPaymentType == 'PayPal'){?>
                                                <li class="list-group-item">
                                                    <b>Email</b><span class="pull-right"><?php echo $row->paypalemail; ?></span>
                                                </li>
                                                <?php if(!empty($row->useFor)){ ?>
                                                <li class="list-group-item">
                                                    <b>Used For</b><span class="pull-right"><?php echo $row->useFor; ?> </span>
                                                </li>
                                                <?php } else{} ?>
                                                <?php if($row->isPrimary == 1){?>
                                                <li class="list-group-item">
                                                    <b>Payment Method</b><span class="pull-right"> <?php echo "Yes"; ?> </span>
                                                </li>
                                                <?php }else{?>
                                                    <li class="list-group-item">
                                                        <b>Payment Method</b><span class="pull-right"> <?php echo "No"; ?> </span>
                                                    </li>
                                                <?php }?>
                                            <?php }elseif($row->selectPaymentType == 'Debit Card'){?>
                                                <li class="list-group-item">
                                                    <b>Debit Card Number</b><span class="pull-right"> <?php echo $row->debitCardNumber; ?> </span>
                                                </li>
                                                <?php if(!empty($row->useFor)){ ?>
                                                    <li class="list-group-item">
                                                        <b>Used For</b><span class="pull-right"><?php echo $row->useFor; ?> </span>
                                                    </li>
                                                <?php } else{} ?>
                                                <?php if($row->isPrimary == 1){?>
                                                    <li class="list-group-item">
                                                        <b>Payment Method</b><span class="pull-right"> <?php echo "Yes"; ?> </span>
                                                    </li>
                                                <?php }else{?>
                                                    <li class="list-group-item">
                                                        <b>Payment Method</b><span class="pull-right"> <?php echo "No"; ?> </span>
                                                    </li>
                                                <?php }?>
                                            <?php }elseif($row->selectPaymentType == 'Credit Card'){ ?>
                                                <li class="list-group-item">
                                                    <b>First Name</b><span class="pull-right"> <?php echo $row->firstName; ?> </span>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Last Name</b><span class="pull-right"> <?php echo $row->lastName; ?> </span>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Expiration Date</b><span class="pull-right"> <?php echo $row->expireDate.'-'.$row->expireMonth.'-'.$row->expireYear; ?> </span>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>CVV Code</b><span class="pull-right"> <?php echo $row->cvv; ?> </span>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Credit Type</b><span class="pull-right"> <?php echo $row->cardType; ?> </span>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Card Number</b><span class="pull-right"> <?php echo $row->cardNumber; ?> </span>
                                                </li>
                                                <?php if(!empty($row->useFor)){ ?>
                                                    <li class="list-group-item">
                                                        <b>Used For</b><span class="pull-right"><?php echo $row->useFor; ?> </span>
                                                    </li>
                                                <?php } else{} ?>
                                                <?php if($row->isPrimary == 1){?>
                                                    <li class="list-group-item">
                                                        <b>Is Primary Payment Method ?</b><span class="pull-right"> <?php echo "Yes"; ?> </span>
                                                    </li>
                                                <?php }else{?>
                                                    <li class="list-group-item">
                                                        <b>Is Primary Payment Method ?</b><span class="pull-right"> <?php echo "No"; ?> </span>
                                                    </li>
                                                <?php }?>

                                            <?php }elseif($row->selectPaymentType == 'Direct Deposit'){ ?>
                                                <li class="list-group-item">
                                                    <b>Bank Name</b><span class="pull-right"> <?php echo $row->bankName; ?> </span>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Account Number</b><span class="pull-right"> <?php echo $row->accountNumber; ?> </span>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Routhing Number</b><span class="pull-right"> <?php echo $row->routhingNumber; ?> </span>
                                                </li>
                                                <?php if(!empty($row->useFor)){ ?>
                                                    <li class="list-group-item">
                                                        <b>Used For</b><span class="pull-right"><?php echo $row->useFor; ?> </span>
                                                    </li>
                                                <?php } else{} ?>
                                                <?php if($row->isPrimary == 1){?>
                                                    <li class="list-group-item">
                                                        <b>Is Primary Payment Method ?</b><span class="pull-right"> <?php echo "Yes"; ?> </span>
                                                    </li>
                                                <?php }else{?>
                                                    <li class="list-group-item">
                                                        <b>Is Primary Payment Method ?</b><span class="pull-right"> <?php echo "No"; ?> </span>
                                                    </li>
                                                <?php }?>
                                            <?php }elseif($row->selectPaymentType == 'Check'){?>
                                                <?php if(!empty($row->useFor)){ ?>
                                                    <li class="list-group-item">
                                                        <b>Used For</b><span class="pull-right"><?php echo $row->useFor; ?> </span>
                                                    </li>
                                                <?php } else{} ?>
                                                <?php if($row->isPrimary == 1){?>
                                                    <li class="list-group-item">
                                                        <b>Is Primary Payment Method ?</b><span class="pull-right"> <?php echo "Yes"; ?> </span>
                                                    </li>
                                                <?php }else{?>
                                                    <li class="list-group-item">
                                                        <b>Is Primary Payment Method ?</b><span class="pull-right"> <?php echo "No"; ?> </span>
                                                    </li>
                                                <?php }?>
                                            <?php }?>

                                </ul>
                            </div>
                        </div>
                    </div>

                <?php
                         }
                    }
                }
                ?>

            </div>




        </div>

        <div class="tab-pane" id="lenderProfileDeatails">
          <div class="row">
              <form id="update_lender_profile" name="myForm" role="form" method="post" class="form-horizontal">
                  <div id="foo"></div>
              <div class="col-md-4 col-md-offset-1">
                  <div class="box box-primary">
                      <div class="box-body padd">

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
                  <div class="row">
                      <div class="col-md-6">

                          <a href="<?php echo base_url('fund/Fund/adminfund'); ?>/<?php echo $lendarDetails['id']; ?>" class="btn btn-block btn-info"> Add Fund</a>
                      </div>
                      <div class="col-md-6">

                          <a  href="<?php echo base_url('fund/Fund/adminrefund'); ?>/<?php echo $lendarDetails['id']; ?>"class="btn btn-block btn-warning"> Refund </a>
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
                                    <input name="first_name" value="<?php echo $lendarDetails['first_name']; ?>"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 label-control">Email</label>
                                <div class="col-md-8">
                                    <input name="email" value="<?php echo $lendarDetails['email']; ?>"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 label-control">Phone</label>
                                <div class="col-md-8">
                                    <input name="phone" value="<?php echo $lendarDetails['phone']; ?>"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 label-control">Gender</label>
                                <div class="col-md-8">
                                    <?php $gender =  array('male','female');?>
                                    <select name="gender" class="form-control chosen-select" id="type">
                                        <option value="">Select Gender</option>
                                        <?php
                                        if (is_array($gender) and (!empty($gender))) {
                                            foreach ($gender as $key=>$value) {
                                                $v = (set_value('gender')!='')?set_value('gender'):$lendarDetails['gender'];
                                                $sel = ($v == $value)?'selected="selected"':'';
                                                ?>
                                                <option  value="<?php echo $value; ?>" <?php echo $sel;?>><?php echo $value; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 label-control">Date of Birth</label>
                                <div class="col-md-8">
                                    <input name="dateofbirth" id="datepicker" value="<?php echo date("m/d/Y", strtotime($lendarDetails['dateofbirth'])); ?>"  class="form-control">
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
                                                $v = (set_value('country')!='')?set_value('country'):$lendarDetails['country'];
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
                                <label for="name" class="col-md-4 label-control">State</label>
                                    <div class="col-md-8">
                                        <div id="result">
                                            <select name="state"  class="form-control">
                                                <option value="">Select state</option>
                                                <?php
                                                if (is_array($states) and (!empty($states))) {
                                                    foreach ($states as $row) {
                                                        $v = (set_value('state')!='')?set_value('state'):$lendarDetails['state'];
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
                                    <input name="city" value="<?php echo $lendarDetails['city']; ?>"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 label-control">Address</label>
                                <div class="col-md-8">
                                    <input name="address" value="<?php echo $lendarDetails['address']; ?>"  class="form-control">
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
                      <button id="updateProfile" class="btn btn-success  btn-lg pull-right" data-id="<?php echo $lendarDetails['id']; ?>" type="button">
                          <i class="fa fa-check"></i> &nbsp; &nbsp; Update</button>
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

<script>

    function getComboA(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {state: value};
        $.ajax({
            type: 'POST',
            url: base_url + "lendars/Lendars/getStateByAjax",
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
                if($("#update_lender_profile").valid()) {
                    $('#loadingState').show();
                    var base_url = '<?php echo base_url() ?>';
                    var id = $(this).data('id');

                    $.ajax({
                        url: base_url + "lendars/Lendars/updateLenderProfile/" + id,
                        type: 'POST',
                        data: $("#update_lender_profile").serialize(),
                        success: function (msg) {

                            if (msg == 'success') {
                                // show success meessage
                                var msg = "<div class='alert alert-success'>Profile Update Successfully.  </div>";
                                $('#foo').html(msg);
                                $('#loadingState').hide();
                            }
                            else {
                                var msg = "<div class='alert alert-danger'> Profile no updated </div>";
                                $('#foo').html(msg);
                                $('#loadingState').hide();
                            }
                        },

                    });
                }
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

<script type="application/javascript">
    $('#update_lender_profile').validate({
        rules: {
            first_name: {
                required:true,
            },

            email: {
                required:true,
            },

            phone: {
                required:true,
                number: true
            },

            dateofbirth: {
                required:true,
            }
        },
        messages:{
            first_name: {
                required: "Name is Required",
            },

            email: {
                required: "Email Address is Required",
            },

            phone: {
                required: "Phone Number is Required",
            },

            dateofbirth: {
                required: "Date of Birth Number is Required",
            }
        }
    });
</script>