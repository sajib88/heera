
<form  id="myForm" name="myForm" method="post" action="#">

    <div id="foo"><div>

            <input name="projectID" type="hidden" value="<?php  echo ($projectData);?>">
            <input name="adminApprovalStatus" type="hidden" value="Rejected">

            <div class="row">
            <div class="col-md-12 ">
                <div class="form-group">

                    <label>Reason Description<span class="error">*</span></label>
                    <textarea required="required"  name="shortDescription" class="form-control"></textarea>

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
                        <button  class="btn  btn-success  btn-lg" id="submitbutton" name="loginStatus" type="submit">
                            <i class="fa fa-check"></i> &nbsp; &nbsp; Update</button>

                    </div>
                </div>

            </div>


 </form>

    <script>

        $("#submitbutton").click(function(e){

            var base_url = '<?php echo base_url() ?>';
            $.ajax({
                url: "<?php echo base_url(); ?>project/project/rejectProject",
                type: 'POST',
                data: $("#myForm").serialize(),
                success: function(msg){console.log(msg);

                    if(msg == 'success'){
                        $('#myModal').modal('hide');
                        // show success meessage
                        var msg = "<div class='alert alert-danger'>Sorry! Currently Your Project Rejected.</div>";
                       $('#foo').html(msg);

                        ///$('#myModal').show(0).delay(4000).hide(0);

                       // window.location.href=base_url + "project/Project/all/"+id;


                    }
                    else{
                        // show error meessage

                    }
                }
            });

            e.preventDefault();
        });
    </script>