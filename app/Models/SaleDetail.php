<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'cant','frecuency', 'mbp', 'total', 'inventory_id', 'article_id', 'activity_id'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function mbp()
    {
        $saleDetail = $this;
        $activity = $saleDetail->activity;
        $saleDetails = $activity->saleDetails;
        $res = 0;

        if ($saleDetails->sum('total') != 0) {
            if ($activity->form == "Comercio" || $activity->form == "Servicio") {
                if ($saleDetail->inventory) {
                    $res = (($saleDetail->total / $saleDetails->sum('total')) * $saleDetail->inventory->mb);
                }
            }
            if ($activity->form == "Produccion") {
                if ($saleDetail->article) {
                    $res = (($saleDetail->total / $saleDetails->sum('total')) * $saleDetail->article->mb());
                }
            }
        }
        $saleDetail->mbp = round($res, 2);
        $saleDetail->save();
        return round($res, 2);
    }
}
