<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 10-Dec-16
 * Time: 11:35 PM
 */

?>
<style>
    .glyphicon { margin-right:5px; }
    .thumbnail
    {
        margin-bottom: 20px;
        padding: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px;
    }

    .item.list-group-item
    {
        float: none;
        width: 100%;
        background-color: #fff;
        margin-bottom: 10px;
    }
    .item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
    {
        background: #428bca;
    }

    .item.list-group-item .list-group-image
    {
        margin-right: 10px;
    }
    .thumbnail img
    {
        height: 171px;
    }
    .item.list-group-item .thumbnail
    {
        margin-bottom: 0px;
    }
    .item.list-group-item .caption
    {
        padding: 9px 9px 0px 9px;
    }
    .item.list-group-item:nth-of-type(odd)
    {
        background: #eeeeee;
    }

    .item.list-group-item:before, .item.list-group-item:after
    {
        display: table;
        content: " ";
    }

    .item.list-group-item img
    {
        float: left;
    }
    .item.list-group-item:after
    {
        clear: both;
    }
    .list-group-item-text
    {
        margin: 0 0 11px;
    }

</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            All Products
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Products</a></li>
            <li class="active">All</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="panel panel-default">
                <?php if(is_array($allproducts)): ?>
                <?php if(count($allproducts)<=0){?>
                    <p class="alert alert-info">No Product</p>
                <?php }else{
                foreach($allproducts as $row){
                ?>
            <div class="col-lg-4">
                <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $row->name;?></h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="thumbnail">
                                        <img class="group list-group-image" src="<?php echo base_url().'assets/file/'.$row->photo_primary;?>" alt="" />
                                    </div>
                                    <!-- ./chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-12">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active"><a href="#"><i class="fa fa-usd"></i> Special Price<span class="label label-danger pull-right">$<?php echo $row->special_price;?></span></a></li>
                                        <li><a href="#"><i class="fa fa fa-usd"></i> Old Price<span class="label label-primary pull-right">$<?php echo $row->price;?></span></a></li>

                                        <li><a href="#"><i class="fa fa-filter"></i> Type <span class="label label-warning pull-right"><?php echo $row->type;?></span></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-user"></i> Seller Name<span class="label label-success pull-right"><?php echo $row->seller_name;?></span></a></li>
                                        <li><a href="#"><i class="fa fa fa-envelope"></i> Seller Email <span class="label label-info pull-right"><?php echo $row->seller_email;?></span></a></li>
                                        <li><a href="#"><i class="fa fa-mobile-phone"></i> Seller Phone <span class="label label-primary pull-right"><?php echo $row->seller_phone;?></span> </a></li>
                                    </ul>



                                </div>

                                <!-- /.col -->
                            </div>
                            <div class="col-md-12">

                                <a href="<?php echo base_url('product/products/layoutfull/' . $row->id); ?>" class="btn btn-block btn-success"> View</a>
                            </div>
                        </div>

                        <!-- /.box-body -->

                        <!-- /.footer -->
                    </div>



                </div>
                <?php } }?>
                <?php endif; ?>
            </div>

        </div>
    </section>
</div>



