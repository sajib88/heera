<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-credit-card"></i>  Withdraw Fund

        </h1>

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
                    <?php

                    if($listpaymethod['userID'] != 0){?>
                    <div class="panel-body">
                        <div class="row">

                                <form id="paypalform" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/withdraw'); ?>">
                                    <?php $totalampount = $user_info['inAmount']; ?>
                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                    <input type="hidden" name="currentAmount" value="<?php echo $totalampount; ?>">




                                    <?php if($totalampount > 0) { ?>
                                <div class="col-lg-12">
                                    <label> Total Fund in your Account $ <?php echo $totalampount; ?></label>
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
                        </div>
                    <?php }else{ ?>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-lg-12 direct-chat-danger" >

                                    <div class="pad margin no-print">
                                        <div class="callout callout-danger" style="margin-bottom: 0!important;">
                                            <h4><i class="fa fa-info"></i> Note:</h4>
                                            You do not select any payment method. <a href="<?php echo base_url('fund/addMethod'); ?>">Click here  add payment method now.</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    <?php }?>
                </div>  
            </div>
        </div>
    </section>    
</div>

<script type="text/javascript">


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
