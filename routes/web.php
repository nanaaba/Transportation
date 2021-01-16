<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return view('login');
});

Route::post('login/authenticateuser', 'LoginController@authenticateUser');



//views
Route::group(['middleware' => 'check-userauth'], function () {
    Route::get('test/{insuranceCode}', 'InsuranceController@retrieveVehicleInsurances');


    Route::get('configuration/get/{tablename}', 'ConfigurationController@getGenericConfigurations');
    Route::get('getbrandmodel/{brand}', 'ConfigurationController@getBrandModels');

    Route::get('dashboard', 'DashboardController@showdashboard');
    Route::get('vehicle/new', 'VehicleController@create');
    Route::get('vehicle/all', 'VehicleController@index');
    Route::get('vehicle/insurance', 'InsuranceController@Index');
    Route::get('vehicle/maintenance', 'MaintenanceController@Index');
    Route::get('vehicle/repairs', 'RepairsController@Index');
    Route::get('vehicle/expenses', 'ExpensesController@index');
    Route::post('assignvehicle', 'VehicleController@assignVehicle');

    Route::get('revenue/new', 'RevenueController@create');
    Route::get('revenue/all', 'RevenueController@Index');



    Route::get('driver/new', 'DriverController@create');
    Route::get('driver/all', 'DriverController@index');
    Route::get('driver/information/{key}', 'DriverController@information');
    Route::get('driver/assignment', 'DriverController@assignment');
    Route::get('vehicle/information/{key}', 'VehicleController@vehicleinformation');
    Route::get('vehicleinformation/{key}', 'VehicleController@Apivehicleinformation');

    // Route::get('users', 'UserController@showusers');
    Route::get('report/cumulativeinflows', 'ReportController@showCumulativeInflow');
    Route::get('report/insurances', 'ReportController@showinsurances');
    Route::get('report/cumulativemaintenance', 'ReportController@showCumulativemaintenance');
    Route::get('report/maintenance', 'ReportController@showmaintenance');
    Route::get('report/inflows', 'ReportController@showInflow');
    Route::get('configuration/colors', 'ConfigurationController@showcolors');
    Route::get('configuration/carmodels', 'ConfigurationController@showcarmodels');
    Route::get('configuration/fueltypes', 'ConfigurationController@showfueltypes');
    Route::get('configuration/modelyear', 'ConfigurationController@showcarmodelyear');
    Route::get('configuration/relationship', 'ConfigurationController@showrelationship');
    Route::get('configuration/banks', 'ConfigurationController@showbanks');
    Route::get('settings', 'ConfigurationController@showsettings');

    //
    Route::get('account/usergroups', 'AccountController@showusergroups');
    Route::get('account/permissions', 'AccountController@showpermissions');
    Route::get('account/users', 'AccountController@showusers');
    //assignpermissions
    Route::get('account/assignpermissions', 'AccountController@showassignpermissions');
    Route::get('banking/clearpayments', 'BankingController@showunclearedpayments');
    Route::get('banking/viewclearedpayments', 'BankingController@showclearedpayments');



    //apis
    Route::get('getcompanyvehicleexpenses', 'ExpensesController@retrieveCompanyVehicleExpenses');

    Route::get('getcompanyvehiclerepairs', 'RepairsController@retrieveCompanyRepairs');

    Route::get('getcompanyinsurances', 'InsuranceController@retrieveCompanyInsurances');
    Route::get('getfueltypes', 'ConfigurationController@getFuelTypes');
    Route::get('getcolors', 'ConfigurationController@getColors');
    Route::get('getmodelyear', 'ConfigurationController@getModelYears');
    Route::get('getrelationships', 'ConfigurationController@getRelationships');
    Route::get('getbanks', 'ConfigurationController@getBanks');

    Route::get('getcarmodels', 'ConfigurationController@getCarmodels');
    Route::get('getvehicles', 'VehicleController@getVehicles');
    Route::get('getdriver', 'DriverController@getDrivers');
    Route::get('getinsurances/{insurancetype}/{carnumber}', 'VehicleController@getInsurances');
    Route::get('getunassigneddriver', 'VehicleController@getUnassignedDrivers');
    Route::get('getunassignedvehicles', 'VehicleController@getUnassignedVehicles');
    Route::get('getassignedvehiclesdriver', 'DriverController@getAssignedvehicles');
    Route::get('getpermanentdriver', 'DriverController@getPermanentDrivers');
    Route::get('gettemporaldriver', 'DriverController@getTemporalDrivers');
    Route::get('car/carinformation/{carnumber}', 'VehicleController@getCardetails');
    Route::get('getusers', 'AccountController@getUsers');
    Route::get('getusergroups', 'AccountController@getUserGroups');
    Route::get('getpermissions', 'AccountController@getPermissions');
    Route::get('account/user/{id}', 'AccountController@getUserInformation');
    Route::get('account/getusergrouppermissions/{id}', 'AccountController@getUserGroupPermissions');
    Route::get('getcompanyrevenue', 'RevenueController@getCompanyRevenue');


    Route::post('savevehicle', 'VehicleController@saveVehicle');
    Route::post('savedriver', 'DriverController@saveDriver');
    Route::post('assigneddriver', 'VehicleController@assignDrivers');
    Route::post('saveinsurance', 'InsuranceController@save');
    Route::post('saverepair', 'RepairsController@create');
    Route::post('saveinflow', 'VehicleController@saveInflow');
    Route::post('saveprogram', 'VehicleController@saveProgram');
    Route::post('updatedriver', 'DriverController@updateDriver');
    Route::post('savemaintenance', 'MaintenanceController@create');
    Route::post('saveexpense', 'ExpensesController@create');
    Route::post('saverevenue', 'RevenueController@save');


    //
    //setMemo
    Route::post('savenotes', 'DriverController@setMemo');
    Route::post('vehicle/updatevehicle', 'VehicleController@updateVehicle');
    Route::post('report/filtercarinflows', 'ReportController@getCarInflows');
    Route::post('report/filtercarmaintenance', 'ReportController@getCarMaintenanceHistory');
    Route::post('report/filtercarinsurances', 'ReportController@getInsuranceHistory');

    //configuration
    Route::post('savecolor', 'ConfigurationController@saveColor');
    Route::post('savefueltype', 'ConfigurationController@saveFuelType');
    Route::post('savecarmodel', 'ConfigurationController@saveCarModel');
    Route::post('savemodelyear', 'ConfigurationController@saveModelYear');
    Route::post('saverelationship', 'ConfigurationController@saveRelationship');
    Route::post('savebank', 'ConfigurationController@saveBank');


    Route::post('savepermission', 'AccountController@savePermission');
    Route::post('saveuser', 'AccountController@saveUser');
    Route::post('saveusergroup', 'AccountController@saveUserGroup');
    Route::post('account/saveusergrouppermissions', 'AccountController@saveUserGroupPermisions');
    Route::post('clearpayments', 'BankingController@markpaymentsascleared');


    Route::put('updateusergroup', 'AccountController@updateUserGroup');
    Route::put('updateuser', 'AccountController@updateUser');



    Route::delete('vehicle/deletevehicle/{id}', 'VehicleController@deleteVehicle');
    Route::delete('driver/deletedriver/{id}', 'DriverController@deleteDriver');
    Route::delete('configuration/deletecolor/{id}', 'ConfigurationController@deleteColor');
    Route::delete('configuration/deletemodelyear/{id}', 'ConfigurationController@deleteModelYear');
    Route::delete('configuration/deleterelationship/{id}', 'ConfigurationController@deleteRelationship');
    Route::delete('configuration/deletebank/{id}', 'ConfigurationController@deleteBank');

    Route::delete('configuration/deletecarmodel/{id}', 'ConfigurationController@deleteCarModel');
    Route::delete('configuration/deletefueltype/{id}', 'ConfigurationController@deleteFuelType');
    Route::delete('account/deleteuser/{id}', 'AccountController@deleteUser');
    Route::delete('account/deleteusergroup/{id}', 'AccountController@deleteUserGroup');
    Route::delete('account/deletepermission/{id}', 'AccountController@deletePermission');
    Route::get('runbackup', 'ConfigurationController@runDataBackup');
});
Route::get('/logout', function() {
    //Uncomment to see the logs record
    //\Log::info("Session before: ".print_r($request->session()->all(), true));
    Session::flush();
    //Uncomment to see the logs record
    //\Log::info("Session after: ".print_r($request->session()->all(), true));
    return redirect('/');
});


