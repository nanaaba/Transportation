<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\services\VehicleService;
use App\services\DriverService;
use App\Revenue;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class RevenueController extends Controller {

    protected $notificationService;
    private $vehicleservice;
    private $driverservice;
    private $companyid;

    public function __construct() {

        $vehicle = new VehicleService();
        $notificationService = new NotificationController();
        $driver = new DriverService();

        $this->notificationService = $notificationService;
        $this->vehicleservice = $vehicle;
        $this->driverservice = $driver;

        //No session access from constructor work arround
        $this->middleware(function ($request, $next) {
            $this->companyid = session('companyid');
            return $next($request);
        });
    }

    public function create() {

        $vehicles = $this->vehicleservice->getCompanyVehicles($this->companyid);
        $drivers = $this->driverservice->getCompanyDrivers($this->companyid);

        return view('revenue.create')
                        ->with('vehicles', $vehicles)
                        ->with('drivers', $drivers);
    }

    public function Index() {

  
        return view('revenue.index');
    }

    public function save(Request $request) {

 
        try {
            $vehicleid = Crypt::decrypt($request["vehicleCode"]);
            $driverid = Crypt::decrypt($request["driverCode"]);
       
            $new = new Revenue();
            $new->vehicle_id = $vehicleid;
            $new->driver_id = $driverid;
            $new->company_id = $this->companyid;
            $new->payment_date = $request["date_of_payment"];
            $new->payment_mode = $request['paymentMode'];
            $new->type = $request['revenueType'];
            $new->description = $request['description'];
            $new->amount = $request['amount'];
            $new->save();

            Log::info('Revenue Added successfully for vehicle : ' . $vehicleid . ' belonging to company id : ' . $this->companyid);
            return $this->notificationService->Response("success", "Revenue Added Successfully");
        } catch (DecryptException $ex) {
            Log::error('Error decrypting vehicle code for company : ' . $this->companyid . ' Error Message :: ' . $ex->getMessage());
            return $this->notificationService->Response("error ",$ex->getMessage(), "Error");
        }
    }

   
    public function getCompanyRevenue() {

        try {
            $results = DB::table("revenue_view")->where("company_id", $this->companyid)->get();

            return $this->notificationService->Response("success", " Revenue retrieved successfully", $results);
        } catch (DecryptException $ex) {

            Log::error('Error decrypting vehicle code for company : ' . $this->companyid . ' Error Message :: ' . $ex->getMessage());
            return $this->notificationService->Response("error ", "Error");
        }
    }

    public function deleteInsurance($insuranceCode) {

        try {
            $insuranceId = Crypt::decrypt($insuranceCode);
            $id = VehiclesInsurance::find($insuranceId);
            $id->status = 1;
            $id->deleted_at = date("Y-m-d h:i:s");
            $id->save();
            return $this->notificationService->Response("success", "Insurance Deleted Successfully");
        } catch (DecryptException $ex) {

            Log::error('Error decrypting vehicle code for company id : ' . $this->companyid . ' Error Message :: ' . $ex->getMessage());

            return $this->notificationService->Response("error ", "Error");
        }
    }

    public function update(Request $request) {


        try {
            $vehicleid = Crypt::decrypt($request["vehicleCode"]);
            $insuranceId = Crypt::decrypt($request["insuranceCode"]);
            $new = VehiclesInsurance::find($insuranceId);


            $new->vehicle_id = $vehicleid;
            $new->company_id = $this->companyid;
            $new->type = $request["InsuranceType"];
            $new->renewal_date = $request['renewal_date'];
            $new->next_renewal_date = $request['next_renewal_date'];
            $new->amount = $request['amount'];
            $new->save();

            Log::info('Vehicle Insurance Updated successfully for vehicle : ' . $vehicleid . ' belonging to company id : ' . $this->companyid);
            return $this->notificationService->Response("success", "Updated Successfully");
        } catch (DecryptException $ex) {
            Log::error('Error decrypting vehicle /insurance code for company : ' . $this->companyid . ' Error Message :: ' . $ex->getMessage());
            return $this->notificationService->Response("error ", "Error");
        }
    }

}
