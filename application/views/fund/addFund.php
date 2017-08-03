<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-credit-card"></i> Add Fund

        </h1>

    </section>


    
    <section class="content">
        <div class="row">           
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Add Fund </h3>
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

                            <div id="paypal-form" class="col-lg-12" hidden="true">
                                <form id="paypalform" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/Fund/addfund'); ?>">
                                    
                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                    <input type="hidden" name="currentAmount" value="<?php echo $user_info['inAmount']; ?>">
                                    
                                <div class="col-lg-12">
                                    <div class="form-group">                                  
                                            
                                            <label>Amount<span class="error">*</span></label>
                                            <input name="inAmount" type="number" id="inAmount" placeholder="Amount"  class="form-control">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <input type="submit" name="submit" class="btn btn-info margin-r-5" value="AddAmount">
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
            inAmount: {
                required:true,
                number: true
                
            }
        },
        messages:{
            inAmount: {
                required: "Amount is Required",
            }
        }
    });


</script>
