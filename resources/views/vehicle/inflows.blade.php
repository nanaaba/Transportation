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
            Revenue
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-fw ti-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Revenue</a>
            </li>
            <li class="active">
               New Revenue 
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">

        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-fw ti-pencil"></i>  Revenue Form
                </h3>
                <span class="float-right hidden-xs txt_font">
                    <i class="fa fa-fw ti-angle-up clickable"></i>
                    <i class="fa fa-fw ti-close removecard"></i>
                </span>
            </div>
            <div class="card-body">

                <form class="form-horizontal" role="form" id="expensesForm">
                    {{ csrf_field() }}

                    <input type="hidden" id="vehicleCode" name="vehicleCode"/>

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
                        <label>Any Comments</label>
                        <div>
                            <textarea name="description" style="width: 100%;resize: none;"></textarea>
                        </div>
                    </div>
                        </div>
                          <div class="col-md-6">
                    <div class="form-group ">

                        <label>Date of Payment</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-fw ti-calendar"></i>
                            </div>
                            <input type='text' id="date_of_expense" 
                                   data-provide="date_of_payment" name="date_of_payment" 
                                   required class="datepicker form-control" />
                        </div>
                    </div>

                    <div class="form-group ">
                        <label> Amount</label>
                        <div>
                            <input type='text'  name="amount"  required class="form-control" />

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
                    <i class="fa fa-fw ti-bus"></i>General Expenses
                </h3>

            </div>
            <div class="card-body">
                <table id="expenseTbl" class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>Chassis No</th>
                            <th>Front Number Plate</th>
                          
                            <th>Description</th>
                            <th>Date of Expense</th>
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
<script src="{{asset('js/expenses.js')}}"></script>

@endsection
