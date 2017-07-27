


<!-- Content -->
<div id="content">

    <!-- Section -->
    <section class="bg-black fullheight dark">


        
        <?php if (!empty($error)) {
            showErrorMessage($error);
        } else {
            if ($this->session->flashdata('success')) {
                showSuccessMessage();
            }
        }
        ?>
        <div class="container v-center text-center">
            <div class="col-md-12">
                <div class="col-lg-4 col-lg-push-4">
                    <div class="bordered-box rounded animated" data-animation="fadeInDown">
                        <h2>Recover</h2>
                        <?php echo $this->session->flashdata('msg');?>


                        <form  class="text-center mb-30" method="post" action="<?php echo base_url('home/update_password'); ?>" role="form">

                            <?php if($this->session->userdata('recovery')!='yes'){?>
                                <div class="form-group mb-10">
                                    <label for="login">current password:</label>
                                    <input type="password"  name="current_password" placeholder="current password" class="form-control input-2">
                                </div>
                            <?php }else{?>
                                <div class="alert alert-warning"><?php echo 'Please Set your New Password';?></div>
                            <?php }?>


                            <div class="form-group mb-10">
                                <label for="login">New password:</label>
                                <input type="password"  name="new_password" placeholder="new password" class="form-control input-2">
                            </div>


                            <div class="form-group mb-10">
                                <label for="login">Retype password:</label>
                                <input type="password"  name="re_password" placeholder="Retype Password" class="form-control input-2">
                            </div>

                            <input type="submit" class="btn btn-filled btn-primary btn-block" name="submit" value="save" >
                            <br>
<
                        </form>


                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<!-- Content / End -->


<!--container start-->







