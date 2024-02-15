<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    
    public function components()
    {
        return $this->hasMany(Component::class);
    }
}
