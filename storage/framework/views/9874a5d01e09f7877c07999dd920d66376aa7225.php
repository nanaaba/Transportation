<?php $__env->startSection('content'); ?>



<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            New Vehicle        </h1>
        <ol class="breadcrumb">

            <li><a href="#">Home</a>
            </li>
            <li><a href="#">Vehicles</a>
            </li>
            <li class="active">New
            </li>

        </ol>
    </section>
    <section class="content">



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-tab"></i> 
                            New Vehicle Form
                        </h3>

                    </div>
                    <div class="card-body">
                        <div class="card-block">

                            <form class="form form-horizontal form-bordered" id="savevehicleform">

                                <?php echo e(csrf_field()); ?>


                                <div class="form-body">
                                    <h4 class="form-section"><i class="icon-eye6"></i> About Car</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Car Number</label>
                                                <div class="col-md-9">
                                                    <input type="text"  class="form-control border-primary"  name="car_number" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Fuel Type</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2" id="fueltype" name="fueltype" style="width: 100%" required>
                                                        <option value="">Select fuel ---</option>

                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
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
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Color</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2" id="colors" style="width: 100%" name="colors" required>
                                                        <option value="">Select color ---</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group row ">
                                                <label class="col-md-3 label-control" >Model Year </label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2" id="modelyear" style="width: 100%" name="manufactured_year"required >
                                                        <option value="">Select year ---</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-3 label-control" >Maker Model</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2" id="carmodels" name="carmodel" style="width: 100%" required>
                                                        <option value="">Select model ---</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group row last">
                                                <label class="col-md-3 label-control" >Purchased Date </label>
                                                <div class="col-md-9">
                                                    <div class='input-group date datetimepicker'>
                                                        <input type='date' class="form-control"  id="purchaseddate" name="purchaseddate" required/>
<!--                                                                <span class="input-group-addon">
                                                            <span class="fa fa-calendar-o"></span>
                                                        </span>-->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row last">
                                                <label class="col-md-3 label-control" for="userinput4">Current Tax Rate</label>
                                                <div class="col-md-9">

                                                    <input type="text"  class="form-control border-primary"  name="taxrate">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row last">
                                                <label class="col-md-3 label-control" for="userinput4">Chasis Number</label>
                                                <div class="col-md-9">

                                                    <input type="text"  class="form-control border-primary"  name="chasis_number" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="form-section"><i class="ft-mail"></i> Settings</h4>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-md-2 label-control" for="userinput5">Car Insurance</label>
                                                <div class="col-md-3">
                                                    <small>Renewal date</small>
                                                    <div class='input-group date datetimepicker' >
                                                        <input type='date' id="insurance_renewal_date"  name="insurance_renewal_date" required class="form-control" />
<!--                                                                <span class="input-group-addon">
                                                            <span class="fa fa-calendar-o"></span>
                                                        </span>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <small>Next Renewal date</small>
                                                    <div class='input-group date datetimepicker' >
                                                        <input type='date' id="insurance_next_renewal_date" name="insurance_next_renewal_date" required class="form-control" />
<!--                                                                <span class="input-group-addon">
                                                            <span class="fa fa-calendar-o"></span>
                                                        </span>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <small>Amount</small>
                                                    <div class='form-group' >
                                                        <input type='text'  name="insurance_amount" required class="form-control" />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>      
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-md-2 label-control" for="userinput5">Tax</label>
                                                <div class="col-md-3">
                                                    <small>Renewal date</small>
                                                    <div class='input-group date datetimepicker' >
                                                        <input type='date' id="tax_renewal_date"  name="tax_renewal_date" required class="form-control" />
<!--                                                                <span class="input-group-addon">
                                                            <span class="fa fa-calendar-o"></span>
                                                        </span>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <small>Next Renewal date</small>
                                                    <div class='input-group date datetimepicker' >
                                                        <input type='date' id="tax_next_renewal_date"  name="tax_next_renewal_date" required class="form-control" />
<!--                                                                <span class="input-group-addon">
                                                            <span class="fa fa-calendar-o"></span>
                                                        </span>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <small>Amount</small>
                                                    <div class='form-group' >
                                                        <input type='text'  name="tax_amount" required class="form-control" />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-md-2 label-control" for="userinput5">Maintenance</label>
                                                <!--                                                        <div class="col-md-5">
                                                                                                            <small></small>
                                                                                                            <div class='input-group date datetimepicker' >
                                                                                                                <input type='text' class="form-control " required name="maintenance_date" />
                                                                                                                <span class="input-group-addon">
                                                                                                                    <span class="fa fa-calendar-o"></span>
                                                                                                                </span>
                                                                                                            </div>
                                                                                                        </div>-->
                                                <div class="col-md-5">
                                                    <small>Period</small>
                                                    <select class="form-control select2" required style="width: 100%" name="maintenance_period">
                                                        <option value="">Select period ---</option>
                                                        <option value="2 week">Every 2 weeks</option>
                                                        <option value="1 month">Every month</option>

                                                    </select>
                                                    <span>Note: Maintenance date start  from  today's date </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions right">

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> Save
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- // Basic form layout section end -->

</aside>

<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('userjs'); ?>
<script type="text/javascript">


    $('#savevehicleform').on('submit', function (e) {

        e.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);

        //validations;
        var insurancerenewaldate = $('#insurance_renewal_date').val();
        var insurancenextrenewaldate = $('#insurance_next_renewal_date').val();
        var taxrenewaldate = $('#tax_renewal_date').val();
        var taxnextrenewaldate = $('#tax_next_renewal_date').val();

        if (insurancenextrenewaldate < insurancerenewaldate) {
            swal('Error', "Next renewal date for insurance must be greater than renewal date", 'error');


        } else if (taxnextrenewaldate < taxrenewaldate) {

            swal('Error', "Next renewal date for tax must be greater than renewal date", 'error');

        } else {





            swal({
                title: "Are you sure?",
                text: "You want to save vehicle information",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                setTimeout(function () {
                    $.ajax({
                        url: "<?php echo e(url('savevehicle')); ?>",
                        type: "POST",
                        data: formData,
                        success: function (data) {
                            console.log('server data :' + data);
                            if (data == 0) {
                                $('#savevehicleform select').val('').trigger('change');

                                document.getElementById("savevehicleform").reset();

                                swal("Success", "Information saved successfully", 'success');
                            }
                            if (data == 2) {
                                swal('Error', "Car number or Chasis number already exist", 'error');
                            }
                        }

                    });

                }, 2000);
            });
        }

//        $.ajax({
        //            url: "<?php echo e(url('savevehicle')); ?>",
        //            type: "POST",
        //            data: formData,
        //            success: function (data) {
        //                console.log('server data :' + data);
//            }
//
        //        });
    });

    $(function () {
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
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
        }
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
        }
    });
    //carmodels

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
        }
    });


    $.ajax({
        url: "<?php echo e(url('getmodelyear')); ?>",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#modelyear').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }
    });

    //getmodelyear
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>