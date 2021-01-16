<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\services;

use App\VehicleView;
use App\Vehicle;
use Illuminate\Support\Facades\DB;
use App\VehiclesInsurance;
USE App\services\MaintenanceService;
use Illuminate\Support\Facades\Crypt;

class VehicleService {

    protected $maintenanceservice;

    public function __construct() {
        $maintenance = new MaintenanceService();

        $this->maintenanceservice = $maintenance;
    }

    public function test() {

        echo 'am here';
    }

    public function getCompanyVehicles($company_id) {


        $results = VehicleView::where('company_id', $company_id)->get();

        return $results->toJson();
    }

    public function getCardetails($id) {

        $results = Vehicle::where('id', '=', $id)->first();

        return $results->toJson();
    }

    public function getVehicles() {

        $results = VehicleView::where('active', 0)->get();

        return $results->toJson();
    }

    public function saveCompanyVehicle($vehicle_id, $companyid) {


        try {

            $effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime(date("Y-m-d"))));

            DB::insert('insert into companies_vehicles (company_id,vehicle_id,expiry_date) values (?,?,?)', ["$companyid", "$vehicle_id", "$effectiveDate"]);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Vehicle could not be added to company :: vehicleid: ' . $vehicle_id . 'companyid ::' . $companyid . 'error message :: ' .
                    $e->getMessage());
            return false;
        }
    }

    public function saveVehicleInsurance($request, $vehicleid, $companyid) {


        try {
            $new = new VehiclesInsurance();
//save insurance
            $new->vehicle_id = $vehicleid;
            $new->company_id = $companyid;
            $new->type = "insurance";
            $new->renewal_date = $request['insurance_renewal_date'];
            $new->next_renewal_date = $request['insurance_next_renewal_date'];
            $new->amount = $request['insurance_amount'];

            $new->save();

//save roadworthy
            $news = new VehiclesInsurance();

            $news->vehicle_id = $vehicleid;
            $news->company_id = $companyid;
            $news->type = "roadworthy";
            $news->renewal_date = $request['roadworthy_date'];
            $news->next_renewal_date = $request['roadworthy_expiry_date'];
            $news->amount = $request['roadworthy_amount'];

            $news->save();
            $this->maintenanceservice->setMaintenanceSettings($request, $vehicleid, $companyid);
            return true;
        } catch (Exception $e) {
            Log::error('Error adding insurances to  :: vehicleid: ' . $vehicleid . 'companyid ::' . $companyid . 'error message :: ' .
                    $e->getMessage());
            return false;
        }
    }

    public function checkVehicleExistence($chasisNumber) {

        $check = Vehicle::where('chasis_number', '=', $chasisNumber)->count();
        return $check;
    }

    public function AssignVehicle($request, $companyid) {

        try {
            $vehicleCode = Crypt::decrypt($request["vehicleCode"]);
            $driverCode = Crypt::decrypt($request["driverCode"]);
            $date_assigned = $request["date_assigned"];


            DB::insert('insert into driver_assignment (company_id,vehicle_id,'
                    . 'date_assigned,driver_id) values (?,?,?,?)', ["$companyid", "$vehicleCode", "$date_assigned", "$driverCode"]);
            return true;
        } catch (Exception $ex) {
            $vehicleCode = Crypt::decrypt($request["vehicleCode"]);
            Log::error('Error adding insurances to  :: vehicleid: ' . $vehicleCode . 'companyid ::' . $companyid . 'error message :: ' .
                    $ex->getMessage());
            return false;
        }
    }

    public function checkifDriverorVehicleisAssigned($request, $companyID) {

        try {
            $vehicleID = Crypt::decrypt($request["vehicleCode"]);
            $driverID = Crypt::decrypt($request["driverCode"]);

            DB::table('driver_assignment')->where('vehicle_id', $vehicleID)
                    ->where('company_id', $companyID)
                    ->orWhere('driver_id', $driverID)
                    ->where('status', 'ACTIVE')
                    ->exists();
            return false;
        } catch (Exception $ex) {
            Log::error('Error checkin if vehicle is alrady assigned  ' . $vehicleID . 'companyid ::' . $companyID . 'error message :: ' .
                    $ex->getMessage());
            return false;
        }
    }

    public function getCarsDueForInsurance() {

        $results = DB::table('insurances_due_view')
                ->get();

        return $results;
    }

    public function getCarsDueForPayments() {

        $results = DB::table('revenue_view')
                ->get();

        return $results;
    }

    public function getCarsDueForMaintenance() {

        $results = DB::table('maintenance_due_view')
                ->get();

        return $results;
    }

    public function getCompanyTotalVehicles() {

        return Vehicle::where('active', 0)->count();
    }

    
       public function getCompanyTotalUnAssignedCars() {

        return DB::table('unassignedvehicles')
                        ->count();
    }

    public function getCompanyTotalAssignedCars() {

        return DB::table('driver_assignment')
                        ->count();
    }
}
