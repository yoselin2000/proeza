<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessAddress extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'property', 'time', 'direction', 'number', 'zone',
        'mobile', 'province', 'description', 'link', 'file',
        'activity_id'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
