<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'state', 'agency_id'
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}
