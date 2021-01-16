@extends('layouts.master')

@section('content')

<?php
$vehicleInformation = json_decode($cardata, true);

?>


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            {{$vehicleInformation['front_number_plate']}} Information
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
                Information 
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">

        <section class="content">

            <div class="row" id="complex-form2">
                <!--5th tab bank application starting-->
                <div class="col-lg-12">
                    <form class="grid-form form-horizontal" id="updatevehicleform">
                        <input type="hidden" name="vehicle_code" value="{{$vehicleInformation['id']}}"/>
                        {{ csrf_field() }}

                        <div class="text-center">
    <!--                        <img src="{{ asset('img/pages/complexform1.png')}}" alt="bank name" width="200">-->

                            <h3>{{$vehicleInformation['front_number_plate']}} Information</h3>
                        </div>
                        <br>

                        <fieldset>
                            <legend>(A) Car Information</legend>
                            <div data-row-span="4">
                                <div data-field-span="4">

                                    <div class="form-group row">
                                        <label for="first_appl" class="col-md-4"> Chassis Number:</label>
                                        <div class="col-md-8">

                                            <input type="text"  class="form-control " value="{{$vehicleInformation['chasis_number']}} "  name="chasis_number" required>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="second_appl" class="col-md-4"> Front Number Plate:</label>
                                        <div class="col-md-8">
                                            <input type="text"  class="form-control " value="{{$vehicleInformation['front_number_plate']}}"  name="front_number_plate" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="second_appl" class="col-md-4"> Back Number Plate:</label>
                                        <div class="col-md-8">
                                            <input type="text"  class="form-control " value="{{$vehicleInformation['back_number_plate']}}"  name="back_number_plate" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="second_appl" class="col-md-4"> Date Purchased:</label>
                                        <div class="col-md-8">
                                            <input type='text' class="form-control datepicker"  value="{{$vehicleInformation['purchased_date']}}"  data-provide="datepicker"  id="purchaseddate" name="purchased_date" required/>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div data-row-span="4">
                                <div data-field-span="2">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" > Vehicle Type</label>
                                        <div class="col-md-8">
                                            <select class="form-control select2" style="width: 100%" name="vehicle_type" id="vehicleType" required>
                                                <option  value="{{$vehicleInformation['vehicle_type']}}">{{$vehicleInformation['vehicle_type']}}</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" > Brand</label>
                                        <div class="col-md-8">
                                            <select class="form-control select2" style="width: 100%" id="brands" name="brand" required>
                                                <option  value="{{$vehicleInformation['brand']}}">{{$vehicleInformation['brand']}}</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" >Car Model</label>
                                        <div class="col-md-8">
                                            <select class="form-control select2" style="width: 100%" id="car_models" name="carmodel" required>
                                                <option  value="{{$vehicleInformation['carmodel']}}">{{$vehicleInformation['carmodel']}}</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" > Body Type</label>
                                        <div class="col-md-8">
                                            <select class="form-control select2" style="width: 100%" id="bodytype" name="body_type" required>
                                                <option  value="{{$vehicleInformation['body_type']}}">{{$vehicleInformation['body_type']}}</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" >Transmission</label>
                                        <div class="col-md-8">
                                            <select class="form-control select2" style="width: 100%" name="transmission" required>
                                                <option <?php ( $vehicleInformation['transmission'] == "Automatic") ? 'selected' : '' ?> value="Automatic" >Automatic</option>
                                                <option <?php ( $vehicleInformation['transmission'] == "Manual") ? 'selected' : '' ?>  value="Manual">Manual</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div data-field-span="2">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" > Engine Size</label>
                                        <div class="col-md-8">
                                            <select class="form-control select2" style="width: 100%" name="enginesize" required>
                                                <option  value="{{$vehicleInformation['enginesize']}}">{{$vehicleInformation['enginesize']}}</option>

                                                <?php
                                                $i = 0.7;
                                                while ($i < 12) {
                                                    echo '<option  value="' . $i . '">' . $i . ' litres </option>';
                                                    $i = $i + 0.1;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" >Fuel Type</label>
                                        <div class="col-md-8">
                                            <select class="form-control select2" id="fueltype" name="fueltype" style="width: 100%" required>
                                                <option  value="{{$vehicleInformation['fueltype']}}">{{$vehicleInformation['fueltype']}}</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" >Color</label>
                                        <div class="col-md-8">
                                            <select class="form-control select2" id="colors" style="width: 100%" name="color" required>
                                                <option  value="{{$vehicleInformation['color']}}">{{$vehicleInformation['color']}}</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label class="col-md-4 label-control" >Model Year </label>
                                        <div class="col-md-8">
                                            <select class="form-control select2" style="width: 100%" name="manufactured_year"required >
                                                <option  value="{{$vehicleInformation['manufactured_year']}}">{{$vehicleInformation['manufactured_year']}}</option>
                                                <?php
                                                $i = 1980;
                                                $year = date("Y");
                                                while ($i <= $year) {
                                                    echo '<option value="' . $i . '">' . $i . '  </option>';
                                                    $i = $i + 1;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </fieldset>
                        <br>
                        <br>


                        <br/><br/>
                        <div class="row" style="float: right">
                            <div class="form-actions pull-right">

                                <button class="button button-3d button-action button-pill btn_3d">
                                    Update Information
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--5 th tab bank application ending  -->
            <!--rightside bar -->
     
        </section>

    </section>
    <!-- /.content -->
</aside>

<!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
@section('userjs')
<script src="{{asset('js/configuration.js')}}"></script>
<script src="{{asset('js/vehicle.js')}}"></script>
@endsection
