<?php //print_r($lendarDetails);?>
<section class="content">
<div class="row">
    <div class="col-md-6">
        <div class="col-xs-12 col-sm-6 col-md-12">    
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Lender Image</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div style="text-align: center">
                        <?php
                            if($lendarDetails['profilepicture'] == 0) {?>
                                <img src="<?php echo base_url() . '/assets/user-demo.jpg'?>" alt="" class="img-responsive circular" />
                            <?php }
                            else {?>
                                <img src="<?php echo base_url() . '/assets/file/' .$lendarDetails['profilepicture']; ?>" alt=""  class="img-responsive circular" />  <?php 
                           }
                            ?>
                    </div>
                    <hr>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Lendar Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-crosshairs"></i>User Name </strong>
                    <p class="text-muted">
                        <h4><?php echo $lendarDetails['user_name']; ?></h4>
                        <h4> <b>  <i class="fa fa-money"></i> Total Credit </b> <?php echo '$'.$lendarDetails['inAmount']; ?></h4>
                    </p>
                <hr>
                <strong><i class="fa fa-crosshairs"></i>state country </strong>
                    <p class="text-muted">
                        <cite title="state, country">
                            <?php echo $lendarDetails['state']; ?>, <?php
                            $data = get_data('countries', array('id' => $lendarDetails['country']));
                            echo $data['name'];
                            ?> <i class="glyphicon glyphicon-map-marker"></i>
                        </cite>
                    </p>
                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> Email</strong>            
                    <p class="text-muted">
                        <i class="glyphicon glyphicon-envelope"></i><?php echo $lendarDetails['email']; ?>
                    </p>
                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> First Name</strong>
                    <p class="text-muted">
                        <?php echo $lendarDetails['first_name']; ?>
                    </p>
                <hr>        
                <strong><i class="fa fa-book margin-r-5"></i> Middle Name</strong>
                    <p class="text-muted">
                        <?php echo $lendarDetails['middle_name']; ?>
                    </p>
                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> Middle Name</strong>
                    <p class="text-muted">
                        <?php echo $lendarDetails['middle_name']; ?>
                    </p>
                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> Last Name</strong>
                    <p class="text-muted">
                        <?php echo $lendarDetails['last_name']; ?>
                    </p>
                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> Gender</strong>
                    <p class="text-muted">
                       <?php echo $lendarDetails['gender']; ?>
                    </p>
                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> Date of Birth</strong>
                    <p class="text-muted">
                       <?php echo $lendarDetails['dateofbirth']; ?>
                    </p>
                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> Address</strong>
                    <p class="text-muted">
                      <?php echo $lendarDetails['address']; ?>
                    </p>
                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> Country</strong>
                    <p class="text-muted">
                      <?php
                        $data = get_data('countries', array('id' => $lendarDetails['country']));
                        echo $data['name'];
                        ?>
                    </p>
                <hr>                
                <strong><i class="fa fa-book margin-r-5"></i> State</strong>
                    <p class="text-muted">
                      <?php echo $lendarDetails['state']; ?>
                    </p>
                <hr>
                <strong><i class="fa fa-book margin-r-5"></i> City</strong>
                    <p class="text-muted">
                      <?php echo $lendarDetails['city']; ?>
                    </p>
                <hr>
            </div>
            <!-- /.box-body -->
        </div>
    </div>




<?php //print_r($allfundedproject);?>
<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Tab 1</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Tab 2</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Tab 3</a></li>
        
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
          The European languages are members of the same family. Their separate existence is a myth.
          For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
          in their grammar, their pronunciation and their most common words. Everyone realizes why a
          new common language would be desirable: one could refuse to pay expensive translators. To
          achieve this, it would be necessary to have uniform grammar, pronunciation and more common
          words. If several languages coalesce, the grammar of the resulting language is more simple
          and regular than that of the individual languages.
        </div>        
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>
</section>