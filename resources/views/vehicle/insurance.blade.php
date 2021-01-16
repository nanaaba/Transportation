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
            Insurance
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
                Insurance 
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">

        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-fw ti-pencil"></i> Insurance Form
                </h3>
        
            </div>
            <div class="card-body">

                <form class="form-horizontal" role="form" id="insuranceForm">
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

                            <div class="form-group ">
                                <label>Insurance Type</label>
                                <div>
                                    <select class="form-control select2" id="insurance_type" style="width: 100%" name="InsuranceType" required>
                                        <option value="">Select  ---</option>
                                        <option value="insurance">Insurance</option>
                                        <option value="roadworthy">Road Worthy</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label>Amount</label>
                                <div>
                                    <input type='text'  name="amount" required class="form-control" />

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Last Insurance date</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-fw ti-calendar"></i>
                                    </div>
                                    <input type='text' id="insurance_renewal_date" 
                                           data-provide="datepicker" name="renewal_date" 
                                           required class="datepicker form-control" />
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Next Renewal date</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-fw ti-calendar"></i>
                                    </div>
                                    <input type='text' id="insurance_renewal_date" 
                                           data-provide="datepicker" name="next_renewal_date" 

                                           required class="datepicker form-control" />
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="text-right ">
                        <button class="button button-3d button-primary button-rounded btn_3d"
                                type="submit">Submit</button>

                    </div>

                </form>
            </div>

        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-fw ti-bus"></i> Vehicle Insurances
                </h3>

            </div>
            <div class="card-body">
                <table id="insuranceTbl" class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>Chassis No</th>
                            <th>Front Number Plate</th>
                            <th>Type</th>
                            <th>Renewal Date</th>
                            <th>Next Renewal Date</th>
                            <th>Amount</th>
                            <th>Action</th>

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
<script src="{{asset('js/insurance.js')}}"></script>

@endsection
