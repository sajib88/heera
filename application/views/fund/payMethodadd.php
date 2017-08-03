<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-credit-card"></i>  Payment Methods

        </h1>

    </section>
    
    
    
    <section class="content">
        <div class="row">

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

            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Add New Payment Methods </h3>
                    </div>



                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">                                        
                                    <input id="paypal" type="radio" name="paymentMethod" value="paypal"> PayPal                                            
                                    <input id="craditcard" type="radio" name="paymentMethod" value="craditcard"> CraditCard                                            
                                </div>
                            </div>
                            <div id="paypal-form" class="col-lg-12" hidden="true">
                                <form id="paypalform" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/Fund/addMethod'); ?>">
                                    <?php $totalampount = $user_info['inAmount']; ?>
                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                    <input type="hidden" name="selectPaymentType" value="paypal">





                                <div class="col-lg-12">
                                    <div class="form-group">


                                            <label>Your Paypal Email id <span class="error">*</span></label>
                                            <input name="methodName" type="email" id="methodName" placeholder="paypal email address"  class="form-control">
                                        
                                    </div>
                                </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Make this Primary</label>

                                            <input id="craditcard" type="radio" name="isPrimary" value="1">
                                        </div>
                                    </div>


                                <div class="col-lg-12 text-center">
                                    <input type="submit" name="submit" class="btn btn-info margin-r-5" value="Save Now">
                                    <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                </div>



                                </form>    
                            </div>
                            
                            <div id="craditcard-form" class="col-lg-12" hidden="true">
                                <form id="creditCard"  role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/Fund/addMethod'); ?>">
                                    <input type="hidden" name="selectPaymentType" value="card">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>First Name<span class="error">*</span></label>
                                            <input name="firstName" type="text" id="firstName" placeholder="First Name"  class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Last Name<span class="error">*</span></label>
                                            <input name="lastName" type="text" id="lastName" placeholder="Last Name"  class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group"> 
                                                <label>Credit Card Number<span class="error">*</span></label>
                                                <input name="creditCardNumber" type="text" id="creditCardNumber" placeholder="Credit Card Number"  class="form-control">

                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group"> 
                                                <label><span class="error">*</span></label>
                                                <label>Expiration Date<span class="error">*</span></label><span id='expirationDate' class='error' for='expirationDate'></span>

                                                <input name="expireDate" type="text" class="form-control" placeholder="03">

                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label><span class="error">*</span></label>
                                            <label> Month<span class="error">*</span></label><span id='expirationDate' class='error' for='expirationDate'></span>

                                            <input name="expireMonth" type="text" class="form-control" placeholder="12">

                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label><span class="error">*</span></label>
                                            <label> Year<span class="error">*</span></label><span id='expirationDate' class='error' for='expirationDate'></span>

                                            <input name="expireYear" type="text" class="form-control" placeholder="2019">

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group"> 
                                                <label>CVV Code<span class="error">*</span></label>
                                                <input name="cvvCode" type="text" id="cvvCode" placeholder="CVV Code" class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Make this Primary</label>

                                            <input id="craditcard" type="radio" name="isPrimary" value="1">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 text-center">
                                        <input type="submit" name="submit" class="btn btn-info margin-r-5" value="Add Card Number">
                                        <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                    </div>
                                </form>    
                            </div>
                            
                            
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </section>

    <?php if(count($listpaymethod)<=0){?>
        <div class="alert alert-info">No Payment Method found</div>
    <?php }else{?>
    <section class="content">


        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Recent Application</h3>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>isPrimary</th>
                            <th>status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($listpaymethod)) {
                        $i = 1;
                        foreach ($listpaymethod as $row) {
                        ?>
                        <tr>
                            <td><a href="#"><?php echo $i; ?></a></td>
                            <td><?php echo $row->selectPaymentType; ?></td>
                            <td><?php echo $row->isPrimary; ?></td>
                            <td><?php echo $row->status; ?></td>
                        </tr>

                            <?php $i++;
                        }
                        }?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->


        </div>




    </section>

    <?php } ?>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#paypal").click(function(){
            $("#paypal-form").show();
            $("#craditcard-form").hide();
        });
    });
    
    $(document).ready(function(){
        $("#craditcard").click(function(){
            $("#craditcard-form").show();
            $("#paypal-form").hide();
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
    $('#creditCard').validate({
        rules: {

            firstName: {
                required:true

            },

            lastName: {
                required:true

            },

            creditCardNumber: {
                required:true,
                number: true
                
            },
            expirationDate:{
                required:true
            },
            cvvCode:{
                required:true
            }
        },
        messages:{
            creditCardNumber: {
                required: "Credit Card Numberis Required",
            },
            expirationDate: {
                required: "Expiration Date is Required",
            },
            cvvCode: {
                required: "CVV Code is Important !",
            }
        }
    });


</script>

<script type="application/javascript">
    $('#paypalform').validate({
        rules: {
            methodName: {
                required:true,
                email: true
            }
        },
        messages:{
            methodName: {
                required: "Email Required",
            }
        }
    });


</script>
