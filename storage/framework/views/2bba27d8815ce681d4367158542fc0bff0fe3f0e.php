<?php $__env->startSection('content'); ?>



<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Assigned Drivers       </h1>
        <ol class="breadcrumb">

            <li><a href="#">Home</a>
            </li>
            <li><a href="#">Drivers</a>
            </li>
            <li class="active">Assigned Drivers
            </li>

        </ol>
    </section>

   <section class="content">



        <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-12">
                <div class="col-md-10 ">

                </div>
                <div class="col-md-2 ">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal" data-whatever="@mdo">Assigned Driver</button>
                </div>
            </div>
        </div>
      

            <?php
            $data = json_decode($assigned);
            ?>
  <div class="row">
            <div class="col-lg-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-grid3"></i> Colors 
                        </h3>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="table">
                                   <thead>
                                        <tr>
                                            <th>Car Number</th> 
                                            <th>Assigned Driver </th>                                                                                  
                                            <th>Date Assigned</th>
                                            <th>Memo</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td><?php echo e($single->car_number); ?> </td>
                                            <td><?php echo e($single->name); ?> </td>
                                            <td><?php echo e($single->date_assigned); ?> </td>
                                            <td>
                                                <button type="button" onclick="donotemodal('<?php echo e($single->car_number_id); ?>')"  class="mr-1 mb-1 btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Note</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                           
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>




<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Assigned Car</h4>
            </div>
            <form class="form-horizontal" role="form" id="assignedCar">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">


                    <div class="form-group">
                        <label for="region" class="control-label">Driver Name:</label>
                        <select class="form-control select2" id="drivers" name="driverid" style="width: 100%" required>
                            <option value="">Select  ---</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="region" class="control-label">Car:</label>
                        <select class="form-control select2" id="cars" name="car_number" style="width: 100%" required>
                            <option value="">Select  ---</option>

                        </select>    
                    </div>

                    <div class="form-group">
                        <label for="region" class="control-label">Date Purchased:</label>
                        <input type="text"  id="datepurchased" class="form-control" disabled/>  
                    </div>


                    <div class="form-group  last">
                        <label class="label-control" > Date Assigned </label>
                        <div class="">
                            <div class='input-group date datetimepicker'>
                                <input type='text' name="date_assigned" id="dateassigned"  class="form-control" required/>
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar-o"></span>
                                </span>
                            </div>

                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"> Notes</h4>
            </div>
            <form class="form-horizontal" role="form" id="momoForm">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">

                    <input type="hidden" readonly name="carnumber" id="notes_carnumber"/>

                    <div class="form-group">
                        <label for="region" class="control-label">Roaming Driver :</label>
                        <select class="form-control select2" id="roamingdrivers" name="roamingdriver" style="width: 100%">
                            <option value="">Select  ---</option>

                        </select>
                    </div>


                    <div class="form-group ">
                        <label class="label-control">Start Date  </label>
                        <div class="">
                            <div class='input-group date datetimepicker'>
                                <input type='text' name="start_date" class="form-control" required/>
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar-o"></span>
                                </span>
                            </div>

                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="label-control">End Date  </label>
                        <div class="">
                            <div class='input-group date datetimepicker'>
                                <input type='text' name="end_date" class="form-control" required/>
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar-o"></span>
                                </span>
                            </div>

                        </div>
                    </div>

                    <div class="form-group  last">
                        <label>Notes</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Description"></textarea>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
   </section>
</aside>

<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('userjs'); ?>

<script type="text/javascript" src="<?php echo e(asset('js/assigndrivers.js')); ?>"></script
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>