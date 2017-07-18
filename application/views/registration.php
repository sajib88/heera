
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="registration-bg">
        <div class="container">
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
                    <p>Enter personal details</p>
                    
                        <div  class="form-group">
                                                <label>Selects Your Type </label>
                                                <select name="profession" class="form-control">
                                                    <option value="4">Lender</option>
                                                    <option value="8">Borrower</option>

                                                </select>
                                            </div></br>
                   <input required=""  type="text" name="first_name" class="form-control" placeholder="First Name" autofocus="">
                  <input  required="" type="text" name="last_name" class="form-control" placeholder="Last Name" autofocus="">
                   

                  
                   <input required  type="email" name="email" class="form-control" placeholder="Your E-mail" autofocus=""></br>
                   <input required="" type="text" name="user_name" class="form-control" placeholder="User Name" autofocus="">
                   <input  required="" type="password" name="password" class="form-control" placeholder="Password" autofocus="">
                   <input   required type="password" name="conf" class="form-control" placeholder="Confirm Password" autofocus="">
                   
                  <p> Upload your Professional Documents</p>
                     <input name="image" type="file">
                    <label class="checkbox">
                        <input required="" type="checkbox" value="agree this condition"> I agree to the Terms of condition and Privacy Policy
                    </label>
                    
              <input type="submit" name="submit" class="btn btn-lg btn-login btn-block" value="Submit">

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
    
