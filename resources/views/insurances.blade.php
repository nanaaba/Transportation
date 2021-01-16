@extends('layouts.datatable')

@section('content')

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-2">
                <h3 class="content-header-title mb-0">  Insurance Report </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Report</a>
                            </li>
                            <li class="breadcrumb-item active">Insurances
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body"><!-- DOM - jQuery events table -->
            <?php
            $insurance = json_decode($insurances);
            $allvehicles = json_decode($vehicles);
            ?>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">

                                <form class="form form-horizontal " id="filterForm">

                                    {{ csrf_field() }}

                                    <div class="form-body">
                                        <div class="row">
                                            
                                             <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" >Type</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control select2" style="width: 100%"  name="type" >
                                                            <option value="">Select  ---</option>
                                                            <option value="insurance">Insurance</option>
                                                            <option value="tax">Tax</option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" >Vehicles</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control select2" style="width: 100%" id="cars" name="vehicle" required>
                                                            <option value="">Select  ---</option>
                                                            @foreach($allvehicles as $vehicle)
                                                            <option value="{{ $vehicle->car_number }} ">{{ $vehicle->car_number }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group row last">
                                                    <label class="col-md-3 label-control" > Date Range </label>
                                                    <div class="col-md-9">
                                                        <div class='input-group date datetimepicker'>
                                                            <input type='daterange' class="form-control" name="daterange" required/>
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar-o"></span>
                                                            </span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <div class="form-actions right">

                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i> Filter Results
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section id="file-export">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">

                            <div class="card-body collapse in">
                                <div class="card-block card-dashboard">
                                    <table id="resultTbl" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Car Number</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Renewal Date</th>
                                                <th>Next Renewal Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($insurance as $single)
                                            <tr>
                                                <td>{{ $single->car_number }} </td>
                                                <td>{{ $single->type }} </td>
                                                <td>GHS {{ $single->amount }} </td>
                                                <td> {{ $single->renewal_date }} </td>
                                                <td> {{ $single->next_renewal_date }} </td>
                                                
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
@section('scripts')
<script type="text/javascript">

    var datatable = $('#resultTbl').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        language: {
            paginate:
                    {previous: "&laquo;", next: "&raquo;"},
            search: "_INPUT_",
            searchPlaceholder: "Search…"
        },
        order: [2, "desc"]


    });
    $('input[name="daterange"]').daterangepicker();
//filterInflowForm

    $('#filterForm').on('submit', function (e) {

        e.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);

        $('#loaderModal').modal('show');
        $.ajax({
            url: "{{url('report/filtercarinsurances')}}",
            type: "POST",
            data: formData,
            success: function (data) {
                console.log('server data :' + data);

                datatable.clear().draw();
                var obj = jQuery.parseJSON(data);
                if (obj.length == 0) {
                    console.log("NO DATA!");
                    $('#loaderModal').modal('hide');

                } else {

                    var rowNum = 0;
                    $.each(obj, function (key, value) {
                        var j = -1;
                        var r = new Array();
                        r[++j] = '<td>' + value.car_number + '</td>';
                        r[++j] = '<td> ' + value.type + '</td>';
                        r[++j] = '<td>' + value.amount + '</td>';
                        r[++j] = '<td>' + value.renewal_date + '</td>';
                        r[++j] = '<td>' + value.next_renewal_date + '</td>';
                     
                        rowNum = rowNum + 1;


                        rowNode = datatable.row.add(r);
                    });
                    $('#loaderModal').modal('hide');

                    rowNode.draw().node();
                }


            }

        });


    });


</script>

@endsection
