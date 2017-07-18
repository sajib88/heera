<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/17/2016
 * Time: 5:05 PM
 */
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Search personal
            <small>search</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Personal</a></li>
            <li class="active">search</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" id="personalform" enctype="multipart/form-data" action="<?php echo base_url('ces/search'); ?>">

                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select onchange="getComboA(this)" name="country" id="js_country" class="form-control">
                                                <option value="">Select</option>
                                                <?php
                                                if (is_array($countries)) {
                                                    foreach ($countries as $country) {
                                                        $sel = ($country->id == set_value('country'))?'selected="selected"':'';
                                                        ?>
                                                        <option  value="<?php echo $country->id; ?>" <?php echo $sel;?> ><?php echo $country->name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <?php echo form_error('country');?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="result">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Profession</label><span id='profession_view-error' class='error' for='profession_view'></span>
                                            <select name="profession" class="selectpicker form-control">
                                                <option value="">All Profession</option>
                                                <?php
                                                if (is_array($profession)) {
                                                    foreach ($profession as $row) {
                                                        ?>
                                                        <option  value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Post Code</label>
                                            <input name="postcode" type="text" placeholder="Postcode" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Business Name</label>
                                            <input name="business_name" type="text" placeholder="Business Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Business phone</label>
                                            <input name="business_phone" type="text" placeholder="Business Phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>



                            </form>



                         </div>
                        <hr/>

                        <div class="box-body table-responsive no-padding">
                            <?php if(isset($result)) {
                                if (count($result) > 0)  { ?>

                                        <table class="table table-hover">
                                            <thead>
                                            <tr>

                                                <th class="numeric">#</th>

                                                <th class="numeric"><?php echo 'title'; ?></th>

                                                <th class="numeric"><?php echo 'Country'; ?></th>

                                                <th class="numeric"><?php echo 'State'; ?></th>

                                                <th class="numeric"><?php echo 'Price'; ?></th>

                                                <th class="numeric"><?php echo 'Special Price'; ?></th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if (!empty($result)) {
                                                $i = 1;
                                                foreach ($result as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td data-title="<?php echo 'title'; ?>"
                                                            class="numeric"><?php echo $row->title; ?></td>
                                                        <td data-title="<?php echo 'body'; ?>"
                                                            class="numeric"><span
                                                                class="label label-success"><?php echo countryNameByID($row->country); ?></span>
                                                        </td>
                                                        <td data-title="<?php echo 'ethnicity'; ?>"
                                                            class="numeric"><span
                                                                class="label label-info"><?php echo (!empty($row->state)?$row->state:''); ?></span>
                                                        </td>
                                                        <td data-title="<?php echo 'maritalstatus'; ?>"
                                                            class="numeric"><span
                                                                class="label label-warning"><?php echo (!empty($row->price)?$row->price:''); ?></span>
                                                        </td>
                                                        <td data-title="<?php echo 'age'; ?>"
                                                            class="numeric"><span
                                                                class="label bg-purple"><?php echo (!empty($row->special_price)?$row->special_price:'') ; ?></span>
                                                        </td>

                                                    </tr>
                                                    <?php $i++;
                                                }
                                            } ?>
                                            </tbody>
                                        </table>
                                    <?php }else{?>

                                    <div class='alert alert-danger alert-dismissable fade in'>
                                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>.&times;.</a>
                                        <strong>Data Not Found</strong>
                                    </div>

                              <?php  }
                            }?>
                        </div>
                    </div>
                 </div>
             </div>
         </div>



    </section>
</div>

<script>


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
