<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassiveType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function familyPassives()
    {
        return $this->hasMany(FamilyPassive::class);
    }

    public function evaluationPassives()
    {
        return $this->hasMany(EvaluationPassive::class);
    }

    public function businessPassives()
    {
        return $this->hasMany(BusinessPassive::class);
    }
}
