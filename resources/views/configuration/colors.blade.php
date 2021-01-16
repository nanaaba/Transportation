@extends('layouts.master')

@section('content')

<?php
$permissions = Session::get('permissions');

$allcolors = json_decode($colors);
?>



<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Colors
        </h1>
        <ol class="breadcrumb">

            <li><a href="#">Home</a>
            </li>
            <li><a href="#">Configuration</a>
            </li>
            <li class="active">Colors
            </li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php
        if (in_array("ADD_COLOR", $permissions)) {
            ?>
            <div class="">
                <div class="right_aligned" style="margin-bottom: 15px;">
                    <button type="button" class="btn btn-info " data-toggle="modal" data-target="#newModal">
                        New Color
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
                            <i class="ti-layout-grid3"></i> Colors 
                        </h3>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>Color</th> 

                                        <?php
                                        if (in_array("DELETE_COLOR", $permissions)) {
                                            ?>
                                            <th>Action</th>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allcolors as $single)
                                    <tr>
                                        <td>{{$single->name}}</td>
                                        <td>
                                            <a href="#" onclick="deleteColor({{$single->id}},'{{$single->name}}')"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-trash" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a>

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




        <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">New Color</h4>
                    </div>
                    <form class="form-horizontal" role="form" id="NewForm">
                        {{ csrf_field() }}
                        <div class="modal-body">




                            <div class="form-group">
                                <label for="region" class="control-label">Color:</label>
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

@endsection
@section('userjs')

<script type="text/javascript">

    var datatable = $('#table').DataTable();
    function deleteColor(code, title) {
    console.log(code + title);
    $('#code').val(code);
    $('#holdername').html(title);
    $('#confirmModal').modal('show');
    }

    $('#deleteForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var code = $('#code').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');
    $.ajax({
    url: 'deletecolor/' + code,
            type: "DELETE",
            data: {_token: token},
            success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
            document.getElementById("deleteForm").reset();
            if (data == 0) {
            swal("Success!", "Deleted Successfully", "success");
            getColors();
            } else {
            swal("Error!", "Couldnt delete", "error");
            }
            },
            error: function (jXHR, textStatus, errorThrown) {
            $('#loaderModal').modal('hide');
            alert(errorThrown);
            }
    });
    });
    $('#NewForm').on('submit', function (e) {
    e.preventDefault();
    // var validator = $("#saveRegionForm").validate();
    var formData = $(this).serialize();
    $('#loaderModal').modal('show');
    $('input:submit').attr("disabled", true);
    $.ajax({
    url: "{{url('savecolor')}}",
            type: "POST",
            data: formData,
            success: function (data) {
            console.log(data);
            $('#newModal').modal('hide');
            $('input:submit').removeAttr("disabled");
            $('#loaderModal').modal('hide');
            document.getElementById("NewForm").reset();
            if (data == 0) {
            swal("Success!", "Color Added", "success");
            getColors();
            } else if (data == 1) {
            swal("Error!", "Couldnt add color", "error");
            } else {
            swal("Error!", data, "error");
            }
            },
            error: function (jXHR, textStatus, errorThrown) {
            $('input:submit').removeAttr("disabled");
            $('#loaderModal').modal('show');
            swal("Error!", "Contact System Administrator ", "error");
            }
    });
    });
    function getColors() {
    $.ajax({
    url: "{{url('getcolors')}}",
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

@endsection
