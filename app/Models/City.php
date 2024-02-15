<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'state'
    ];

    public function agencies()
    {
        return $this->hasMany(Agency::class);
    }
}
