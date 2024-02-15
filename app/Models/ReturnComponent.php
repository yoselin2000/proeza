<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnComponent extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'descripcion', 'cont', 'assigned_by', 'assigned_to', 'assignment_id'
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function assignedByUser()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function assignedToUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
