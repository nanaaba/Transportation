<?php $__env->startSection('content'); ?>
<?php
$allvehicles = json_decode($vehicles);
?>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            Maintenance
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-fw ti-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Vehicles</a>
            </li>
            <li class="active">
                Maintenance 
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <form class="form-horizontal" role="form" id="maintenanceForm">
            <div class="row">
                <div class="col-md-5">
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-fw ti-pencil"></i> Maintenance Form
                            </h3>

                        </div>
                        <div class="card-body">


                            <?php echo e(csrf_field()); ?>


                            <input type="hidden" id="vehicleCode" name="vehicleCode"/>


                            <div class="form-group ">
                                <label>Vehicle</label>
                                <div>
                                    <select class="form-control select2" id="vehicle" style="width: 100%" name="vehicle" required>
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
                                <label>Description</label>
                                <div>
                                    <textarea name="description" required  style="width: 100%;resize: none;"></textarea>
                                </div>
                            </div>

                            <div class="form-group ">

                                <label>Maintenance Date</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-fw ti-calendar"></i>
                                    </div>
                                    <input type='text' id="insurance_renewal_date" 
                                           data-provide="datepicker"  name="renewal_date" 
                                           required class="datepicker form-control" />
                                </div>
                            </div>



                            <div class="form-group ">
                                <label>Total Amount</label>
                                <div>
                                    <input type='text'  id="totalAmount"  name="totalAmount" value="0.0" readonly required class="form-control" />

                                </div>

                            </div>




                        </div>

                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-fw ti-pencil"></i> Maintenance Details
                            </h3>

                        </div>
                        <div class="card-body">

                            <div id="maintenanceDiv">
                                <input type="hidden" name="maintenancecount" value="1" />

                                <div class="row">
                                    <div class="col-md-5">                                     
                                        <div class="form-group form-focus select-focus">
                                            <label class="control-label">Repairs</label>
                                            <select class="select  select2 repairs " required name="repairs[]">
                                                <option value="">Select ---</option>

                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group form-focus">
                                            <label class="control-label">Amount</label>
                                            <input type="text" name="amount[]" required class="form-control floating maintenanceamount">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <br>
                                        <div class="add-more">
                                            <a href="#" class="btn btn-primary add-maintenance" id="maintenanceAdd"><i class="fa fa-plus"></i> Add </a>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="text-right ">
                <button class="button button-3d button-primary button-rounded btn_3d"
                        type="submit">Submit</button>

            </div>
        </form>


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