@extends('layouts.master')

@section('content')

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-2">
                <h3 class="content-header-title mb-0">Banking</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Banking</a>
                            </li>
                            <li class="breadcrumb-item active">UnCleared Bank Payments
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body"><!-- DOM - jQuery events table -->
            <?php
            $payments = json_decode($unclearedpayments, true);
            ?> 
            <section id="file-export">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">

                            <div class="card-body collapse in">
                                <div class="card-block card-dashboard">
                                    <table id="paymentsTbl" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="select_all" value="1" id="payment-select-all"></th>

                                                <th>Type</th>
                                                <th>Code</th>
                                                <th>Amount</th>
                                                <th>Paid By</th>
                                                <th>Date Paid</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($payments as $value) {
                                                echo "<tr>"
                                                . " <td><input type='checkbox' name='ids[]' value='" . $value['id'] . "' data-amount='" . $value['amount'] . "'></td>"
                                                . "<td>" . $value['type'] . "</td>"
                                                . "<td>" . $value['code'] . "</td>"
                                                . "<td >" . $value['amount'] . "</td>"
                                                . "<td>" . $value['paidby'] . "</td>"
                                                . "<td>" . $value['payment_date'] . "</td>"
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


    $('#payment-select-all').on('click', function () {
        // Get all rows with search applied
        var rows = paymentsTbl.rows({'search': 'applied'}).nodes();
        // Check/uncheck checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
    });

    // Handle click on checkbox to set state of "Select all" control
    $('#paymentsTbl tbody').on('change', 'input[type="checkbox"]', function () {
        // If checkbox is not checked
        if (!this.checked) {
            var el = $('#payment-select-alll').get(0);
            // If "Select all" control is checked and has 'indeterminate' property
            if (el && el.checked && ('indeterminate' in el)) {
                // Set visual state of "Select all" control
                // as 'indeterminate'
                el.indeterminate = true;
            }
        }
    });

//submit form


    $('#paymentForm').on('submit', function (e) {
        e.preventDefault();

        var paymentform = $(this).serialize();
//        var ids = $("[name='ids[]']:checked").map(function () {
//            return $(this).val();
//        }).get();

        console.log('paymentsdata' + paymentform);


        swal({
            title: "Are you sure?",
            text: "You want to clear payments",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function () {
            setTimeout(function () {

                $.ajax({
                    url: "{{url('clearpayments')}}",
                    type: "POST",
                    data: paymentform,
                    success: function (data) {

                        console.log('server data :' + data);
                        if (data == 1) {

                            swal({
                                title: "Error",
                                text: "Contact System Administrator",
                                type: "success",
                                closeOnConfirm: true
                            });
                        } else {
                            swal({
                                title: "Success",
                                text: "Payments cleares successfully.Bank Code is " + data + ".Kindly save for future reference.",
                                type: "success",
                                closeOnConfirm: true
                            });
                        }


                    }

                });


            }, 2000);
        });

        // Iterate over all checkboxes in the table
//   table.$('input[type="checkbox"]').each(function(){
//      // If checkbox doesn't exist in DOM
//      if(!$.contains(document, this)){
//         // If checkbox is checked
//         if(this.checked){
//            // Create a hidden element
//            $(form).append(
//               $('<input>')
//                  .attr('type', 'hidden')
//                  .attr('name', this.name)
//                  .val(this.value)
//            );
//         }
//      }
//   });
    });

    $('#proceedpaymentsbtn').click(function () {

        var amounttobecleared = 0;
        $("[name='ids[]']:checked").each(function () {
            // do stuff
            amounttobecleared = amounttobecleared + $(this).data("amount");
        });

        var ids = $("[name='ids[]']:checked").map(function () {
            return $(this).val();
        }).get();

        var amountobepaid = $("[name='ids[]']:checked").map(function () {
            return $(this).data("amount");
        }).get();

        if (ids.length == 0) {
            //  alert('Select at least one paymnets to be cleared');
            swal('Error', "Select at least one paymnets to be cleared", 'error');

        } else {
            console.log('total amount: ' + amounttobecleared);
            console.log(amountobepaid);
            $('#clearedamount').val('GHS ' + amounttobecleared);
            $('#inflows').val(ids);
            $('#newModal').modal('show');
        }


    });


    $.ajax({
        url: "{{url('getbanks')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#banks').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }
    });
</script>

@endsection
