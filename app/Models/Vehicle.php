<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'state', 'brand', 'plate', 'color', 'cylinder', 'fuel', 'manufacturing', 'soat', 'activity_id'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function components()
    {
        return $this->hasMany(Component::class);
    }

    public function transport()
    {
        return $this->hasOne(Transport::class);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function averageSales()
    {
        return $this->hasMany(AverageSale::class);
    }
}
