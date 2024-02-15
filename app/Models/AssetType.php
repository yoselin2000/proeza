<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function businessCurrentAssets()
    {
        return $this->hasMany(BusinessCurrentAsset::class);
    }

    public function familyFixedAssets()
    {
        return $this->hasMany(FamilyFixedAsset::class);
    }

    public function evaluationAssets()
    {
        return $this->hasMany(EvaluationAsset::class);
    }

    public function bussinessFixedAssets()
    {
        return $this->hasMany(BussinessFixedAssets::class);
    }
}
