<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">


        <meta name="_token" content="<?php echo e(csrf_token()); ?>">

        <title>Transportation</title>
        <link rel="apple-touch-icon" href="<?php echo e(asset('app-assets/images/ico/apple-icon-120.png')); ?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('app-assets/images/ico/favicon.ico')); ?>">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/fonts/feather/style.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/fonts/font-awesome/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/fonts/flag-icon-css/css/flag-icon.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/extensions/pace.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/extensions/unslider.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/weather-icons/climacons.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/fonts/meteocons/style.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/charts/morris.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/forms/selects/select2.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')); ?>">


        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/pickers/daterange/daterangepicker.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/pickers/datetime/bootstrap-datetimepicker.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/pickers/pickadate/pickadate.css')); ?>">

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
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/fonts/simple-line-icons/style.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/core/colors/palette-gradient.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/pages/timeline.min.css')); ?>">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->

<!--        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/plugins/pickers/daterange/daterange.min.css')); ?>">-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/plugins/forms/wizard.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/extensions/sweetalert.css')); ?>">

        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')); ?>">
        <!-- END VENDOR CSS-->
        <!--        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">-->
        <!-- END Custom CSS-->
    </head>
    <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

        <?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>



        <div class="modal fade" id="loaderModal" data-keyboard="false" data-backdrop="static" role="dialog" >
            <div class="modal-dialog" role="document">


                <div  id="loader" style="margin-top:30% ">
                    <img src="<?php echo e(asset('img/load.gif')); ?>">

                    <span class="loader-text">Filtering Results...</span>
                </div>


            </div>
        </div>
        <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('dashboard'); ?>
        <?php echo $__env->yieldContent('userjs'); ?>
        <?php echo $__env->yieldContent('scripts'); ?>

    </body>
</html>