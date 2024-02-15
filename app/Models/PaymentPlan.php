<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero', 'fecha', 'dia', 'saldoIni', 'capital', 'interes', 'cuota', 'seguro', 'cuotaTotal', 'saldoFin', 'estado', 'credit_id', 
    ];
    
    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }
}
