<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\services\VehicleService;
use App\VehiclesInsurance;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class InsuranceController extends Controller {

    protected $notificationService;
    private $vehicleservice;
    private $companyid;

    public function __construct() {

        $vehicle = new VehicleService();
        $notificationService = new NotificationController();

        $this->notificationService = $notificationService;
        $this->vehicleservice = $vehicle;

        //No session access from constructor work arround
        $this->middleware(function ($request, $next) {
            $this->companyid = session('companyid');
            return $next($request);
        });
    }

    public function Index() {

        $vehicles = $this->vehicleservice->getCompanyVehicles($this->companyid);

        return view('vehicle.insurance')->with('vehicles', $vehicles);
    }

    public function save(Request $request) {


        try {
            $vehicleid = Crypt::decrypt($request["vehicleCode"]);

            $new = new VehiclesInsurance();
            $new->vehicle_id = $vehicleid;
            $new->company_id = $this->companyid;
            $new->type = $request["InsuranceType"];
            $new->renewal_date = $request['renewal_date'];
            $new->next_renewal_date = $request['next_renewal_date'];
            $new->amount = $request['amount'];
            $new->save();

            Log::info('Vehicle Insurance Added successfully for vehicle : ' . $vehicleid . ' belonging to company id : ' . $this->companyid);
            return $this->notificationService->Response("success", "Updated Successfully");
        } catch (DecryptException $ex) {
            Log::error('Error decrypting vehicle code for company : ' . $this->companyid . ' Error Message :: ' . $ex->getMessage());
            return $this->notificationService->Response("error ", "Error");
        }
    }

    public function retrieveVehicleInsurances($vehicleCode) {

        try {
            $vehicleid = Crypt::decrypt($vehicleCode);
            $results = VehiclesInsurance::where('company_id', '=', $this->companyid)
                            ->where('vehicle_id', '=', $vehicleid)
                            ->where('status', '=', 0)->get();
            return $this->notificationService->Response("success", "Vehicle Insurance retrieved successfully", $results);
        } catch (DecryptException $ex) {
            Log::error('Error decrypting vehicle code for company : ' . $this->companyid . ' Error Message :: ' . $ex->getMessage());

            return $this->notificationService->Response("error ", "Error");
        }
    }

    public function retrieveCompanyInsurances() {

        try {
            $results = DB::table("insurance_view")->where("company_id", $this->companyid)->get();

            return $this->notificationService->Response("success", " Insurances retrieved successfully", $results);
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
