


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
            <div class="row">
                <div class="col-lg-4 col-lg-push-4">
                    <div class="bordered-box rounded animated" data-animation="fadeInDown">
                        <h2>Recover</h2>
                        <?php echo $this->session->flashdata('msg');?>

                        <form id="login-form" class=" text-center mb-30" method="post" action="<?php echo base_url('home/recoverpassword'); ?>" role="form">

                            <div class="form-group mb-10">
                                <label for="login">Email:</label>
                                <input id="login" name="user_email"  placeholder="Email ID / User Name" type="text" class="form-control input-2">
                            </div>                            

                            <input type="submit" class="btn btn-filled btn-primary btn-block" name="submit" value="Recover" >

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<!-- Content / End -->


<!--container start-->



     
  


