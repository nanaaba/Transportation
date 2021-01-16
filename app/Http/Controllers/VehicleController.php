<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\services\VehicleService;
use App\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\InsuranceController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class VehicleController extends Controller {

    protected $notificationService;
    private $companyid;
    protected $vehicleservice;
    private $userId;

    public function __construct() {

        $vehicle = new VehicleService();
        $notificationService = new NotificationController();


        $this->notificationService = $notificationService;
        $this->vehicleservice = $vehicle;

        $this->middleware(function ($request, $next) {
            $this->companyid = session('companyid');
            $this->userId = session('userid');
            return $next($request);
        });
    }

    public function create() {

        return view('vehicle.create');
    }

    public function index() {

        $vehicles = $this->vehicleservice->getCompanyVehicles($this->companyid);

        return view('vehicle.index')->with('vehicles', $vehicles);
    }

    public function vehicleinformation($vehicleid) {


        try {

            $key = Crypt::decrypt($vehicleid);

            $details = $this->vehicleservice->getCardetails($key);

            return view('vehicle.information')->with('cardata', $details);
        } catch (DecryptException $e) {
            Log::error('Error decrypting vehicle code for company : ' . $this->companyid);
            echo $e->getMessage();
            exit();
        }
    }

    public function saveVehicle(Request $request) {


        $request['created_by'] = $this->userId;
        $data = $request->all();
        $existence = $this->vehicleservice->checkVehicleExistence($data['chasis_number']);

        if ($existence != 0) {

            Log::info('Chassis number exist: ' . $data['chasis_number']);
            return $this->notificationService->Response("error", "Chassis Number exist");
        }

        try {
            $vehicle = Vehicle::create($request->all());
            $newvehicleId = $vehicle->id;
            $savecompanyvehicle = $this->vehicleservice->saveCompanyVehicle($newvehicleId, $this->companyid);
            if ($savecompanyvehicle) {
                $this->vehicleservice->saveVehicleInsurance($data, $newvehicleId, $this->companyid);
                return $this->notificationService->Response("success", "Vehicle details saved successfully");
            } else {
                return $this->notificationService->Response("error", "Vehicle details saved error linking vehicle to your company.Contact"
                                . "System Administrators");
            }
        } catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error saving vehicle  error message :: ' . $e->getMessage());
            return $this->notificationService->Response("error", "Error saving vehicle information .Contact"
                            . "System Administrators" . $e->getMessage());
        }
    }

    public function updateVehicle(Request $request) {

        $data = $request->all();

        try {

            $vehicle = Vehicle::where('id', $data['vehicle_code'])
                    ->first();
            $vehicle->front_number_plate = $data['front_number_plate'];
            $vehicle->back_number_plate = $data['back_number_plate'];
            $vehicle->carmodel = $data['carmodel'];
            $vehicle->fueltype = $data['fueltype'];
            $vehicle->enginesize = $data['enginesize'];
            $vehicle->color = $data['color'];
            $vehicle->manufactured_year = $data['manufactured_year'];
            $vehicle->vehicle_type = $data['vehicle_type'];
            $vehicle->brand = $data['brand'];
            $vehicle->body_type = $data['body_type'];
            $vehicle->transmission = $data['transmission'];
            $vehicle->chasis_number = $data['chasis_number'];
            $vehicle->purchased_date = $data['purchased_date'];
            $vehicle->save();
            return $this->notificationService->Response("success", "saved");
        } catch (Exception $e) {
            return $this->notificationService->Response("error", "Vehicle details saved error linking vehicle to your company.Contact"
                            . "System Administrators");
        }
    }

    public function deleteVehicle($id) {


        $update = Vehicle::find($id);
        $update->active = '1';
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function Apivehicleinformation($vehicleid) {


        try {

            $key = Crypt::decrypt($vehicleid);

            $details = $this->vehicleservice->getCardetails($key);

            return $this->notificationService->Response("success", "Information retreived successfully", json_decode($details));
        } catch (DecryptException $e) {
            Log::error('Error decrypting vehicle code for company : ' . $this->companyid);
            echo $e->getMessage();

            return $this->notificationService->Response("error", "Error", "error");
        }
    }

    public function assignVehicle(Request $request) {

        $data = $request->all();

        try {

            $result = $this->vehicleservice->checkifDriverorVehicleisAssigned($data, $this->companyid);
            if (!$result) {
                 return $this->notificationService->Response("error", "Vehicle has already been aasigned to a driver");
          
            }
            $details = $this->vehicleservice->AssignVehicle($data, $this->companyid);
            if ($details) {
                return $this->notificationService->Response("success", "Vehicle Assigned Successfully");
            } else {
                return $this->notificationService->Response("error", "Error in  Assigning Vehicle");
            }
        } catch (Exception $e) {
            Log::error('An error occured: ' . $e->getMessage() . $this->companyid);
            return $this->notificationService->Response("error", "Error", "error");
        }
    }

    
    
    public function unAssignedVehicles() {

        $data = $request->all();

        try {

            $result = $this->vehicleservice->checkifDriverorVehicleisAssigned($data, $this->companyid);
            if (!$result) {
                 return $this->notificationService->Response("error", "Vehicle has already been aasigned to a driver");
          
            }
            $details = $this->vehicleservice->AssignVehicle($data, $this->companyid);
            if ($details) {
                return $this->notificationService->Response("success", "Vehicle Assigned Successfully");
            } else {
                return $this->notificationService->Response("error", "Error in  Assigning Vehicle");
            }
        } catch (Exception $e) {
            Log::error('An error occured: ' . $e->getMessage() . $this->companyid);
            return $this->notificationService->Response("error", "Error", "error");
        }
    }
}
