<?php $__env->startSection('content'); ?>

<?php
$driverInformation = json_decode($driverdata, true);

?>


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
              <?php echo e($driverInformation['name']); ?>  Information
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
Information
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">

        <div class="row" id="complex-form2">
            <!--5th tab bank application starting-->
            <div class="col-lg-12">
                <form class="grid-form form-horizontal" id="updatedriverForm" method="POST" enctype="multipart/form-data">

                    <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="driver_code" value="<?php echo e($driverInformation['id']); ?>"/>

                    <div class="text-center">
<!--                        <img src="<?php echo e(asset('img/pages/complexform1.png')); ?>" alt="bank name" width="200">-->

                        <h3>   <?php echo e($driverInformation['name']); ?>  Information</h3>
                    </div>


                    <fieldset>
                        <legend>(A) Driver Information</legend>
                        <div data-row-span="4">
                            <div data-field-span="4">

                                <div class="form-group row">
                                    <label for="first_appl" class="col-md-4"> Name:</label>
                                    <div class="col-md-8">

                                        <input type="text" value="<?php echo e($driverInformation['name']); ?>"  class="form-control "  name="name" required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="second_appl" class="col-md-4"> Gender:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2" name="gender" style="width: 100%">
                                            <option value="<?php echo e($driverInformation['gender']); ?>"><?php echo e($driverInformation['gender']); ?></option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="second_appl" class="col-md-4"> Date of Birth:</label>
                                    <div class="col-md-8">
                                        <input type='text' value="<?php echo e($driverInformation['dob']); ?>"  class="form-control datepicker"  data-provide="datepicker"   name="dob" required/>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div data-row-span="4">
                            <div data-field-span="2">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" > Phone No.</label>
                                    <div class="col-md-8">
                                        <input type="text"  value="<?php echo e($driverInformation['phoneno']); ?>"  class="form-control border-primary"  name="phoneno" required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" > Residence</label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo e($driverInformation['residence']); ?>"  class="form-control border-primary"  name="residence">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" >Tribe</label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo e($driverInformation['tribe']); ?>" class="form-control border-primary"  name="tribe">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" >Guarantor Name</label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo e($driverInformation['contact_person']); ?>" class="form-control border-primary"  name="contact_person">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" >Guarantor Contact Number</label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo e($driverInformation['contactno']); ?>" class="form-control border-primary"  name="contactno">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 label-control" >Relationship</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2" name="relationship" id="relationships" style="width: 100%">
                                            <option value="<?php echo e($driverInformation['relationship']); ?>"><?php echo e($driverInformation['relationship']); ?></option>   
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div data-field-span="2">
                                <div class="form-group row">
                                    <label for="second_appl" class="col-md-4"> Date of Employment:</label>
                                    <div class="col-md-8">
                                        <input type='text' value="<?php echo e($driverInformation['dateofemployment']); ?>" class="form-control datepicker"  data-provide="datepicker"   name="dateofemployment" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" >Driving Experience</label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo e($driverInformation['experience']); ?>" class="form-control border-primary"  name="experience">
                                    </div>
                                </div>                      

                                <div class="form-group row">
                                    <label class="col-md-4 label-control" >Type Of Driver</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2" name="drivertype" style="width: 100%">
                                            <option value="<?php echo e($driverInformation['drivertype']); ?>"><?php echo e($driverInformation['drivertype']); ?></option>
                                            <option value="Permanent Driver">Permanent Driver</option>
                                            <option value="Floating Driver">Floating Driver</option>

                                        </select>

                                    </div>
                                </div>
   <?php
                              $file = $driverInformation['license_url'];
                              ?>   
                                  <div class="form-group row">
                                    <label class="col-md-4 label-control" > Driver License</label>
                                    <div class="col-md-8">
                                        <a href="<?php echo   asset("uploads/$file")?>" target="_blank" class="btn btn-warning">View License</a>
                                       
                                    </div>
                                </div>
<br>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" >Upload New Driver License</label>
                                    <div class="col-md-8">
                                        <input type="file"  id="input-21" name="drivelicensefile" class="form-control-file" id="basicInputFile">
                            
                                    </div>
                                </div>

                            </div>
                    </fieldset>
                    <label> ABOVE FIELDS ARE MANDATORY *</label>

                    <br/><br/>
                    <div class="row" style="float: right">
                        <div class="form-actions pull-right">

                            <button class="button button-3d button-action button-pill btn_3d">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--5 th tab bank application ending  -->
        <!--rightside bar -->

    </section>
    <!-- /.content -->
</aside>

<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('userjs'); ?>
<script src="<?php echo e(asset('js/driver.js')); ?>"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>