<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Withdraw Fund
            <small>Withdraw Transfer Panel</small>
        </h1>
        <ol class="breadcrumb">
            <span class="btn btn-block bg-fund btn-flat"> <i class="fa fa-money"></i>&nbsp; &nbsp; Current Balance : $<?php if($user_info['inAmount']>= 0){echo $user_info['inAmount'];}else{echo '0.00';}?> </span></a>
        </ol>
    </section>
    
    
    
    <section class="content">
        <div class="row">           
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Withdraw Fund </h3>
                    </div>
                    ADD FUND
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
                number: true
                
            }
        },
        messages:{
            outAmount: {
                required: "Amount is Required",
            }
        }
    });


</script>
