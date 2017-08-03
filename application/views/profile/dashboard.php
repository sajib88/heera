

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-dashboard"></i>  Dashboard
        <small>Panel</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
    
        <!-- Page Content -->
        <?php if($user_info['profession'] == 1){?>
    <div class="row">        
        <div id="page-content">
            
           <div class="col-md-4 dash-widget">
               <div class="info-box info-box-dash">
                   <span class="widget-user-image pull-left"> <img src="<?php echo base_url();?>backend/img/dash/im1.gif" /></span>

                   <div class="info-box-content">
                       <h2 class="count">$<?php echo $fundtotal;?></h2>
                       <p>OUTSTANDING LOAN</p>
                       <a href="#">View all <i class="icon-long-arrow-right"></i></a><i class="fa fa-arrow-circle-right"></i>
                   </div>
                   <!-- /.info-box-content -->
               </div>
            </div>
            <?php //print_r($projectfunded); ?>

            <div class="col-md-4 dash-widget">
                <div class="info-box info-box-dash">
                    <span class="widget-user-image pull-left">
                        <img src="<?php echo base_url();?>backend/img/dash/im2.gif" /></span>

                    <div class="info-box-content">
                        <h2 class="count">$<?= $user_info['inAmount']; ?></h2>
                        <p>Outstanding AMOUNT</p>
                        <a href="#">View all <i class="icon-long-arrow-right"></i></a><i class="fa fa-arrow-circle-right"></i>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>


            <div class="col-md-4 dash-widget">
                <div class="info-box info-box-dash">
                    <span class="widget-user-image pull-left">
                       <img src="<?php echo base_url();?>backend/img/dash/im3.gif" /></span>

                    <div class="info-box-content">
                        <h2 class="count">$<?= $user_info['inAmount']; ?></h2>
                        <p>AVAILABLE CREDIT</p>
                        <a href="#">View all <i class="icon-long-arrow-right"></i></a><i class="fa fa-arrow-circle-right"></i>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>









        </div>
    </div>
        <?php }?>

    </section>

    <section class="content">


                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recent Application</h3>


                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Item</th>
                                    <th>Status</th>
                                    <th>Popularity</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                    <td>Call of Duty IV</td>
                                    <td><span class="label label-success">Shipped</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">OR1848</a></td>
                                    <td>Samsung Smart TV</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->


                </div>




    </section>


</div>

