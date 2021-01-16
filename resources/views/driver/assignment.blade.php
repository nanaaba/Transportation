@extends('layouts.master')

@section('content')

<?php
$allvehicles = json_decode($vehicles);
$alldrivers = json_decode($drivers);
?>


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            Vehicle Driver Assignment
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
                Assignment 
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">

        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-fw ti-pencil"></i>   Vehicle Driver Assignment Form
                </h3>

            </div>
            <div class="card-body">

                <form class="form-horizontal" role="form" id="vehicleAssignmentForm">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Vehicle</label>
                                <div>
                                    <select class="form-control select2" id="vehicleCode" style="width: 100%" name="vehicleCode" required>
                                        <option value="">Select  ---</option>
                                        @foreach($allvehicles as $vehicle)
                                        <?php
                                        $vehicleid = $vehicle->id;

                                        $parameter = Crypt::encrypt($vehicleid);
                                        ?>
                                        <option value="{{$parameter}}">{{$vehicle->front_number_plate}} </option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="region" class="control-label">Date Purchased:</label>
                                <input type="text" id="datepurchased" class="form-control" readonly>  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Driver</label>
                                <div>
                                    <select class="form-control select2" id="driverCode" style="width: 100%" name="driverCode" required>
                                        <option value="">Select  ---</option>
                                        @foreach($alldrivers as $driver)
                                        <?php
                                        $driverid = $driver->id;

                                        $parameter = Crypt::encrypt($driverid);
                                        ?>
                                        <option value="{{$parameter}}">{{$driver->name}} </option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  last">
                                <label class="label-control"> Date Assigned </label>
                                <div class="">
                                    <div class="input-group date datetimepicker">
                                        <input type="text" name="date_assigned"
                                               id="dateassigned" 
                                               class="form-control datepicker"
                                               required="" data-provide="datepicker"/>
                                   
                                      
                                    </div>

                                </div>
                            </div>

                        </div>


       
            </div>

                    <br><br>
                                   
  <div class="row" style="float: right">
                        <div class="form-actions pull-right">

                            <button class="button button-3d button-action button-pill btn_3d">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
        </div>


    </section>
    <!-- /.content -->
</aside>

<!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
@section('userjs')
<script src="{{asset('js/configuration.js')}}"></script>
<script src="{{asset('js/vehicle.js')}}"></script>
@endsection
