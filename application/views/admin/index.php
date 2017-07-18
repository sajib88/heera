<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $page_title; ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>/dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Registration</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="<?php echo base_url('registration/registration/index'); ?>" method="post" enctype="multipart/form-data">
                                            <div  class="form-group">
                                                <label>Selects Profession</label>
                                                <select name="proffession_id" class="form-control">
                                                    <option value="1">Doctor</option>
                                                    <option value="2">PHD</option>
                                                    <option value="3">Low</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label> Full Name</label>
                                                <input type="text" name="full_name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label> User Name</label>
                                                <input type="text" name="user_name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label> Email</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label> Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label> Confirm Password</label>
                                                <input type="password" name="conf" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label> Document Upload</label>
                                                <input name="image" type="file">
                                            </div>
                                            <input type="submit" name="submit" class="btn btn-default" value="Submit">
                                        </form>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>/dist/js/sb-admin-2.js"></script>
    </body>
</html>
