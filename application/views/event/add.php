
    <div class="content-wrapper">

    <section class="content-header">
        <h1>
            Event
            <small>Create New Event</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Event</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <section class="content">
    <div class="row">
        <div class="col-lg-7">
            <div class="box box-primary">
                <div class="panel-body">
                    <div class="row">
                        <!-- left blue start -->

                        <div class="col-lg-12">
                            <form  method="post" id="event" name="event" enctype="multipart/form-data" action="<?php echo base_url('event/event/index'); ?>">
                                <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Event Name<span class="error">*</span></label><span id='title-error' class='error' for='title'></span>
                                        <input name="title" value="<?php echo ''; ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Event Summary<span class="error">*</span></label><span id='summary' class='error' for='summary'></span>
                                        <textarea  name="summary" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Event Description<span class="error">*</span></label><span id='Description' class='error' for='description'></span>
                                        <textarea  name="description" class="form-control"></textarea>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Event Category <span class="error">*</span></label><span id='category' class='error' for='main_category'></span>
                                        <select onchange="getSubCat(this)" name="category" class="form-control">
                                            <option value="">Select Event category</option>

                                            <option value="Conferences">Conferences</option>
                                            <option value="Education">Education</option>
                                            <option value="Fundraisers">Fundraisers</option>
                                            <option value="Health Observances">Health Observances</option>
                                            <option value="Public Events">Public Events</option>
                                            <option value="Seminars">Seminars</option>
                                            <option value="Special Events">Special Events</option>
                                            <option value="Support Groups">Support Groups</option>

                                        </select>
                                    </div>
                                </div>





                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Seats No<span class="error">*</span></label><span id='seats_no' class='error' for='seats_no'></span>
                                        <input name="seats_no" value="<?php echo ''; ?>"  class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Event Location/ Place</label><span id='location' class='error' for='location'></span>
                                        <input name="location" value="<?php echo ''; ?>"  class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Event Start Date<span class="error">*</span></label><span id='start_date' class='error' for='start_date'></span>
                                        <input name="start_date" type="text" class="form-control pull-right" id="datepicker">
                                    </div>
                                </div>

                                <div class="col-lg-6 bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Start Event Time :</label>

                                        <div class="input-group">
                                            <input name="start_time" type="text" class="form-control timepicker">

                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Event End Date<span class="error">*</span></label><span id='end_date' class='error' for='start_date'></span>
                                        <input name="end_date" type="text" class="form-control pull-right" id="datepicker2">
                                    </div>
                                </div>

                                <div class="col-lg-6 bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>End Event  Time:</label>

                                        <div class="input-group">
                                            <input name="end_time" type="text" class="form-control timepickerend">

                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>

                                <div class="box-footer">
                                    <div class="col-lg-12">
                                        <div class="form-group" id="photo_id">
                                            <label>Event Main Picture<span class="error">*</span></label><span  class='error' for='picture1'></span>
                                            <input class="btn btn-default" id='primary_photo' name="primary_photo" onchange="validateImage()" type="file">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Event Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                                            <input class="btn btn-default" name="photo_2" type="file">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Event Picture Three</label><span id='picture3-error' class='error' for='picture3'></span>
                                            <input class="btn btn-default" name="photo_3" type="file">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="submit" name="submit" class="btn btn-block btn-success" value="Save">

                                    </div>
                                </div>

                        </div>

                        <!-- left blue end -->






                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-5">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="icon fa fa-check"></i>
                    
                    <h3 class="box-title">Alerts</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
                        Select Event Category
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i>Alert!</h4>
                        Info alert preview. This alert is dismissable.
                    </div>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
                        Warning alert preview. This alert is dismissable.
                    </div>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
                        Success alert preview. This alert is dismissable.
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>




    </div>


        </form>


        </section>


    <!-- /.container-fluid -->
</div>




<script type="text/javascript">


jQuery(document).ready(function() {
    //Date picker
    $('#datepicker2').datepicker({
        autoclose: true
    });
    $('#datepicker').datepicker({
        autoclose: true
    });



    //Timepicker
    $(".timepicker").timepicker({
        showInputs: false
    });

    $(".timepickerend").timepicker({
        showInputs: false
    });



});



</script>




    <script type="application/javascript">
        $('#event').validate({
            rules: {
                title: {
                    required:true
                },
                main_category:{
                    required:true
                },
                description:{
                    required:true
                },
                summary:{
                    required:true
                },

                category:{
                    required:true
                },

                seats_no:{
                    required:true
                },
                start_date:{
                    required:true
                },
                end_date:{
                    required:true
                },

                'primary_photo': {
                    required: true,
                    extension: "png,jpg,jpeg,gif"
                },
                'photo_2': {

                    extension: "png,jpg,jpeg,gif"
                },
                'photo_3': {

                    extension: "png,jpg,jpeg,gif"
                }


            },
            messages:{
                title: {
                    required: "Title is Required",},

                description: {
                    required: "Description is Required",},
                summary: {
                    required: "Summary is Required",},

                category: {
                    required: "Event Category is Required",},

                seats_no: {
                    required: "Seats no is Required, Number digit provide",
                },

                start_date: {
                    required: "Event Start Date is Required",
                },
                end_date: {
                    required: "Event End Date is Required",
                },
                'primary_photo':{
                    required : "<p class='text-danger'>Please upload atleast 1 photo</p>",
                    extension:"Only Image Format  file is allowed!"
                },
                'photo_2':{

                    extension:"Only Image Format  file is allowed!"
                },
                'photo_3':{

                    extension:"Only Image Format  file is allowed!"
                }

            }
        });


    </script>





    <link rel="stylesheet" href="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.css">

