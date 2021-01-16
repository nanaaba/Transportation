/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var base_url = window.location.origin + "/Transportation/";

console.log("url ::" + base_url);
getfueltypes();
getColors();
getVehicleTypes();
getBrands();
getBodyTypes();


function getfueltypes() {
    $.ajax({
        url: base_url + "getfueltypes",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#fueltype').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }
    });
}

function getColors() {
    $.ajax({
        url: base_url + "getcolors",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#colors').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }
    });
}

function getVehicleTypes() {
    $.ajax({
        url: base_url + "configuration/get/vehicle_types",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#vehicleType').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }
    });
}


function getBrands() {
    $.ajax({
        url: base_url + "configuration/get/brand",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#brands').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }
    });
}

function getBodyTypes() {
    $.ajax({
        url: base_url + "configuration/get/body_types",
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#bodytype').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }
    });
}

$('#brands').on('change', function () {
    
            // $("#car_models").select2("val", "");
$("#car_models").empty().trigger('change') ;
    getCarModels(this.value);
});

function getCarModels(brand) {
    $.ajax({
        url: base_url + "getbrandmodel/"+brand,
        type: "GET",
        dataType: 'json',
        success: function (data) {


            $.each(data, function (i, item) {

                $('#car_models').append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
        }
    });
}