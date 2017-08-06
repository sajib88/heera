<div class="container">
    <div class="row">
        <div class="col-xs-12">
        <ul class="breadcrumb">

            <li class="completed"><a href="javascript:void(0);">My Land process </a></li>
            <li class="active"><a href="javascript:void(0);">Payment & Review process</a></li>
            <li><a href="javascript:void(0);">Thanks you</a></li>

        </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span> My land</h5>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary btn-sm btn-block">
                                    <span class="glyphicon glyphicon-share-alt"></span> Find more Loans
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">





                        <?php if(!empty($selectedProjects)) {
                            $sum = 0;
                            foreach ($selectedProjects as $checkout) {
                                //echo "<pre>";
                                //print_r($checkout);
                                //echo "</pre>";
                               $duetotal = $sum+= $checkout['lendAmount']['lendAmount'];


                                ?>
                        <form id="bankvalidation" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('home/checkout'); ?>">
                            <input type="hidden" name="updatecart" value="99">
                            <input type="hidden" name="login_id" value="<?php echo $user_info['id']; ?>">
                            <input type="hidden" name="pid" value="<?php echo  $checkout[0]->projectID; ?>">
                        <div class="col-md-12 bottocheckout">
                                <div class="col-xs-2">
                                    <img class="img-responsive"
                                                           src="<?php echo base_url().'assets/file/project/'.$checkout[0]->mainImage; ?>">
                                </div>
                                <div class="col-xs-4">
                                    <h4 class="product-name"><strong><?php  echo $checkout[0]->name; ?></strong></h4>
                                    <h4>
                                        <small><?php  echo $checkout[0]->shortDescription; ?></small>
                                    </h4>
                                </div>
                                <div class="col-xs-6">
                                    <div class="col-xs-6 text-right">
                                        <h6><strong ><span
                                                     class="text-muted fa fa fa-usd"></span>  <?php echo $checkout['lendAmount']['lendAmount']; ?> </strong></h6>
                                    </div>
                                    <div class="col-xs-4">
                                        <?php $projectamount = $checkout['lendAmount']['lendAmount'];?>

                                        <select id=""  name="lendAmount" class="form-control selectedAmountDropDown">
                                            <option value="25" <?php if($projectamount === '25'){echo 'selected';}?>>$25</option>
                                            <option value="50" <?php if($projectamount === '50'){echo 'selected';}?>>$50</option>
                                            <option value="100" <?php if($projectamount === '100'){echo 'selected';}?>>$100</option>

                                        </select>
                                    </div>


                                    <div class="col-xs-2">
                                        <button type="submit"  class="btn btn-link btn-large">
                                            <span class="glyphicon glyphicon-trash"> <?php echo $checkout[0]->projectID; ?> </span>
                                        </button>
                                    </div>
                                </div>
                            <div class="hrcheckoutpage"></div>
                        </div>
                        </form>




                                <?php
                            }
                        }else {

                            echo "no project found";
                        }
                        ?>

                    </div>




                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Total Due <strong id="dueTotalAmount">$ <?php echo $duetotal; ?></strong></h4>
                        </div>
                        <div class="col-xs-3">
                            <button type="button" class="btn btn-success btn-block">
                                Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /*function myFunction(selectObject) {
        var x = selectObject.value;
        document.getElementById("demo").innerHTML = "" + x;
    }*/

    //function calculateTotalDue(){
    //
    $(document).ready(function() {
        //$(".selectedAmountDropDown").change(function () {
        //$(".selectedAmountDropDown").live('change', function () {
          $('.selectedAmountDropDown').on('change', function() {
            //var values = [];

            var total = 0;
            $('.selectedAmountDropDown').each(function () {
                value = $(this).val();//$('select.selectedAmountDropDown option:selected').val();
                alert(value);
                total += parseFloat(value); //parseFloat($(this).attr('value'));
                //values.push( $(this).attr('value') );
            });

            $('#dueTotalAmount').html('$' + total);
        });


    });

</script>