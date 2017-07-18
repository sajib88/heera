<?php
/*print '<pre>';
print_r($website_info);die;*/?>

<div class="content-wrapper">
    
    
    <section class="content-header">
      <h1>
        Profile Edit
        <small>Modify Your Profile Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
    
    
    
    
     <section class="content">  
    
    <div class="row">
    <div class="col-lg-6">
        <!--<div class="panel panel-info">
            <div class="panel-body">
                <h3> <?php /*echo $website_info['title']; */?></h3>
                <b>  Posted By </b>  : <?php /*echo $user_info['first_name'] . ' ' . $user_info['last_name']; */?><br/>
                <b>  First Name </b>  : <?php /*echo $user_info['first_name']; */?><br/>
                <b>  Last Name </b>  : <?php /*echo $user_info['last_name']; */?><br/>
                <b>  Country </b>  : <?php
/*                $data = get_data('countries', array('id' => $website_info['country']));
                echo $data['name'];
                */?><br/>
                <b>  City </b>  : <?php /*echo $website_info['state']; */?><br/>
                <b>  Business Name </b>  : <?php /*echo $website_info['business_name']; */?><br/>
                <b>  Business Email </b>  : <?php /*echo $website_info['business_email']; */?><br/>
                <br/>
                <a href="<?php /*echo base_url('public_web/publicweb/view'); */?>"><button class="btn btn-success">Details</button></a> &nbsp;&nbsp;<a href="<?php /*echo base_url('public_web/publicweb/edit'); */?>"><button class="btn btn-success">Edit</button></a>&nbsp;&nbsp;<a href="<?php /*echo base_url('public_web/publicweb/delete'); */?>"><button class="btn btn-danger">Delete</button></a>
            </div>
        </div>-->

        <?php if(!empty($website_info) > 0){?>

        <div class="small-box bg-aqua">
            <div class="inner">
                <h3> <?php echo $website_info['title']; ?></h3>
                <b>  Posted By </b>  : <?php echo $user_info['first_name'] . ' ' . $user_info['last_name']; ?><br/>
                <?php if($website_info['appointment'] == 1){?>
                    <b>  Appointment </b>  : <?php echo 'Yes'; ?><br/>
                    <b>  Start Appointment Date </b>  : <?php echo $website_info['start_date']; ?><br/>
                    <b>  End Appointment Date </b>  : <?php echo $website_info['end_date']; ?><br/>
                    <b>  Start Appointment Time </b>  : <?php echo $website_info['start_time']; ?><br/>
                    <b>  End Appointment Time </b>  : <?php echo $website_info['end_time']; ?><br/>
                <?php }else{?>
                    <b>  Appointment </b>  : <?php echo 'No'; ?><br/>
                <?php }?>
                <b>  Country </b>  : <?php
                $data = get_data('countries', array('id' => $user_info['country']));
                echo $data['name'];
                ?>
                <br/>
                <b>  City </b>  : <?php echo $user_info['state']; ?><br/>
                <b>  Business Name </b>  : <?php echo $website_info['business_name']; ?><br/>
                <b>  Business Email </b>  : <?php echo $website_info['business_email']; ?><br/>
                <br/>
                <a href="<?php echo base_url('public_web/publicweb/view'); ?>"><button class="btn btn-warning">Details</button></a> &nbsp;&nbsp;<a href="<?php echo base_url('public_web/publicweb/edit'); ?>"><button class="btn btn-success">Edit</button></a>&nbsp;&nbsp;<a href="<?php echo base_url('public_web/publicweb/delete'); ?>"><button class="btn btn-danger">Delete</button></a>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>

            </div>
            <!--<a href="<?php /*echo base_url('profile/profile/index'); */?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
        </div>
        <?php }else{?>

            <div class="small-box bg-red-active">
                <div class="inner">
                    <h3>You haven't any public prifile</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>

                </div>
                <a href="<?php echo base_url('pub/add'); ?>" class="small-box-footer">Create Public Profile <i class="fa fa-hand-o-up"></i></a>
            </div>


        <?php }?>

    </div>
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
             
                
                 <h3> <?php echo $user_info['user_name']; ?></h3> 
                <b>  Full Name </b>  : <?php echo $user_info['first_name'] . ' ' . $user_info['last_name']; ?><br/>
                <b>  First Name </b>  : <?php echo $user_info['first_name']; ?><br/>
                <b>  Last Name </b>  : <?php echo $user_info['last_name']; ?><br/>
                <b>  Country </b>  : <?php
                $data = get_data('countries', array('id' => $user_info['country']));
                echo $data['name'];
                ?>
                <br/>
                <b>  City </b>  : <?php echo $user_info['state']; ?><br/>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
                
            </div>
            <a href="<?php echo base_url('profile/profile/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
</div>
         
        
         
         
    </section>          
         
    
   

</div>
<!-- /.row -->
<!-- /.container-fluid -->
</div>