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
    
    .cat_drop {
        display: block;
    }
    
    .sho{
        float: left;
        width: 60px;
       
        font-size: 17px;
        white-space: nowrap;
        margin: 8px 2px 0px 14px;
    }
    
    
    
    .sho2{
        float: left;
        width: 50px;
        margin-left: 0px;
        margin-top: 8px;
        font-size: 18px;
    }
    
    .form-control-search{
        border: 1px solid #113058;
        border-radius: 0px;
        padding: 0px 2px;
        width: 100%;
        color: #113058;
        font-size: 14px;
        height: 38px;
        box-shadow: none;
        color: #113058;
    }
    
    @media screen and (max-width: 600px) {
        
        .sho{
            margin: 0px;
        }
        .sho2{
            margin-top: 0px;
        }
    }
    
</style>


<main class="main-wrapper">
    <section class="content-wrapper">
        <div class="row">                
                <div class="row">                        
                    <div class="entry-footer cat_drop col-md-offset-1">
                        <div class="col-sm-1 sho pdl-20">Category</div> 
                        <div class="col-lg-2 ">
                            
                            <form role="form" method="post" action="<?php echo base_url('home/getPurpose');?>">
                                <select class="form-control-search" id="puposeList" name="puposeList" onchange="this.form.submit()">
                                    
                                    <option value="">plese select category</option>
                                    <?php 
                                        if(!empty($purpose)){
                                            foreach($purpose as $row){
                                            //$sel = ($purpose->purposeID == set_value('purposeID'))?'selected="selected"':'';
                                    ?>
                                           <option value="<?php echo $row->purposeID;?>" <?php //echo $sel;?> ><?php echo $row->purposeTitle;?></option>     
                                    <?php  
                                            }
                                        }
                                    ?>
                                </select>
                            </form>
                        </div>                               
                    </div>
                    <div class="entry-footer cat_drop ">
                        <div class="col-sm-1 sho2">Sort</div> 
                        <div class="col-lg-2 ">
                            <form role="form" method="post" action="<?php echo base_url('home/getPurpose');?>">
                                <select class="form-control-search" id="puposeList" name="puposeList" onchange="this.form.submit()">
                                    <option value="">Trending now</option>
                                    <option value="">Amount: low to high</option>
                                    <option value="">Amount: high to low</option>
                                    <option value="">Expiring soon</option>
                                    <option value="">Loan length</option>
                                    <option value="">Most recent</option>
                                    <option value="">Random</option>
                                   
                                </select>
                            </form>
                        </div>                               
                    </div>
                </div>            
            </div>
        
        <div class="ptop-30"></div>
        
        <div class="container">
            <div class="row">
                <div class="bottom-gap">
                <?php if(is_array($projectData)){ ?>
                <?php foreach($projectData as $row){?>
                    <a href="<?php echo base_url('home/singleview/'.$row->projectID);?>">
                <div class="col-sm-6 col-md-4 products">
                    <div class="thumbnail" >
                        <img src="<?php echo base_url().'assets/file/project/'.$row->mainImage; ?>" class="img-responsive circular--square ">
                        <div class="caption pdr">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><?php echo substr($row->name, 0, 30); ?></h4>
                                </div>
                                <div class="col-md-12">
                                    <h5><?php $data = get_data('users', array('id' =>  $row->userID));
                                        echo $data['first_name'];?></h5>
                                </div>
                                <div class="col-md-12">
                                    <p><?php echo substr($row->shortDescription, 0, 60).'......'; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="country">
                                        <small>
                                            <i class="glyphicon glyphicon-map-marker">
                                            </i>
                                            <cite title="state, country">
                                                <?php echo $row->state; ?>, <?php
                                                $data = get_data('countries', array('id' =>  $row->country));
                                                echo $data['name'];
                                                ?> </cite>


                                        </small>
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
                </div>
            </div>
        </div>
    </section>
</main>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script>
    $(function() {
      $('#puposeList').change(function() {
        
        this.submit();
      });
    });
</script>
