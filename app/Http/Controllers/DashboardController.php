<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\services\VehicleService;
use App\services\DriverService;

use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\NotificationController;



class DashboardController extends Controller {

    protected $driverService;
    private $companyid;
    protected $vehicleservice;
    private $userId;

    public function __construct() {

        $vehicle = new VehicleService();
        $driver = new DriverService();


        $this->driverService = $driver;
        $this->vehicleservice = $vehicle;

        $this->middleware(function ($request, $next) {
            $this->companyid = session('companyid');
            $this->userId = session('userid');
            return $next($request);
        });
    }

    public function showdashboard() {

        $total_vehicles = $this->vehicleservice->getCompanyTotalVehicles();
        $total_drivers = $this->driverService->getTCompanyTotalDrivers();
        $assigned_cars = $this->vehicleservice->getCompanyTotalAssignedCars();
        $unassigned_cars =$this->vehicleservice->getCompanyTotalUnAssignedCars();
        return view('dashboard')
                        ->with('totalvehicles', $total_vehicles)
                        ->with('totaldrivers', $total_drivers)
                        ->with('assigncars', $assigned_cars)
                        ->with('unassignedcars', $unassigned_cars);
        
//          $carsdueforinsurancesortaxes = $this->getCarsDueForInsurance();
//        $carsdueforpayments = $this->getCarsDueForPayments();
//        $carsdueformaintenance = $this->getCarsDueForMaintenance();
//      
    }


 

}
