<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="container">
    <!-- Trigger the modal with a button -->
     <!-- Modal -->
    <div class="modal show" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Update Photo Album</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open("Photo/photo/update_album_name");?>
                    <?php foreach ($album_details->result()as $row):?>
                        <div class="form-group row">

                            <input type="hidden" name="album_id" value="<?php echo $this->uri->segment(4);?>">
                            <input type="hidden" name="profession_post" value="<?php echo $user_info['profession'];?>">
                            <input type="hidden" name="user_id_post" value="<?php echo $user_id;?>">
                            <label for="example-text-input" class="col-xs-3 col-form-label">Album Name</label>
                            <div class="col-xs-9">
                                <input class="form-control" name="album_name_post" type="text" value="<?php echo $row->album_name;?>" id="example-text-input">
                            </div>
                        </div>

        
                    <?php endforeach;?>

                </div>
                <div class="modal-footer">
                    <input type="submit" value="Update" class="btn btn-default">
                    <?php echo form_close();?>
                    <?php echo anchor ("photo/photo/index","Close",'class="btn btn-danger"');?>
                </div>
            </div>

        </div>
    </div>

</div>