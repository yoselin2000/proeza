<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'frequency', 'name', 'antiquity', 'post', 'salary', 'activity_id'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
