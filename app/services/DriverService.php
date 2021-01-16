<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\services;
use App\Driver;

use Illuminate\Support\Facades\DB;
use App\CompaniesDrivers;
use Illuminate\Support\Facades\Log;

class DriverService {

    public function checkDriverExistence($phoneNumber) {

        $check = Driver::where('phoneno', '=', $phoneNumber)->count();
        return $check;
    }
    
    
      public function saveCompanyDriver($driver_id, $companyid,$dateofemployment,$drivertype,$createdby) {

        try {
          
            DB::insert('insert into companies_drivers (company_id,driver_id,dateofemployment,drivertype,created_by) values (?,?,?,?,?)', ["$companyid", "$driver_id", "$dateofemployment","$drivertype","$createdby"]);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Driver could not be added to company :: driverid: ' . $driver_id . 'companyid ::' . $companyid . 'error message :: ' .
                    $e->getMessage());
            return false;
        }
    }
    
     public function updateCompanyDriver($driver_id, $companyid,$dateofemployment,$drivertype,$createdby) {

        try {
          
            DB::insert("update companies_drivers set company_id ='$companyid',dateofemployment='$dateofemployment',drivertype='$drivertype',created_by='$createdby' where driver_id=$driver_id");
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Driver could not be updated to company :: driverid: ' . $driver_id . 'companyid ::' . $companyid . 'error message :: ' .
                    $e->getMessage());
            return false;
        }
    }
    
    
     public function getDriverDetails($id) {

        $results = CompaniesDrivers::where('id', '=', $id)->first();

        return $results->toJson();
    }
    
    public function getCompanyDrivers($company_id) {

        $drivers = CompaniesDrivers::where('active', "0")->where('current_company_id', $company_id)->get();

        return $drivers->toJson();
    }
    
    
    public function getTCompanyTotalDrivers() {

        return Driver::where('active', 0)->count();
    }
}
