<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'lastName', 'secondLastName', 'thirdLastName', 'gender',
        'birth', 'nacionality', 'identification', 'number',
        'complement', 'extension'
    ];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
