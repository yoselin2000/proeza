<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function companyElements()
    {
        return $this->hasMany(CompanyElement::class);
    }
}
