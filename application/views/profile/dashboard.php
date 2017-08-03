

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-dashboard"></i>  Dashboard

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

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List All My <?php if(!empty($page_title)){echo $page_title;}else{    echo '';}?> </h3>
                    </div>
                    <div class="box-body no-padding">
                        <?php if(empty($getanderproject)){?>
                            <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i><?php echo $no_data;?></div>
                        <?php }else{?>
                            <div id="no-more-tables">

                                <table class="table table-hover" id="js_personal_table">
                                    <thead>
                                    <tr>

                                        <th class="numeric">#</th>

                                        <th class="numeric"><?php echo 'Project Name';?></th>

                                        <th class="numeric"><?php echo 'Borrower Name';?></th>

                                        <th class="numeric"><?php echo 'Amount Needed';?></th>

                                        <th class="numeric"><?php echo 'Amount Collected';?></th>

                                        <th class="numeric"><?php echo 'Amount Funded By';?></th>
                                        <th class="numeric"><?php echo 'Status';?></th>
                                        <th class="sorting1"><?php echo 'Action';?></th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($getanderproject)) {
                                        $i = 1;
                                                foreach ($getanderproject as $row) {

                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td data-title="<?php echo 'Project Name'; ?>"
                                                    class="numeric"><?php echo $row->projectID; ?></td>
                                                <td data-title="<?php echo 'Borrower Name'; ?>"
                                                    class="numeric"><span class="label label-success"><?php echo "Borrower Name"; ?></span></td>
                                                <td data-title="<?php echo 'Amount Needed'; ?>"
                                                    class="numeric"><span class="label label-info"><?php echo $row->fundedAmount; ?></span></td>
                                                <td data-title="<?php echo 'Amount Collected'; ?>"
                                                    class="numeric"><span class="label label-warning"><?php echo "0.00"; ?></span></td>
                                                <td data-title="<?php echo 'Amount Funded By'; ?>"
                                                    class="numeric"><span class="label bg-purple"><?php echo "Name of founder"; ?></span></td>
                                                <td data-title="<?php echo 'Status'; ?>"
                                                    class="numeric"><span class="label bg-purple"><?php echo ""  ?></span></td>




                                            </tr>
                                            <?php $i++;
                                        }
                                    }else{
                                        echo 'No data Found';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php }?>
                    </div>

                </div>

            </div>
        </div>

    </section>


</div>

