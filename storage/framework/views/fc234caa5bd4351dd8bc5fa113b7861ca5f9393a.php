<?php $__env->startSection('content'); ?>

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-2">
                <h3 class="content-header-title mb-0">UserGroups</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Account</a>
                            </li>
                            <li class="breadcrumb-item active">UserGroups
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body"><!-- DOM - jQuery events table -->

            <?php
                        $permissions = Session::get('permissions');

            $results = json_decode($usergroups);
             if (in_array("ADD_USERGROUP", $permissions)) {
                ?>


            <div class="row" style="margin-bottom: 5px;">
                <div class="col-xs-12">
                    <div class="col-md-10 ">

                    </div>
                    <div class="col-md-2 ">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newModal" data-whatever="@mdo">Add New</button>
                    </div>
                </div>
            </div>
            
            <?php
             }
             ?>
            <section id="file-export">




                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">

                            <div class="card-body collapse in">
                                <div class="card-block card-dashboard">
                                    <table id="table" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Name</th> 

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($single->name); ?></td>
                                                <td>


                                                    <a href="#" onclick="editUserGroup(<?php echo e($single->id); ?>,'<?php echo e($single->name); ?>')"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-pencil" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a>

                                                    <a href="#" onclick="deleteUserGroup(<?php echo e($single->id); ?>)"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-trash" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a>

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
            </section>
            <!-- File export table -->

        </div>
    </div>
</div>



<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New UserGroup</h4>
            </div>
            <form class="form-horizontal" role="form" id="NewForm">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">




                    <div class="form-group">
                        <label for="region" class="control-label">UserGroup:</label>
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"> UserGroup</h4>
            </div>
            <form class="form-horizontal" role="form" id="updateForm">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">

                    <input type="hidden" id='usergroupid' name="usergroupid"/>


                    <div class="form-group">
                        <label for="region" class="control-label">UserGroup:</label>
                        <input type="text" id='usergroup'  name="name" class="form-control" />  
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



<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('userjs'); ?>

<script type="text/javascript">

            function editUserGroup(id, name){
            console.log(id + name);
                    $('#usergroup').val(name);
                    $('#usergroupid').val(id);
                    $('#editModal').modal('show');
            }

//updateForm

    $('#updateForm').on('submit', function (e) {

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
            url: "<?php echo e(url('updateusergroup')); ?>",
                    type: "PUT",
                    data: formData,
                    success: function (data) {
                    $('#editModal').modal('hide');
                            console.log('server data :' + data);
                            $('#newModal').modal('hide');
                            if (data == 0) {

                    document.getElementById("NewForm").reset();
                            var url = window.location.href; // Returns full URL
                            getUserGroups();
                            swal({
                            title: "Success",
                                    text: "Information updated successfully",
                                    type: "success",
                                    closeOnConfirm: true
                            });
                    }


                    }

            });
            }, 2000);
            });
    });
            var datatable = $('#table').DataTable();
            function deleteUserGroup(id){

            swal({
            title: "Are you sure?",
                    text: "You want to delete ",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
            }, function () {
            setTimeout(function () {

            $.ajax({
            url: "deleteusergroup/" + id,
                    type: "DELETE",
                    data: {_token:   "<?php echo e(csrf_token()); ?>"},
                    success: function (data) {

                    console.log('server data :' + data);
                            if (data == 0) {
                    getUserGroups();
                            swal({
                            title: "Success",
                                    text: "UserGroup deleted successfully",
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
            url: "<?php echo e(url('saveusergroup')); ?>",
                    type: "POST",
                    data: formData,
                    success: function (data) {
                    console.log('server data :' + data);
                            $('#newModal').modal('hide');
                            if (data == 0) {
                    document.getElementById("NewForm").reset();
                            var url = window.location.href; // Returns full URL
                            getUserGroups();
                            swal({
                            title: "Success",
                                    text: "Information saved successfully",
                                    type: "success",
                                    closeOnConfirm: true
                            });
                    }


                    }

            });
            }, 2000);
            });
    });
            function getUserGroups(){
            $.ajax({
            url: "<?php echo e(url('getusergroups')); ?>",
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
                                    r[++j] = "<td><a href='#' onclick='editUserGroup("+ value.id + ",\"" + value.name +"\")' class='btn btn-outline-info btn-sm btn-edit editBtn' ><i class='fa fa-pencil' ></i><span class='hidden-md hidden-sm hidden-xs'> </span></a>" +
                                    "<a href='#' onclick='deleteUserGroup("+ value.id + ")'   class='btn btn-outline-info btn-sm btn-edit editBtn' ><i class='fa fa-trash' ></i><span class='hidden-md hidden-sm hidden-xs'> </span></a></td>";
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