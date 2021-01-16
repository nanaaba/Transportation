<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\services\DriverService;
use App\services\VehicleService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Driver;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;

class DriverController extends Controller {

    protected $notificationService;
    protected $driverService;
    private $companyid;
    private $userId;

    public function __construct() {


        $notificationService = new NotificationController();
        $driverService = new DriverService();
        $vehicle = new VehicleService();

        $this->notificationService = $notificationService;
        $this->driverService = $driverService;
        $this->vehicleservice = $vehicle;


        $this->middleware(function ($request, $next) {
            $this->companyid = session('companyid');
            $this->userId = session('userid');
            return $next($request);
        });
    }

    public function create() {

        return view('driver.create');
    }

    public function index() {

        $drivers = $this->driverService->getCompanyDrivers( $this->companyid);

        return view('driver.index')->with('drivers', $drivers);
    }

    public function saveDriver(Request $request) {



        $data = $request->all();

        $existence = $this->driverService->checkDriverExistence($data['phoneno']);

        if ($existence != 0) {

            Log::info('Driver number exist: ' . $data['phoneno']);
            return $this->notificationService->Response("error", "Driver number exist");
        }



        try {
            $new = new Driver();
            $file = $request->file('drivelicensefile');


            if ($request->hasFile('drivelicensefile')) {
                $path = Storage::disk('uploads')->put('drivers', $file);
                $new->license_url = $path; //drivertype
            }

            $new->name = $data['name'];
            $new->gender = $data['gender'];
            $new->dob = $data['dob'];
            $new->phoneno = $data['phoneno'];
            $new->residence = $data['residence'];
            $new->tribe = $data['tribe'];
            $new->experience = $data['experience'];
            $new->contact_person = $data['contact_person'];
            $new->contactno = $data['contactno']; //drivertype
            $new->relationship = $data['relationship']; //drivertype
            $new->current_company_id = $this->companyid; //drivertype
            $new->created_by = $this->userId;

            $saved = $new->save();
            $newdriverId = $new->id;
            if ($saved) {
                $result = $this->driverService->saveCompanyDriver($newdriverId, $this->companyid, $data['dateofemployment'], $data['drivertype'], $this->userId);
                if ($result) {
                    return $this->notificationService->Response("success", "Driver added to company successfully");
                } else {
                    return $this->notificationService->Response("error", "Driver created but couldnt add to your company profile.Please contact Systtem Administrators.");
                }
            } else {
                return $this->notificationService->Response("error", "Couldnt profile driver.Try again. ");
            }
        } catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error saving driver  error message :: company id :::' . $this->companyid . $e->getMessage());
            return $this->notificationService->Response("error", "Couldnt profile driver.Try again.Contact"
                            . "System Administrators" . $e->getMessage());
        }
    }

    public function information($driverid) {


        try {

            $key = Crypt::decrypt($driverid);

            $details = $this->driverService->getDriverDetails($key);

            return view('driver.information')->with('driverdata', $details);
        } catch (DecryptException $e) {
            Log::error('Error decrypting driver code for company : ' . $this->companyid);
            echo $e->getMessage();
            exit();
        }
    }

    public function updateDriver(Request $request) {

        $data = $request->all();

        try {
            $new = Driver::where('id', $data['driver_code'])
                    ->first();
            $file = $request->file('drivelicensefile');


            if ($request->hasFile('drivelicensefile')) {
                $path = Storage::disk('uploads')->put('drivers', $file);
                $new->license_url = $path; //drivertype
            }

            $new->name = $data['name'];
            $new->gender = $data['gender'];
            $new->dob = $data['dob'];
            $new->phoneno = $data['phoneno'];
            $new->residence = $data['residence'];
            $new->tribe = $data['tribe'];
            $new->experience = $data['experience'];
            $new->contact_person = $data['contact_person'];
            $new->contactno = $data['contactno']; //drivertype
            $new->relationship = $data['relationship']; //drivertype
            $new->current_company_id = $this->companyid; //drivertype
            $new->created_by = $this->userId;

            $saved = $new->save();
            if ($saved) {
                $result = $this->driverService->updateCompanyDriver($data['driver_code'], $this->companyid, $data['dateofemployment'], $data['drivertype'], $this->userId);
                if ($result) {
                    return $this->notificationService->Response("success", "Driver Information Updated successfully");
                } else {
                    return $this->notificationService->Response("error", "Couldnt update driver date.Please contact Systtem Administrators.");
                }
            } else {
                return $this->notificationService->Response("error", "Couldnt update driver information.Try again. ");
            }
        } catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error saving driver  error message :: company id :::' . $this->companyid . $e->getMessage());
            return $this->notificationService->Response("error", "Couldnt profile driver.Try again.Contact"
                            . "System Administrators" . $e->getMessage());
        }
    }

    public function alldrivers() {

        $drivers = $this->driverService->getCompanyDrivers($this->companyid);

        return view('drivers')->with('drivers', $drivers);
    }

    public function assignment() {

        //    $assigned = $this->getAssignedvehicles();
        $vehicles = $this->vehicleservice->getCompanyVehicles($this->companyid);
        $drivers = $this->driverService->getCompanyDrivers($this->companyid);

        return view('driver.assignment')->with('vehicles', $vehicles)->with('drivers', $drivers);
    }

    public function getPermanentDrivers() {


        $drivers = Driver::where('drivertype', "Permanent")->get();

        return $drivers;
    }

    public function getTemporalDrivers() {


        $drivers = Driver::where('drivertype', "Floating Driver")->get();

        return $drivers;
    }

    public function functionName($param) {
        
    }

    public function uploadlicense($file) {
        $path = $request->file('avatar')->store('avatars');

        return $path;
    }

    public function getAssignedvehicles() {

        $results = DB::table('drivers_assigned_cars')
                ->get();

        return $results;
    }

    public function setMemo(Request $request) {

        $data = $request->all();

        //print_r($data);

        $car_number = $data['carnumber'];
        $driver = $data['roamingdriver'];
        $notes = $data['notes'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];

        $results = DB::insert('insert into memos (car_number,driverid,notes,start_date,end_date) values (?,?,?,?,?)', ["$car_number", $driver, "$notes", "$start_date", "$end_date"]);

        if ($results) {
            return '0';
        }

        return '1';
    }

    public function deleteDriver($id) {


        $update = Driver::find($id);
        $update->active = '1';
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

}
