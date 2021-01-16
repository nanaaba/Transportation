@extends('layouts.master')

@section('content')


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


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-fw ti-bus"></i> Revenue
                </h3>

            </div>
            <div class="card-body">
                <table id="revenueTbl" class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>Chassis No</th>
                            <th>Front Number Plate</th>

                            <th>Description</th>
                            <th>Date of Payment</th>
                            <th> Payment Mode</th>
                            <th>Revenue Type</th>
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

<script src="{{asset('js/revenue.js')}}"></script>

@endsection
