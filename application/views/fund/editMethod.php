
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-credit-card"></i> Update Payment Methods
        </h1>
    </section>
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
    <section class="content">
        <div class="row">
            <?php  //print_r($editpayment);
            $typepay= $editpayment['selectPaymentType'];
            ?>
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Update Your Payment Methods </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <!--Paypal form -->
                            <?php if($typepay == 'PayPal') {?>
                            <div id="paypal-form" class="col-lg-12">
                                <form id="paypalform" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/edit/'.$editpayment['paymentMethodID'] ); ?>">
                                    <?php $totalampount = $user_info['inAmount']; ?>
                                    <input type="hidden" name="login_id" value="<?php echo $user_info['id']; ?>">
                                    <input id="paypal" type="hidden" name="selectPaymentType" value="PayPal">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                                <label>Your Paypal Email Address <span class="error">*</span></label>
                                                <input name="paypalemail" type="email" id="methodName" placeholder="paypal email address" value="<?php echo $editpayment['paypalemail']; ?>"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="isPrimary" type="checkbox"  <?php if($editpayment['isPrimary'] == 1){echo "checked";} else { }?> name="isPrimary" value="1">
                                            <label>Is Primary Payment Method ?</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 text-center">
                                        <input type="submit" name="submit" class="btn btn-info margin-r-5" value="Save Now">
                                        <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                    </div>
                                </form>    
                            </div>
                            <!--Paypal form -->
                            <?php }
                            elseif($typepay == 'Credit Card') {?>
                            <!--creditcard form -->
                            <div id="craditcard-form" class="col-lg-12">
                                <form id="creditCard"  role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/edit/'.$editpayment['paymentMethodID'] ); ?>">
                                    <input type="hidden" name="selectPaymentType" value="Credit Card">
                                    <input type="hidden" name="login_id" value="<?php echo $user_info['id']; ?>">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Card Holder Name<span class="error">*</span></label>
                                            <input name="firstName" value="<?php echo $editpayment['firstName']; ?>" type="text" id="firstName"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Credit Type</label>
                                            <?php $types = array('MasterCard','Visa','Amex','American Express','Discover');?>
                                            <select name="cardType" class="form-control chosen-select" id="cardType">
                                                <option value="">Select Card Type</option>
                                                <?php
                                                if (is_array($types) and (!empty($types))) {
                                                    foreach ($types as $key=>$value) {
                                                        $v = (set_value('cardType')!='')?set_value('cardType'):$editpayment['cardType'];
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
                                    <div class="col-lg-12">
                                        <div class="form-group"> 
                                                <label>Credit Card Number<span class="error">*</span></label>
                                                <input name="cardNumber" value="<?php echo $editpayment['cardNumber']; ?>" type="text" id="cardNumber" placeholder="Credit Card Number"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><span class="error">*</span></label>
                                            <label> Month<span class="error">*</span></label><span id='expirationDate' class='error' for='expirationDate'></span>
                                            <input name="expireMonth" value="<?php echo $editpayment['expireMonth']; ?>" type="text" id="expireMonth" class="form-control" placeholder="12">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><span class="error">*</span></label>
                                            <label> Year<span class="error">*</span></label><span id='expirationDate' class='error' for='expirationDate'></span>
                                            <input name="expireYear" value="<?php echo $editpayment['expireYear']; ?>"  type="text" id="expireYear" class="form-control" placeholder="2019">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group"> 
                                                <label>CVV Code<span class="error">*</span></label>
                                                <input name="cvv" value="<?php echo $editpayment['cvv']; ?>" type="text" id="cvvCode" placeholder="CVV Code" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="isPrimary" type="checkbox"  <?php if($editpayment['isPrimary'] == 1){echo "checked";} else { }?> name="isPrimary" value="1">
                                            <label>Is Primary Payment Method ?</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <input type="submit" name="submit" class="btn btn-info margin-r-5" value="Update">
                                        <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                    </div>
                                </form>    
                            </div>
                            <!--creditcard form -->
                            <?php }
                            elseif($typepay == 'Debit Card') {?>
                            <!--debitcard form -->
                            <div id="debitcard-form" class="col-lg-12" >
                                <form id="debitCardvalidation" name="debitCardvalidation" role="form" method="post"   action="<?php echo base_url('fund/edit/'.$editpayment['paymentMethodID'] ); ?>">
                                    <?php $totalampount = $user_info['inAmount']; ?>
                                    <input type="hidden" name="login_id" value="<?php echo $user_info['inAmount']; ?>">
                                    <input id="Debit" type="hidden" name="selectPaymentType" value="Debit Card">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Debit Card Number <span class="error">*</span></label>
                                            <input name="debitCardNumber" value="<?php echo $editpayment['debitCardNumber']; ?>" type="number" id="debitCardNumber" placeholder="Debit Card Number"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="isPrimary" type="checkbox"  <?php if($editpayment['isPrimary'] == 1){echo "checked";} else { }?> name="isPrimary" value="1">
                                            <label>Is Primary Payment Method ?</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <input type="submit" name="submit" class="btn btn-info margin-r-5" value="Save Now">
                                        <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                    </div>
                                </form>
                            </div>
                            <!--debitcard form -->
                            <?php }
                            elseif($typepay == 'Direct Deposit') {?>
                            <!--Bank form -->
                            <div id="bank-form" class="col-lg-12" >
                                <form id="bankvalidation" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/edit/'.$editpayment['paymentMethodID'] ); ?>">
                                    <?php $totalampount = $user_info['inAmount']; ?>
                                    <input type="hidden" name="login_id" value="<?php echo $user_info['inAmount']; ?>">
                                    <input type="hidden" name="selectPaymentType" value="Direct Deposit">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Bank Name<span class="error">*</span></label>
                                            <input name="bankName" type="text" value="<?php echo $editpayment['bankName']; ?>" id="bankName" placeholder="Bank Name"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><span class="error">*</span></label>
                                            <label>Account Number <span class="error">*</span></label><span id='expirationDate' class='error' for='expirationDate'></span>
                                            <input name="accountNumber" value="<?php echo $editpayment['accountNumber']; ?>"  id="accountNumber" type="text" class="form-control" placeholder="AccountNumber">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><span class="error">*</span></label>
                                            <label>Routhing Number <span class="error">*</span></label><span id='expirationDate' class='error' for='expirationDate'></span>
                                            <input name="routhingNumber" value="<?php echo $editpayment['routhingNumber']; ?>" id="routhingNumber" type="text" class="form-control" placeholder="Routhing Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="isPrimary" type="checkbox"  <?php if($editpayment['isPrimary'] == 1){echo "checked";} else { }?> name="isPrimary" value="1">
                                            <label>Is Primary Payment Method ?</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <input type="submit" name="submit" class="btn btn-info margin-r-5" value="Save Now">
                                        <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                    </div>
                                </form>
                            </div>
                            <!--Bank form -->
                            <?php } ?>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">

    // Show Hide Payment medhots Form
    var paymentMethods = ["paypal-form", "craditcard-form", "debitcard-form","bank-form","check-form"];

    function showHidePaymentMethodPanel(methodName){

        paymentMethods.forEach(function(entry) {
            $("#"+entry).hide();
            //console.log(entry);
        });

        $("#"+methodName).show();
    }
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
            expireDate:{
                required:true,
                number: true
            },
            expireMonth:{
                required:true,
                number: true
            },
            expireYear:{
                required:true,
                number: true
            },
            cvvCode:{
                required:true
            },
            useFor: {
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
            useFor: {
                required: " Required",
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
            },

            useFor: {
                required:true

            }
        },
        messages:{
            methodName: {
                required: "Email Required",
            },

            useFor: {
                required: " Required",
            }
        }
    });


</script>



<script type="application/javascript">
    $('#debitCardvalidation').validate({
        rules: {
            debitCardNumber: {
                required:true,
                number: true
            },
            useFor: {
                required:true

            }
        },
        messages:{
            debitCardNumber: {
                required: "Debit Card Number is Required",
            },
            useFor: {
                required: " Required",
            }
        }
    });


</script>

<script type="application/javascript">
    $('#bankvalidation').validate({
        rules: {
            bankName : {
                required:true
            },
            accountNumber: {
                required:true,
                number: true

            },
            routhingNumber:{
                required:true,
                number: true

            },
            useFor: {
                required:true

            }
        },
        messages:{
            bankName: {
                required: "Bank Name is Required",
            },

            accountNumber: {
                required: "Bank Account Number is Required",
            },
            routhingNumber: {
                required: "Routhing Number is Required",
            },
            useFor: {
                required: " Required",
            }

        }
    });


</script>

<script type="application/javascript">
    $('#checkvalidation').validate({
        rules: {

            useFor: {
                required:true

            }
        },
        messages:{

            useFor: {
                required: " Required",
            }
        }
    });


</script>

