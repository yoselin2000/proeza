<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'complement', 'value', 'evaluation_id', 'asset_type_id',
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function assetType()
    {
        return $this->belongsTo(AssetType::class);
    }
}
