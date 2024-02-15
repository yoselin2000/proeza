<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'item', 'amount',
        'average_sale_id'
    ];

    public function averageSale()
    {
        return $this->belongsTo(AverageSale::class);
    }
}
