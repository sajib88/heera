
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Users</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php
            if (is_array($users) && count($users)) {
                foreach ($users as $usrInfo) {
                    ?>
                    <div class="col-lg-6">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <b>  User Name </b>  : <?php echo $usrInfo->user_name; ?><br/>
                                <b>  Profession Type </b>  : <?php
                                $data = get_data('profession', array('id' => $usrInfo->profession));
                                echo $data['name'];
                                ?><br/>
                                <b>  Gender </b>  : <?php echo $usrInfo->gender; ?><br/>
                                <b>  Country </b>  : <?php
                                $data = get_data('countries', array('id' => $usrInfo->country));
                                echo $data['name'];
                                ?><br/>
                                <a href="<?php echo base_url('admin/users/changeUserStatus') . '/' . $usrInfo->id . '/' . $usrInfo->status; ?>">
                                    <?php
                                    if ($usrInfo->status == 1) {
                                        echo '<button class="btn btn-success">Active</button>';
                                    } else {
                                        echo '<button class="btn btn-success">Inactive</button>';
                                    }
                                    ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
</div>


