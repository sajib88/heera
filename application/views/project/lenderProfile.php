

<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">

        <div class="row">
            <div class="col-md-6 dash-widget">
                <div class="info-box info-box-dash">
                    <span class="widget-user-image pull-left"> <img src="<?php echo base_url();?>backend/img/dash/im1.gif" /></span>
                    <div class="info-box-content">
                        <h2 class="count">$0.00</h2>
                        <h4>Lent Amount</h4>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>

            <div class="col-md-6 dash-widget">
                <div class="info-box info-box-dash">
                    <span class="widget-user-image pull-left"><img src="<?php echo base_url();?>backend/img/dash/im3.gif" /></span>
                    <div class="info-box-content">
                        <h2 class="count">$0.00</h2>
                        <h4>Repaid Amount</h4>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">

                        <?php
                        if($lendarDetails['profilepicture'] == 0) {?>
                            <img src="<?php echo base_url() . '/assets/user-demo.jpg'?>" alt="" class="img-responsive circular profile-user-img img-responsive img-circle img-size" />
                        <?php }
                        else {?>
                            <img src="<?php echo base_url() . '/assets/file/' .$lendarDetails['profilepicture']; ?>" alt=""  class="img-responsive circular profile-user-img img-responsive img-circle img-size" />  <?php
                        }
                        ?>
                        <h3 class="profile-username text-center">Total Credit <?php echo '$'.$lendarDetails['inAmount']; ?></h3>

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                    <a href="<?php echo base_url('fund/Fund/adminrefund'); ?>/<?php echo $lendarDetails['id']; ?>" class="btn btn-block btn-warning"> Refund </a></td>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <div class="box-body box-profile no-padding">
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="list-group list-group-unbordered">

                            <li class="list-group-item">
                                <b>Name </b>
                                <p class="pull-right "><?php echo (!empty( $lendarDetails['first_name']))? $lendarDetails['first_name']:''; ?></p>
                            </li>

                            <li class="list-group-item">
                                <b> Email </b>
                                <p class="pull-right "><?php echo (!empty( $lendarDetails['email']))? $lendarDetails['email']:''; ?></p>
                            </li>

                            <li class="list-group-item">
                                <b>Phone</b>
                                <p class="pull-right "><?php echo (!empty( $lendarDetails['phone']))? $lendarDetails['phone']:''; ?></p>
                            </li>

                            <li class="list-group-item">
                                <b>Gender</b>
                                <p class="pull-right "><?php echo (!empty( $lendarDetails['gender']))? $lendarDetails['gender']:''; ?></p>
                            </li>
                            <li class="list-group-item">
                                <b>Date of Birth</b>
                                <p class="pull-right "><?php echo (!empty( $lendarDetails['dateofbirth']))? $lendarDetails['dateofbirth']:''; ?></p>
                            </li>
                            <li class="list-group-item">
                                <b>Country</b>
                                <p class="pull-right "><?php
                                    $data = get_data('countries', array('id' => $lendarDetails['country']));
                                    echo $data['name'];
                                    ?></p>
                            </li>
                            <li class="list-group-item">
                                <b>State</b>
                                <p class="pull-right "><?php echo (!empty( $lendarDetails['state']))? $lendarDetails['state']:''; ?></p>
                            </li>
                            <li class="list-group-item">
                                <b>City</b>
                                <p class="pull-right "><?php echo (!empty( $lendarDetails['city']))? $lendarDetails['city']:''; ?></p>
                            </li>

                            <li class="list-group-item">
                                <b>Address</b>
                                <p class="pull-right "><?php echo (!empty( $lendarDetails['address']))? $lendarDetails['address']:''; ?></p>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>

        </div>


