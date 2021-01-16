@extends('layouts.master')

@section('content')


<?php
$alldrivers = json_decode($drivers);
?>


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Drivers
        </h1>
        <ol class="breadcrumb">

            <li><a href="#">Home</a>
            </li>

            <li class="active">Drivers
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
                            <i class="ti-layout-grid3"></i> Drivers 
                        </h3>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone No</th>
                                        <th>Driving Experience</th>
                                        <th>Residence</th>
                                        <th>Date Of Birth</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alldrivers as $driver)
                                    <?php
                                    $driverid = $driver->id;

                                    $parameter = Crypt::encrypt($driverid);
                                    ?>
                                    <tr>
                                        <td>{{ $driver->name }} </td>
                                        <td>{{ $driver->phoneno }} </td>
                                        <td>{{ $driver->experience }} years </td>
                                        <td>{{ $driver->residence }} </td>
                                        <td>{{ $driver->dob }} </td>
                                        <td>
                                            <a href="information/{{$parameter}}"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-edit" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a>

                                            <a href="#" onclick="deleteDriver({{$driver->id}})"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-trash" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a>


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
    function deleteDriver(id){

    swal({
    title: "Are you sure?",
            text: "You want to delete this driver ",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
    }, function () {
    setTimeout(function () {

    $.ajax({
    url: "deletedriver/" + id,
            type: "DELETE",
            data: {_token:   "{{ csrf_token() }}"},
            success: function (data) {

            console.log('server data :' + data);
            if (data == 0) {

            var redirect_url = window.location.href; // Returns full URL

            swal({
            title: "Success",
                    text: "Driver deleted successfully",
                    type: "success",
                    closeOnConfirm: false
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
