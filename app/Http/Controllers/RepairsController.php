<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\services\VehicleService;
use App\services\MaintenanceService;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class RepairsController extends Controller {

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
        $parts = $this->maintenanceservice->getConfigurationData("car_parts_accessories");

        return view('vehicle.repairs')->with('vehicles', $vehicles)
                        ->with('parts', $parts);
    }

    public function create(Request $request) {

        try {
            $vehicleid = Crypt::decrypt($request["vehicleCode"]);

            $results = $this->maintenanceservice->saveRepair($request, $vehicleid, $this->companyid);
            if ($results) {
                    return $this->notificationService->Response("success", "Saved Successfully");
        
            }else{
                    return $this->notificationService->Response("error", "Contact System Administrators");
        
            }

          } catch (DecryptException $ex) {
            Log::error('Adding Repairs :: Error decrypting vehicle code for company : ' . $this->companyid . ' Error Message :: ' . $ex->getMessage());
            return $this->notificationService->Response("error ", "Error");
        }
    }
    
    
       public function retrieveCompanyRepairs() {

        try {
            $results = DB::table("repairs_view")->where("company_id", $this->companyid)->get();

            return $this->notificationService->Response("success", " Vehicle repairs retrieved successfully", $results);
        } catch (DecryptException $ex) {
         
            Log::error('Error decrypting vehicle code for company : ' . $this->companyid . ' Error Message :: ' . $ex->getMessage());
            return $this->notificationService->Response("error ", "Error");
        }
    }

}
