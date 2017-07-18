

       <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Login</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Features</a></li>
                        <li class="active">Login</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
        
         <!--container start-->
                    <?php
                        if (!empty($error)) {
                            showErrorMessage($error);
                        } else {
                            if ($this->session->flashdata('success')) {
                                showSuccessMessage();
                            }
                        }
                        ?>
    <div class="login-bg">
        <div class="container">
             
            <div class="form-wrapper">
                <form class="form-signin wow fadeInUp" method="post" action="<?php echo base_url('home/login'); ?>" role="form"> 
            <h2 class="form-signin-heading">sign in now</h2>
            <div class="login-wrap">
                 <fieldset>
                <input type="text" class="form-control" name="email" type="email" placeholder="Email ID" autofocus>
                <input type="password" class="form-control"   name="password" placeholder="Password" type="password" value="">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                    <span class="pull-right">
                        <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                    </span>
                </label>
                 <input type="submit" class="btn btn-lg btn-login btn-block" name="submit" value="Login" >
                     </fieldset>
                <p>or you can sign in via social network</p>
                <div class="login-social-link">
                    <a href="#" class="facebook">
                        <i class="fa fa-facebook"></i>
                        Facebook
                    </a>
                    <a href="#" class="twitter">
                        <i class="fa fa-twitter"></i>
                        Twitter
                    </a>
                </div>
                <div class="registration">
                    Don't have an account yet?
                    <a class="" href="<?php echo base_url('home/registration'); ?>">
                        Create an account
                    </a>
                </div>

            </div>
            </form>
              <!-- Modal -->
              <div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Forgot Password ?</h4>
                          </div>
                          <div class="modal-body">
                              <p>Enter your e-mail address below to reset your password.</p>
                              <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                              <button class="btn btn-success" type="button">Submit</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- modal -->

          </form>
          </div>
        </div>
    </div>
    <!--container end-->

        


