<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'civil', 'mobile', 'landline', 'age',
        'employment', 'participant_id',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function childrens()
    {
        return $this->hasMany(Children::class);
    }

    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    public function homeAddress()
    {
        return $this->hasOne(HomeAddress::class);
    }

    public function receptions()
    {
        return $this->hasMany(Reception::class);
    }

    public function archives()
    {
        return $this->hasMany(Archive::class);
    }

    public function familyFixedAssets()
    {
        return $this->hasMany(FamilyFixedAsset::class);
    }

    public function familyPassives()
    {
        return $this->hasMany(FamilyPassive::class);
    }

    public function familyExpenses()
    {
        return $this->hasMany(FamilyExpense::class);
    }

    public function evaluationAssets()
    {
        return $this->hasMany(EvaluationAsset::class);
    }

    public function evaluationPassives()
    {
        return $this->hasMany(EvaluationPassive::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
