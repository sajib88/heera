<div class="content-wrapper">
     <section class="content-header">
      <h1>
       Private Website 
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-shield"></i> Private website</a></li>
        <li><a href="#">Preview</a></li>
       
      </ol>
</section>

    
    <section>
    <div class="row">
       
    </div>
    <div class="col-lg-6">
        <div class="panel panel-info">
            <div class="panel-body">
                <h3> <?php echo $website_info['title']; ?></h3> 
                <b>  Posted By </b>  : <?php echo $user_info['first_name'] . ' ' . $user_info['last_name']; ?><br/>
                <b>  First Name </b>  : <?php echo $user_info['first_name']; ?><br/>
                <b>  Last Name </b>  : <?php echo $user_info['last_name']; ?><br/>
                <b>  Country </b>  : <?php
                $data = get_data('countries', array('id' => $website_info['country']));
                echo $data['name'];
                ?><br/>
                <b>  City </b>  : <?php echo $website_info['state']; ?><br/>
                <b>  Business Name </b>  : <?php echo $website_info['business_name']; ?><br/>
                <b>  Business Email </b>  : <?php echo $website_info['business_email']; ?><br/>
                <br/>
                <a href="<?php echo base_url('private_web/privateweb/view'); ?>"><button class="btn btn-primary">Details</button></a> &nbsp;&nbsp;<a href="<?php echo base_url('private_web/Privateweb/edit'); ?>"><button class="btn btn-success">Edit</button></a>&nbsp;&nbsp;<a href="<?php echo base_url('private_web/Privateweb/delete'); ?>"><button class="btn btn-danger">Delete</button></a>
            </div>
        </div>

    </div>

    <div class="col-lg-6">
        <div class="panel panel-info">
            <div class="panel-body">
                <h2>Your Profile Information</h2>

                <b>  Posted By </b>  : <?php echo $user_info['first_name'] . ' ' . $user_info['last_name']; ?><br/>
                <b>  First Name </b>  : <?php echo $user_info['first_name']; ?><br/>
                <b>  Last Name </b>  : <?php echo $user_info['last_name']; ?><br/>
                <b>  Country </b>  : <?php
                $data = get_data('countries', array('id' => $user_info['country']));
                echo $data['name'];
                ?><br/>
                <b>  City </b>  : <?php echo $user_info['state']; ?><br/><br/>
                <a href="<?php echo base_url('profile/profile/index'); ?>"><button class="btn btn-success">My Profile Info Edit</button></a>
                <br/>

            </div>
        </div>

    </div>

</div>
<!-- /.row -->
<!-- /.container-fluid -->
</div>