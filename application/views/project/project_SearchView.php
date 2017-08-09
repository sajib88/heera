<style type="text/css">
    .thumbnail a > img, .thumbnail > img{
        width: 100%;
        height: 260px;
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
        .sho{
            margin-left: 0px;
        }
    }

    .cat_drop {
        display: block;
    }

    .pdtb-20{
        padding-top: 0px;
        padding-bottom: 20px;
        font-size: 20px;
        line-height: 1.0000000;
        color: #1570f4;
    }

    .sho{
        float: left;
        width: 90px;
        font-size: 17px;
        white-space: nowrap;
        margin: 8px 2px 0px 0px;
    }
    .sho3{
        float: left;
        width: 150px;
        font-size: 17px;
        white-space: nowrap;
        margin: 8px 2px 0px 0px;
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
        .sho3{
            margin: 0px;
        }
        .sho2{
            margin-top: 0px;
        }
    }

</style>

<main class="main-wrapper">

    <section class="content-wrapper">
        <div class="container">
                <div class="row">
                    <form role="form" method="post" action="<?php echo base_url('home/getPurpose');?>">
                        <div class="entry-footer cat_drop">
                            <div class="col-sm-1 sho">Category</div>
                                <div class="col-lg-2  ">
                                    <input type="hidden" name="purposeID" />
                                    <select class="form-control-search" id="puposeList" name="purposeID" onchange="this.form.submit()">

                                        <option value="">plese select category</option>
                                        <?php
                                            if(!empty($purpose)){
                                                foreach($purpose as $row){
                                                $v = (set_value('purposeID')!='')?set_value('purposeID'):$projectData[0]->purposeID;
                                                $sel = ($row->purposeID == set_value('purposeID'))?'selected="selected"':'';
                                        ?>
                                               <option value="<?php echo $row->purposeID;?>" <?php echo $sel;?> ><?php echo $row->purposeTitle;?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                        </div>
                        <div class="entry-footer cat_drop ">
                            <div class="col-sm-1 sho3">Search by Name</div>
                            <div class="col-lg-2">
                                <input type="text" onchange="this.form.submit()" value="<?php echo $this->input->post('searchByName');?>" name="searchByName" class="form-control" id="exampleInputEmail2" placeholder="Search by Name" />
                            </div>
                        </div>
                        <div class="entry-footer cat_drop ">
                            <div class="col-sm-1 sho2">Sort</div>
                            <div class="col-lg-2">
                                    <select class="form-control-search" id="sortingList" name="sortingList" onchange="this.form.submit()">
                                        <option value="1">Trending now</option>
                                        <option value="2">Amount: low to high</option>
                                        <option value="3">Amount: high to low</option>
                                        <option value="4">Expiring soon</option>
                                        <option value="5">Loan length</option>
                                        <option value="6">Most recent</option>
                                        <option value="7">Random</option>
                                    </select>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        <div class="ptop-30"></div>

        <div class="container">
            <div class="row">
                <div class="bottom-gap">

                <?php if(!empty($projectData)){ ?>
                <?php foreach($projectData as $row){?>                    
                   <a href="<?php echo base_url('home/singleview/'.$row->projectID);?>"> 
                <div class="col-sm-6 col-md-4 products">
                    <div class="thumbnail" >
                        <img src="<?php echo base_url().'assets/file/project/'.$row->mainImage; ?>" class="img-responsive circular--square">
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
                                    <div class="progress-bar" data-percentage="<?php

                                    $data = $this->global_model->total_sum_amount('project_fund_history', array('projectID' => $row->projectID));


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
                                    <h4 class="text-left">$<?php
                                        $data = $this->global_model->total_sum_amount('project_fund_history', array('projectID' => $row->projectID));
                                        if($data[0]->fundedAmount == 0){
                                            echo "0";
                                        }else{
                                            echo $data[0]->fundedAmount;
                                        }

                                        ?></h4>
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
                }else{
                    if(!empty($this->session->flashdata('msg_search'))){
                        echo '<div class="alert alert-danger" id="success-alert">No search found</div>';                        
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
        //alert(1);
        this.submit();
      });
    });
</script>
