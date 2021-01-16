@extends('layouts.master')

@section('content')


<?php
$allvehicles = json_decode($vehicles);
?>


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Vehicles
        </h1>
        <ol class="breadcrumb">

            <li><a href="#">Home</a>
            </li>

            <li class="active">Vehicles
            </li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">





        <div class="row">
            <div class="col-lg-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-grid3"></i> Vehicles 
                        </h3>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>Chassis Number</th>
                                        <th>Front Plate</th>
                                        <th>Color</th>
                                        <th>Brand</th>
                                        <th>Engine Size</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($allvehicles as $vehicle)
                                    <?php
                                    $vehicleid = $vehicle->id;

                                    $parameter = Crypt::encrypt($vehicleid);
                                    ?>
                                    <tr>
                                        <td>{{$vehicle->chasis_number}}</td>
                                        <td>{{$vehicle->front_number_plate}}</td>
                                        <td>{{$vehicle->color}}</td>

                                        <td>{{$vehicle->brand}}</td>
                                        <td>{{$vehicle->enginesize}} litres</td>
                                        <td>
<!--                                                    <a href="vehicleinformation"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-eye" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a>-->
                                            <a href="information/{{$parameter}}"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-edit" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a>
                                            <a href="#" onclick="deleteVehicle({{$vehicle->id}})"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-trash" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a>


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





        <div class="background-overlay"></div>
    </section>
    <!-- /.content -->
</aside>


<!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
@section('userjs')
<script type="text/javascript">
    var datatable = $('#table').DataTable();
    $(function () {

    $('.datetimepicker').datetimepicker({
    format: 'YYYY-MM-DD'
    });
    });
    function deleteVehicle(id){

    swal({
    title: "Are you sure?",
            text: "You want to delete this vehicle ",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
    }, function () {
    setTimeout(function () {

    $.ajax({
    url: "deletevehicle/" + id,
            type: "DELETE",
            data: {_token:   "{{ csrf_token() }}"},
            success: function (data) {

            console.log('server data :' + data);
            if (data == 0) {

            var redirect_url = window.location.href; // Returns full URL

            swal({
            title: "Success",
                    text: "Vehicle deleted successfully",
                    type: "success",
                    closeOnConfirm: true
            }, function () {

            window.location = redirect_url;
            });
            }


            }

    });
    }, 2000);
    });
    }

</script>

@endsection
