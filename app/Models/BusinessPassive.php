<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessPassive extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'share','term', 'frecuency',
        'destination', 'warranty', 'balace',
        'activity_id', 'passive_type_id',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function passiveType()
    {
        return $this->belongsTo(PassiveType::class);
    }
}
