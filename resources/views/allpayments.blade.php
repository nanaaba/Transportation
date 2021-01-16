@extends('layouts.master')

@section('content')

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-2">
                <h3 class="content-header-title mb-0">Cleared Bank Payments</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Banking</a>
                            </li>
                            <li class="breadcrumb-item active">Cleared Bank Payments
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body"><!-- DOM - jQuery events table -->
            <?php
            $payments = json_decode($clearedpayments, true);
            ?> 
            <section id="file-export">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">

                            <div class="card-body collapse in">
                                <div class="card-block card-dashboard table-responsive">
                                    <table id="paymentsTbl" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>

                                                <th>Inflow/Program Code</th>
                                                <th>Banking Code</th>
                                                <th>Bank</th>
                                                <th>Amount Paid</th>
                                                <th>Amount Cleared</th>
                                                <th>Payment Date</th>
                                                <th>Deposited By</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($payments as $value) {
                                                echo "<tr>"
                                                . "<td>" . $value['code'] . "</td>"
                                                . "<td>" . $value['bank_code'] . "</td>"
                                                . "<td>" . $value['bank_name'] . "</td>"
                                                . "<td >" . $value['total_amount'] . "</td>"
                                                . "<td>" . $value['amount'] . "</td>"
                                                . "<td>" . $value['payment_date'] . "</td>"
                                                . "<td>" . $value['deposited_by'] . "</td>"
                                                . "</tr>";
                                            }
                                            ?>

                                        </tbody>
                                    </table>


                                </div>
                                <div class="row" style="margin-bottom: 5px;">
                                    <div class="col-xs-12">
                                        <div class="col-md-10 ">

                                        </div>
                                        <div class="col-md-2 ">
                                            <button type="button" class="btn btn-primary" id="proceedpaymentsbtn">Proceed</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- File export table -->

        </div>
    </div>


    <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="dinflowModalocument">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Make Payments</h4>
                </div>
                <form class="form-horizontal" id="paymentForm" >
                    {{ csrf_field() }}
                    <div class="modal-body">




                        <div class="form-group">
                            <label for="region" class="control-label">Bank Name:</label>
                            <select class="select2 form-control" id="banks" name="bank" style="width: 100%" >
                                <option value="">Select --</option>

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="region" class="control-label">Deposited By:</label>
                            <input type="text" class="form-control" name="depositedby"  >
                        </div>
                        <div class="form-group">
                            <label for="region" class="control-label"> Amount To be Cleared:</label>
                            <input type="text" class="form-control" name="clearedamount" id="clearedamount" readonly >
                        </div>
                        <div class="form-group">
                            <label for="region" class="control-label">Total Amount:</label>
                            <input type="text" class="form-control" name="totalmount"  >
                        </div>
                        <input type="hidden" class="form-control" name="inflows"  id="inflows"  >

                        <div class="form-group  ">
                            <label class="label-control" >Payment Date </label>
                            <div>
                                <div class='input-group date datetimepicker'>
                                    <input type='date' name="paymentdate" class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar-o"></span>
                                    </span>
                                </div>

                            </div>
                        </div>






                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
@section('userjs')
<script type="text/javascript">
    //paymentsTbl

    var paymentsTbl = $('#paymentsTbl').DataTable({
        'columnDefs': [{
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'className': 'dt-body-center'

            }],
        'order': [[5, 'desc']]

    });


</script>

@endsection

