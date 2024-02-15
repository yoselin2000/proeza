<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'element_id'
    ];

    public function element()
    {
        return $this->belongsTo(Element::class);
    }

    public function receptions()
    {
        return $this->hasMany(Reception::class);
    }
}
