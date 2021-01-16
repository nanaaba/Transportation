@extends('layouts.master')

@section('content')



<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            Vehicle Registration
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
                New
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">

        <div class="row" id="complex-form2">
            <!--5th tab bank application starting-->
            <div class="col-lg-12">
                <form class="grid-form form-horizontal" id="savevehicleform">

                    {{ csrf_field() }}

                    <div class="text-center">
<!--                        <img src="{{ asset('img/pages/complexform1.png')}}" alt="bank name" width="200">-->

                        <h3>Vehicle Registration Form</h3>
                    </div>

                    <fieldset>
                        <legend>(A) Car Information</legend>
                        <div data-row-span="4">
                            <div data-field-span="4">

                                <div class="form-group row">
                                    <label for="first_appl" class="col-md-4"> Chassis Number:</label>
                                    <div class="col-md-8">

                                        <input type="text"  class="form-control "  name="chasis_number" required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="second_appl" class="col-md-4"> Front Number Plate:</label>
                                    <div class="col-md-8">
                                        <input type="text"  class="form-control "  name="front_number_plate" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="second_appl" class="col-md-4"> Back Number Plate:</label>
                                    <div class="col-md-8">
                                        <input type="text"  class="form-control "  name="back_number_plate" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="second_appl" class="col-md-4"> Date Purchased:</label>
                                    <div class="col-md-8">
                                        <input type='text' class="form-control datepicker"  data-provide="datepicker"  id="purchaseddate" name="purchased_date" required/>
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
                                            <option value="">Select  ---</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" > Brand</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2" style="width: 100%" id="brands" name="brand" required>
                                            <option value="">Select  ---</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" >Car Model</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2" style="width: 100%" id="car_models" name="carmodel" required>
                                            <option value="">Select  ---</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" > Body Type</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2" style="width: 100%" id="bodytype" name="body_type" required>
                                            <option value="">Select  ---</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" >Transmission</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2" style="width: 100%" name="transmission" required>
                                            <option value="">Select  ---</option>
                                            <option value="Automatic">Automatic</option>
                                            <option value="Manual">Manual</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div data-field-span="2">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" > Engine Size</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2" style="width: 100%" name="enginesize" required>
                                            <option value="">Select engine size ---</option>
                                            <?php
                                            $i = 0.7;
                                            while ($i < 12) {
                                                echo '<option value="' . $i . '">' . $i . ' litres </option>';
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
                                            <option value="">Select fuel ---</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" >Color</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2" id="colors" style="width: 100%" name="color" required>
                                            <option value="">Select color ---</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-md-4 label-control" >Model Year </label>
                                    <div class="col-md-8">
                                        <select class="form-control select2" style="width: 100%" name="manufactured_year"required >
                                            <option value="">Select year ---</option>
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
                    <fieldset>
                        <legend>(B) Settings</legend>
                        <div data-row-span="6">
                            <div data-field-span="2">
                                <strong style="font-size: 14px;">Car Insurance</strong>
                                <br/> <br/>
                                <div class="form-group ">
                                    <label> Insurance date</label>
                                    <div>
                                        <input type='text' id="insurance_renewal_date"  data-provide="datepicker"  name="insurance_renewal_date" required class="datepicker form-control" />

                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label >Expiry date</label>
                                    <div  >
                                        <input type='text' id="insurance_next_renewal_date" data-provide="datepicker"  name="insurance_next_renewal_date" required class="datepicker form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <div>
                                        <input type='text'  name="insurance_amount" required class="form-control" />

                                    </div>
                                </div>
                            </div> 
                            <div data-field-span="2">
                                <strong style="font-size: 14px;">Road Worthy</strong>
                                <br/><br/>
                                <div class="form-group">
                                    <label >  Road Worthy Date</label>
                                    <div >
                                        <input type='text' id="roadworthy_date" data-provide="datepicker" name="roadworthy_date" required class="datepicker form-control" />

                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label>Expiry Date</label>
                                    <div>
                                        <input type='text' id="roadworthy_expiry_date" data-provide="datepicker" name="roadworthy_expiry_date" required class="datepicker form-control" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label>Amount</label>
                                    <div >
                                        <input type='text'  name="roadworthy_amount" required class="form-control" />

                                    </div>
                                </div>
                            </div> 
                            <div data-field-span="2">

                                <strong style="font-size: 14px;">Car Maintenance</strong>
                                <br/><br/>
                                <div class="form-group ">
                                    <label>Last Maintenance date</label>
                                    <div>
                                        <input type='text' id="maintenance_date" data-provide="datepicker" name="maintenance_date" required class="form-control datepicker" />

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Period</label>
                                    <div>
                                        <select class="form-control select2" required style="width: 100%" name="maintenance_period">
                                            <option value="">Select period ---</option>
                                            <option value="1 month">1 month</option>
                                            <?php
                                            $i = 2;
                                            $year = date("Y");
                                            while ($i <= 12) {
                                                echo '<option value="' . $i . ' months">' . $i . ' months  </option>';
                                                $i = $i + 1;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div> 
                        </div>


                    </fieldset>


                    <label> ABOVE FIELDS ARE MANDATORY *</label>

                    <br/><br/>
                    <div class="row" style="float: right">
                        <div class="form-actions pull-right">

                            <button class="button button-3d button-action button-pill btn_3d">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--5 th tab bank application ending  -->
        <!--rightside bar -->

    </section>
    <!-- /.content -->
</aside>

<!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
@section('userjs')
<script src="{{asset('js/configuration.js')}}"></script>
<script src="{{asset('js/vehicle.js')}}"></script>

@endsection
