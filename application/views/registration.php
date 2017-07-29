
    <!--breadcrumbs end-->
<main class="main-wrapper">


    <section class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pdl">
                    <div class="tab-wrapper row">
    <!--container start-->
    <div class="registration-bg">
        <div class="container col-md-4 col-md-offset-4">
                <?php
                    if (!empty($error)) {
                        showErrorMessage($error);
                    } else {
                        if ($this->session->flashdata('success')) {
                            showSuccessMessage();
                        }
                    }
                    ?>
           
                 <form class="form-signin wow fadeInUp" action="<?php echo base_url('home/registration'); ?>" method="post" enctype="multipart/form-data">


                     <div class="form-group mb-10">
                         <a href="#" class="btn btn-small btn-block btn-fb"><i class="pull-cnter fa fa-facebook"></i>&nbsp &nbsp Facebook Login</a>
                         </br> </br>
                         <div class="hr-text">
                             <hr>
                             <span>or</span>
                         </div>
                     </div>


                <div class="login-wrap">

                    
                        <div  class="form-group">
                                                <p>Select  Type </p>
                                                <select name="profession" class="form-control">
                                                    <option value="1">Lender</option>
                                                    <option value="2">Borrower</option>

                                                </select>
                                            </div>
                    <div class="form-group mb-10">
                        <input required=""  type="text" name="first_name" class="form-control" placeholder="First Name" autofocus="">
                     </div>
                    <div class="form-group mb-10">
                        <input  required="" type="text" name="last_name" class="form-control" placeholder="Last Name" autofocus="">
                    </div>
                    <div class="form-group mb-10">
                    <input required  type="email" name="email" class="form-control" placeholder="Your E-mail" autofocus="">
                    </div>

                    <div class="form-group mb-10">
                        <input  required="" type="password" name="password" class="form-control" placeholder="Password" autofocus="">
                    </div>

                    <div class="form-group mb-10">

                        <input required="" type="checkbox" value="agree this condition"> I agree to the Terms of condition and Privacy Policy

                    </div>
                    <div class="form-group mb-10">
                    <input type="submit" name="submit" class="btn btn-mid btn-yellow btn-block" value="Sign Up">
                    </div>
                    <div class="registration">
                        Already Registered ?
                        <a class="" href="<?php echo base_url(); ?>home/login">
                            Login
                        </a>
                    </div>
                </div>
            </form>

        </div>
     </div>
    <!--container end-->



                    </div>
                </div>

            </div>
        </div><!--container-->
    </section>

</main>
