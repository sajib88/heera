<style type="text/css">
    .thumbnail a > img, .thumbnail > img{
        width: 100%;
    }
    .products > .thumbnail{
        margin-bottom: 60px;
    }
    
    .helpig-hand{
        margin-top: -28px;
    }
    
    .helpig-hand h2{
        font-size: 40px;
    }
    @media screen and (max-width: 600px) {
        .helpig-hand h2{
            font-size: 28px;
        }
    }
</style>

<main class="main-wrapper">
    <section class="content-wrapper">
        
        <div class="row">
                <div class="text-center helpig-hand">
                   <h2>Give a helpig hand. <span>See our causes</span></h2> 
                </div>
        </div>
        
        <div class="ptop-30"></div>
        
        <div class="container">
            <div class="row">
                <div class="bottom-gap">
                <?php if(is_array($projectData)){ ?>
                <?php foreach($projectData as $row){?>
                <div class="col-sm-6 col-md-4 products">
                    <div class="thumbnail" >
                        <img src="<?php echo base_url().'assets/file/project/'.$row->mainImage; ?>" class="img-responsive circular--square ">
                        <div class="caption pdr">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><?php echo substr($row->name, 0, 30); ?></h4>
                                </div>
                                <div class="col-md-12">
                                    <h5>Mike Thompsom</h5>
                                </div>
                                <div class="col-md-12">
                                    <p><?php echo substr($row->shortDescription, 0, 60).'......'; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="country">
                                        <img src="<?php echo base_url(); ?>/comp/img/india-flag.png" alt="india">
                                        India
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="progress-bar" data-percentage="80">
                                        <div class="blue bar"><span></span></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-left">
                                    <p class="text-left">RAISED</p>
                                    <h4 class="text-left">$5300</h4>
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
                                        <input value="LEARN MORE" class="btn  btn-blue" type="submit">
                                    </div>
                                </div>
                            </div>
                            <p> </p>
                        </div>
                    </div>
                </div>
                <?php 
                }
                }   
                ?>
                </div>
            </div>
        </div>
    </section>
</main>
