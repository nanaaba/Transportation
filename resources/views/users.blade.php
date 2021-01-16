@extends('layouts.master')

@section('content')

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-2">
                <h3 class="content-header-title mb-0">Users</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">User</a>
                            </li>
                            <li class="breadcrumb-item active">All
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body"><!-- DOM - jQuery events table -->



            <?php
                                    $permissions = Session::get('permissions');

            $allusers = json_decode($users);

            $allusergroups = json_decode($usergroups);
            if (in_array("ADD_USER", $permissions)) {
                ?>
            <div class="row" style="margin-bottom: 5px;">
                <div class="col-xs-12">
                    <div class="col-md-10 ">

                    </div>
                    <div class="col-md-2 ">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal" data-whatever="@mdo">New User</button>
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
                                    <table  id='userTbl' class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>  
                                                <th>ContactNo</th>  
                                                <th>UserGroup</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($allusers as $user)
                                            <tr>
                                                <td>{{ $user->name }} </td>
                                                <td>{{ $user->email }} </td>
                                                <td>{{ $user->contactno }} </td>
                                                <td>{{ $user->usergroupname }} </td>

                                                <td>

                                                    <a href="#" onclick="editUser({{$user->id}})"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-pencil" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a>

                                                    <a href="#" onclick="deleteUser({{$user->id}})"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-trash" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a>

                                                </td>
                                            </tr>
                                            @endforeach


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

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New User</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" id='saveUserForm'>
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="region" class="control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="region" class="control-label">Email:</label>
                        <input type="email" class="form-control" name="email"  required>
                    </div>

                    <div class="form-group">
                        <label for="region" class="control-label">Contact Number:</label>
                        <input type="text" class="form-control" name="contactno"  required>
                    </div>
                    <div class="form-group ">
                        <label class="control-label" >UserGroup</label>
                        <div >
                            <select class="form-control select2" id="usergroup" name="usergroup" style="width: 100%" required>
                                <option value="">Select  ---</option>
                                @foreach($allusergroups as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>

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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New User</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" id='updateUserForm'>
                {{ csrf_field() }}
                <div class="modal-body">

                    <input type="hidden" id='userid' name="userid"/>
                    <div class="form-group">
                        <label for="region" class="control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="username" required>
                    </div>

                    <div class="form-group">
                        <label for="region" class="control-label">Email:</label>
                        <input type="email" class="form-control" id='email' name="email"  required>
                    </div>

                    <div class="form-group">
                        <label for="region" class="control-label">Contact Number:</label>
                        <input type="text" class="form-control" name="phoneno" id='phoneno'  required>
                    </div>
                    <div class="form-group ">
                        <label class="control-label" >UserGroup</label>
                        <div >
                            <select class="form-control " id="usergroupss" name="usergroup" style="width: 100%" required>
                                <option value="">Select  ---</option>
                                @foreach($allusergroups as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>

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

<!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
@section('userjs')
<script src="{{ asset('js/user.js')}}" type="text/javascript"></script>
<script type="text/javascript">
function deleteUser(id) {

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
                url: "deleteuser/" + id,
                type: "DELETE",
                data: {_token: "{{ csrf_token() }}"},
                success: function (data) {

                    console.log('server data :' + data);
                    if (data == 0) {
                        getUsers();
                        swal({
                            title: "Success",
                            text: "User deleted successfully",
                            type: "success",
                            closeOnConfirm: true
                        });
                    }


                }

            });
        });
    });
}



var datatable = $('#userTbl').DataTable();
function editUser(id) {
    console.log('id :' + id);
    $.ajax({
        url: "user/" + id,
        type: "GET",
        dataType: 'json',
        success: function (data) {

            console.log('server data :' + data.contactno);
            $('#userid').val(id);
            $('#username').val(data.name);
            $('#email').val(data.email);
            $('#phoneno').val(data.contactno);
            $("#usergroupss").val(data.usergroup);

            $('#editModal').modal('show');
        }

    });
}


$('#saveUserForm').on('submit', function (e) {

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
                url: "{{url('saveuser')}}",
                type: "POST",
                data: formData,
                success: function (data) {
                    $('#userModal').modal('hide');
                    console.log('server data :' + data);
                    $('#userModal').modal('hide');
                    if (data == 0) {

                        document.getElementById("saveUserForm").reset();
                        var url = window.location.href; // Returns full URL
                        getUsers();
                        swal({
                            title: "Success",
                            text: "Information saved successfully",
                            type: "success",
                            closeOnConfirm: true
                        });
                    }else{
                          swal({
                            title: "Error",
                            text: "Email exist",
                            type: "error",
                            closeOnConfirm: true
                        });
                    }


                }

            });
        });
    });
});

//saveUserForm

$('#updateUserForm').on('submit', function (e) {

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
                url: "{{url('updateuser')}}",
                type: "PUT",
                data: formData,
                success: function (data) {
                    console.log('server data :' + data);
                    $('#editModal').modal('hide');
                    if (data == 0) {

                        document.getElementById("updateUserForm").reset();
                        var url = window.location.href; // Returns full URL
                        getUsers();
                        swal({
                            title: "Success",
                            text: "Information updated successfully",
                            type: "success",
                            closeOnConfirm: true
                        });
                    }


                }

            });
        });
    });
});


function getUsers() {
    $.ajax({
        url: "{{url('getusers')}}",
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
                    var j = -1;
                    var r = new Array();
                    r[++j] = '<td>' + value.name + '</td>';
                    r[++j] = '<td>' + value.email + '</td>';
                    r[++j] = '<td>' + value.contactno + '</td>';
                    r[++j] = '<td>' + value.usergroupname + '</td>';
                    r[++j] = "<td><a href='#' onclick='editUser(" + value.id + ")' class='btn btn-outline-info btn-sm btn-edit editBtn' ><i class='fa fa-pencil' ></i><span class='hidden-md hidden-sm hidden-xs'> </span></a>" +
                            "<a href='#' onclick='deleteUser(" + value.id + ")'   class='btn btn-outline-info btn-sm btn-edit editBtn' ><i class='fa fa-trash' ></i><span class='hidden-md hidden-sm hidden-xs'> </span></a></td>";
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
@endsection
