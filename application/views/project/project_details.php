<style type="text/css">
    .slick-slide img{
        height: 470px;
    }
    .banner-wrapper .slider-nav-thumbnails .item img{
        height: 115px;
        width: 100%;
    }
    .bar span::after {background: none;}
</style>
<main class="main-wrapper">
    <section class="banner-wrapper">

        <?php
        $x = $totalWidth = $projectData['totalRaisedAmount'];
        $y =  $percentage = $projectData['neededAmount'];

        $percent = $x/$y;
        $percent_friendly = number_format( $percent * 100, 2 ); // change 2 to # of decimals

        ?>


    <div class="container">
        <div class="row">
            <div class="col-md-8 pdl">



                <!-- MAIN SLIDES -->
                <div class="slider">
                     <div data-index="1">
                        <?php if(!empty($projectData['mainImage'])){ ?>
                            <img src="<?php echo base_url().'assets/file/project/'.$projectData['mainImage']; ?>" width="100%" class="img-responsive" alt="One">
                        <?php }else{} ?>
                    </div>
                    <div data-index="2">
                        <?php if(!empty($projectData['photo1'])){ ?>
                        <img src="<?php echo base_url().'assets/file/project/'.$projectData['photo1']; ?>" width="100%" class="img-responsive" alt="One">
                        <?php }else{} ?>
                    </div>
                    <div data-index="3">
                        <?php if(!empty($projectData['photo2'])){ ?>
                            <img src="<?php echo base_url().'assets/file/project/'.$projectData['photo2']; ?>" width="100%" class="img-responsive" alt="One">
                        <?php }else{} ?>
                    </div>
                    <div data-index="4">
                        <?php if(!empty($projectData['photo3'])){ ?>
                            <img src="<?php echo base_url().'assets/file/project/'.$projectData['photo3']; ?>" width="100%" class="img-responsive" alt="One">
                        <?php }else{} ?>
                    </div>
                </div>

                <!-- THUMBNAILS -->
                <div class="slider-nav-thumbnails">
                   <div class="item">
                        <?php if(!empty($projectData['mainImage'])){ ?>
                        <img src="<?php echo base_url().'assets/file/project/'.$projectData['mainImage']; ?>" class="img-responsive" slide="slide_1">
                         <?php }else{} ?>
                    </div>
                    <div class="item">
                        <?php if(!empty($projectData['photo1'])){ ?>
                        <img src="<?php echo base_url().'assets/file/project/'.$projectData['photo1']; ?>" class="img-responsive" slide="slide_2">
                        <?php }else{} ?>
                    </div>
                    <div class="item">
                        <?php if(!empty($projectData['photo2'])){ ?>
                        <img src="<?php echo base_url().'assets/file/project/'.$projectData['photo2']; ?>" class="img-responsive" slide="slide_3">
                        <?php }else{} ?>
                    </div>
                    <div class="item">
                        <?php if(!empty($projectData['photo3'])){ ?>
                        <img src="<?php echo base_url().'assets/file/project/'.$projectData['photo3']; ?>" class="img-responsive" slide="slide_4">
                        <?php }else{} ?>
                    </div>
                </div>
            </div>
            <aside class="col-md-4 pdr">
                <div class="lend-widget">
                    <div class="entry-title">
                        <h3 class="title">
                            <?php
                               echo $projectData['name'];
                            ?>
                        </h3>
                        <div class="entry-meta row">
                            <div class="author">
                                <img src="<?php echo base_url(); ?>comp/img/author-pic.png" alt="author image">
                                <span><?php $data = get_data('users', array('id' =>  $projectData['userID']));
                                    echo $data['first_name'];?></span>
                            </div>
                            <div class="origin">

                                <small>
                                    <i class="glyphicon glyphicon-map-marker">
                                    </i>
                                    <cite title="state, country">
                                        <?php echo $projectData['state']; ?>, <?php
                                        $data = get_data('countries', array('id' => $projectData['country']));
                                        echo $data['name'];
                                        ?> </cite>
                                </small>
                            </div>
                        </div>
                    </div><!--entry title-->
                    <div class="entry-content">
                        <div class="progress-wrap">
                            <h5><?php echo $percent_friendly; ?>% Funded</h5>

                                <div class="progress-bar detailsprogressbar" data-percentage="<?php echo $percent_friendly; ?>">
                                    <div class="blue bar"><span></span></div>

                                </div>

                            <div class="funded-wrap">
                                <div class="amount-recieved">$<?php echo  $projectData['totalRaisedAmount']; ?> Funded</div>
                                <div class="total-amount">of <?php echo '$'.$projectData['neededAmount'];?> Goal</div>
                            </div>
                            <div class="stats-wrap row">
                                <div class="single-item col-xs-6 pdl pdr">
                                    <span><?= $totallander;?></span> Lenders
                                </div>
                                <div class="single-item col-xs-6  pdr">

                                    <span>
                                        <?php
                                        $now = time(); // or your date as well
                                        $your_date =  strtotime($projectData['projectEndDate']);
                                        $datediff = $your_date - $now;
                                        echo floor($datediff / (60 * 60 * 24));
                                        ?>

                                    </span> Days Left



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="entry-footer">

                            <div class="row">


                                <?php   $loginId = $this->session->userdata('login_id'); ?>
                                <?php
                                if($projectData['statusID']==3){
                                if($percent_friendly != 100.00) {
                                    if ($loginId == 0) {
                                        ?>
                                        <div class="col-xs-5 pdl pdr item">
                                            <select name="fundedAmount" class="form-control">
                                                <option value="25">$25</option>
                                                <option value="50">$50</option>
                                                <option value="100">$100</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-7 pdr item">
                                            <a href="<?php echo base_url(); ?>home/login"
                                               class="btn btn-mid btn-yellow">Lend Now</a>
                                        </div>
                                        <?php
                                    } else {
                                        ?>


                                        <form id="bankvalidation" role="form" method="post"
                                              enctype="multipart/form-data"
                                              action="<?php echo base_url('home/checkout'); ?>">
                                            <?php $totalampount = $user_info['inAmount']; ?>
                                            <input type="hidden" name="login_id" value="<?php echo $loginId; ?>">
                                            <input type="hidden" name="pid"
                                                   value="<?php echo $projectData['projectID']; ?>">
                                            <input type="hidden" name="chekoutpage" value="chekoutpage">


                                            <div class="col-xs-5 pdl pdr item">
                                                <select name="lendAmount" class="form-control">
                                                    <option value="25">$25</option>
                                                    <option value="50">$50</option>
                                                    <option value="100">$100</option>
                                                </select>
                                            </div>

                                            <div class="col-xs-7 pdr item">
                                                <input type="submit" name="submit" class="btn btn-mid btn-yellow"
                                                       value="Lend Now">

                                            </div>

                                        </form>

                                    <?php }
                                }}
                                else{

                                 ?>

                                    <div class="text-center bordertext"><a href="<?php echo base_url('home/getPurpose'); ?>"><h4>Find more loans</h4></a> </div>


                                <?php } ?>





                                <!-- Modal -->

                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Lend Now</h4>
                                                <h6>Total Balance :  $<?php echo $user_info['inAmount']; ?></h6>


                                            </div>
                                            <div class="modal-body">
                                                <div id="myModal"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>




                            </div>












                    </div>
                </div>
            </aside>
        </div>
        <div class="row">
            <ul class="verified-list">
                <li><img src="<?php echo base_url(); ?>comp/img/icons/icon-paper.png" alt="icon"> Verified Paperwork</li>
                <li><img src="<?php echo base_url(); ?>comp/img/icons/icon-phone.png" alt="icon"> We had a Phone Conversation</li>
                <li><img src="<?php echo base_url(); ?>comp/img/icons/icon-validate.png" alt="icon"> Funding is Validated</li>
            </ul>
        </div><!--verified wrap-->
    </div>

</section><!-- banner wrapper -->

<section class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 pdl">
                <div class="tab-wrapper row">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab1" aria-controls="story" role="tab" data-toggle="tab">Gayatri's Story</a></li>
                        <li role="presentation"><a href="#tab2" aria-controls="discussion" role="tab" data-toggle="tab">Discussion <span class="notification blue-notify">2</span></a></li>
                        <li role="presentation"><a href="#tab3" aria-controls="backers" role="tab" data-toggle="tab">Backers</a></li>
                        <li role="presentation"><a href="#tab4" aria-controls="updates" role="tab" data-toggle="tab">Updates <span class="notification yellow-notify">1</span></a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab1">
                            <div class="story-content">
                                <div class="entry-head">
                                    <h3 class="title">About this Project</h3>
                                    <p class="description"><?php echo $projectData['shortDescription'];?></p>
                                </div>
                                <p><?php echo $projectData['detailsDescription'];?></p>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab2">
                            <h3 class="title">Share your thoughts</h3>
                            <div class="panel panel-default text-center">
                                <div class="panel-body">
                                    Only Backers can posts comments. <a href="#">Log in</a>
                                </div>
                            </div>
                            <div class="comment-wrapper">
                                <div class="single-item">
                                    <div class="entry-img"><img src="<?php echo base_url(); ?>comp/img/author-pic.png" alt=""></div>
                                    <div class="entry-content">
                                        <h4>Nick Says</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                    </div>
                                </div>

                                <div class="single-item">
                                    <div class="entry-img"><img src="<?php echo base_url(); ?>comp/img/author-pic.png" alt=""></div>
                                    <div class="entry-content">
                                        <h4>Nick Says</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab3">
                            <h3 class="title">Lenders and Lending Team</h3>
                            <div class="lender-wrapper row">
                                <div class="lender-widget col-md-4">
                                    <div class="inner-item">
                                        <img src="<?php echo base_url(); ?>comp/img/lender1.png" alt="" class="img-responsive">
                                        <div class="entry-content">
                                            <h4 class="title">Nick Yulman</h4>
                                            <p>Funded 6 projects.</p>
                                        </div>
                                    </div>
                                </div><!--lender widget-->

                                <div class="lender-widget col-md-4">
                                    <div class="inner-item">
                                        <img src="<?php echo base_url(); ?>comp/img/lender1.png" alt="" class="img-responsive">
                                        <div class="entry-content">
                                            <h4 class="title">Olivia Rohan</h4>
                                            <p>Funded 21 projects.</p>
                                        </div>
                                    </div>
                                </div><!--lender widget-->

                                <div class="lender-widget col-md-4">
                                    <div class="inner-item">
                                        <img src="<?php echo base_url(); ?>comp/img/lender1.png" alt="" class="img-responsive">
                                        <div class="entry-content">
                                            <h4 class="title">Sarvam Bodhi</h4>
                                            <p>Funded 6 projects.</p>
                                        </div>
                                    </div>
                                </div><!--lender widget-->
                            </div><!--lender wrapper-->
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab4">
                            <div class="timeline-wrapper">
                                <div class="entry-head">
                                    <h4 class="btn-blue">Project Uploaded</h4>
                                    <p class="start-date">12 Feb 2017</p>
                                </div>
                                <section id="cd-timeline" class="cd-container">
                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img">
                                            <span></span>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content">
                                            <p class="meta">Update:</p>
                                            <p class="cd-date">21st April 2017</sp>
                                            <h4>Project Funded</h4>
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img">
                                            <span></span>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content">
                                            <p class="meta">Update:</p>
                                            <p class="cd-date">24st April 2017</sp>
                                            <h4>Project Funded</h4>
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img">
                                            <span></span>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content">
                                            <p class="meta">Update:</p>
                                            <p class="cd-date">30st April 2017</sp>
                                            <h4>Project Funded</h4>
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->


                                </section> <!-- cd-timeline -->
                            </div><!-- timeline wrapper -->
                        </div>
                    </div>

                </div>
            </div>
            <aside class="col-md-4 pdr">
                <div class="detail-widget">
                    <div class="entry-head">
                        <h3>Loan details</h3>
                    </div><!--entry head-->
                    <div class="entry-content">
                        <div class="entry-single">
                            <p><span class="heading">Loan Period</span> <?php echo $projectData['loanTerm'];?></p>
                        </div>
                        <div class="entry-single">
                            <p>
                                <span class="heading">Repayment Schedule</span>
                                <?php

                                    echo getRepaymentScheduleById($projectData['RepaymentScheduleID']);
                                ?>
                            </p>
                        </div>
                        <div class="entry-single">
                            <p><span class="heading">Disbursed Date</span> <?php echo $projectData['projectEndDate'];?> </p>
                        </div>
                        <div class="entry-single">
                            <p>
                                <span class="heading">
                                    Is Borrower Paying Interest?
                                </span>
                                    <?php
                                        if($projectData['interestRate'] <= 0){
                                            echo 'No';
                                        }else{
                                            echo $projectData['interestRate'].'%';
                                        }
                                    ?>
                            </p>
                        </div>
                        <div class="entry-single">
                            <p><span class="heading">Currency Exchange Loss</span> Possible</p>
                        </div>
                    </div><!--entry content-->
                </div>
            </aside>
        </div>
    </div><!--container-->
</section>

</main>


<input type="hidden" id='pid' data-project='<?php echo $projectData['projectID']; ?>'></input>
<script>


    var pid = document.getElementById('pid');
    var sendpid = pid.getAttribute('data-project');

    $(document).ready(function() {
            var base_url = '<?php echo base_url() ?>';
            $('#myModal').on('shown.bs.modal', function () {
                var id=sendpid;
                $.ajax({
                    type: 'GET',
                    url: base_url + "home/ajaxlender/"+id, //this file has the calculator function code
                    //data: id,
                    success:function(data){
                        $('#showcal').html(data);
                    }
                });
            });

    });

</script>
