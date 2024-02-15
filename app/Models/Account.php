<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'number', 'currency', 'agency_id', 'state'
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}
