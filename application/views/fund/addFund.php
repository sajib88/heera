<div class="content-wrapper">
    <section class="content-header">
        <h1>
           Add Fund
            <small>Add New Fund</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Fund</a></li>
            <li class="active">Add</li>
        </ol>
    </section>
    
    
    
    <section class="content">
        <div class="row">           
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Add Fund </h3>
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
                                <form id="paypalform" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/Fund/addfund'); ?>">
                                    <input type="hidden" name="projectID" value="2" />
                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                    <input type="hidden" name="currentAmount" value="<?php echo $user_info['fundedAmount']; ?>">
                                    
                                <div class="col-lg-12">
                                    <div class="form-group">                                  
                                            
                                            <label>Amount<span class="error">*</span></label>
                                            <input name="fundedAmount" type="number" id="inAmount" placeholder="Amount"  class="form-control">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <input type="submit" name="submit" class="btn btn-info margin-r-5" value="AddAmount">
                                    <?php echo anchor('profile/dashboard',"Cancel",array('class' => 'btn btn-danger'));?>
                                </div>
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
                                                <input name="inAmount" type="text" id="inAmount" placeholder="Amount"  class="form-control">

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
            fundedAmount: {
                required:true,
                number: true
                
            }
        },
        messages:{
            fundedAmount: {
                required: "Amount is Required",
            }
        }
    });


</script>
