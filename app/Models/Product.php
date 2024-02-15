<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'min', 'max', 'currency', 'seg', 
        'int', 'ven', 'pen', 'dif', 'state', 
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
