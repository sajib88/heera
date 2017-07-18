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
                            <form role="form" method="post" id="personalform" enctype="multipart/form-data" action="<?php echo base_url('personal/Personal/search'); ?>">

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
                                            <label>City</label>
                                            <input name="city" type="text" placeholder="City" class="form-control">
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
                                            <label>I Am a:</label>
                                            <?php $iam = array('MAN'=>'Women looking for man','WOMAN'=>'Man Looking for women','GAY'=>'Man looking for man','LES'=>'Women looking for women');?>
                                            <select name="interestin" class="form-control chosen-select">
                                                <option value="">Select</option>
                                                <?php foreach ($iam as $key=>$value) {?>
                                                    <option value="<?php echo $key;?>"><?php echo $value?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Marital status</label>
                                            <?php $maritalstatus= array('Single','Attached','Divorced','Married','Separated','Widow','It\'s Complicated');?>
                                            <select name="maritalstatus" class="form-control chosen-select">
                                                <?php foreach ($maritalstatus as $row) {?>
                                                    <option value="<?php echo $row;?>"><?php echo $row?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Language</label>
                                            <?php $languages = array('English','Afrikaans','Arabic','Bulgarian','Burmese','Cantonese','Croatian','Danish','Dutch','Esperanto','Estonian','Finnish','French','German','Greek','Gujrati','Hebrew','Hindi','Hungarian','Icelandic','Indian','Indonesian','Italian','Japanese','Korean','Latvian','Lithuanian','Malay','Mandarin','Marathi','Moldovian','Nepalese','Norwegian','Persian','Polish','Portuguese','Punjabi','Romanian','Russian','Serbian','Spanish','Swedish','Tagalog','Taiwanese','Tamil','Telugu','Thai','Tongan','Turkish','Ukrainian','Urdu','Vietnamese','Visayan');?>
                                            <select name="lang" class="form-control chosen-select">
                                                <?php foreach ($languages as $row) {?>
                                                    <option value="<?php echo $row;?>"><?php echo $row?></option>
                                                <?php }?>
                                            </select>
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
                                if (count($result) <= 0) {
                                    ?>
                                    <div class="alert alert-info">No Personal</div>
                                <?php } else {
                                    if (!empty($result)) { ?>

                                        <table class="table table-hover">
                                            <thead>
                                            <tr>

                                                <th class="numeric">#</th>

                                                <th class="numeric"><?php echo 'title'; ?></th>

                                                <th class="numeric"><?php echo 'body'; ?></th>

                                                <th class="numeric"><?php echo 'ethnicity'; ?></th>

                                                <th class="numeric"><?php echo 'maritalstatus'; ?></th>

                                                <th class="numeric"><?php echo 'age'; ?></th>


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
                                                                class="label label-success"><?php echo $row->body; ?></span>
                                                        </td>
                                                        <td data-title="<?php echo 'ethnicity'; ?>"
                                                            class="numeric"><span
                                                                class="label label-info"><?php echo $row->ethnicity; ?></span>
                                                        </td>
                                                        <td data-title="<?php echo 'maritalstatus'; ?>"
                                                            class="numeric"><span
                                                                class="label label-warning"><?php echo $row->maritalstatus; ?></span>
                                                        </td>
                                                        <td data-title="<?php echo 'age'; ?>"
                                                            class="numeric"><span
                                                                class="label bg-purple"><?php echo $row->age; ?></span>
                                                        </td>

                                                    </tr>
                                                    <?php $i++;
                                                }
                                            } ?>
                                            </tbody>
                                        </table>
                                    <?php }
                                }
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
