<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'descripcion', 'cont', 'assigned_by', 'assigned_to'
    ];

    public function assignedByUser()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function assignedToUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function elementComponents()
    {
        return $this->belongsToMany(ElementComponent::class);
    }

    public function maintenanceHistory()
    {
        return $this->hasOne(MaintenanceHistory::class);
    }

    public function returnComponent()
    {
        return $this->hasOne(ReturnComponent::class);
    }

}
