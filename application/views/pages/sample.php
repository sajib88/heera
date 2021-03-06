



<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="<?php echo base_url(); ?>comp/img/slide1.jpg" alt="Chania">
            <div class="carousel-caption">
                <h1>Give a Little Change a Lot. </h1>
                <p>A loan of $1500 helps a member to buy more fertilizer to support her fariming, to get a higher yield</p>
                <input type="submit" value="Lend $25" class="btn   btn-yellow">
            </div>
        </div>

        <div class="item">
            <img src="<?php echo base_url(); ?>comp/img/slide2.png" alt="Chicago">
            <div class="carousel-caption">
                <h1>Give a Little Change a Lot.</h1>
                <p>A loan of $1500 helps a member to buy more fertilizer to support her fariming, to get a higher yield</p>
                <input type="submit" value="Lend $25" class="btn  btn-yellow">
            </div>
        </div>


    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<main class="main-wrapper">
    <section class="banner-wrapper">

    <div class="container">
        <div class="row">
            <div class="col-md-8 pdl">
                <!-- MAIN SLIDES -->
                <div class="slider">
                    <div data-index="1">
                        <img src="<?php echo base_url(); ?>comp/img/slide1.jpg" class="img-responsive" alt="One">
                    </div>
                    <div data-index="2">
                        <img src="<?php echo base_url(); ?>comp/img/slide1.jpg" class="img-responsive" alt="One">
                    </div>
                    <div data-index="3">
                        <img src="<?php echo base_url(); ?>comp/img/slide1.jpg" class="img-responsive" alt="One">
                    </div>
                    <div data-index="4">
                        <img src="<?php echo base_url(); ?>comp/img/slide1.jpg" class="img-responsive" alt="One">
                    </div>
                </div>

                <!-- THUMBNAILS -->
                <div class="slider-nav-thumbnails">
                    <div class="item"><img src="<?php echo base_url(); ?>comp/img/thumbs/thumb-1.jpg" class="img-responsive" slide="slide_1">
                    </div>
                    <div class="item"><img src="<?php echo base_url(); ?>comp/img/thumbs/thumb-2.jpg" class="img-responsive" slide="slide_2">
                    </div>
                    <div class="item"><img src="<?php echo base_url(); ?>comp/img/thumbs/thumb-3.jpg" class="img-responsive" slide="slide_3">
                    </div>
                    <div class="item"><img src="<?php echo base_url(); ?>comp/img/thumbs/thumb-4.jpg" class="img-responsive" slide="slide_4">
                    </div>
                </div>
            </div>
            <aside class="col-md-4 pdr">
                <div class="lend-widget">
                    <div class="entry-title">
                        <h3 class="title">
                            Give a Little. <br>
                            Change a Lot.
                        </h3>
                        <div class="entry-meta row">
                            <div class="author">
                                <img src="<?php echo base_url(); ?>comp/img/author-pic.png" alt="author image">
                                <span>By Rebecaa</span>
                            </div>
                            <div class="origin">
                                <img src="<?php echo base_url(); ?>comp/img/india-flag.png" alt="india">
                                India
                            </div>
                        </div>
                    </div><!--entry title-->
                    <div class="entry-content">
                        <div class="progress-wrap">
                            <h5>53% Funded</h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 53%;">
                                </div>
                            </div>
                            <div class="funded-wrap">
                                <div class="amount-recieved">$786 Funded</div>
                                <div class="total-amount">of $1500 Goal</div>
                            </div>
                            <div class="stats-wrap row">
                                <div class="single-item col-xs-6 pdl pdr">
                                    <span>21</span> Lenders
                                </div>
                                <div class="single-item col-xs-6  pdr">
                                    <span>15</span> Days Left
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="entry-footer">
                        <form role="form" action="#">
                            <div class="row">
                                <div class="col-xs-5 pdl pdr item">
                                    <select class="form-control">
                                        <option value="">$25</option>
                                        <option value="">$50</option>
                                        <option value="">$100</option>
                                    </select>
                                </div>
                                <div class="col-xs-7 pdr item">
                                    <input type="submit" value="Lend Now" class="btn btn-big btn-yellow">
                                </div>
                            </div>
                        </form>
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
                                    <p class="description">A loan of $1500 helps a member to buy more fertilizer to support her fariming, to get a higher yield</p>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
                            <p><span class="heading">Loan Period</span> 12 Months</p>
                        </div>
                        <div class="entry-single">
                            <p><span class="heading">Repayment Schedule</span> Monthly</p>
                        </div>
                        <div class="entry-single">
                            <p><span class="heading">Disbursed Date</span> 21 April 2017</p>
                        </div>
                        <div class="entry-single">
                            <p><span class="heading">Is Borrower Paying Interest?</span> No</p>
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
