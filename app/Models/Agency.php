<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'city_id', 'state'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function safes()
    {
        return $this->hasMany(Safe::class);
    }

    public function boxes()
    {
        return $this->hasMany(Box::class);
    }

    public function elementComponents()
    {
        return $this->hasMany(ElementComponent::class);
    }
}
