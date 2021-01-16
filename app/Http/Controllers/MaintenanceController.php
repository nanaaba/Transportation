<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\services\VehicleService;
use Illuminate\Support\Facades\DB;
use App\MaintenanceDetails;
use App\Maintenance;
use App\services\MaintenanceService;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class MaintenanceController extends Controller {

    protected $notificationService;
    private $companyid;
    private $userId;
    protected $vehicleservice;
    protected $maintenanceservice;

    public function __construct() {
        $vehicle = new VehicleService();
        $notificationService = new NotificationController();
        $maintenance = new MaintenanceService();


        $this->notificationService = $notificationService;
        $this->vehicleservice = $vehicle;
        $this->maintenanceservice = $maintenance;

        //No session access from constructor work arround
        $this->middleware(function ($request, $next) {
            $this->companyid = session('companyid');
            $this->userId = session('userid');
            return $next($request);
        });
    }

    public function Index() {

        $vehicles = $this->vehicleservice->getCompanyVehicles($this->companyid);
       
        return view('vehicle.maintenance')->with('vehicles', $vehicles);
    }

    public function create(Request $request) {

        $data = $request->all();
        print_r($data);
        return;
 
        try {
            $vehicleid = Crypt::decrypt($request["vehicleCode"]);

            $new = new Maintenance();
            $new->vehicle_id = $vehicleid;
            $new->company_id = $this->companyid;
            $new->description = $request["description"];
            $new->noofdays = $request['noofdays'];
            $new->maintenance_date = $request['maintenance_date'];
            $new->total_amount = $request['amount'];
            $new->save();

            Log::info('Maintenace Added successfully for vehicle : ' . $vehicleid . ' belonging to company id : ' . $this->companyid);
            return $this->notificationService->Response("success ", "Maintenance Added successfully.");
        } catch (DecryptException $ex) {
            Log::error('Error decrypting vehicle code for company : ' . $this->companyid . ' Error Message :: ' . $ex->getMessage());
            return $this->notificationService->Response("error ", "Error");
        }
    }

    public function saveMaintenanceDetail(Request $request) {

        try {

            $new = new MaintenanceDetails();
            $new->vehicle_id = $request["vehicleCode"];
            $new->company_id = $this->companyid;
            $new->parts = $request["parts"];
            $new->amount = $request['amount'];
            $new->maintenance_id = $request['maintenance_id'];
            $new->created_by = $this->userId;
            $new->updated_by = $this->userId;
            $new->save();

            Log::info('Maintenace Details Added successfully for maintenance_id : ' . $request['maintenance_id'] . ' belonging to company id : ' . $this->companyid);
            return $this->notificationService->Response("success ", "Maintenance Details Added successfully.");
        } catch (DecryptException $ex) {
            Log::error('Error decrypting vehicle code for company : ' . $this->companyid . ' Error Message :: ' . $ex->getMessage());
            return $this->notificationService->Response("error ", "Error");
        }
    }

  

    public function getVehicleMaintenaces($vehicleid) {

        $results = DB::table('maintenance_details')->where('vehicle_id', $vehicleid)->get();

        return $results;
    }

}
