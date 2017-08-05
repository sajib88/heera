<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-credit-card"></i>  Payment Method List

        </h1>

        <ol class="breadcrumb">
            <a href="<?php echo base_url('fund/addMethod'); ?>"><span class="btn btn-block bg-fund btn-flat"> <i class="fa fa-credit-card"></i> Add  New Payment Method</span></a>
        </ol>

    </section>

<?php if(count($listpaymethod)<=0){?>
    <div class="alert alert-info">No Payment Method found</div>
<?php } else{
    ?>


    <section class="content">
     <div class="box box-info">



            <div class="box-header with-border">
                <h3 class="box-title">All Payment Method</h3>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">

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

                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Use method</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
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
                                    <td><?php
                                        if($row->isPrimary == 1)
                                        {
                                            echo "Primary"; }
                                        else
                                        {
                                            echo "Secondary";
                                        } ?></td>
                                    <td><?php echo $row->status; ?></td>
                                    <td><a   class="btn  btn-primary"  href="<?php echo base_url('fund/Fund/editpayment/' . $row->paymentMethodID); ?>">Edit</a></td>
                                    <td><a class="btn  btn-danger" href="<?php echo base_url('fund/Fund/delete/' . $row->paymentMethodID); ?>">Delete</a></td>


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
    </section>
</div>



