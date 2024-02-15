<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cash extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessment', 'buys', 'real',
        'activity_id'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function estimado()
    {
        // $cash = $this;
        // $activity = $cash->activity;
        // $averageSale = $activity->averageSales->where('type', 'Diario')->first();
        // $ventasDiarias = $averageSale->sales->avg('amount');

        // $assessment = Carbon::create($cash->assessment);
        // $buys = Carbon::create($cash->buys);

        // $diferencia = $assessment->diffInDays($buys);

        // $res = $diferencia*$ventasDiarias;

        // return round($res, 2);

        $cash = $this;
        $activity = $cash->activity;
        $averageSale = $activity->averageSales->where('type', 'Diario')->first();
        if ($averageSale) {
            $ventasDiarias = $averageSale->sales->avg('amount');

            $assessment = Carbon::create($cash->assessment);
            $buys = Carbon::create($cash->buys);

            $diferencia = $assessment->diffInDays($buys);

            $res = $diferencia * $ventasDiarias;

            return round($res, 2);
        } else {
            return 0;
        }
    }

    public function detEfectivo()
    {
        $cash = $this;

        $real = $cash->real;

        $assessment = Carbon::create($cash->assessment);
        $buys = Carbon::create($cash->buys);
        $diferencia = $assessment->diffInDays($buys);

        $res = $real/$diferencia;

        return round($res, 2);
    }
}
