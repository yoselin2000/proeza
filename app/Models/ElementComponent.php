<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementComponent extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand', 'model', 'SN', 'description', 'state', 'company_element_id', 'agency_id'
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function companyElement()
    {
        return $this->belongsTo(CompanyElement::class);
    }

    public function assignments()
    {
        return $this->belongsToMany(Assignment::class);
    }

    public function maintenanceHistories()
    {
        return $this->hasMany(MaintenanceHistory::class);
    }

    public function componentTo(Assignment $assignment)
    {
        $elementComponent = $this;
        $elementComponents = $assignment->elementComponents;
        $existingComponent = $elementComponents->where('id', $elementComponent->id)->first();

        if ($existingComponent) {
            return 'no';
        } else {
            return 'si';
        }
    }
}
