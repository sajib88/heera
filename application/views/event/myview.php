<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Event
            <small>All My Event</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Classifieds</a></li>
            <li class="active">View</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">



            <?php if(is_array($myevent)): ?>
            <?php foreach($myevent as $row):?>


                    <div class="col-sm-4">
                        <div class="panel panel-primary event-primary">
                            <div class="panel-heading"><h2><a href="#"><?php echo $row->title; ?></a></h2></div>
                            <div class="panel-body nopadding">
                                <img src="<?php echo base_url() . '/assets/file/' .$row->primary_photo; ?>" alt="event image" width="100%" height="30%" class="img-responsive"/>
                                <div class="row nopadding">
                                    <div class="col-sm-6 nopadding">
                                        <time class="start pink">
                                            EVENT <span class="day">START</span>
                                            <span class="month"><?php echo $row->start_date; ?></span>
                                            <span class="year"><?php echo $row->start_date; ?></span>
                                        </time>
                                    </div>
                                    <div class="col-sm-6 nopadding">
                                        <time class="end purple">
                                            EVENT <span class="day">END</span>
                                            <span class ="month"><?php echo $row->end_date; ?></span>
                                            <span class="year"><?php echo $row->end_date; ?></span>
                                        </time>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer panel-primary">
                                <p><?php echo $row->summary; ?>
                                </p>
                                <a href="<?php echo base_url('event/event/edit/' . $row->id); ?>" class="btn btn-success">Edit</a>
                                <a href="<?php echo base_url('event/event/layoutfull/' . $row->id); ?>" class="btn btn-warning"> View Details</a>
                                <a href="<?php echo base_url('event/event/delete/' . $row->id); ?>" class="btn  btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>



                <?php endforeach;?>
            <?php endif; ?>


        </div>
    </section>

</div>
