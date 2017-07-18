<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Photo Album
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Photo </a></li>
            <li class="active">Create Photo Album </li>
        </ol>
    </section>





    <section class="content">
        <!-- /.row -->
         <div class="panel panel-default">
            <div class="panel-body box box-primary">
               
                <div class="row">

                    <div class="col-lg-4">
                        <div class="col-md-12 well text-center">
                            <?php echo form_open_multipart('photo/photo/add_album');?>
                            <div class="form-group">
                                    <input type="hidden" name="profession_post" value="<?php echo $user_info['profession'];?>">
                                    <input type="hidden" name="user_id_post" value="<?php echo $user_id;?>">
                                    <label for="album" class="sr-only">Create Album</label>
                                    <input type="text" name="album_name_post" id="album" placeholder="Create Album" required class="form-control" />
                                </div>
                               <button type="submit" name="insert" class="btn btn-success">Create Album</button>
                            </form>
                        </div>
                    </div>


                      <div class="col-lg-8">

                          <?php
                          if($album>0){
                          foreach ($album as $row):?>

                              <?php
                              $photo=$this->db->select("*")->where('album_id',$row->album_id)->get("photos");
                              $n_o_photos=$photo->num_rows();
                              if($n_o_photos>0){
                                  $class="small-box bg-aqua";
                              }else{
                                  $class="small-box bg-yellow";
                              }?>



                              <div class="col-md-6 col-xs-12">
                                  <div class="<?php echo  $class;?>">
                                      <div class="inner">
                                          <h3><sup style="font-size: 20px"><?php echo  $row->album_name;?></sup></h3>

                                          <p><?php
                                              $photo=$this->db->select("*")->where('album_id',$row->album_id)->get("photos");
                                              $n_o_photos=$photo->num_rows();
                                              if($n_o_photos>0){
                                                  echo $n_o_photos." photos in this album";
                                              }else{
                                                  echo "No photo in this album";
                                              }?></p>
                                      </div>
                                      <div class="icon">
                                          <i class="glyphicon glyphicon-picture"></i>
                                      </div>
                                      <a href="<?php echo base_url().'photo/photo/add_photo/'.$row->album_id?>" class="small-box-footer">
                                          Add Photo Now  <i class="fa fa-arrow-circle-right"></i>
                                      </a>


                                      <?php
                                      if($user_id==$row->user_id){
                                          ?>

                                          <div class="box-footer">
                                              <?php echo anchor("Photo/photo/add_photo/".$row->album_id,"Add Photo","class='btn btn-success'");?>
                                              <?php echo anchor("Photo/photo/update/".$row->album_id,"Edit","class='btn bg-orange'");?>

                                              <?php echo anchor("Photo/photo/delete_album/".$row->album_id,"Delete","class='btn btn-danger  delete_exchange'");?>

                                          </div>

                                      <?php }?>

                                  </div>






                                  <!-- /.info-box -->
                              </div>
                          <?php endforeach;}?>
                      </div>


                </div>
            </div>
        </section>
    </div>
<script>
    $(document ).ready(function() {
        $(".info-box").hover(function () {
            $(".info-box").removeClass('bg-aqua');
            $(".info-box").addClass('bg-red');
            $(".info-box").removeClass('bg-red');
        });
        $('.delete_exchange').click(function() {
            return confirm("Do You Want To Really Delete?");
        });
    });

</script>
