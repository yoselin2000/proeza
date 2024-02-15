<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationPassive extends Model
{
    use HasFactory;

    protected $fillable = [
        'share', 'balace', 'coming', 'evaluation_id', 'passive_type_id',
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
