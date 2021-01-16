<?php $__env->startSection('content'); ?>

<?php
$allvehicles = json_decode($vehicles);
$alldrivers = json_decode($drivers);
?>


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            Vehicle Driver Assignment
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-fw ti-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Drivers</a>
            </li>
            <li class="active">
                Assignment 
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">

        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-fw ti-pencil"></i>   Vehicle Driver Assignment Form
                </h3>

            </div>
            <div class="card-body">

                <form class="form-horizontal" role="form" id="vehicleAssignmentForm">
                    <?php echo e(csrf_field()); ?>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Vehicle</label>
                                <div>
                                    <select class="form-control select2" id="vehicleCode" style="width: 100%" name="vehicleCode" required>
                                        <option value="">Select  ---</option>
                                        <?php $__currentLoopData = $allvehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $vehicleid = $vehicle->id;

                                        $parameter = Crypt::encrypt($vehicleid);
                                        ?>
                                        <option value="<?php echo e($parameter); ?>"><?php echo e($vehicle->front_number_plate); ?> </option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="region" class="control-label">Date Purchased:</label>
                                <input type="text" id="datepurchased" class="form-control" readonly>  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Driver</label>
                                <div>
                                    <select class="form-control select2" id="driverCode" style="width: 100%" name="driverCode" required>
                                        <option value="">Select  ---</option>
                                        <?php $__currentLoopData = $alldrivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $driverid = $driver->id;

                                        $parameter = Crypt::encrypt($driverid);
                                        ?>
                                        <option value="<?php echo e($parameter); ?>"><?php echo e($driver->name); ?> </option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  last">
                                <label class="label-control"> Date Assigned </label>
                                <div class="">
                                    <div class="input-group date datetimepicker">
                                        <input type="text" name="date_assigned"
                                               id="dateassigned" 
                                               class="form-control datepicker"
                                               required="" data-provide="datepicker"/>
                                   
                                      
                                    </div>

                                </div>
                            </div>

                        </div>


       
            </div>

                    <br><br>
                                   
  <div class="row" style="float: right">
                        <div class="form-actions pull-right">

                            <button class="button button-3d button-action button-pill btn_3d">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
        </div>


    </section>
    <!-- /.content -->
</aside>

<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('userjs'); ?>
<script src="<?php echo e(asset('js/configuration.js')); ?>"></script>
<script src="<?php echo e(asset('js/vehicle.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>