
    <div class="content-wrapper">

    <section class="content-header">
        <h1>
            Gorup
            <small>EditGorup</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Group</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" id="event" enctype="multipart/form-data" action="<?php echo base_url('group/group/edit/'. $editgroup['id']); ?>">
                                <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Group Name<span class="error">*</span></label><span id='title-error' class='error' for='title'></span>
                                        <input name="group_name" value="<?php echo $editgroup['group_name']; ?>"  class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Group Description<span class="error">*</span></label><span id='Description' class='error' for='description'></span>
                                        <textarea  name="description" class="form-control"><?php echo $editgroup['description']; ?></textarea>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Group Category <span class="error">*</span></label><span id='category' class='error' for='main_category'></span>
                                        <select onchange="getSubCat(this)" name="category" class="form-control">
                                            <option value="<?php echo $editgroup['category']; ?>"><?php echo $editgroup['category']; ?></option>

                                            <option value="Chiropractor">Chiropractor</option>
                                            <option value="Dentist">Dentist</option>
                                            <option value="General">General</option>
                                            <option value="Optometrist">Optometrist</option>
                                            <option value="Ph.D">Ph.D</option>
                                            <option value="Pharmacist">Pharmacist</option>
                                            <option value="Physician">Physician</option>
                                            <option value="Podiatrist">Podiatrist</option>
                                            <option value="Professional">Professional</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Group Discussion<span class="error">*</span></label><span id='discussion' class='error' for='discussion'></span>
                                        <textarea  name="discussion" class="form-control"><?php echo $editgroup['discussion']; ?></textarea>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Group Start Date<span class="error">*</span></label><span  class='error' for='start_date'></span>
                                        <input name="create_date" value="<?php echo $editgroup['create_date']; ?>" type="text" class="form-control pull-right" id="datepicker">
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group" id="photo_id">
                                        <label>Group Image One<span class="error">*</span></label><span  class='error' for='picture1'></span>
                                        <input class="btn btn-default" id='primary_image' name="primary_image" type="file">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                                        <input class="btn btn-default" name="photo_2" type="file">
                                    </div>
                                </div>




                                <div class="col-lg-6">
                                    <input type="submit" name="submit" class="btn btn-block btn-success" value="update">

                                </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>



        </section></form>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.container-fluid -->
</div>

<script type="text/javascript">
    jQuery(document).ready(function() {
        //Date picker
        $('#datepicker2').datepicker({
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

$(function() {
       $("#event").validate({
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
                price:{
                    required:true
                },
                picture1:{
                    required:true,
                    accept:"image/jpeg,image/gif,image/png",
                },
                picture2:{
                    accept:"image/jpeg,image/gif,image/png",
                },
                picture3:{
                    accept:"image/jpeg,image/gif,image/png",
                },
                file1:{
                   required:true,
                    extension: 'docx|doc|pdf|csv|xlsx|xls',
               },
                file2:{
                    extension: 'docx|doc|pdf|csv|xlsx|xls',
                },
                audio:{
                    accept: 'audio/*',
                },
                videos:{
                   accept: 'video/x-msvideo|video/x-ms-wmv|video/x-m4v|video/x-flv|video/webm|video/quicktime|video/mpeg|video/mp4|video/3gpp',
               }

            },
            messages: {
                title: {
                    required: "Title is Required",},
                main_category: {
                    required: "Main Category is Required",},
                description: {
                    required: "Description is Required",},
                price: {
                    required: "Price is Required",},
                picture1: {
                    required: "Picture is Required",
                    accept:"Please Select Appropiate File",
                },
                picture2: {
                    accept:"Please Select Appropiate File",
                },
                picture3: {
                    accept:"Please Select Appropiate File",
                },
                file1: {
                    required: "File is Required",
                    extension:"Please Select Appropiate File",
                },
                file2: {
                    extension:"Please Select Appropiate File",
                },
                audio: {
                    accept:"Please Select audios File",
                },
                videos: {
                    accept:"Please Select videos File",
                }
            }
        });

    });


</script>

<script>



                                        function getSubCat(sel) {
                                            var value = sel.value;
                                            var base_url = '<?php echo base_url() ?>';
                                            var da = {state: value};
                                            $.ajax({
                                                type: 'POST',
                                                url: base_url + "classifieds/classifieds/getSubCatByAjax",
                                                data: da,
                                                dataType: "text",
                                                success: function(resultData) {
                                                    $("#subcat").html(resultData);
                                                }
                                            });

                                        }

                                        function getComboA(sel) {
                                            var value = sel.value;
                                            var base_url = '<?php echo base_url() ?>';
                                            var da = {state: value};
                                            $.ajax({
                                                type: 'POST',
                                                url: base_url + "public_web/publicweb/getStateByAjax",
                                                data: da,
                                                dataType: "text",
                                                success: function(resultData) {
                                                    $("#result").html(resultData);
                                                }
                                            });

                                        }

</script>
<style>
    .error{
        color: red;
        font-size: 12px;
    }
</style>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.css">

<!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js" ></script>


