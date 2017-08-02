
<header class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  text-center ptop-300">


                <h1>Give a Little Change a Lot. </h1>
                <p>A loan of $1500 helps a member to buy more fertilizer to support<br> her fariming, to get a higher yield</p>
                <input type="submit" value="Lend $25" class="btn   btn-yellow">
            </div>
        </div>
    </div>
</header>

<!--BG with 4 box -->
<header class="business-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  text-center">
                <h1 class="ptop-50">How it works</h1>
                <div class="ptop-50"></div>
                <!--start box here -->
            <div class="box-design">
                <div  class="row">
                    <!-- box 1 -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-block">
                                <h3 class="card-title text-left">Choose a Borrower</h3>
                                <p class="card-text text-left">
                                    With supporting text below as</br>
                                    a natural lead-in to additional</br>
                                    content.</p>

                            </div>
                        </div>
                    </div>
                    <!-- box 1 -->
                    <!-- box 2 -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-block">
                                <h3 class="card-title text-right">Make a loan</h3>
                                <p class="card-text text-right">With supporting text below as</br>
                                    a natural lead-in to additional</br>
                                    content.</p>

                            </div>
                        </div>
                    </div>
                    <!-- box 2 -->
                </div>
                <!-- image make center -->
                <img src="<?php echo base_url(); ?>comp/img/round-box.png"  class="img-responsive center-block absulateimage" />
                <!-- image make center -->


                <div  class="row ptop-60">
                    <!-- box 3 -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-block">

                                <h3 class="card-title text-left">Repeat</h3>
                                <p class="card-text text-left">With supporting text below as</br>
                                    a natural lead-in to additional</br>
                                    content.</p>

                            </div>
                        </div>
                    </div>
                    <!-- box 3 -->
                    <!-- box 4 -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-block">
                                <h3 class="card-title text-right">Get Repaid</h3>
                                <p class="card-text text-right">With supporting text below as</br>
                                    a natural lead-in to additional</br>
                                    content.</p>

                            </div>
                        </div>
                    </div>
                    <!-- box 4 -->
                </div>

            </div>

            </div>
        </div>
    </div>
</header>

<!--Start Lending style-->
<div class="col-md-12">

    <div class="ptop-30"></div>
        <div class="newsletter-widget widget">


                <div class="entry-head text-center">
                    <h2>Start Lending</h2>
                </div>

                <div class="col-md-7 col-md-offset-3">
                    <form class="form-inline" method="post" action="<?php echo base_url('home/getPurpose');?>">
                        <input type="text" name="searchByName" class="form-control" id="exampleInputEmail2" placeholder="Search by Name">
                        <button type="submit" class="btn btn-blue">Search</button>
                    </form>
                </div>


        </div>
</div>

<!--end Lending style-->



<div class="col-md-12 text-center styletext">
    <h5>or</h5>
    <h4>Choose a Category</h4>
   </div>

<!--category with image-->
<section class="content-wrapper">
    <div class="right-bg">
    <div class="container">
        <!--category first 5 image start-->



        <div class="row">
                <div class="col-md-1"></div>


            <?php if(is_array($category)){ ?>
                <?php foreach($category as $row){
                    //print_r($row);
                    ?>
                    <div class="cat-widget col-md-2">
                        <div class="inner-item">
                           <a href="<?php echo base_url('home/getPurpose/'.$row->purposeID);?>">
                            <img  src="<?php echo base_url().'assets/file/category/'.$row->purposeImage; ?>" alt="" class="img-responsive rounded">
                            <div class="carousel-caption">
                                <h4><?php echo substr($row->purposeTitle, 0, 50); ?></h4>
                            </div>
                           </a>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>

            <div class="cat-widget col-md-2">
                <div class="inner-item">
                    <a href="<?php echo base_url('home/getPurpose/');?>">
                        <img  src="<?php echo base_url().'assets/file/category/cat-5.jpg' ?>" alt="" class="img-responsive rounded">
                        <div class="carousel-caption">
                            <h4>All Loans</h4>
                        </div>
                    </a>
                </div>
            </div>




                    <div class="col-md-1"></div>


        </div>
        <!--category first 5 image end-->

    </div>
    <!--category second 5 image end -------------------------------------------------------->


    <!--get free with image-->
    <div class="row ptop-40 ">
        <div class="col-md-6 col-md-offset-3 text-center">
            <h4>Heera.org does’t charge any fees or commission and is a
                one-to-one direct funding platform</h4>
            <img src="<?php echo base_url(); ?>comp/img/dimond.jpg"  class="img-responsive center-block dimond ptop-20" />
        </div>
    </div>
    <!--get free with image-->

    <!--helpig-->
    <div class="row ptop-20">
        <div class="text-center helpig-hand">
            <h2>Give a helpig hand. <span>See our causes</span></h2>

        </div>
    </div>
    <!--helpig-->


    <div class="ptop-40"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(is_array($projectData)){ ?>
                <?php foreach($projectData as $row){?>


                        <a href="<?php echo base_url('home/singleview/'.$row->projectID);?>">
                <div class="col-sm-6 col-md-4 products">
                    <div class="thumbnail" >
                        <img src="<?php echo base_url().'assets/file/project/'.$row->mainImage; ?>" width="100%" class="img-responsive circular--square ">
                        <div class="caption pdr">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><?php echo substr($row->name, 0 , 50); ?></h4>
                                </div>
                                <div class="col-md-12">
                                    <h5><?php $data = get_data('users', array('id' =>  $row->userID));
                                        echo $data['first_name'];?></h5>
                                </div>
                                <div class="col-md-12">
                                    <p><?php echo substr($row->shortDescription, 0, 50); ?></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="country">
                                        <small>
                                            <i class="glyphicon glyphicon-map-marker">
                                            </i>
                                            <cite title="state, country">
                                                <?php echo $row->state; ?>,
                                                <?php
                                                $data = get_data('countries', array('id' =>  $row->country));
                                                echo $data['name'];
                                                ?>
                                            </cite>


                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="progress-bar" data-percentage="<?php

                                    $data = $this->global_model->total_sum('project_fund_history', array('projectID' => $row->projectID));


                                    $x = $totalWidth =  $data[0]->fundedAmount;
                                    $y =  $percentage = $row->neededAmount;

                                    $percent = $x/$y;
                                   echo $percent_friendly = number_format( $percent * 100, 2 ); // change 2 to # of decimals

                                    ?>">
                                        <div class="blue bar"><span></span></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-left">
                                    <p class="text-left">RAISED</p>
                                    <h4 class="text-left"><h4>$<?php

                                            $data = $this->global_model->total_sum('project_fund_history', array('projectID' => $row->projectID));
                                            echo $data[0]->fundedAmount;
                                            ?>

                                        </h4>
                                    </div>
                                    <div class="pull-right">
                                    <p class="text-right">GOAL</p>
                                    <h4 class="text-right"><?php echo '$'.$row->neededAmount; ?></h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <input value="Lend $25" aria-labelledby="dropdownMenu3" class="btn  btn-yellow dropdown-toggle" type="submit">
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('home/singleview/'.$row->projectID);?>" class="btn  btn-blue" type="submit">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <p> </p>
                        </div>
                    </div>
                </div>
                        </a>
                        <?php
                }
                }
                ?>



                <div class="col-md-12">

                    <a href="<?php echo base_url();?>home/getPurpose" aria-labelledby="dropdownMenu3" class="btn btn-big btn-yellow">Browse all causes</a>


                </div>


            </div>

        </div>



    </div>



    </div>

</section>


<section class="bottom-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  text-center ptop-40">


                <h1>Need a helping hand</h1>
                <h3>Aapply for a Loan and Get funded</h3>
                <input type="submit" value="Borrow Now" class="btn btn-midum  btn-yellow">
            </div>
        </div>
    </div>
</section>





</main>