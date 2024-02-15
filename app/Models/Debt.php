<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $fillable = [
        'shortTerm','longTerm', 'activity_id'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
