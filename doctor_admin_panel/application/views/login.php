<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data = $this->user_mo->get_user();
    if(!$data)
    {
        redirect(base_url('user/setup'));
    }
    else
    {
        if(isset($_SESSION['userinfo']))
        {
            redirect(base_url('user/dashboard'));
        }
        else
        {
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $data[0]['title']; ?> - Patient Management System</title>
        <meta content="Doctorist - Patient Management System" name="description" />
        <meta content="Landinghub(themesbrand)" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/<?php echo $data[0]['favicon']; ?>">

        <!-- Basic Css files -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">

    </head>

    <body class="fixed-left">
        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="card">
                <div class="card-block">
                    <h3 class="text-center m-0">
                        <a href="#" class="logo logo-admin"><img src="<?php echo base_url(); ?>assets/images/<?php echo $data[0]['logo']; ?>" height="30" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
                        <p class="text-muted text-center">Sign in to continue to Doctorist.</p>
                        <p class="text-danger text-center"><?php $data = $this->session->flashdata('msg'); echo $data; ?></p>
                        <form class="form-horizontal m-t-30" method="post" action="<?php echo base_url('user_operation/login'); ?>">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-sm-6">
                                    <label class="custom-control mt-2 custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                        <input type="checkbox" class="custom-control-input" checked>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Remember me</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <a href="<?php echo base_url('user/recoverpassword'); ?>" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="text-white">© <?php $data = $this->user_mo->get_user(); echo date('Y').' '.$data[0]['title']; ?> . Crafted with <i class="mdi mdi-heart text-danger"></i> by Landinghub</p>
            </div>
        </div>

        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>

    </body>
</html>
    <?php }}?>