<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'FEntry', 'FDeparture', 'description', 'element_component_id', 'assigned_to'
    ];

    public function elementComponent()
    {
        return $this->belongsTo(ElementComponent::class);
    }

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }
}
