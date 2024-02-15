<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'maintenance_detail_id','vehicle_id', 'detail','cant','price','total','frequency','month','year'
    ];
    
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function maintenanceDetail()
    {
        return $this->belongsTo(MaintenanceDetail::class);
    }
}
