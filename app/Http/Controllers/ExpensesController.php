<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\GeneralExpense;
use App\services\VehicleService;
use Illuminate\Http\Request;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class ExpensesController extends Controller {

    protected $notificationService;
    private $companyid;
    private $userId;
    private $vehicleservice;

    public function __construct() {
        $notificationService = new NotificationController();
        $vehicle = new VehicleService();
        $this->notificationService = $notificationService;
        $this->vehicleservice = $vehicle;

        //No session access from constructor work arround
        $this->middleware(function ($request, $next) {
            $this->companyid = session('companyid');
            $this->userId = session('userid');
            return $next($request);
        });
    }

    public function Index() {

        $vehicles = $this->vehicleservice->getCompanyVehicles($this->companyid);


        return view('vehicle.expenses')->with('vehicles', $vehicles);
    }

    public function create(Request $request) {


        try {
            $vehicleid = Crypt::decrypt($request["vehicleCode"]);

            $new = new GeneralExpense();
            $new->vehicle_id = $vehicleid;
            $new->company_id = $this->companyid;
            $new->description = $request["description"];
            $new->date_of_expense = $request['date_of_expense'];
            $new->amount = $request['amount'];
            $new->type = "General Expense";

            $new->save();

            Log::info('General Expnse Added successfully for vehicle : ' . $vehicleid . ' belonging to company id : ' . $this->companyid);
            return $this->notificationService->Response("success", "Updated Successfully");
        } catch (DecryptException $ex) {
            Log::error('Error decrypting vehicle code for company : ' . $this->companyid . ' Error Message :: ' . $ex->getMessage());
            return $this->notificationService->Response("error ", "Error");
        }
    }
    
    
        public function retrieveCompanyVehicleExpenses() {

        try {
            $results = DB::table("expenses_view")->where("company_id", $this->companyid)
                    ->where("expense_type","General Expense")->get();

            return $this->notificationService->Response("success", " Insurances retrieved successfully", $results);
        } catch (DecryptException $ex) {
         
            Log::error('Error decrypting vehicle code for company : ' . $this->companyid . ' Error Message :: ' . $ex->getMessage());
            return $this->notificationService->Response("error ", "Error");
        }
    }

}
