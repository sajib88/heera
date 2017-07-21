<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <h1>Join Now </h1>
            </div>
            <div class="col-lg-8 col-sm-8">
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Home</a></li>

                    <li class="active">Register</li>
                </ol>
            </div>
        </div>
    </div>
</div>
    <!--breadcrumbs end-->
<main class="main-wrapper">


    <section class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pdl">
                    <div class="tab-wrapper row">
    <!--container start-->
    <div class="registration-bg">
        <div class="container  col-md-7 col-md-offset-3">
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
                <h2 class="form-signin-heading">Register now</h2>
                <div class="login-wrap">
                    <p>Enter your  details</p>
                    
                        <div  class="form-group">
                                                <label>Select Lender or Borrower Type </label>
                                                <select name="profession" class="form-control">
                                                    <option value="1">Lender</option>
                                                    <option value="2">Borrower</option>

                                                </select>
                                            </div></br>
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
                        <input required="" type="text" name="user_name" class="form-control" placeholder="User Name" autofocus="">
                    </div>
                    <div class="form-group mb-10">
                        <input  required="" type="password" name="password" class="form-control" placeholder="Password" autofocus="">
                    </div>
                    <div class="form-group mb-10">
                        <input   required type="password" name="conf" class="form-control" placeholder="Confirm Password" autofocus="">
                    </div>
                    <div class="form-group mb-10">
                    <label class="checkbox">
                        <input required="" type="checkbox" value="agree this condition"> I agree to the Terms of condition and Privacy Policy
                    </label>
                    </div>
                    <div class="form-group mb-10">
                    <input type="submit" name="submit" class="btn btn-big btn-yellow btn-block" value="Submit">
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
