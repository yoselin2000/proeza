<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;

    protected $fillable = [
        'state', 'age', 'gender', 'student', 'place',
        'type', 'other', 'evaluation_id',
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}
