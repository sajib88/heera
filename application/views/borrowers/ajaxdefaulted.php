
<link href="<?php echo base_url('backend/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('backend/no_more_table.css');?>" rel="stylesheet">

<form id="myForm"  method="post"  action="#">

    <div id="foo"></div>

    <input type="hidden" value="<?php echo $projectid ?>" name="projectid">

<div class="row">

            <div class="col-md-12">

                <div class="box-body box-profile no-padding">
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="list-group list-group-unbordered">

                            <li class="list-group-item">
                                <b>Are You want to Sure this project goes to Defaulted ? </b>

                            </li>


                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>

        </div>









<div class="modal-footer">
    <div class="row">
        <div class="col-md-6">
            <button data-dismiss="modal" class="btn btn-danger btn-lg pull-left" type="button">
                <i class="fa fa-undo"></i> &nbsp; &nbsp; Cancel</button>
        </div>
        <div class="col-md-6">
            <button id="getrepayment"   class="btn  btn-success  btn-lg" id="submitbutton" name="loginStatus" type="submit">
                <i class="fa fa-check"></i> &nbsp; Change Status</button>

        </div>
    </div>

</div>



</form>



<script>
    $(function(){
        $("#getrepayment").click(function(e){
            var base_url = '<?php echo base_url() ?>';


            $.ajax({
                url:base_url + "borrowers/borrowers/makedefaulted/",
                type: 'POST',
                data: $("#myForm").serialize(),
                success: function (msg) {

                    if (msg == 'success') {
                        // show success meessage
                        var msg = "<div class='alert alert-success'>Project status Change to Defaulted </div>";
                        $('#foo').html(msg);
                    }
                    else {
                        var msg = "<div class='alert alert-danger'>Status Error </div>";
                        $('#foo').html(msg);
                    }
                },

            });
            e.preventDefault();
        });
    });
</script>
