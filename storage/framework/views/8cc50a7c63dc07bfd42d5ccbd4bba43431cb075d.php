<!DOCTYPE html>
<html>

    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <title>Login Page</title>

        <link rel="apple-touch-icon" href="<?php echo e(asset('app-assets/images/ico/apple-icon-120.png')); ?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('app-assets/images/ico/favicon.ico')); ?>">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/fonts/feather/style.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/fonts/font-awesome/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/fonts/flag-icon-css/css/flag-icon.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/extensions/pace.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/forms/icheck/icheck.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/forms/icheck/custom.css')); ?>">
        <!-- END VENDOR CSS-->
        <!-- BEGIN STACK CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/bootstrap-extended.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/app.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/colors.min.css')); ?>">
        <!-- END STACK CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/core/menu/menu-types/vertical-overlay-menu.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/core/colors/palette-gradient.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/pages/login-register.min.css')); ?>">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <!-- END Custom CSS-->
    </head>

    <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
        <?php echo $__env->yieldContent('content'); ?>
        <!-- global js -->
        <!-- BEGIN VENDOR JS-->
        <script src="<?php echo e(asset('app-assets/vendors/js/vendors.min.js')); ?>" type="text/javascript"></script>
        <!-- BEGIN VENDOR JS-->
        <!-- BEGIN PAGE VENDOR JS-->
        <script src="<?php echo e(asset('app-assets/vendors/js/forms/icheck/icheck.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')); ?>" type="text/javascript"></script>
        <!-- END PAGE VENDOR JS-->
        <!-- BEGIN STACK JS-->
        <script src="<?php echo e(asset('app-assets/js/core/app-menu.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('app-assets/js/core/app.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('app-assets/js/scripts/customizer.min.js')); ?>" type="text/javascript"></script>
        <!-- END STACK JS-->
        <!-- BEGIN PAGE LEVEL JS-->
        <script src="<?php echo e(asset('app-assets/js/scripts/forms/form-login-register.min.js')); ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL JS-->
   
     <?php echo $__env->yieldContent('loginjs'); ?>
    </body>

</html>

<!-- Localized -->