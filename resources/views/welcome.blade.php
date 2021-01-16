@extends('layouts.master')

@section('content')
<?php
$allvehicles = json_decode($vehicles);
?>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            Maintenance
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-fw ti-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Vehicles</a>
            </li>
            <li class="active">
                Maintenance 
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <form class="form-horizontal" role="form" id="insuranceForm">
            <div class="row">
                <div class="col-md-5">
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-fw ti-pencil"></i> Maintenance Form
                            </h3>

                        </div>
                        <div class="card-body">


                            {{ csrf_field() }}

                            <input type="hidden" id="vehicleCode" name="vehicleCode"/>


                            <div class="form-group ">
                                <label>Vehicle</label>
                                <div>
                                    <select class="form-control select2" id="vehicle" style="width: 100%" name="vehicle" required>
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
                            <div class="form-group ">
                                <label>Description</label>
                                <div>
                                    <textarea name="description" style="width: 100%;resize: none;"></textarea>
                                </div>
                            </div>

                            <div class="form-group ">

                                <label>Maintenance Date</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-fw ti-calendar"></i>
                                    </div>
                                    <input type='text' id="insurance_renewal_date" 
                                           data-provide="datepicker" name="renewal_date" 
                                           required class="datepicker form-control" />
                                </div>
                            </div>



                            <div class="form-group ">
                                <label>Total Amount</label>
                                <div>
                                    <input type='text'  name="amount" readonly required class="form-control" />

                                </div>

                            </div>




                        </div>

                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-fw ti-pencil"></i> Maintenance Details
                            </h3>

                        </div>
                        <div class="card-body">
                            {{ csrf_field() }}
                            <button onclick="addRow('maintenanceDetails')"  type="button" class="btn btn-labeled btn-primary">
                                Add Row
                            </button>
                            <button onclick="deleteRow('maintenanceDetails')"  type="button" class="btn btn-labeled btn-danger">

                                Delete Row
                            </button>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="maintenanceDetails" style="cursor: pointer;">
<!--                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Parts</th>
                                            <th>Amount</th>

                                        </tr>
                                    </thead>
                                    <tbody>-->
                                        <tr>
                                            <td tabindex="1"><input type="checkbox"/></td>
                                            <td tabindex="1">  
                                                <select class="form-control select2" style="width: 100%" name="parts[]" required>
                                                    <option value="">Select  ---</option>

                                                </select></td>
                                                <td tabindex="1"><input type="text" class="form-control" name="amount[]"/></td>
                                   
                                        </tr>
<!--                                    </tbody>-->
                                </table>
                            </div>
                     
                        </div>
                    </div>
                </div>
                <div class="text-right ">
                    <button class="button button-3d button-primary button-rounded btn_3d"
                            type="submit">Submit</button>

                </div>
        </form>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-fw ti-bus"></i> Vehicle Maintenances
                </h3>

            </div>
            <div class="card-body">
                <table id="insuranceTbl" class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>Chassis No</th>
                            <th>Front Number Plate</th>
                            <th>Description</th>
                            <th>Maintenance Date</th>
                            <th>Total Amount</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
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
