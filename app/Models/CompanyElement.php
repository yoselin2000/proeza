<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyElement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'element_category_id',
    ];

    public function elementCategory()
    {
        return $this->belongsTo(ElementCategory::class);
    }

    public function elementComponents()
    {
        return $this->hasMany(ElementComponent::class);
    }
}
