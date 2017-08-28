<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">


<form id="myForm" name="myForm" method="post" class="form-horizontal">
    <input type="hidden" value="<?php echo $projects[0]->lenderID; ?>" name="lenderID">
<div id="mgs"></div>
<div class="col-md-12 no-padding" >
    <section class="panel">
        <div class="panel-body">
                <div class="form-group">
                    <label for="name" class="col-md-4 label-control">Project Name<span class="error">*</span></label>
                    <div class="col-md-6">
                        <select name="projectID" class="form-control chosen-select" id="projectID">
                            <option value="">Select Project</option>
                            <?php foreach ($projects as $row) {?>
                                <option value="<?php echo $row->projectID;?>"><?php echo $row->name?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 label-control">Repaid Amount<span class="error">*</span></label>
                    <div class="col-md-6">
                        <input name="repaidAmount" value=""  class="form-control">
                    </div>
                </div>

        </div>
    </section>
</div>

<div class="modal-footer">
    <div class="row">
        <div class="col-md-6">
            <button data-dismiss="modal" class="btn btn-danger btn-lg pull-left" type="button">
                <i class="fa fa-undo"></i> &nbsp; &nbsp; Cancel</button>
        </div>
        <div class="col-md-6">
            <button id="getlenderRefund"   class="btn  btn-success  btn-lg" id="submitbutton" name="loginStatus" type="submit">
                <i class="fa fa-check"></i> &nbsp; Repaid Now</button>
        </div>
    </div>
</div>
</form>
<script>
    $(function(){
        $("#getlenderRefund").click(function(e){
            if($("#myForm").valid()) {
                var base_url = '<?php echo base_url() ?>';
                $.ajax({
                    url: base_url + "repaymentprocess/lenderRefund/",
                    type: 'POST',
                    data: $("#myForm").serialize(),
                    success: function (msg) {
                        console.log(msg);
                        if (msg == 'success') {
                            // show success meessage
                            var msg = "<div class='alert alert-success'>Repayment Successfully.  </div>";
                            $('#mgs').html(msg);
                        }
                        else {
                            var msg = "<div class='alert alert-danger'>Repayment Error </div>";
                            $('#mgs').html(msg);
                        }
                    },

                });
            }
            e.preventDefault();
        });
    });
</script>

<script type="application/javascript">
    $('#myForm').validate({
        rules: {
            projectID: {
                required:true,
            },

            repaidAmount: {
                required:true,
            }
        },
        messages:{
            projectID: {
                required: "Project Name is Required",
            },

            repaidAmount: {
                required: "Repaid Amount is Required",
            }
        }
    });
</script>