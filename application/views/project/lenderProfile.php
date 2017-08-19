

<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">


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
                            <div class="col-md-6">

                                    <a class="btn btn-block btn-info"> Add Fund</a></td>
                            </div>
                            <div class="col-md-6">

                                    <a class="btn btn-block btn-warning"> Refund </a></td>
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
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['first_name']))? $lendarDetails['first_name']:''; ?></a>
                            </li>

                            <li class="list-group-item">
                                <b> Email </b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['email']))? $lendarDetails['email']:''; ?></a>
                            </li>

                            <li class="list-group-item">
                                <b>Phone</b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['phone']))? $lendarDetails['phone']:''; ?></a>
                            </li>

                            <li class="list-group-item">
                                <b>Gender</b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['gender']))? $lendarDetails['gender']:''; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Date of Birth</b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['dateofbirth']))? $lendarDetails['dateofbirth']:''; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Country</b>
                                <a class="pull-right "><?php
                                    $data = get_data('countries', array('id' => $lendarDetails['country']));
                                    echo $data['name'];
                                    ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>State</b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['state']))? $lendarDetails['state']:''; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>City</b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['city']))? $lendarDetails['city']:''; ?></a>
                            </li>

                            <li class="list-group-item">
                                <b>Address</b>
                                <a class="pull-right "><?php echo (!empty( $lendarDetails['address']))? $lendarDetails['address']:''; ?></a>
                            </li>



                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>

        </div>


