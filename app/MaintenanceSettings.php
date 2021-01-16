<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceSettings extends Model {
    protected $fillable = 
            [
                'period', 
                'start_date',
                'end_date',
                'vehicle_id',
                'company_id'
                ];
   

    protected $table = 'maintenance_settings';
}
