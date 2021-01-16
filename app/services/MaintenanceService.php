<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\services;

use Illuminate\Support\Facades\DB;
use App\Repairs;
use Illuminate\Support\Facades\Log;

class MaintenanceService {

    public function getConfigurationData($tablename) {

        $configurations = array("body_types", "brand", "car_parts_accessories", "colors"
            , "vehicle_types", "car_models");

        if (in_array($tablename, $configurations)) {
            $results = DB::table($tablename)->get();

            return json_encode($results);
        }
        return null;
    }

    public function setMaintenanceSettings($request, $vehicleid, $companyid) {


        $start_date = $request['maintenance_date'];
        $end_date = date('Y-m-d', strtotime($request['maintenance_period'], strtotime($start_date)));

        try {
            $new = new \App\MaintenanceSettings();
            $new->vehicle_id = $vehicleid;
            $new->company_id = $companyid;
            $new->period = $request['maintenance_period'];
            $new->start_date = $request['maintenance_date'];
            $new->end_date = $end_date;
            $new->save();
            return true;
        } catch (Exception $e) {
            Log::error('Error adding maintenace settings to  :: vehicleid: ' . $vehicleid . 'companyid ::' . $companyid . 'error message :: ' .
                    $e->getMessage());
            return false;
        }
    }

    public function saveRepair($request, $vehicleid, $companyid) {


     
        try {
            $new = new Repairs();
            $new->vehicle_id = $vehicleid;
            $new->company_id = $companyid;
            $new->type = $request['type'];
            $new->part = $request['part'];
            $new->fixing_date = $request['fixing_date'];;
            $new->noofdays = $request['noofdays'];;
            $new->amount = $request['amount'];;
            $new->save();
            return true;
        } catch (Exception $e) {
            Log::error('Error adding maintenace settings to  :: vehicleid: ' . $vehicleid . 'companyid ::' . $companyid . 'error message :: ' .
                    $e->getMessage());
            return false;
        }
    }

}
