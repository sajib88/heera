<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Private Website
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Private website</a></li>
            <li class="active">Create Photo Album </li>
        </ol>
    </section>

    <section class="content">
        <!-- /.row -->
        <div class="panel panel-default">


                <?php foreach ($album->result() as $row) {
                    if ($user_id == $row->user_id) { ?>

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <i class="fa fa-picture-o"></i><h3 class="box-title">Add Photos Album</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form class="form-horizontal" enctype="multipart/form-data" id="uploadPhotoForm"
                                          action="<?php echo base_url('video/video/multiple_video_upload'); ?>"
                                          method="post">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Add Multiple Picture:</label>

                                                <div class="col-sm-8">
                                                    <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
                                                    <input type="hidden" value="<?php echo $this->uri->segment('4'); ?>"
                                                           name="album_id">
                                                    <input type="file" id="img" class="btn btn-default" onchange="validateImage()" name="userFiles[]" multiple/>
                                                   <hr/>
                                                    <input class="btn btn-success" type="submit" name="fileSubmit" value="UPLOAD"/>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- /.box-body -->

                                        <!-- /.box-footer -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php }
                }?>
                <div class="row">
                    <?php foreach ($photos->result()as $row):?>
                    <div class="col-lg-3 col-xs-6">
                    <div class="box-body">
                        <div class="thumbnail">
                            <img class="group list-group-image" src="<?php echo base_url().'assets/file/'.$row->name;?>" alt="" />

                        </div>

                        <?php if ($user_id == $row->ref_id): ?>
                            <?php echo anchor("video/video/delete_video/".$row->id."/".$row->album_id,"Delete","class='btn btn-danger text-center delete_exchange'");?>
                        <?php endif; ?>
                    </div>

                </div>


                    <?php endforeach;?>
                    </div>

            </section>
    </div>
</div>
<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">×</button>

            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<style>
    .modal-dialog {width:600px;}
    .thumbnail {margin-bottom:6px;}
</style>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js" ></script>
<script type="application/javascript">
    $(document).ready(function() {
        $('.thumbnail').click(function(){
            $('.modal-body').empty();
            var title = $(this).parent('a').attr("title");
            $('.modal-title').html(title);
            $($(this).parents('div').html()).appendTo('.modal-body');
            $('#myModal').modal({show:true});
        });
        $('.delete_exchange').click(function() {
            return confirm("Do You Want To Really Delete?");
        });
    });
        $('#uploadPhotoForm').validate({
            rules: {
                'userFiles[]': {
                    required: true,
                    extension: "png,jpg,jpeg,gif"
                }
            },
            messages:{
                'userFiles[]':{
                    required : "<p class='text-danger'>Please upload atleast 1 photo</p>",
                    extension:"Only png file is allowed!"
                }

            }
    });
</script>
<script type="text/javascript">
    function validateImage() {
        var formData = new FormData();

        var file = document.getElementById("img").files[0];

        formData.append("Filedata", file);
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
            alert('Please select a valid image file');
            document.getElementById("img").value = '';
            return false;
        }
        if (file.size > 1024000) {
            alert('Max Upload size is 1MB only');
            document.getElementById("img").value = '';
            return false;
        }
        return true;
    }
</script>
<style>
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
        height: 218px;
    }
    .item.list-group-item .thumbnail
    {
        margin-bottom: 0px;
    }
    @media screen and (max-width: 450px) and (min-width: 320px) {
        .thumbnail img
        {
            height:120px;
        }
    }
</style>
