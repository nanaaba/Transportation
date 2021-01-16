<?php $__env->startSection('content'); ?>

<aside class="right-side">
    <section class="content-header">
        <!--section starts-->
        <h1>
            General Dashboard
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-fw ti-home"></i> Dashboard
                </a>
            </li>

            <li class="active">
                General Dashboard
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-xl-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front">
                        <div class="bg-icon float-left">
                            <i class="ti-car text-warning"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b><?php echo e($totalvehicles); ?></b></h3>
                            <p>Vehicles</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-xl-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front">
                        <div class="bg-icon float-left">
                            <i class="ti-user text-success"></i>
                        </div>
                        <div class="text-right">
                            <h3><b id="widget_count3"><?php echo e($totaldrivers); ?></b></h3>
                            <p>Drivers</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-xl-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front">
                        <div class="bg-icon float-left">
                            <i class="ti-wheelchair text-danger"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b>1532</b></h3>
                            <p>Assigned Vehicles</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-xl-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front">
                        <div class="bg-icon float-left">
                            <i class="ti-shopping-cart text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b>1252</b></h3>
                            <p>UnAssigned Vehicles</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12  ">

            <div class="chart-container">
                <span class="">
                    <i class="ti-reload redraw-cart float-right set-animate"></i>
                </span>
                <canvas id="revenue-expense-chart" width="800" height="300"></canvas>
            </div>       
        </div>

        </div>
    </section>

</aside>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('userjs'); ?>
<script src="<?php echo e(asset('vendors/chartjs/js/Chart.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/custom_js/chartjs-charts.js')); ?>"></script>

<!-- END PAGE LEVEL JS-->

<script type="text/javascript">

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>