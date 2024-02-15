<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'amount', 'unit', 'name', 'buys',
        'sale', 'mb', 'advance', 'vimp', 'vipp', 'vipt',
        // 'cant', 'frecuency', 'mbp', 'total', 'flag',
        'activity_id'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function saleDetail()
    {
        return $this->hasOne(SaleDetail::class);
    }
}
