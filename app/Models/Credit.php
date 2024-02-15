<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Recovery;

class Credit extends Model
{
    use HasFactory;

    protected $fillable = [
        'monto', 'interes', 'seguro', 'plazo', 'inicio', 'cancelacion', 'tipo', 'estado',
        'application_id',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function paymentPlans()
    {
        return $this->hasMany(PaymentPlan::class);
    }

    public function recoveries()
    {
        return $this->hasMany(Recovery::class);
    }

    public function ultimoPago()
    {
        $credit = $this;
        $recobery = $credit->recoveries->last();
        $disbursement = $credit->application->disbursement;
        if ($recobery) {
            return Carbon::create($recobery->fecha);
        } else {
            return Carbon::create(date_format($disbursement->created_at, 'Y-m-d'));
        }
    }

    public function acturalizarPdP()
    {
        $credit = $this;
        $paymentPlans = $credit->paymentPlans;
        $paymentPlan = $paymentPlans->where('estado', '!=', 'cancelado')->first();
        $paymentPlan->estado = "cancelado";
        $paymentPlan->save();
        return $paymentPlan;
    }

    public function saldoInicial()
    {
        $credit = $this;
        $recobery = $credit->recoveries->last();
        if ($recobery) {
            return $recobery->saldoIni;
        } else {
            return $credit->monto;
        }
    }

    public function saldoFinal()
    {
        $credit = $this;
        $recobery = $credit->recoveries->last();
        if ($recobery) {
            return $recobery->saldoFin;
        } else {
            return $credit->monto;
        }
    }

    public function capital()
    {
        $credit = $this;
        $paymentPlans = $credit->paymentPlans;
        $paymentPlan = $paymentPlans->where('estado', '!=', 'cancelado')->first();
        if ($paymentPlan) {
            $res = $paymentPlan->capital;
            return $res;
        } else {
            return null;
        }
    }

    public function interes($ultimoPago, $hoy)
    {
        $credit = $this;
        $diferencia = $hoy->diffInDays($ultimoPago);
        $intDiario = ($credit->interes)/(12*30*100);
        $saldoFinal = $credit->saldoFinal();
        $res = $diferencia * $intDiario * $saldoFinal;

        return round($res, 2);
    }

    public function intVencido($fechaCuota, $hoy)
    {
        $credit = $this;
        $intVen = $credit->application->product->ven / 100;
        $saldoFinal = $credit->saldoFinal();
        $res = 0;
        if ($hoy <= $fechaCuota) {
            return round($res, 2);
        } else {
            $diferencia = $hoy->diffInDays($fechaCuota);
            $res = $diferencia * $intVen * $saldoFinal;
            return round($res, 2);
        }
    }

    public function intPenal($fechaCuota, $hoy)
    {
        $credit = $this;
        $intPen = $credit->application->product->pen / 100;
        $saldoFinal = $credit->saldoFinal();
        $res = 0;
        if ($hoy <= $fechaCuota) {
            return round($res, 2);
        } else {
            $diferencia = $hoy->diffInDays($fechaCuota);
            $res = $diferencia * $intPen * $saldoFinal;
            return round($res, 2);
        }
    }

    public function intDiferido($fechaCuota, $hoy)
    {
        $credit = $this;
        $intDif = $credit->application->product->dif / 100;
        $saldoFinal = $credit->saldoFinal();
        $res = 0;
        if ($hoy <= $fechaCuota) {
            return $res;
        } else {
            $diferencia = $hoy->diffInDays($fechaCuota);
            $res = $diferencia * $intDif * $saldoFinal;
            return round($res, 2);
        }
    }

    public function seguro()
    {
        $credit = $this;
        $paymentPlans = $credit->paymentPlans;
        $paymentPlan = $paymentPlans->where('estado', '!=', 'cancelado')->first();
        if ($paymentPlan) {
            $res = $paymentPlan->seguro;
            return round($res, 2);
        } else {
            return null;
        }
    }

    public function cuota()
    {
        $credit = $this;
        $paymentPlans = $credit->paymentPlans;
        $paymentPlan = $paymentPlans->where('estado', '!=', 'cancelado')->first();
        if ($paymentPlan) {
            $res = $paymentPlan->cuotaTotal;
            return $res;
        } else {
            return null;
        }
    }

    public function fechaCuota()
    {
        $credit = $this;
        $paymentPlans = $credit->paymentPlans;
        $paymentPlan = $paymentPlans->where('estado', '!=', 'cancelado')->first();
        if ($paymentPlan) {
            $res = Carbon::create($paymentPlan->fecha);
            return $res;
        } else {
            return null;
        }

    }
}
