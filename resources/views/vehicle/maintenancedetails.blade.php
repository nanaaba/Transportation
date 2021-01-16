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
                <div class="col-md-12">
                            <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-fw ti-pencil"></i> Maintenance Details
                            </h3>

                        </div>
                        <div class="card-body">
                            {{ csrf_field() }}
                           

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

        </form>


    </section>
    <!-- /.content -->
</aside>

<!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
@section('userjs')
<script src="{{asset('js/configuration.js')}}"></script>
<script src="{{asset('js/vehicle.js')}}"></script>
@endsection
