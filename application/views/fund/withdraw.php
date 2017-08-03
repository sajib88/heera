<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-credit-card"></i>  Withdraw Fund

        </h1>
        <ol class="breadcrumb">
            <span class="btn btn-block bg-fund btn-flat"> <i class="fa fa-money"></i>&nbsp; &nbsp; Current Balance : $<?php if($user_info['inAmount']>= 0){echo $user_info['inAmount'];}else{echo '0.00';}?> </span></a>
        </ol>
    </section>
    
    
    
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Withdraw Fund </h3>
                    </div>

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

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">                                        
                                    <input id="paypal" type="radio" name="paymentMethod" value="paypal"> PayPal                                            
                                    <input id="craditcard" type="radio" name="paymentMethod" value="craditcard"> CraditCard                                            
                                </div>
                            </div>
                            <div id="paypal-form" class="col-lg-12" hidden="true">
                                <form id="paypalform" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/withdraw'); ?>">
                                    <?php $totalampount = $user_info['inAmount']; ?>
                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                    <input type="hidden" name="currentAmount" value="<?php echo $totalampount; ?>">


                                    <label> Total Fund in your Account $ <?php echo $totalampount; ?></label>

                                    <?php if($totalampount > 0) { ?>
                                <div class="col-lg-12">
                                    <div class="form-group">


                                            <label>Amount Withdraw <span class="error">*</span></label>
                                            <input name="outAmount" type="number" id="outAmount" placeholder="0.00"  class="form-control">
                                        
                                    </div>
                                </div>


                                <div class="col-lg-12 text-center">
                                    <input type="submit" name="submit" class="btn btn-info margin-r-5" value="Withdraw Now">
                                    <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                </div>
                                    <?php } else { ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-ban"></i> Alert! No Fund</h4>
                                            you do not have sufficient balance withdraw the fund
                                        </div>
                                   <?php } ?>

                                </form>    
                            </div>
                            
                            <div id="craditcard-form" class="col-lg-12" hidden="true">
                                <form id="creditCard"  role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('project/Project/add'); ?>">
                                    <div class="col-lg-12">
                                        <div class="form-group"> 
                                                <label>Credit Card Number<span class="error">*</span></label>
                                                <input name="creditCardNumber" type="text" id="creditCardNumber" placeholder="Credit Card Number"  class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group"> 
                                                <label><span class="error">*</span></label>
                                                <label>Expiration Date<span class="error">*</span></label><span id='expirationDate' class='error' for='expirationDate'></span>

                                                <input name="expirationDate" type="text" class="form-control" id="datepicker">

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
                                                <label>Amount<span class="error">*</span></label>
                                                <input name="outAmount" type="text" id="outAmount" placeholder="Amount"  class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <input type="submit" name="submit" class="btn btn-info margin-r-5" value="Withdraw Now">
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
            creditCardNumber: {
                required:true,
                number: true
                
            },
            expirationDate:{
                required:true
            },
            cvvCode:{
                required:true
            },

            inAmount:{
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
            },
            inAmount: {
                required: "Amount is Required, 0-9 Number digit only allow",
            }
        }
    });


</script>

<script type="application/javascript">
    $('#paypalform').validate({
        rules: {
            outAmount: {
                required:true,
                number: true,
                max: '<?php echo $totalampount; ?>'
            }
        },
        messages:{
            outAmount: {
                required: "Amount is Required",
            }
        }
    });


</script>
