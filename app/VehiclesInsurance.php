<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class VehiclesInsurance extends Model {

    protected $fillable = [
        'vehicle_id',
        'company_id',
        'type',
        'renewal_date',
        'next_renewal_date',
        'amount'
    ];
    protected $table = 'insurances_hist';

}
