<?php $__env->startSection('content'); ?>


<?php
$allvehicles = json_decode($vehicles);
$allparts = json_decode($parts);
?>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            Repairs / Fixing
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
                Repairs / Fixing 
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">

        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-fw ti-pencil"></i>   Repairs / Fixing Form
                </h3>
                <span class="float-right hidden-xs txt_font">
                    <i class="fa fa-fw ti-angle-up clickable"></i>
                    <i class="fa fa-fw ti-close removecard"></i>
                </span>
            </div>
            <div class="card-body">

                <form class="form-horizontal" role="form" id="repairForm">
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
                                <label>Type</label>
                                <div>
                                    <select class="form-control select2" id="type" style="width: 100%" name="type" required>
                                        <option value="">Select  ---</option>
                                        <option value="Fixing">Fixing</option>
                                        <option value="Replacement">Replacement</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label>Part</label>
                                <div>
                                    <select class="form-control select2" id="part" style="width: 100%" name="part" required>
                                        <option value="">Select  ---</option>
                                        <?php $__currentLoopData = $allparts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option value="<?php echo e($part->name); ?>"><?php echo e($part->name); ?> </option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Fixing date</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-fw ti-calendar"></i>
                                    </div>
                                    <input type='text' id="insurance_renewal_date" 
                                           data-provide="datepicker" name="fixing_date" 
                                           required class="datepicker form-control" />
                                </div>

                            </div>
                            <div class="form-group ">
                                <label>No of Days</label>
                                <small>(No of Days spent at the shop)</small>
                                <div>
                                    <input type='text'  name="noofdays" required class="form-control" />

                                </div>
                            </div>
                            <div class="form-group ">
                                <label>Amount</label>
                                <div>
                                    <input type='text'  name="amount" required class="form-control" />

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

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-fw ti-bus"></i> Repairs / Fixing
                </h3>

            </div>
            <div class="card-body">
                <table id="repairsTbl" class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>Chassis No</th>
                            <th>Front Number Plate</th>
                            <th>Type</th>
                            <th>Fixing Date</th>
                            <th>Days</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </section>
    <!-- /.content -->
</aside>

<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('userjs'); ?>
<script src="<?php echo e(asset('js/vehicle.js')); ?>"></script>
<script src="<?php echo e(asset('js/repairs.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>