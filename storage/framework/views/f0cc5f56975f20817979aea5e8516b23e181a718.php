<?php $__env->startSection('content'); ?>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            New Driver        </h1>
        <ol class="breadcrumb">

            <li><a href="#">Home</a>
            </li>
            <li><a href="#">Driver</a>
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
                            New Driver Form
                        </h3>

                    </div>
                    <div class="card-body">
                        <div class="card-block">

                            <form class="form form-horizontal form-bordered" id="driverForm" enctype="multipart/form-data">

                                <?php echo e(csrf_field()); ?>


                                <div class="form-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Name</label>
                                                <div class="col-md-9">
                                                    <input type="text"  class="form-control border-primary"  name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Gender</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2" name="gender" style="width: 100%">
                                                        <option value="">Select  ---</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>

                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Date Of Birth</label>

                                                <div class="col-md-9">
                                                    <div class='input-group date datetimepicker'>
                                                        <input type='text' class="form-control" name="dob" required/>
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-calendar-o"></span>
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Phone No</label>
                                                <div class="col-md-9">
                                                    <input type="text"  class="form-control border-primary"  name="phoneno">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >House Residence</label>
                                                <div class="col-md-9">
                                                    <input type="text"  class="form-control border-primary"  name="residence">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Tribe</label>
                                                <div class="col-md-9">
                                                    <input type="text"  class="form-control border-primary"  name="tribe">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Driver License</label>
                                                <div class="col-md-9">
                                                    <input type="text"  class="form-control border-primary"  name="driver_license">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Driving Experience</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control border-primary"  name="experience">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >ID CardType</label>
                                                <div class="col-md-9">

                                                    <select class="form-control select2" name="idcardtype" style="width: 100%">
                                                        <option value="">Select  ---</option>
                                                        <option value="Voter's Idcard">Voter's Idcard</option>
                                                        <option value="Driver's License">Driver's License</option>
                                                        <option value="NHIS">NHIS</option>
                                                        <option value="Passport">Passport</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >ID Number</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control border-primary"  name="idnumber">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Date Of Employment</label>

                                                <div class="col-md-9">
                                                    <div class='input-group date datetimepicker'>
                                                        <input type='text' class="form-control" name="dateofemployment" required/>
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-calendar-o"></span>
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Type Of Driver</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2" name="drivertype" style="width: 100%">
                                                        <option value="">Select  ---</option>
                                                        <option value="Permanent Driver">Permanent Driver</option>
                                                        <option value="Floating Driver">Floating Driver</option>

                                                    </select>

                                                </div>
                                            </div>
                                        </div>



                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Upload Driver License</label>
                                                <div class="col-md-9">
                                                    <input type="file" name="drivelicensefile" class="form-control-file" id="basicInputFile">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Upload Police Report</label>
                                                <div class="col-md-9">
                                                    <input type="file" name="policereport" class="form-control-file" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Guarantor Name</label>
                                                <div class="col-md-9">
                                                    <input type="text"  class="form-control border-primary"  name="contact_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Contact Number</label>
                                                <div class="col-md-9">
                                                    <input type="text"  class="form-control border-primary"  name="contact_number">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" >Relationship</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2" name="relationship" id="relationship" style="width: 100%">
                                                        <option value="">Select ---</option>   
                                                    </select>

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
    $(function () {
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });

    $('#driverForm').on('submit', function (e) {

        e.preventDefault();
        //var formData = $(this)[0].serialize();
        var formData = new FormData($(this)[0]);
        console.log(formData);

        $.ajax({
            url: "<?php echo e(url('savedriver')); ?>",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log('server data :' + data);
                if (data == 0) {
                    $('#driverForm select').val('').trigger('change');

                    document.getElementById("driverForm").reset();

                    swal("Success", "Information saved successfully", 'success');
                }
                if (data == 2) {
                    swal('Error', "Car number already exist", 'error');
                }
            }

        });

//        swal({
//            title: "Are you sure?",
//            text: "You want to save vehicle information",
//            type: "warning",
//            showCancelButton: true,
//            closeOnConfirm: false,
//            showLoaderOnConfirm: true
//        }, function () {
//            //  setTimeout(function () {
//            $.ajax({
//                url: "<?php echo e(url('savedriver')); ?>",
//                type: "POST",
//                data: formData,
//                cache: false,
//                contentType: false,
//                processData: false,
//                success: function (data) {
//                    console.log('server data :' + data);
//                    if (data == 0) {
//                        document.getElementById("driverForm").reset();
//
//                        swal("Success", "Information saved successfully", 'success');
//                    }
//                    if (data == 2) {
//                        swal('Error', "Car number already exist", 'error');
//                    }
//                }
//
//            });
//
//            //}, 2000);
//        });

    });

    $.ajax({
        url: "<?php echo e(url('getrelationships')); ?>",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#relationship').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>