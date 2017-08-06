
    <!--breadcrumbs end-->
<main class="main-wrapper">


    <section class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-title">
                    <h3 class="title">New Application</h3>
                    <div class="ptop-20"></div>
                </div>
                
                <div class="col-md-12 pdl bordered">
                    <div class="tab-wrapper row">                        
                        <form class="form-signin wow fadeInUp" action="<?php echo base_url()?>home/borrow" method="post" enctype="multipart/form-data"> 
                        <div col-md-6>                                   
                            <div class="container col-md-6">
                                <div class="login-wrap">
                                <div class="">Personal Deatails</div>
                                    <div class="ptop-20"></div>

                                        <div class="form-group mb-10">
                                            <label>Full Name</label>
                                            <input required=""  type="text" name="first_name" class="form-control" placeholder="Full Name" autofocus="">
                                         </div>
                                        <div class="form-group mb-10">
                                            <label>Date of Birth</label>
                                            <input required="" name="dateofbirth" type="text" class="form-control" placeholder="Date of Birth" id="datepicker" autofocus="">

                                        </div>
                                        <div class="form-group mb-10">
                                            <label>Email Address</label>
                                            <input required   type="email" name="email" class="form-control" placeholder="Your E-mail Address" autofocus="">
                                        </div>

                                        <div class="form-group mb-10">
                                            <label>Phone Number</label>
                                            <input  required="" type="number" name="phone" class="form-control" placeholder="Phone Number" autofocus="">
                                        </div>

                                        <div class="form-group mb-10">
                                            <label>Country</label>
                                           <select required="" name="country" class="form-control">
                                               <option value="">Select Country</option>
                                                <?php
                                                if (is_array($countries)) {
                                                    foreach ($countries as $country) {
                                                        ?>
                                                        <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                </div>                                   
                            </div>                           
                        <!--container end-->
                        </div>
                        <div col-md-6>
                            <div class="container col-md-6">
                                <div class="login-wrap topSpace">
                                <div class="">Project Deatails</div>
                                <div class="ptop-20"></div>
                                <div class="form-group mb-10">
                                    <label>Purpose of Funding</label>
                                    <select required="" name="purposeID" class="form-control">
                                       <option value="">Select Purpose</option>
                                        <?php
                                        if (is_array($category)) {
                                            foreach ($category as $category) {
                                                ?>
                                                <option value="<?php echo $category->purposeID; ?>"><?php echo $category->purposeTitle; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group mb-10">
                                    <label>Project Name</label>
                                    <input  required="" type="text" name="name" class="form-control" placeholder="Project Name" autofocus="">
                                </div> 
                                <div class="form-group mb-10">
                                    <label>Amount Needed</label>
                                    <input  required="" type="number" name="neededAmount" class="form-control" placeholder="Amount Needed" autofocus="">
                                </div> 
                            </div>
                            </div>
                        </div>
                        <div class="col-md-12 ptop-20">
                            <div class="form-group mb-10 pull-left">
                                <input type="reset" name="submit" class="btn btn-mid btn-danger btn-block" value="Cancel">
                            </div>
                            <div class="form-group mb-10 pull-right">
                                <input type="submit" name="submit" class="btn btn-mid btn-yellow btn-block" value="Submit">
                            </div>
                        </div>
                        </form>
                        
                    </div>                   
                </div>
            </div>
        </div>
            <!--container-->
    </section>

</main>


 
