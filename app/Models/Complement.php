<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complement extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'activity_id', 'complement_type_id'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function complementType()
    {
        return $this->belongsTo(ComplementType::class);
    }
}
