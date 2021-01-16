<!DOCTYPE html>
<html>

    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- Bootstrap -->
        <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet">
        <!-- end of bootstrap -->
        <!--page level css -->
        <link type="text/css" href="<?php echo e(asset('vendors/themify/css/themify-icons.css')); ?>" rel="stylesheet"/>
        <link href="<?php echo e(asset('vendors/iCheck/css/all.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css')); ?>" rel="stylesheet"/>
        <link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/sweetalert2/css/sweetalert2.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom_css/sweet_alert2.css')); ?>">

        <!--end page level css-->
    </head>




    <body id="sign-in">
        <div class="preloader">
            <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-10 col-sm-8 mx-auto login-form">

                    <h2 class="text-center logo_h2">
                        U&I TRANSPORT
                    </h2>



                    <?php echo $__env->yieldContent('content'); ?>

                </div>
            </div>
        </div>
        <!-- global js -->

        <!-- end of page level js -->

        <script src="<?php echo e(asset('js/jquery.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('js/popper.min.js')); ?>" type="text/javascript"></script>

        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>" type="text/javascript"></script>
        <!-- end of global js -->
        <!-- page level js -->
        <script type="text/javascript" src="<?php echo e(asset('vendors/iCheck/js/icheck.js')); ?>"></script>
        <script src="<?php echo e(asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')); ?>" type="text/javascript"></script>
<!--        <script type="text/javascript" src="<?php echo e(asset('js/custom_js/login.js')); ?>"></script>-->
        <script type="text/javascript" src="<?php echo e(asset('vendors/sweetalert2/js/sweetalert2.min.js')); ?>"></script>
        <?php echo $__env->yieldContent('loginjs'); ?>

    </body>

</html>


<!-- Localized -->