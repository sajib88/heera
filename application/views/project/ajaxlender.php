
<form  id="myForm" name="myForm" method="post" action="#">
    <div  id="foo"><div>
        <input name="projectid" type="hidden" value="<?php echo $projectData['projectID']; ?> ">
        <div class="form-group">
            <p>Select  Amount </p>
            <select name="outAmount" class="form-control">
                <option value="25">$25</option>
                <option value="50">$50</option>
                <option value="100">$100</option>

            </select>
        </div>


        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

            <a id="submitbutton" class="btn btn-primary" value="Lend Now" >Lend Now</a>
        </div>


    </form>


    <script>

        $("#submitbutton").click(function(e){

            var base_url = '<?php echo base_url() ?>';
            $.ajax({
                url: "<?php echo base_url(); ?>home/projectfund",
                type: 'POST',
                data: $("#myForm").serialize(),
                success: function(msg){console.log(msg);

                    if(msg == 'success'){
                        // show success meessage
                        var msg = "<div class='alert alert-success'>You  fund this project</div>";
                       $('#foo').html(msg);

                        $('#myModal').show(0).delay(4000).hide(0);

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