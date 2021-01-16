<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\VehicleController;

class ReportController extends Controller {

    public function showinsurance() {

        return view('dashboard');
    }

    public function showCumulativemaintenance() {

        $maintenance = $this->getCummulativeMaintenance();
        return view('cumulativemaintenance')->with('maintenance', $maintenance);
    }

    public function showCumulativeInflow() {

        $inflows = $this->getCummulativeInflows();

        return view('cumulativeinflows')->with('inflows', $inflows);
    }

    public function getCummulativeInflows() {

        $results = DB::table('cumulative_inflows')
                ->get();

        return $results->toJson();
    }

    public function getCummulativeMaintenance() {

        $results = DB::table('cumulative_maintenance')
                ->get();

        return $results->toJson();
    }

    public function showInflow() {

        $inflows = $this->getAllInflows();
        $vehicles = new VehicleController;
        $allvehicles = $vehicles->getVehicles();

        return view('inflows')->with('inflows', $inflows)->with('vehicles', $allvehicles);
    }

    public function getAllInflows() {

        $results = DB::table('inflows')
                ->get();

        return $results->toJson();
    }

    public function getCarInflows(Request $request) {

        $data = $request->all();

        $var = explode('-', $data['daterange']);
        $startdate = date('Y-m-d', strtotime($var[0]));
        $enddate = date('Y-m-d', strtotime($var[1]));
        $car_number = $data['vehicle'];

        $results = DB::table('inflows')->where('car_number', $car_number)
                        ->whereBetween('payment_date', [$startdate, $enddate])->get()->toJson();

        return $results;
    }

    public function showmaintenance() {
        $maintenance_hist = $this->getAllCarsMaintenacnceHist();
        $vehicles = new VehicleController;
        $allvehicles = $vehicles->getVehicles();

        return view('maintenance')->with('maintenacehist', $maintenance_hist)->with('vehicles', $allvehicles);
    }

    public function getAllCarsMaintenacnceHist() {

        $results = DB::table('maintenance_hist')
                ->get();

        return $results->toJson();
    }

    public function getCarMaintenanceHistory(Request $request) {

        $data = $request->all();

        $var = explode('-', $data['daterange']);
        $startdate = date('Y-m-d', strtotime($var[0]));
        $enddate = date('Y-m-d', strtotime($var[1]));
        $car_number = $data['vehicle'];

        $results = DB::table('maintenance_hist')->where('car_number', $car_number)
                        ->whereBetween('maintenance_date', [$startdate, $enddate])->get()->toJson();

        return $results;
    }

    public function showinsurances() {

        $insurances = $this->getAllCarsInsurances();
        $vehicles = new VehicleController;
        $allvehicles = $vehicles->getVehicles();

        return view('insurances')->with('insurances', $insurances)->with('vehicles', $allvehicles);
    }

    public function getAllCarsInsurances() {

        $results = DB::table('insurances_hist')
                ->get();

        return $results->toJson();
    }

    public function getInsuranceHistory(Request $request) {

        $data = $request->all();

        $var = explode('-', $data['daterange']);
        $startdate = date('Y-m-d', strtotime($var[0]));
        $enddate = date('Y-m-d', strtotime($var[1]));
        $car_number = $data['vehicle'];
        $type = $data['type'];


        if (empty($type)) {
            $results = DB::table('insurances_hist')->where('car_number', $car_number)
                            ->whereBetween('renewal_date', [$startdate, $enddate])->get()->toJson();

            return $results;
        }

        $results = DB::table('insurances_hist')->where(array(
                            'car_number' => $car_number,
                            'type' => $type
                        ))
                        ->whereBetween('renewal_date', [$startdate, $enddate])->get()->toJson();

        return $results;
    }
    
    
     public function getUnMaintainedVehicles() {

        $results = DB::select( DB::raw("SELECT * FROM maintenance_settings WHERE end_date < CURDATE()") )->get();

        return $results->toJson();
    }

    public function getUnPaidVehicles() {

        $results = DB::select( DB::raw("SELECT * FROM inflow_settings WHERE end_date < CURDATE()") )->get();

        return $results->toJson();
    }
}
