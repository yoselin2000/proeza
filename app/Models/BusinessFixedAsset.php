<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessFixedAsset extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'year', 'amount',
        'activity_id', 'asset_type_id'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function assetType()
    {
        return $this->belongsTo(AssetType::class);
    }
}
