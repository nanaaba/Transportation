@extends('layouts.datatable')

@section('content')

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-2">
                <h3 class="content-header-title mb-0">Cumulative Vehicles Maintenances </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Report</a>
                            </li>
                            <li class="breadcrumb-item active">Maintenances
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body"><!-- DOM - jQuery events table -->

            <?php
            $cumm_maintenance = json_decode($maintenance);
            ?>
            <section id="file-export">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">

                            <div class="card-body collapse in">
                                <div class="card-block card-dashboard">
                                    <table class="table table-striped table-bordered dataex-html5-export">
                                        <thead>
                                            <tr>
                                                <th>Car Number</th>
                                                <th>Date Purchased</th>
                                                <th>Date Assigned</th>
                                                <th>Total Cost</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cumm_maintenance as $single)
                                            <tr>
                                                <td>{{ $single->car_number }} </td>
                                                <td>{{ $single->purchased_date }} </td>
                                                <td>{{ $single->date_car_assigned }} </td>
                                                <td>GHS {{ $single->total_amount }} </td>


                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- File export table -->

        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
@section('userjs')
<script type="text/javascript">
    $(function () {
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>

@endsection
