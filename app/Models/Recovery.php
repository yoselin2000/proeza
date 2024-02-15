<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recovery extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha', 'saldoIni', 'capital', 'interes', 
        'vencido', 'penal', 'diferido', 'seguro', 'cuotaTotal', 
        'saldoFin', 'credit_id',
    ];

    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }
}
