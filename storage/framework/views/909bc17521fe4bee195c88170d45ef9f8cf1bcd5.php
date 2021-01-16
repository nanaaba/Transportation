<?php $__env->startSection('content'); ?>




<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                                    <i class="icon-camera font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-primary white media-body">
                                    <h5>Cars</h5>
                                    <h5 class="text-bold-400"><?php echo e($totalvehicles); ?></h5>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="p-2 text-xs-center bg-danger bg-darken-2 media-left media-middle">
                                    <i class="icon-user font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-danger white media-body">
                                    <h5>Drivers</h5>
                                    <h5 class="text-bold-400"><?php echo e($totaldrivers); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="p-2 text-xs-center bg-warning bg-darken-2 media-left media-middle">
                                    <i class="icon-user font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-warning white media-body">
                                    <h5>Assigned Cars</h5>
                                    <h5 class="text-bold-400"><?php echo e($assigncars); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="p-2 text-xs-center bg-success bg-darken-2 media-left media-middle">
                                    <i class="icon-user font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-success white media-body">
                                    <h5>UnAssigned Cars</h5>
                                    <h5 class="text-bold-400"> <?php echo e($unassignedcars); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $insurancesdue = json_decode($carsdueforinsurancesortaxes);
            $payments = json_decode($carsdueforpayments);
            $maintenance = json_decode($carsdueformaintenance);
            ?>


            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title"> Vehicles due for Payments</h6>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                        </div>
                        <div class="card-body collapse in">

                            <div class="card-block card-dashboard">
                                <table id="inflowTbl" class="table table-hover mb-0 ps-container ps-theme-default">
                                    <thead>
                                        <tr>

                                            <th>Car</th>   
                                            <th>Driver</th> 
                                            <th>Driver Contact</th> 
                                            <th>Start Date</th>
                                            <th>Payment Date</th>
                                            <th>Days left</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($single->car_number); ?></td>

                                            <td> </td>
                                            <td></td>
                                            <td><?php echo e($single->start_date); ?> </td>
                                            <td><?php echo e($single->end_date); ?> </td>

                                            <td><span class="tag tag-default tag-danger"><?php echo e($single->days_left); ?> days</span></td>


                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title"> Vehicles due for insurance/taxes</h6>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                        </div>
                        <div class="card-body collapse in">

                            <div class="card-block card-dashboard">
                                <table id="insuranceTbl" class="table table-hover mb-0 ps-container ps-theme-default">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Car</th>   
                                            <th>Driver</th> 
                                            <th>Driver Contact</th> 
                                            <th>Renewal Date</th>

                                            <th>Days left</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $insurancesdue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($single->type); ?></td>
                                            <td><?php echo e($single->car_number); ?> </td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php echo e($single->next_renewal_date); ?> </td>

                                            <td><span class="tag tag-default tag-danger"><?php echo e($single->days_left); ?> days</span></td>


                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title"> Vehicles due for maintenance</h6>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                        </div>
                        <div class="card-body collapse in">

                            <div class="card-block card-dashboard">
                                <table id="maintenanceTbl" class="table table-hover mb-0 ps-container ps-theme-default">
                                    <thead>
                                        <tr>

                                            <th>Car</th>   
                                            <th>Driver</th> 
                                            <th>Driver Contact</th> 
                                           
                                            <th>Maintenance Date</th>
                                            <th>Days left</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $maintenance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($single->car_number); ?></td>

                                            <td> </td>
                                            <td></td>
                                           
                                            <td><?php echo e($single->end_date); ?> </td>

                                            <td><span class="tag tag-default tag-danger"><?php echo e($single->days_left); ?> days</span></td>


                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('dashboard'); ?>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/extensions/unslider-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->

<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="app-assets/js/scripts/pages/dashboard-ecommerce.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script type="text/javascript">
$('#inflowTbl').DataTable();

$('#insuranceTbl').DataTable();
$('#maintenanceTbl').DataTable();

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>