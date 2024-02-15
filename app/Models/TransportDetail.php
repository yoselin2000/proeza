<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'detail','num','unit','number','frequency','price','total', 'transport_id'
    ];

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}
