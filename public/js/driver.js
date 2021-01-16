/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var base_url = window.location.origin + "/Transportation/";

getRelationships();

function getRelationships() {
    $.ajax({
        url: base_url + "getrelationships",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#relationships').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }
    });
}


$('#driverForm').on('submit', function (e) {

    e.preventDefault();
    //var formData = $(this)[0].serialize();
    var form = $('#driverForm')[0];

    var formData = new FormData(form);
    console.log(formData);

    $.ajax({
        url: base_url + "savedriver",
        type: "POST",
        data: formData,
        dataType: 'json',
        processData: false,  // Important!
        contentType: false,
        cache: false,

        success: function (data) {

            console.log('server data :' + data);

        }
    });


});


$('#updatedriverForm').on('submit', function (e) {

    e.preventDefault();
    //var formData = $(this)[0].serialize();
    var form = $('#updatedriverForm')[0];

    var formData = new FormData(form);
    console.log(formData);

    $.ajax({
        url: base_url + "updatedriver",
        type: "POST",
        data: formData,
        dataType: 'json',
        processData: false,  // Important!
        contentType: false,
        cache: false,

        success: function (data) {

            console.log('server data :' + data);

        }
    });


});


