<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-credit-card"></i> Refund Panel

        </h1>

    </section>


    
    <section class="content">
        <div class="row">           
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Refund  </h3>
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
                            <?php  $id = $this->uri->segment('4'); ?>
                            <div id="paypal-form" class="col-lg-12" >
                                <form id="paypalform" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('fund/Fund/adminfund/'.$id); ?>">

                                    <input type="hidden" name="lenderid" value="<?php echo $id; ?>">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>All Active  Project<span class="error">*</span></label><span id='purposeID-error' class='error' for='purposeID'></span>
                                    <select name="projectID" id="projectID" class="form-control">
                                        <option value="">Select Project</option>
                                        <?php
                                        if (is_array($projectlist)) {
                                            foreach ($projectlist as $pj) {
                                                $sel = ($pj->projectID == set_value('projectID'))?'selected="selected"':'';
                                                ?>
                                                <option  value="<?php echo $pj->projectID; ?>" <?php echo $sel;?> ><?php echo $pj->name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php echo form_error('purposeID');?>
                                    </select>
                                </div>
                            </div>
                                    
                                <div class="col-lg-12">
                                    <div class="form-group">                                  
                                            
                                            <label>Refund Amount<span class="error">*</span></label>
                                            <input name="amountrefund" type="number" id="amountrefund" placeholder="Amount"  class="form-control">
                                        
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
    $('#paypalform').validate({
        rules: {
            projectID: {
                required:true,
                number: true
                
            },
            expirationDate:{
                required:true
            },
            cvvCode:{
                required:true
            },

            amountrefund:{
               required:true
              }
        },
        messages:{
            projectID: {
                required: "Must be Select one Project",
            },
            expirationDate: {
                required: "Expiration Date is Required",
            },
            cvvCode: {
                required: "CVV Code is Important !",
            },
            amountrefund: {
                required: "refund Amount is Required, 0-9 Number digit only allow",
            }
        }
    });


</script>

