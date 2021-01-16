@extends('layouts.master')

@section('content')

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-2">
                <h3 class="content-header-title mb-0">Relationships</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Configuration</a>
                            </li>
                            <li class="breadcrumb-item active">Relationships
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body"><!-- DOM - jQuery events table -->

            <?php
            $permissions = Session::get('permissions');

            $relationships = json_decode($relationship);
            if (in_array("ADD_RELATIONSHIP", $permissions)) {
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
                                                <th>Relationship</th> 

                                                <?php
                                                if (in_array("DELETE_RELATIONSHIP", $permissions)) {
                                                    ?>
                                                    <th>Action</th>
                                                    <?php
                                                }
                                                ?> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($relationships as $single)
                                            <tr>
                                                <td>{{$single->name}}</td>
                                                <td>
                                                    <a href="#" onclick="deleteRelationship({{$single->id}})"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-trash" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a>

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



<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New Relationship</h4>
            </div>
            <form class="form-horizontal" role="form" id="NewForm">
                {{ csrf_field() }}
                <div class="modal-body">




                    <div class="form-group">
                        <label for="region" class="control-label">Relationship:</label>
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



<!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
@section('userjs')

<script type="text/javascript">

            var datatable = $('#table').DataTable();
            function deleteRelationship(id){

            swal({
            title: "Are you sure?",
                    text: "You want to delete this  ",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
            }, function () {
            setTimeout(function () {

            $.ajax({

            url: "deleterelationship/" + id,
                    type: "DELETE",
                    data: {_token:   "{{ csrf_token() }}"},
                    success: function (data) {

                    console.log('server data :' + data);
                            if (data == 0) {
                    getRelationships();
                            swal({
                            title: "Success",
                                    text: " deleted successfully",
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
            url: "{{url('saverelationship')}}",
                    type: "POST",
                    data: formData,
                    success: function (data) {
                    console.log('server data :' + data);
                            $('#newModal').modal('hide');
                            if (data == 0) {
                    document.getElementById("NewForm").reset();
                            var url = window.location.href; // Returns full URL
                            getRelationships();
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
            function getRelationships(){

            $.ajax({

            url: "{{url('getrelationships')}}",
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
                                    r[++j] = '<td><a href="#" onclick="deleteRelationship(' + value.id + ')"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-trash" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a></td>';
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
