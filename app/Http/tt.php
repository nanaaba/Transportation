<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class vv {

    
     public function getUnassignedVehicles() {

        $results = DB::table('unassignedvehicles')->get();
        return $results;
    }
    
    public function saveVehicleInsurance($request, $vehicleid) {


        $companyid = $this->companyid;
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
            $this->setMaintenanceSettings($request, $vehicleid);
            return true;
        } catch (Exception $e) {
            Log::error('Error adding insurances to  :: vehicleid: ' . $vehicleid . 'companyid ::' . $companyid . 'error message :: ' .
                    $e->getMessage());
            return false;
        }
    }

   
    public function assignDrivers(Request $request) {

        $data = $request->all();

        $new = new VehicleAssignment();

        $new->car_number = $data['car_number'];
        $new->driver_id = $data['driverid'];
        $new->date_assigned = $data['date_assigned'];

        $saved = $new->save();
        if ($saved) {

            $this->updateCardriver($data['car_number'], $data['driverid'], $data['date_assigned']);
            $this->setCarInflow($data['car_number'], $data['date_assigned']);
            return '0';
        }
        return '1';
    }

    public function updateCardriver($carnumber, $driverid, $date_assigned) {

        $vehicle = Vehicle::where('id', $carnumber)->first();

        $vehicle->driver_assigned = $driverid;
        $vehicle->date_car_assigned = $date_assigned;
        $vehicle->save();
    }

    public function setCarInflow($carnumber, $dateassigned) {


        $end_date = date("Y-m-d", strtotime(" 7 day." . $dateassigned)); // PHP:  2009-03-31
        DB::insert('insert into inflow_settings (carnumber,period, start_date,end_date) values (?, ?,?,?)', ["$carnumber", "7", "$dateassigned", "$end_date"]);
    }

    public function getUnassignedDrivers() {

        $results = DB::table('unassigneddrivers')->get();
        return $results;
    }
    
     public function getInsurances($vehicle_id) {

        $companyid = $this->companyid;
        $results = DB::table('insurances_hist')->where(
                        'vehicle_id', $vehicle_id)->where(
                        'company_id', $companyid)->get();

        return $results->toJson();
        ;
    }


    public function getCarInflows($carnumber, $type) {

        $results = DB::table('inflows')->where(
                        array(
                            'car_number' => $carnumber,
                            'type' => $type
                        )
                )->get();

        return $results;
    }

    public function saveMaintenance(Request $request) {

        $vehicle_number = $request['vehicle_number'];
        $maintenance_date = $request['maintenance_date'];
        $description = $request['description'];
        $days = $request['days'];
        $amount = $request['amount'];
        $maintenance_type = $request['maintenancetype'];

        if ($maintenance_type == "Regular Maintenance") {
            $description = $maintenance_type;
            $this->updateCarMaintenanceSettings($vehicle_number, $maintenance_date);
        }

        $query = DB::insert('insert into maintenance_hist (car_number, maintenance_date,description,noofdays,amount) values (?, ?,?,?,?)', ["$vehicle_number", "$maintenance_date", "$description", "$days", "$amount"]);

        if ($query) {
            echo '0';
        } else {
            echo '1';
        }
    }

    public function updateCarMaintenanceSettings($vehicle_number, $maintenance_date) {

        $settings = DB::table('maintenance_settings')->where('car_number', $vehicle_number)->first();

        $period = $settings->period;
        $next_maintenance_date = date("Y-m-d", strtotime($period . "." . $maintenance_date)); // PHP:  2009-03-31

        DB::table('maintenance_settings')
                ->where('car_number', $vehicle_number)
                ->update(['end_date' => $next_maintenance_date]);
    }

    public function updateCarInflowSettings($carnumber, $paymentdate) {

        $end_date = date("Y-m-d", strtotime(" 7 day." . $paymentdate)); // PHP:  2009-03-31

        DB::table('inflow_settings')
                ->where('carnumber', $carnumber)
                ->update(['end_date' => $end_date]);
    }

    public function saveInflow(Request $request) {


        $vehicle_number = $request['vehicle_number'];
        $modeofpayment = $request['modeofpayment'];
        $onbehalf = $request['onbehalf'];
        $paymentdate = $request['paymentdate'];
        $amount = $request['amount'];
        $paidby = $request['paidby'];

        $code = 'INF' . time();
        $this->updateCarInflowSettings($request['vehicle_number'], $request['paymentdate']);
        $query = DB::insert('insert into inflows (car_number,type, modeofpayment,amount,payment_date,onbehalf,paidby,code) values (?,?,?,?,?,?,?,?)', ["$vehicle_number", "inflow", "$modeofpayment", "$amount", "$paymentdate", "$onbehalf", "$paidby", "$code"]);


        if ($query) {
            echo $code;
        } else {
            echo '1';
        }
    }
    
        public function sanitize() {
        $input = $this->all();

        if (preg_match("#https?://#", $input['url']) === 0) {
            $input['url'] = 'http://' . $input['url'];
        }

        $input['name'] = filter_var($input['name'], FILTER_SANITIZE_STRING);
        $input['description'] = filter_var($input['description'], FILTER_SANITIZE_STRING);

        $this->replace($input);
    }
}


    //            $vehicle = new Vehicle();
//            $vehicle->car_number = $data['car_number'];
//            $vehicle->fueltype = $data['fueltype'];
//            $vehicle->enginesize = $data['enginesize'];
//            $vehicle->color = $data['colors'];
//            $vehicle->manufactured_year = $data['manufactured_year'];
//            $vehicle->carmodel = $data['carmodel'];
//            $vehicle->taxrate = $data['taxrate'];
//            $vehicle->purchased_date = $data['purchaseddate'];
//            $vehicle->chasis_number = $data['chasis_number'];
//            $vehicle->created_by = $createdby;
//
//            //chasis_number
//            $vehicle->save();
//            $newvehicleId = $vehicle->id;
//            $this->saveVehicleInsurance($newvehicleId, 'insurance', $data['insurance_amount'], $data['insurance_renewal_date'], $data['insurance_next_renewal_date']);
//            $this->saveVehicleInsurance($newvehicleId, 'tax', $data['tax_amount'], $data['tax_renewal_date'], $data['tax_next_renewal_date']);
//            $this->setMaintenanceSettings($newvehicleId, $data['maintenance_period']);
//            return '0';
