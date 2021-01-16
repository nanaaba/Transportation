/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var base_url = window.location.origin + "/Transportation/";

$('#revenueForm').on('submit', function (e) {

    e.preventDefault();
    var formData = $(this).serialize();
    console.log(formData);
  
        swal({
            title: "Are you sure?",
            text: "Save Revenue Data",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: base_url + "saverevenue",
                            type: "POST",
                            data: formData,
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                               console.log('server data :' + data);
                                if (data.status == "success") {
                                    document.getElementById("revenueForm").reset();
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



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var datatable = $('#revenueTbl').DataTable({
    buttons: [
        {extend: 'copyHtml5', footer: true},
        {extend: 'excelHtml5', footer: true},
        {extend: 'csvHtml5', footer: true},
        {extend: 'print', footer: true}
    ],
    "order": [[0, "desc"]]

});

datatable.buttons().container()
        .appendTo($('.col-sm-6:eq(0)', datatable.table().container()));


var base_url = window.location.origin + "/Transportation/";
getCompanyRevenues();


function getCompanyRevenues() {


    $.ajax({
        url: base_url + "getcompanyrevenue",
        type: "GET",
        dataType: "json",
        success: function (data) {


            if (data.status == "error") {
                swal('Error', data.message, 'error');
                return;
            }

            var actual_data = data.details;

            datatable.clear().draw();
            if (actual_data.length == 0) {
                alert("NO DATA!");
            } else {
                $.each(actual_data, function (key, value) {
                    var j = -1;
                    var r = new Array();
                    // represent columns as array

                    r[++j] = '<td class="subject">' + value.chasis_number + '</td>';
                    r[++j] = '<td class="subject">' + value.front_number_plate + '</td>';
                    r[++j] = '<td class="subject">' + value.description + '</td>';
                    r[++j] = '<td class="subject">' + value.payment_date + '</td>';
                r[++j] = '<td class="subject">' + value.payment_mode + '</td>';
                   
                    r[++j] = '<td class="subject">' + value.type + '</td>';
                   
                    r[++j] = '<td class="subject">' + value.amount + '</td>';
                   
                    r[++j] = '<a href="#" onclick="deleteInsurance('+value.id+')"   class="btn btn-outline-info btn-sm btn-edit editBtn" ><i class="fa fa-trash" ></i><span class="hidden-md hidden-sm hidden-xs"> </span></a>';

                    rowNode = datatable.row.add(r);
                });
                rowNode.draw().node();
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    }
    );
}
