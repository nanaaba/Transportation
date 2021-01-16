<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {
    protected $fillable = 
            [
                'front_number_plate', 
                'fueltype',
                'color',
                'manufactured_year',
                'carmodel',
                'purchased_date',
                'chasis_number',
                'back_number_plate',
                'vehicle_type',
                'brand',
                'body_type',
                'transmission',
                'enginesize',
                'created_by'
                ];
   

    protected $table = 'vehicles';
}
