<main class="main-wrapper">


    <section class="content-wrapper">
<div class="container">
    <div class="row">
        <div class="col-xs-12">
        <ul class="breadcrumb">

            <li class="completed"><a href="javascript:void(0);">My Land Process </a></li>
            <li class="completed"><a href="javascript:void(0);">Payment & Review Process</a></li>
            <li class="active"><a href="javascript:void(0);">Thanks you</a></li>

        </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12">



            <form id="" role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url('home/finalpayment'); ?>">
    <table class="table table-striped table-hover table-bordered">
        <tbody>
        <tr>
            <th>Item</th>
            <th><p class="text-center">Unit Price</p></th>
            <th><p class="text-center">QTY</p></th>
            <th><span class="pull-right">Total Price</span></th>
        </tr>
        <?php if(!empty($selectedProjects)) {
        $sum = 0;

        foreach ($selectedProjects as $checkout) {
            $duetotal = $sum+= $checkout['lendAmount']['lendAmount'];
         ?>


            <input type="hidden" name="projectid[]" value="<?php echo  $checkout[0]->projectID; ?>">
            <input type="hidden" name="outAmount[]" value="<?php echo  $checkout['lendAmount']['lendAmount']; ?>">
        <tr>
            <td><?php  echo $checkout[0]->name; ?></td>
            <td><p class="text-center">$<?php echo $checkout['lendAmount']['lendAmount']; ?></p></td>
            <td><p class="text-center">1</p></td>
            <td><p class="text-right">$<?php echo $checkout['lendAmount']['lendAmount']; ?></p></td>



        </tr>
        <?php }

        }
        ?>
        <input type="hidden" name="paytotal" value="<?php echo $duetotal; ?>">
        <tr>
            <th colspan="3"><span class="pull-right">Sub Total</span></th>
            <th><span class="pull-right">$<?php echo $duetotal; ?></span></th>
        </tr>

        <tr>
            <th colspan="3"><span class="pull-right">Total</span></th>
            <th><span class="pull-right">$<?php echo $duetotal; ?></span></th>
        </tr>

        <tr>
            <td><a href="#" class="btn btn-primary">Cancel</a></td>
            <td colspan="3">
                <button class="pull-right btn btn-success"  name="submit" type="submit">
                     Pay Now</button>
            </td>
        </tr>
        </tbody>
    </table>
                </form>
        </div>
        </div>
</div>
    </section>
</main>


