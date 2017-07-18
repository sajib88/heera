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



                      <div class="col-lg-12">

                          <?php
                          if($album>0){
                          foreach ($album as $row):?>


                              <?php
                              $photo=$this->db->select("*")->where('album_id',$row->album_id)->get("photos");
                              $n_o_photos=$photo->num_rows();
                              if($n_o_photos>0){
                                  $class="small-box bg-aqua";
                              }else{
                                  $class="small-box bg-red";
                              }?>


                              <div class="col-md-4 col-xs-12">
                                  <div class="<?php echo  $class;?>">
                                      <div class="inner">
                                          <h3><sup style="font-size: 20px"><?php echo  $row->album_name;?></sup></h3>

                                          <p><?php
                                              $photo=$this->db->select("*")->where('album_id',$row->album_id)->get("photos");
                                              $n_o_photos=$photo->num_rows();
                                              if($n_o_photos>0){
                                                  echo $n_o_photos." photos in this album";
                                              }else{
                                                  echo "No photo Found";
                                              }?></p>
                                      </div>
                                      <div class="icon">
                                          <i class="glyphicon glyphicon-picture"></i>
                                      </div>
                                      <a href="<?php echo base_url().'photo/photo/add_photo/'.$row->album_id?>" class="small-box-footer">
                                          View This Album  <i class="fa fa-arrow-circle-right"></i>
                                      </a>



                                  </div>






                                  <!-- /.info-box -->
                              </div>
                          <?php endforeach;}?>
                      </div>


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
