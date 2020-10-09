<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data = $this->user_mo->get_user();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $data[0]['title']." - ".$title; ?></title>
        <meta content="Doctorist - Patient Management System" name="description" />
        <meta content="Landinghub(themesbrand)" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">

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
                        <img class="logo logo-admin" src="<?php echo base_url(); ?>assets/images/logo.png" height="30" alt="logo">
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Reset Password</h4>
                        <p class="text-muted text-center"><label class="status">Enter your email and instructions will be sent to you!</label></p>
                        <p class="text-muted text-center">Disabled in demo mode</p>
                        <form class="form-horizontal m-t-30">
                            <div class="form-group">
                                <label for="useremail">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your registered email" required="">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light disabled" type="submit" id="reset">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="text-white">Remember It ? <a href="<?php echo base_url(); ?>" class="font-500 font-14 text-white font-secondary"> Sign In Here </a> </p>
                <p class="text-white">© <?php $data = $this->user_mo->get_user(); echo date('Y').' '.$data[0]['title']; ?>. Crafted with <i class="mdi mdi-heart text-danger"></i> by Landinghub</p>
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

        <script>
            $('document').ready(function(){
                $('#reset').click(function(e){
                    e.preventDefault();
                    var email = $('#email').val();
                    if(email)
                    {
                        $.ajax({
                            type:'POST',
                            url:'../user_operation/recoverpassword',
                            dataType:'json',
                            data:{email:email},
                            success: function(data){
                                if(data.status == 1)
                                {
                                    $(".status").css('color','green');
                                    $('.status').html('Your password will be sent to your registered email.');
                                }
                                else
                                {
                                    $(".status").css('color','red');
                                    $('.status').html('Please enter your registered email.');
                                }
                            },
                            error:function()
                            {
                                alert('oops! Something went wrong!!!');
                            }
                        });
                    }
                    else
                    {
                        alert('Please enter your registered email.!!');
                        $('#email').focus();
                    }
                });
            });
        </script>
        
    </body>
</html>