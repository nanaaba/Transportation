<?php $__env->startSection('content'); ?>

<?php
$cars = json_decode($cardata, true);
$taxes = json_decode($taxhist);
$insurances = json_decode($insurancehist);
$maintenance = json_decode($maintenacehist);
$inflow = json_decode($inflows);
$program = json_decode($programs);

//           print_r($cars);
?>


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            Vehicle Information
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
                Information 
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">

        <section class="content">

            <div class="row" id="complex-form2">
                <!--5th tab bank application starting-->
                <div class="col-lg-12">
                    <form class="grid-form form-horizontal" id="savevehicleform">

                        <?php echo e(csrf_field()); ?>


                        <div class="text-center">
    <!--                        <img src="<?php echo e(asset('img/pages/complexform1.png')); ?>" alt="bank name" width="200">-->

                            <h3>Vehicle Registration Form</h3>
                        </div>

                        <fieldset>
                            <legend>(A) Car Information</legend>
                            <div data-row-span="4">
                                <div data-field-span="4">

                                    <div class="form-group row">
                                        <label for="first_appl" class="col-md-2"> Chassis Number:</label>
                                        <div class="col-md-10">

                                            <input type="text"  class="form-control "  name="chasis_number" required>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="second_appl" class="col-md-2"> Front Number Plate:</label>
                                        <div class="col-md-10">
                                            <input type="text"  class="form-control "  name="front_number_plate" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="second_appl" class="col-md-2"> Back Number Plate:</label>
                                        <div class="col-md-10">
                                            <input type="text"  class="form-control "  name="back_number_plate" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="second_appl" class="col-md-2"> Date Purchased:</label>
                                        <div class="col-md-10">
                                            <input type='text' class="form-control"  id="purchaseddate" name="purchaseddate" required/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div data-row-span="4">
                                <div data-field-span="2">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" > Vehicle Type</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2" style="width: 100%" name="enginesize" required>
                                                <option value="">Select  ---</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" > Brand</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2" style="width: 100%" name="enginesize" required>
                                                <option value="">Select  ---</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" > Body Type</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2" style="width: 100%" name="enginesize" required>
                                                <option value="">Select  ---</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" >Transmission</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2" style="width: 100%" name="enginesize" required>
                                                <option value="">Select  ---</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div data-field-span="2">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" > Engine Size</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2" style="width: 100%" name="enginesize" required>
                                                <option value="">Select engine size ---</option>
                                                <?php
                                                $i = 0.7;
                                                while ($i < 12) {
                                                    echo '<option value="' . $i . '">' . $i . ' litres </option>';
                                                    $i = $i + 0.1;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" >Fuel Type</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2" id="fueltype" name="fueltype" style="width: 100%" required>
                                                <option value="">Select fuel ---</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" >Color</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2" id="colors" style="width: 100%" name="colors" required>
                                                <option value="">Select color ---</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label class="col-md-3 label-control" >Model Year </label>
                                        <div class="col-md-9">
                                            <select class="form-control select2" style="width: 100%" name="manufactured_year"required >
                                                <option value="">Select year ---</option>
                                                <?php
                                                $i = 1980;
                                                $year = date("Y");
                                                while ($i <= $year) {
                                                    echo '<option value="' . $i . '">' . $i . '  </option>';
                                                    $i = $i + 1;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </fieldset>
                        <br>
                        <br>
                        <fieldset>
                            <legend>(B) Settings</legend>
                            <div data-row-span="6">
                                <div data-field-span="2">
                                    <label>Car Insurance</label>
                                    <div class="form-group row">
                                        <label class="col-md-3">Last Insurance date</label>
                                        <div  class="col-md-9">
                                            <input type='text' id="insurance_renewal_date"  name="insurance_renewal_date" required class="form-control" />

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">Renewal date</label>
                                        <div  class="col-md-9">
                                            <input type='text' id="insurance_next_renewal_date" name="insurance_next_renewal_date" required class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">Amount</label>
                                        <div  class="col-md-9">
                                            <input type='text'  name="insurance_amount" required class="form-control" />

                                        </div>
                                    </div>
                                </div> 
                                <div data-field-span="2">
                                    <label>Road Worthy</label>
                                    <div class="form-group row">
                                        <label class="col-md-3"> Last Road Worthy Date</label>
                                        <div  class="col-md-9">
                                            <input type='text' id="insurance_renewal_date"  name="insurance_renewal_date" required class="form-control" />

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">Renewal date</label>
                                        <div  class="col-md-9">
                                            <input type='text' id="insurance_next_renewal_date" name="insurance_next_renewal_date" required class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">Amount</label>
                                        <div  class="col-md-9">
                                            <input type='text'  name="insurance_amount" required class="form-control" />

                                        </div>
                                    </div>
                                </div> 
                                <div data-field-span="2">
                                    <label>Car Maintenance</label>
                                    <div class="form-group row">
                                        <label class="col-md-3">Last Maintenance date</label>
                                        <div  class="col-md-9">
                                            <input type='text' id="insurance_next_renewal_date" name="insurance_next_renewal_date" required class="form-control" />

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">Period</label>
                                        <div  class="col-md-9">
                                            <select class="form-control select2" required style="width: 100%" name="maintenance_period">
                                                <option value="">Select period ---</option>
                                                <?php
                                                $i = 1;
                                                $year = date("Y");
                                                while ($i <= 24) {
                                                    echo '<option value="' . $i . ' month">' . $i . 'month  </option>';
                                                    $i = $i + 1;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div> 
                            </div>


                        </fieldset>


                        <label> ABOVE FIELDS ARE MANDATORY *</label>

                        <br/><br/>
                        <div class="row" style="float: right">
                            <div class="form-actions pull-right">

                                <button class="button button-3d button-action button-pill btn_3d">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--5 th tab bank application ending  -->
            <!--rightside bar -->
            <div >
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-tab-window"></i> Tabs
                        </h3>
                        <span class="float-right">
                            <i class="fa fa-fw ti-angle-up clickable"></i>
                            <i class="fa fa-fw ti-close removecard"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="bs-example">
                            <ul class="nav nav-tabs" style="margin-bottom: 15px;">

                                <li class="nav-item">
                                    <a class="nav-link " id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#tab11" aria-expanded="false">Tax History</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab12" href="#tab12" aria-expanded="false">Insurance History</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="base-tab13" data-toggle="tab" aria-controls="tab13" href="#tab13" aria-expanded="true">Mileage History</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="base-tab14" data-toggle="tab" aria-controls="tab14" href="#tab14" aria-expanded="true">Inflows</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="base-tab15" data-toggle="tab" aria-controls="tab15" href="#tab15" aria-expanded="true">Programs</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab11" aria-expanded="false" aria-labelledby="base-tab11">


                                    <table id="taxTbl" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Renewal Date</th>
                                                <th>Next Renewal Date</th>
                                                <th>Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($tax->renewal_date); ?></td>
                                                <td><?php echo e($tax->next_renewal_date); ?></td>
                                                <td><?php echo e($tax->amount); ?></td>

                                            </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>

                                    <button type="button" class="btn btn-icon btn-success mr-1"  data-toggle="modal" data-target="#taxModal" data-whatever="@mdo"><i class="fa fa-plus"></i></button>
                                </div>
                                <div class="tab-pane" id="tab12" aria-labelledby="base-tab12" aria-expanded="false">
                                    <table id="insuranceTbl" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Renewal Date</th>
                                                <th>Next Renewal Date</th>
                                                <th>Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $insurances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($tax->renewal_date); ?></td>
                                                <td><?php echo e($tax->next_renewal_date); ?></td>
                                                <td><?php echo e($tax->amount); ?></td>

                                            </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>

                                    <button type="button" class="btn btn-icon btn-success mr-1" data-toggle="modal" data-target="#insuranceModal" data-whatever="@mdo"><i class="fa fa-plus"></i></button>

                                </div>
                                <div class="tab-pane " id="tab13" aria-labelledby="base-tab13" aria-expanded="true">

                                    <table id="maintenanceTbl" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Maintenance Date</th>

                                                <th>Description</th>
                                                <th>Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $maintenance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($tax->maintenance_date); ?></td>

                                                <td><?php echo e($tax->description); ?></td>
                                                <td><?php echo e($tax->amount); ?></td>

                                            </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-icon btn-success mr-1" data-toggle="modal" data-target="#maintenanceModal" data-whatever="@mdo"><i class="fa fa-plus"></i></button>

                                </div>

                                <div class="tab-pane " id="tab14" aria-labelledby="base-tab14" aria-expanded="true">

                                    <table id="inflowTbl" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Mode Of Payment</th>
                                                <th>Amount</th>
                                                <th>Payment Date</th>
                                                <th>Paid By </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $inflow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td><?php echo e($single->code); ?></td>

                                                <td><?php echo e($single->modeofpayment); ?></td>

                                                <td><?php echo e($single->amount); ?></td>
                                                <td><?php echo e($single->payment_date); ?></td>
                                                <td><?php echo e($single->paidby); ?></td>

                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-icon btn-success mr-1" data-toggle="modal" data-target="#inflowModal" data-whatever="@mdo"><i class="fa fa-plus"></i></button>

                                </div>

                                <div class="tab-pane " id="tab15" aria-labelledby="base-tab14" aria-expanded="true">

                                    <table id="programTbl" class="table table-striped table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Program Description</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Mode Of payment</th>
                                                <th>Amount</th>
                                                <th>Paid By</th>

                                                <!--
                                                <th>Bank Cleared</th>
                                                <th>Bank Code</th>
                                                <th>Date Cleared</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $program; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td><?php echo e($single->code); ?></td>
                                                <td><?php echo e($single->description); ?></td>
                                                <td><?php echo e($single->program_start); ?></td>
                                                <td><?php echo e($single->program_end); ?></td>
                                                <td><?php echo e($single->modeofpayment); ?></td>

                                                <td><?php echo e($single->amount); ?></td>
                                                <td><?php echo e($single->paidby); ?></td>

                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-icon btn-success mr-1" data-toggle="modal" data-target="#programModal" data-whatever="@mdo"><i class="fa fa-plus"></i></button>

                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </section>

    </section>
    <!-- /.content -->
</aside>

<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('userjs'); ?>
<script type="text/javascript">

    var taxTbl = $('#taxTbl').DataTable();
    var maintenanceTbl = $('#maintenanceTbl').DataTable();
    var insuranceTbl = $('#insuranceTbl').DataTable();
    var inflowTbl = $('#inflowTbl').DataTable();
    var programTbl = $('#programTbl').DataTable();

    var fueltypev = $('#fueltypev').val();
    var enginesize = $('#enginesizev').val();
    var color = $('#colorv').val();
    var manufactured_year = $('#manufactured_yearv').val();
    var carmodel = $('#carmodelv').val();
    console.log(color);
//x
    $('#maintenancetype').change(function () {
        var val = $(this).val();
        if (val == "other") {
            $('#description').show();

        } else {
            $('#description').hide();
        }
    });
//update vehicles information

    $('#vehicleForm').on('submit', function (e) {

        e.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);
        swal({
            title: "Are you sure?",
            text: "You want to save information",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function () {
            setTimeout(function () {
                $.ajax({
                    url: "<?php echo e(url('vehicle/updatevehicle')); ?>",
                    type: "POST",
                    data: formData,
                    success: function (data) {
                        console.log('server data :' + data);
                        if (data == 0) {
                            document.getElementById("vehicleForm").reset();

                            //swal("Success", "Information updated successfully", 'success');
                            var url = window.location.href;     // Returns full URL

                            swal({
                                title: "Success",
                                text: "Information updated successfully",
                                type: "success",
                                closeOnConfirm: false
                            },
                                    function () {

                                        window.location = url;
                                    });
                        }
                        if (data == 1) {

                            swal("Error", "Contact System Administrator", 'error');
                        }

                    }

                });

            }, 2000);
        });
    });






    $('#insuranceForm').on('submit', function (e) {

        e.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);


        var renewaldate = $('#insurance_renewal_date').val();
        var nextrenewaldate = $('#insurance_next_renewal_date').val();

        if (nextrenewaldate < renewaldate) {

            swal('Error', "Next renewal date for insurance must be greater than renewal date", 'error');

        } else {
            swal({
                title: "Are you sure?",
                text: "You want to save information",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                setTimeout(function () {
                    $.ajax({
                        url: "<?php echo e(url('saveinsurances')); ?>",
                        type: "POST",
                        data: formData,
                        success: function (data) {

                            $('#insuranceModal').modal('hide');
                            console.log('server data :' + data);
                            if (data == 0) {
                                document.getElementById("insuranceForm").reset();

                                var url = window.location.href;     // Returns full URL

                                swal({
                                    title: "Success",
                                    text: "Information updated successfully",
                                    type: "success",
                                    closeOnConfirm: false
                                },
                                        function () {

                                            window.location = url;
                                        });


                            }
                            if (data == 2) {
                                swal('Error', "Car number already exist", 'error');
                            }

                        }

                    });

                }, 2000);
            });

        }
    });

    $('#programForm').on('submit', function (e) {

        e.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);
        swal({
            title: "Are you sure?",
            text: "You want to save information",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function () {
            setTimeout(function () {
                $.ajax({
                    url: "<?php echo e(url('saveprogram')); ?>",
                    type: "POST",
                    data: formData,
                    success: function (data) {

                        $('#programModal').modal('hide');
                        console.log('server data :' + data);
                        if (data == 1) {
                            swal('Error', "Contat System Administrator", 'error');


                        } else {

                            document.getElementById("programForm").reset();

                            var url = window.location.href;     // Returns full URL

                            swal({
                                title: "Success",
                                text: "Proram saved successfully.Please keep this code " + data,
                                type: "success",
                                closeOnConfirm: false
                            },
                                    function () {

                                        window.location = url;
                                    });

                        }


                    }

                });

            }, 2000);
        });
    });


    $('#maintenanceForm').on('submit', function (e) {

        e.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);
        swal({
            title: "Are you sure?",
            text: "You want to save information",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function () {
            setTimeout(function () {
                $.ajax({
                    url: "<?php echo e(url('savemaintenance')); ?>",
                    type: "POST",
                    data: formData,
                    success: function (data) {
                        $('#maintenanceModal').modal('hide');
                        console.log('server data :' + data);
                        if (data == 0) {
                            document.getElementById("maintenanceForm").reset();

                            var url = window.location.href;     // Returns full URL

                            swal({
                                title: "Success",
                                text: "Information saved successfully",
                                type: "success",
                                closeOnConfirm: false
                            },
                                    function () {

                                        window.location = url;
                                    });
                        }
                        if (data == 2) {
                            swal('Error', "Car number already exist", 'error');
                        }

                    }

                });

            }, 2000);
        });
    });



    $('#taxForm').on('submit', function (e) {

        e.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);

        var taxrenewaldate = $('#tax_renewal_date').val();
        var taxnextrenewaldate = $('#tax_next_renewal_date').val();

        if (taxnextrenewaldate < taxrenewaldate) {

            swal('Error', "Next renewal date for tax must be greater than renewal date", 'error');

        } else {
            swal({
                title: "Are you sure?",
                text: "You want to save information",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                setTimeout(function () {
                    $.ajax({
                        url: "<?php echo e(url('saveinsurances')); ?>",
                        type: "POST",
                        data: formData,
                        success: function (data) {

                            $('#taxModal').modal('hide');
                            console.log('server data :' + data);
                            if (data == 0) {
                                document.getElementById("insuranceForm").reset();

                                var url = window.location.href;     // Returns full URL

                                swal({
                                    title: "Success",
                                    text: "Information saved successfully",
                                    type: "success",
                                    closeOnConfirm: false
                                },
                                        function () {

                                            window.location = url;
                                        });
                            }
                            if (data == 2) {
                                swal('Error', "Car number already exist", 'error');
                            }

                        }

                    });

                }, 2000);
            });
        }
    });


    $('#inflowForm').on('submit', function (e) {

        e.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);
        swal({
            title: "Are you sure?",
            text: "You want to save information",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function () {
            setTimeout(function () {
                $.ajax({
                    url: "<?php echo e(url('saveinflow')); ?>",
                    type: "POST",
                    data: formData,
                    success: function (data) {
                        console.log('server data :' + data);

                        if (data == 1) {
                            swal('Error', "Contact System Administrator", 'error');
                        } else {
                            document.getElementById("inflowForm").reset();

                            var url = window.location.href;     // Returns full URL

                            swal({
                                title: "Success",
                                text: "Inflow saved successfully.Please keep this code " + data,
                                type: "success",
                                closeOnConfirm: false
                            },
                                    function () {

                                        window.location = url;
                                    });
                        }

                    }

                });

            }, 2000);
        });
    });




    $('input[name="daterange"]').daterangepicker();

    $(function () {
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });

    $.ajax({
        url: "<?php echo e(url('getcolors')); ?>",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#colors').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });

            $("#colors").val(color).trigger("change");
        }




    });

    $.ajax({
        url: "<?php echo e(url('getcarmodels')); ?>",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#carmodels').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
            $("#carmodels").val(carmodel).trigger("change");

        }
    });

    $.ajax({
        url: "<?php echo e(url('getfueltypes')); ?>",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#fueltype').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });

            $("#fueltype").val(fueltypev).trigger("change");

        }
    });

    $.ajax({
        url: "<?php echo e(url('getdrivers')); ?>",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#drivers').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }
    });

    //manufacturedyear

    $.ajax({
        url: "<?php echo e(url('getmodelyear')); ?>",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#manufacturedyear').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });

            $("#manufacturedyear").val(manufactured_year).trigger("change");
            $('#enginesize').val(enginesize).trigger('change');

        }
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>