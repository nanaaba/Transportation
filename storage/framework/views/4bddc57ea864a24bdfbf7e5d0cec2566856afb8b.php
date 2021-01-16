<?php $__env->startSection('content'); ?>

<?php
$permissions = Session::get('permissions');

$result = json_decode($carmodels);
?>



<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Car Models
        </h1>
        <ol class="breadcrumb">

            <li><a href="#">Home</a>
            </li>
            <li><a href="#">Configuration</a>
            </li>
            <li class="active">Car Models
            </li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php
        if (in_array("ADD_MODEL", $permissions)) {
            ?>
            <div class="">
                <div class="right_aligned" style="margin-bottom: 15px;">
                    <button type="button" class="btn btn-info " data-toggle="modal" data-target="#newModal">
                        New Car Model
                    </button>
                </div>
            </div>
            <?php
        }
        ?>




        <div class="row">
            <div class="col-lg-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-grid3"></i> Car Models 
                        </h3>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>Car Models</th> 

                                        <?php
                                        if (in_array("DELETE_MODEL", $permissions)) {
                                            ?>
                                            <th>Action</th>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($single->name); ?></td>
                                        <td>
                                            <a href="#" onclick="deleteColor(<?php echo e($single->id); ?>)"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-trash" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a>

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



<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New Model</h4>
            </div>
            <form class="form-horizontal" role="form" id="NewForm">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">




                    <div class="form-group">
                        <label for="region" class="control-label">Model:</label>
                        <input type="text"  name="name" class="form-control" />  
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

        <div class="background-overlay"></div>
    </section>
    <!-- /.content -->
</aside>





<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('userjs'); ?>

<script type="text/javascript">

            var datatable = $('#table').DataTable();
            function deleteColor(id){

            swal({
            title: "Are you sure?",
                    text: "You want to delete this model ",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
            }, function () {
            setTimeout(function () {

            $.ajax({
            url: "deletecarmodel/" + id,
                    type: "DELETE",
                    data: {_token:   "<?php echo e(csrf_token()); ?>"},
                    success: function (data) {

                    console.log('server data :' + data);
                            if (data == 0) {
                    getCarModels();
                            swal({
                            title: "Success",
                                    text: "Model deleted successfully",
                                    type: "success",
                                    closeOnConfirm: true
                            });
                    }


                    }

            });
            });
            });
            }

    $('#NewForm').on('submit', function (e) {

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
            url: "<?php echo e(url('savecarmodel')); ?>",
                    type: "POST",
                    data: formData,
                    success: function (data) {
                    console.log('server data :' + data);
                            $('#newModal').modal('hide');
                            if (data == 0) {
                    document.getElementById("NewForm").reset();
                            var url = window.location.href; // Returns full URL
                            getCarModels();
                            swal({
                            title: "Success",
                                    text: "Information saved successfully",
                                    type: "success",
                                    closeOnConfirm: true
                            });
                    } else {
                    swal({
                    title: "Error",
                            text: "Duplicate Entry.",
                            type: "error",
                            closeOnConfirm: true
                    });
                    }


                    }

            });
            }, 2000);
            });
    });
            function getCarModels(){
            $.ajax({
            url: "<?php echo e(url('getcarmodels')); ?>",
                    type: "GET",
                    success: function (data) {
                    console.log('server data :' + data);
                            datatable.clear().draw();
                            var obj = jQuery.parseJSON(data);
                            if (obj.length == 0) {
                    console.log("NO DATA!");
                            $('#loaderModal').modal('hide');
                    } else {

                    var rowNum = 0;
                            $.each(obj, function (key, value) {
                            var j = - 1;
                                    var r = new Array();
                                    r[++j] = '<td>' + value.name + '</td>';
                                    r[++j] = '<td><a href="#" onclick="deleteColor(' + value.id + ')"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-trash" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a></td>';
                                    rowNum = rowNum + 1;
                                    rowNode = datatable.row.add(r);
                            });
                            $('#loaderModal').modal('hide');
                            rowNode.draw().node();
                    }


                    }

            });
            }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>