

            <div class="panel panel-info">

                <div class="panel-body">
                    <div class="row">





                        <?php if(!empty($selectedProjects)) {
                            $sum = 0;
                            $i = 1;
                            foreach ($selectedProjects as $checkout) {


                                if ($i % 2 == 0)
                                    $color =  "";
                                else
                                    $color =  "odd";

                               $duetotal = $sum+= $checkout['lendAmount']['lendAmount'];


                                ?>
                        <form id="" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('home/payment'); ?>">
                            <input type="hidden" name="updatecart[]" value="99">
                            <input type="hidden" name="login_id[]" value="<?php echo $user_info['id']; ?>">
                            <input type="hidden" name="pid[]" value="<?php echo  $checkout[0]->projectID; ?>">
                        <div class="col-md-12 bottocheckout <?= $color ?>">
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
                                        <h6><strong >  </strong></h6>
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


                                        <a href="#" value="Lend Now" id='pid' data-id="<?php echo $checkout[0]->projectID; ?>" type="button" id="myClass" class="glyphicon glyphicon-trash clickajaxbutton">


                                        </a>
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
                <?php if(isset($duetotal)){?>
                    <div class="panel-footer">
                        <div class="row text-center">
                            <div class="col-xs-9">
                                <div class="pull-left"><a href="<?php echo base_url('home/getPurpose'); ?>"><h4>Find more loans</h4></a> </div>
                                <div class="pull-right"> <h4 class="text-right">Total Due <strong id="dueTotalAmount">$ <?php echo $duetotal; ?></strong></h4></div>

                                <input type="hidden" id="hiddenpass" name="updatecart" >
                            </div>
                            <div class="col-xs-3">
                                <button type="button" class="btn btn-success btn-block">
                                    Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>



            <script>

                $(document).ready(function() {
                    //$(".selectedAmountDropDown").change(function () {
                    //$(".selectedAmountDropDown").live('change', function () {
                    $('.selectedAmountDropDown').on('change', function() {
                        //var values = [];

                        // Update session array with selcted amount
                        var selectedAmount= $(this).val()
                        //alert(getselectdata)data-pid;
                        var id=$(this).data('id');

                        var base_url = '<?php echo base_url() ?>';

                        $.ajax({
                            type: 'POST',
                            data: {id:id,selectedAmount:selectedAmount},
                            url: base_url + "home/getarrayajax/", //this file has the calculator function code
                            success:function(data){
                                // $('#updatecart').html(data);
                            }
                        });

                        // Update Total Value
                        var total = 0;
                        $('.selectedAmountDropDown').each(function () {
                            value = $(this).val();//$('select.selectedAmountDropDown option:selected').val();
                            console.log(total);
                            total += parseFloat(value);

                        });

                        $('#dueTotalAmount').html('$' + total);
                        $('#hiddenpass').val(+ total);

                    });


                });

            </script>


            <script>



                $(".clickajaxbutton").click(function(e){


                    var id=$(this).data('id');

                    var base_url = '<?php echo base_url() ?>';

                    $.ajax({
                        type: 'GET',
                        url: base_url + "home/updatecart/"+id, //this file has the calculator function code
                        //data: id,
                        success:function(data){
                            $('#updatecart').html(data);
                        }
                    });


                });

            </script>