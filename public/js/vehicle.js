
var base_url = window.location.origin + "/Transportation/";
var taxTbl = $('#expensesTbl').DataTable();
var maintenanceTbl = $('#maintenanceTbl').DataTable();

var inflowTbl = $('#revenueTbl').DataTable();
var programTbl = $('#repairTbl').DataTable();

getCarAccessories();


$('#savevehicleform').on('submit', function (e) {

    e.preventDefault();
    var formData = $(this).serialize();
    console.log(formData);
    //validations;
    var insurancerenewaldate = $('#insurance_renewal_date').val();
    var insurancenextrenewaldate = $('#insurance_next_renewal_date').val();
    var roadworthy_date = $('#roadworthy_date').val();
    var roadworthy_expiry_date = $('#roadworthy_expiry_date').val();
    if (insurancenextrenewaldate < insurancerenewaldate) {
        swal('Error', "Expiry Date for insurance must be greater than the Insurance Date", 'error');
    } else if (roadworthy_expiry_date < roadworthy_date) {

        swal('Error', "Expiry Date for Road Worthy must be greater than the Road Worthy Date", 'error');
    } else {

        swal({
            title: "Confirm",
            text: "Are you sure you to save vehicle information",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((savevehicle) => {
                    if (savevehicle) {
                        $.ajax({
                            url: base_url + "savevehicle",
                            type: "POST",
                            data: formData,
                            dataType: "json",
                            success: function (data) {
                                console.log('server data :' + data);
                                console.log('server data :' + data.status);
                                if (data.status == "success") {
                                    //  $('#savevehicleform select').val('').trigger('change');

                                    //  document.getElementById("savevehicleform").reset();

                                    swal("Success", data.message, 'success');
                                } else {
                                    swal('Error', data.message, 'error');
                                }
                            }

                        });
                    } else {
                        return false;
                    }
                });
    }

});
$('#updatevehicleform').on('submit', function (e) {

    e.preventDefault();
    var formData = $(this).serialize();
    console.log(formData);
    $.ajax({
        url: base_url + "vehicle/updatevehicle",
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (data) {
            console.log('server data :' + data);
            if (data.status == "success") {
                //  $('#savevehicleform select').val('').trigger('change');

                //  document.getElementById("savevehicleform").reset();

                swal("Success", data.message, 'success');
            } else {
                swal('Error', data.message, 'error');
            }
        }

    });
});
function payinsurance(vehiclecode) {

    $("#vehicleCode").val(vehiclecode);
    $('#insuranceModal').modal("show");
}


$('#repairForm').on('submit', function (e) {

    e.preventDefault();
    var formData = $(this).serialize();
    console.log(formData);
    swal({
        title: "Are you sure?",
        text: "Save Repair Data",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: base_url + "saverepair",
                        type: "POST",
                        data: formData,
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            $('#insuranceModal').modal('hide');
                            console.log('server data :' + data);
                            if (data.status == "success") {
                                document.getElementById("repairForm").reset();
                                swal("Success", data.message, 'success');
                                var url = window.location.href; // Returns full URL

                                window.location = url;
                            } else {
                                swal('Error', data.message, 'error');
                            }
                        }

                    });
                } else {
                    return false;
                }
            });
});
function addRow(tableID) {

    var table = document.getElementById(tableID);
    var colCount = table.rows.length;
    var row = table.insertRow(colCount);
    //var table = document.getElementById(tableID);

//    var rowCount = table.rows.length;
//    var row = table.insertRow(rowCount);

    //   var colCount = table.rows[0].cells.length;

    for (var i = 0; i < colCount; i++) {

        var newcell = row.insertCell(i);
        newcell.innerHTML = table.rows[0].cells[i].innerHTML;
        //alert(newcell.childNodes);
        switch (newcell.childNodes[0].type) {
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "checkbox":
                newcell.childNodes[0].checked = false;
                break;
            case "select-one":
                newcell.childNodes[0].selectedIndex = 0;
                break;
        }
    }
}


$('#vehicleCode').change(function () {

    var vehicleCode = $(this).val();
    getVehicleDetails(vehicleCode);
});
function getVehicleDetails(vehicleCode) {

    $.ajax({
        url: base_url + "vehicleinformation/" + vehicleCode,
        type: "GET",
        dataType: "json",
        success: function (data) {

            if (data.status == "success") {
                $('#datepurchased').val(data.details.purchased_date);
            } else {
                swal('Error', data.message, 'error');
            }
        }

    });
}



$('#vehicleAssignmentForm').on('submit', function (e) {

    e.preventDefault();
    var formData = $(this).serialize();
    console.log(formData);
    swal({
        title: "Are you sure?",
        text: "Assign Vehicle",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: base_url + "assignvehicle",
                        type: "POST",
                        data: formData,
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            if (data.status == "success") {
                                document.getElementById("vehicleAssignmentForm").reset();
                                swal("Success", data.message, 'success');
                            } else {
                                swal('Error', data.message, 'error');
                            }
                        }

                    });
                } else {
                    return false;
                }
            });
});
var newMaintenance = '<div class="row">' +
        '             <div class="col-md-5">          ' +
        '<div class="form-group form-focus select-focus">' +
        '<label class="control-label">Repairs</label>' +
        '<select class="select  select2 repairs" required name="repairs[]">' +
        '<option value="">Select ---</option>' +
        '</select>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-5">' +
        '<div class="form-group form-focus">' +
        '<label class="control-label">Amount</label>' +
        '<input type="text" name="amount[]" required class="form-control floating maintenanceamount">' +
        '</div>' +
        '</div>' +
        '<a href="#" class="btn btn-danger remove_field">' + '<i class="fa fa-minus"></i></a>' +
        '</div>';

var max_fields = 10; //maximum input boxes allowed
var maintenancewrapper = $("#maintenanceDiv"); //Fields wrapper
var maintenance_add_button = $(".add-maintenance"); //Add button ID

var x = 1; //initlal text box count
$(maintenance_add_button).click(function (e) { //on add input button click
    e.preventDefault();
    if (x < max_fields) { //max input box allowed
        $(maintenancewrapper).append(newMaintenance);
        x++; //text box increment

    } else {


        swal('Info', "Cant add more than 10 maintenance list items", 'info');
    }
    $('.select2').select2();
    getCarAccessories();
});

$(maintenancewrapper).on("click", ".remove_field", function (e) { //user click on remove text
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
});


function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
}


function getCarAccessories() {

    $(".repairs").empty().trigger('change');
    $('.repairs').append($('<option>', {
        value: "",
        text: "Select ---"
    }));

    $.ajax({
        url: base_url + "configuration/get/car_parts_accessories",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('.repairs').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }
    });
}



$('#maintenanceForm').on('submit', function (e) {

    e.preventDefault();
    var formData = $(this).serialize();

 $('input[name=amount]').each(function(i, item) {
         var grade =  $(item).val();
         alert(grade);
     });
//
        swal({
            title: "Are you sure?",
            text: "Save Maintenance Data",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: base_url + "savemaintenance",
                            type: "POST",
                            data: formData,
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                $('#insuranceModal').modal('hide');
                                console.log('server data :' + data);
                                if (data.status == "success") {
                                    document.getElementById("insuranceForm").reset();
                                    var url = window.location.href; // Returns full URL

                                    window.location = url;
                                    swal("Success", data.message, 'success');
                                } else {
                                    swal('Error', data.message, 'error');
                                }
                            }

                        });
                    } else {
                        return false;
                    }
                });
    
});