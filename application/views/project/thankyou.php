<main class="main-wrapper">
<section class="content-wrapper">
<div class="container">
    <div class="row">
        <div class="col-xs-12">
        <ul class="breadcrumb">

            <li class="completed"><a href="javascript:void(0);">My Land Process </a></li>
            <li class="completed"><a href="javascript:void(0);">Payment & Review Process</a></li>
            <li class="completed"><a href="javascript:void(0);">Thanks you</a></li>

        </ul>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row">

        <div class="jumbotron text-xs-center">
            <?php if($success == 'success'){?>
            <h1 class="display-3">Thank You!</h1>
            <p class="lead"><strong>You are successfully fund this project. </strong></p>
            <?php }else{?>
                <h1 class="display-3">Something going Wrong!</h1>
                <p class="lead"><strong>You don't have sufficient amount to fund to all selected project. Please check your credit and then try again.</strong></p>
            <?php }?>
            <hr>

            <p class="lead">
                <a class="btn btn-primary btn-sm" href="<?php echo base_url() ?>" role="button">Continue to funding</a>
            </p>
        </div>
        </div>
    </div>

    </section>
</main>