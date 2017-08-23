<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-credit-card"></i>  Payment Methods

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


            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Add New Payment Methods </h3>
                    </div>



                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group input-group">
                                   <span class="input-group-addon"> <input id="paypal"  type="radio" name="selectPaymentType" checked value="PayPal" onclick="javascript:showHidePaymentMethodPanel('paypal-form')"> PayPal </span>
                                   <span class="input-group-addon"> <input id="craditcard" type="radio" name="selectPaymentType" value="Credit Card" onclick="javascript:showHidePaymentMethodPanel('craditcard-form')"> CraditCard</span>
                                   <span class="input-group-addon"> <input id="carddebit" type="radio" name="selectPaymentType" value="Debit Card" onclick="javascript:showHidePaymentMethodPanel('debitcard-form')"> Debit Card</span>
                                   <span class="input-group-addon"> <input id="bank" type="radio" name="selectPaymentType" value="Direct Deposit" onclick="javascript:showHidePaymentMethodPanel('bank-form')"> Direct Deposit</span>
                                   <span class="input-group-addon"> <input id="check" type="radio" name="selectPaymentType" value="Check" onclick="javascript:showHidePaymentMethodPanel('check-form')"> Check</span>
                                </div>
                            </div>
                                <!--Paypal form -->
                            <div id="paypal-form" class="col-lg-12">
                                <form id="paypalform" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/Fund/addMethod'); ?>">
                                    <?php $totalampount = $user_info['inAmount']; ?>
                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                    <input id="paypal" type="hidden" name="selectPaymentType" value="PayPal">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                                <label>Your Paypal Email Address <span class="error">*</span></label>
                                                <input name="paypalemail" type="email" id="paypalemail" placeholder="paypal email address"  class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="isPrimary" type="checkbox" name="isPrimary" value="1">
                                            <label>Is Primary Payment Method ?</label>

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="useFor" type="radio" name="useFor" value="Add Fund">
                                            <label>Add Fund</label>
                                            </br>
                                            <input id="useFor" type="radio" name="useFor" value="Withdrowal">
                                            <label>Withdrowal Fund</label>

                                        </div>
                                    </div>


                                <div class="col-lg-12 text-center">
                                    <input type="submit" name="submit" class="btn btn-success margin-r-5" value="Save Now">
                                    <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                </div>



                                </form>    
                            </div>
                            <!--Paypal form -->

                            <!--creditcard form -->
                            <div id="craditcard-form" class="col-lg-12" hidden="true">
                                <form id="creditCard"  role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/Fund/addMethod'); ?>">
                                    <input type="hidden" name="selectPaymentType" value="Credit Card">
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
                                            <label>Credit Type</label>
                                            <input name="cardType" type="text" id="cardType" placeholder="Master/visa/Amex"  class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group"> 
                                                <label>Credit Card Number<span class="error">*</span></label>
                                                <input name="cardNumber" type="text" id="cardNumber" placeholder="Credit Card Number"  class="form-control">

                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group"> 
                                                <label><span class="error">*</span></label>
                                                <label>Expiration Date<span class="error">*</span></label><span id='expirationDate' class='error' for='expirationDate'></span>

                                                <input name="expireDate" type="text" id="expireDate" class="form-control" placeholder="03">

                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label><span class="error">*</span></label>
                                            <label> Month<span class="error">*</span></label><span id='expirationDate' class='error' for='expirationDate'></span>

                                            <input name="expireMonth" type="text" id="expireMonth" class="form-control" placeholder="12">

                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label><span class="error">*</span></label>
                                            <label> Year<span class="error">*</span></label><span id='expirationDate' class='error' for='expirationDate'></span>

                                            <input name="expireYear" type="text" id="expireYear" class="form-control" placeholder="2019">

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group"> 
                                                <label>CVV Code<span class="error">*</span></label>
                                                <input name="cvv" type="text" id="cvv" placeholder="CVV Code" class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="isPrimary" type="checkbox" name="isPrimary" value="1">
                                            <label>Is Primary Payment Method ?</label>

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="useFor" type="radio" name="useFor" value="Add Fund">
                                            <label>Add Fund</label>
                                            </br>
                                            <input id="useFor" type="radio" name="useFor" value="Withdrowal">
                                            <label>Withdrowal Fund</label>

                                        </div>
                                    </div>


                                    <div class="col-lg-12 text-center">
                                        <input type="submit" name="submit" class="btn btn-success margin-r-5" value="Save Now">
                                        <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                    </div>
                                </form>    
                            </div>

                            <!--debitcard form -->
                            <div id="debitcard-form" class="col-lg-12" hidden="true">
                                <form id="debitCardvalidation" name="debitCardvalidation" role="form" method="post"   action="<?php echo base_url('fund/Fund/addMethod'); ?>">
                                    <?php $totalampount = $user_info['inAmount']; ?>
                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                    <input id="Debit" type="hidden" name="selectPaymentType" value="Debit Card">


                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Debit Card Number <span class="error">*</span></label>
                                            <input name="debitCardNumber" type="number" id="debitCardNumber" placeholder="Debit Card Number"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="isPrimary" type="checkbox" name="isPrimary" value="1">
                                            <label>Is Primary Payment Method ?</label>

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="useFor" type="radio" name="useFor" value="Add Fund">
                                            <label>Add Fund</label>
                                            </br>
                                            <input id="useFor" type="radio" name="useFor" value="Withdrowal">
                                            <label>Withdrowal Fund</label>

                                        </div>
                                    </div>


                                    <div class="col-lg-12 text-center">
                                        <input type="submit" name="submit" class="btn btn-success margin-r-5" value="Save Now">
                                        <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                    </div>



                                </form>
                            </div>
                            <!--debitcard form -->

                            <!--Bank form -->

                            <div id="bank-form" class="col-lg-12" hidden="true">
                                <form id="bankvalidation" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/Fund/addMethod'); ?>">
                                    <?php $totalampount = $user_info['inAmount']; ?>
                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                    <input type="hidden" name="selectPaymentType" value="Direct Deposit">





                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Bank Name<span class="error">*</span></label>
                                            <input name="bankName" type="text" id="bankName" placeholder="Bank Name"  class="form-control">

                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><span class="error">*</span></label>
                                            <label>Account Number <span class="error">*</span></label><span id='expirationDate' class='error' for='expirationDate'></span>

                                            <input name="accountNumber" id="accountNumber" type="text" class="form-control" placeholder="AccountNumber">

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><span class="error">*</span></label>
                                            <label>Routhing Number <span class="error">*</span></label><span id='expirationDate' class='error' for='expirationDate'></span>

                                            <input name="routhingNumber" id="routhingNumber" type="text" class="form-control" placeholder="Routhing Number">

                                        </div>
                                    </div>



                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="isPrimary" type="checkbox" name="isPrimary" value="1">
                                            <label>Is Primary Payment Method ?</label>

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="useFor" type="radio" name="useFor" value="Add Fund">
                                            <label>Add Fund</label>
                                            </br>
                                            <input id="useFor" type="radio" name="useFor" value="Withdrowal">
                                            <label>Withdrowal Fund</label>

                                        </div>
                                    </div>


                                    <div class="col-lg-12 text-center">
                                        <input type="submit" name="submit" class="btn btn-success margin-r-5" value="Save Now">
                                        <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                    </div>



                                </form>
                            </div>
                            <!--Bank form -->
                            <!--check form -->

                            <div id="check-form" class="col-lg-12" hidden="true">
                                <form id="checkvalidation" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/Fund/addMethod'); ?>">

                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                    <input type="hidden" name="selectPaymentType" value="Check">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Select  Check Payment Method</label>
                                            <input  name="selectPaymentType" type="hidden" value="Check" id="methodName" placeholder="Debit Card Number"  class="form-control">
                                        </div>
                                    </div>



                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="isPrimary" type="checkbox" name="isPrimary" value="1">
                                            <label>Is Primary Payment Method ?</label>

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="useFor" type="radio" name="useFor" value="Add Fund">
                                            <label>Add Fund</label>
                                            </br>
                                            <input id="useFor" type="radio" name="useFor" value="Withdrowal">
                                            <label>Withdrowal Fund</label>

                                        </div>
                                    </div>


                                    <div class="col-lg-12 text-center">
                                        <input type="submit" name="submit" class="btn btn-success margin-r-5" value="Save Now">
                                        <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                    </div>



                                </form>
                            </div>
                            <!--check form -->



                            
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
            cvv:{
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
            cvv: {
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
            paypalemail: {
                required:true,
                email: true
            },

            useFor: {
                required:true

            }
        },
        messages:{
            paypalemail: {
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

