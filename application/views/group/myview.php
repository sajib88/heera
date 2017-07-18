<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Group
            <small>All My Group</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Group</a></li>
            <li class="active">My View</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">



            <?php if(is_array($mygroup)): ?>
            <?php foreach($mygroup as $row):?>


                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <h4 class="text-center"><span class="label label-info"><?php echo $row->group_name; ?></span></h4>
                            <img src="<?php echo base_url() . '/assets/file/' .$row->primary_image; ?>" alt="event image" width="320" height="250" class="img-responsive"/>
                            <div class="caption">
                                <div class="row">



                                    <ul class="nav nav-stacked">
                                        <li><a href="#">Group Category <span class="pull-right badge bg-blue"><?php echo $row->category; ?></span></a></li>
                                        <li><a href="#">Group  Date <span class="pull-right badge bg-aqua"><?php echo $row->create_date; ?></span></a></li>

                                    </ul>

                                </div>
                                <p><?php echo $row->description; ?></p>
                                <div class="row">

                                    <div class="box-footer">

                                        <a href="<?php echo base_url('group/group/edit/' . $row->id); ?>" class="btn btn-block btn-success"> Edit</a>
                                        <a href="<?php echo base_url('group/group/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a>
                                    </div>


                                </div>

                                <p> </p>
                            </div>
                        </div>
                    </div>


                <?php endforeach;?>
            <?php endif; ?>


        </div>
    </section>

</div>
