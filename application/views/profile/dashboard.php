

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
                       <h2 class="count"><?php echo (!empty( $lenderFundingDeatails['outStandingLoan']))? $lenderFundingDeatails['outStandingLoan']:'0'?></h2>
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
                        <h2 class="count">$<?php echo (!empty( $lenderFundingDeatails['outStandingAmount']))? $lenderFundingDeatails['outStandingAmount']:'0.00'?></h2>
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


    </section>


    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chart with Funded Projects</h3>
                    </div>
                    <div class="box-body no-padding">
                        <?php if(empty($getanderproject)){?>
                            <div class="alert alert-danger text-center text-bold"><i class="icon fa fa-info"></i></div>
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



                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($getanderproject)) {
                                        $i = 1;
                                                foreach ($getanderproject as $row) {

                                                    $data = get_data('project', array('projectID' => $row->projectID));

                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td data-title="<?php echo 'Project Name'; ?>"
                                                    class="numeric"><?php echo $data['name']; ?></td>
                                                <td data-title="<?php echo 'Borrower Name'; ?>"
                                                    class="numeric"><?php echo "Borrower Name"; ?></td>

                                                <td data-title="<?php echo "neededAmount"; ?>"
                                                    class="numeric"><?php echo $data['neededAmount']; ?></td>
                                                <td data-title="<?php echo 'Amount Collected'; ?>"
                                                    class="numeric"><?php echo $row->fundedAmount; ?></td>
                                                <td data-title="<?php echo 'Amount Funded By'; ?>"
                                                    class="numeric"><?php echo $user_info['first_name']; ?></td>
                                                <td data-title="<?php echo 'Status'; ?>"
                                                    class="numeric"><?php echo 'Active'; ?></td>




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

    <?php }?>


</div>

