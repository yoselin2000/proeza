<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'property', 'time', 'direction','number', 'zone',
        'mobile', 'province', 'description','link', 'file',
        'evaluation_id'
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}
