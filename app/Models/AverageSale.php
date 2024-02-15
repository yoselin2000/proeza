<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AverageSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'well', 'regular', 'bad', 'activity_id', 'vehicle_id'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function ventaDiaria()
    {
        $averageSale = $this;
        $res = 0;

        $activity = $averageSale->activity;
        if ($activity && $activity->form == "Comercio" || $activity && $activity->form == "Servicio" || $activity && $activity->form == "Produccion" ) {
            if ($averageSale->type == 'Diario') {
                $res = $averageSale->sales->avg('amount');
            }
            if ($averageSale->type == 'Mensual') {
                $averageSaleDiario = $activity->averageSales->where('type', 'Diario')->first();
                if ($averageSaleDiario && $averageSaleDiario->sales) {
                    if ($averageSaleDiario->sales->count() == 7) {
                        if ($averageSale->sales) {
                            $res = $averageSale->sales->avg('amount') / 26;
                        }
                    } else {
                        if ($averageSale->sales && $averageSaleDiario->sales->count() > 0) {
                            $res = ($averageSale->sales->avg('amount')) / ($averageSaleDiario->sales->count() * 4);
                        }
                    }
                }
            }
        }

        if ($averageSale->type == 'Diario') {
            $res = $averageSale->sales->avg('amount');
        }
        if ($averageSale->type == 'Mensual') {
            $vehicle = $averageSale->vehicle;
            if ($vehicle && $vehicle->averageSales->count() > 0) {
                $activity = $averageSale->vehicle->activity;

                if ($activity && $activity->form == "Transporte") {
                    $averageSaleDiario = $averageSale->vehicle->averageSales->where('type', 'Diario')->first();

                    if ($averageSaleDiario && $averageSaleDiario->sales->count() == 7) {
                        $res = $averageSale->sales->avg('amount') / 26;
                    } else {
                        $res = ($averageSale->sales->avg('amount')) / ($averageSaleDiario->sales->count() * 4);
                    }
                }
            }
        }
        return round($res, 2);
    }

    public function ventaMensual()
    {
        $averageSale = $this;
        $res = 0;
        if ($averageSale->type == 'Diario') {
            if ($averageSale->sales->count() == 7) {
                $res = $averageSale->sales->avg('amount') * 26;
            } else {
                $res = $averageSale->sales->sum('amount') * 4;
            }
        }
        if ($averageSale->type == 'Mensual') {
            $res = $averageSale->sales->avg('amount');
        }
        return round($res, 2);
    }

    public function costoVenta()
    {
        $averageSale = $this;

        return 'yes';
    }
}
