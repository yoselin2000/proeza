<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyPassive extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'share', 'term', 'frecuency', 'destination', 
        'warranty', 'balace', 'evaluation_id', 'passive_type_id',
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function passiveType()
    {
        return $this->belongsTo(PassiveType::class);
    }
}
