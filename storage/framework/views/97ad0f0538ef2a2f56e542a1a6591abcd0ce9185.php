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
            Revenue
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-fw ti-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Revenue</a>
            </li>
            <li class="active">
                New Revenue 
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">

        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-fw ti-pencil"></i>  Revenue Form
                </h3>
                <span class="float-right hidden-xs txt_font">
                    <i class="fa fa-fw ti-angle-up clickable"></i>
                    <i class="fa fa-fw ti-close removecard"></i>
                </span>
            </div>
            <div class="card-body">

                <form class="form-horizontal" role="form" id="revenueForm">
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
                            <div class="form-group ">
                                <label> Amount</label>
                                <div>
                                    <input type='text'  name="amount"  required class="form-control" />

                                </div>

                            </div>
                            <div class="form-group ">
                                <label>Any Comments</label>
                                <div>
                                    <textarea name="description" style="width: 100%;resize: none;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">

                                <label>Date of Payment</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-fw ti-calendar"></i>
                                    </div>
                                    <input type='text' id="date_of_expense" 
                                           data-provide="date_of_payment" name="date_of_payment" 
                                           required class="datepicker form-control" />
                                </div>
                            </div>

                            <div class="form-group ">
                                <label>Payment Mode</label>
                                <div>
                                    <select class="form-control select2" id="paymentMode" style="width: 100%" name="paymentMode" required>
                                        <option value="">Select  ---</option>
                                        <option value="Mobile Money">Mobile Money</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label>Revenue Type</label>
                                <div>
                                    <select class="form-control select2" id="revenueTypes" style="width: 100%" name="revenueType" required>
                                        <option value="">Select  ---</option>
                                        <option value="Rental">Rental</option>

                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="text-right ">
                        <button class="button button-3d button-primary button-rounded btn_3d"
                                type="submit">Submit</button>

                    </div>

                </form>
            </div>

        </div>
    </section>
    <!-- /.content -->
</aside>

<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('userjs'); ?>
<script src="<?php echo e(asset('js/configuration.js')); ?>"></script>
<script src="<?php echo e(asset('js/vehicle.js')); ?>"></script>
<script src="<?php echo e(asset('js/revenue.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>