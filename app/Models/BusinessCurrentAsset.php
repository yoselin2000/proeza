<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCurrentAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'activity_id', 'asset_type_id',
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
