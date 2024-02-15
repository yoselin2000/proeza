<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\PaymentPlan;
use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon;

class PaymentPlanController extends Controller
{
    public function index()
    {
        $hoy = Carbon::create('22-08-2023');
        $date = Carbon::create('18-09-2023');   
        $diferencia = $hoy->diffInDays($date);
        // variables
        $monto = 20800  ;
        $interes = (35.91)/(12*100);
        $interesDia = (35.91)/(12*100*30);
        $plazo = 24;
        $seguro = 0.09/100;
        $fechaInicio = clone $hoy;
        $fechaDiaPago = clone $date;
        $aux = clone $date;

        // calculos
        $saldoIni = $monto;
        $cuota = (($monto * $interes)/ (1 - pow(1 + $interes, - $plazo)));
        $int= $saldoIni * $interesDia * $diferencia;
        $cap= $cuota-$int;
        $seg = $monto * $seguro;
        $cuotaTotal = $cuota + $seg;$saldoIni = $monto;
        $saldoFinal= $saldoIni-$cap;

        // validar fecha
        if ($fechaDiaPago->isSaturday()) {
            $fechaDiaPago->subDay();
        } 
        if ($fechaDiaPago->isSunday()) {
            $fechaDiaPago->addDay();
        }

        // iteramos creacion de plan de pago
        $totalCapital = 0;
        $totalInteres = 0;
        $tabla = [];
        for ($i=0; $i < $plazo; $i++) { 
            $totalCapital += $cap;
            $totalInteres += $int;
            $tabla[] = [
                'numero' => $i+1,
                'fecha' => $fechaDiaPago,
                'dia' => $fechaDiaPago->englishDayOfWeek,
                'saldoIni' => round($saldoIni, 2),
                'capital' => round($cap, 2),
                'interes' => round($int, 2),
                'cuota' => round($cuota, 2),
                'seguro' => round($seg, 2),
                'cuotaTotal' => round($cuotaTotal, 2),
                'saldoFin' => round($saldoFinal, 2),
                'estado' => 'pendiente',
                // 'credit_id' => $credit->id,
            ];
            

            // echo ('Inicio: '.$fechaInicio.'Fin: '.$fechaDiaPago.'Diferencia: '.$diferencia);
            $fechaInicio = clone $fechaDiaPago;
            $aux->addMonths();
            $fechaDiaPago = $aux;

            // validar fecha
            if ($fechaDiaPago->isSaturday()) {
                $fechaDiaPago->subDay();
            } 
            if ($fechaDiaPago->isSunday()) {
                $fechaDiaPago->addDay();
            }
            
            $diferencia = $fechaInicio->diffInDays($fechaDiaPago);

            $saldoIni = $saldoFinal;
            $int= $saldoIni * $interesDia * $diferencia;
            $cap= $cuota-$int;
            $seg = $saldoIni * $seguro;
            $saldoFinal= $saldoIni-$cap;
            
            // condicional final
            if($saldoFinal < 0){
                $cap = $saldoIni;
                $cuota = $cap + $int;
                $cuotaTotal = $cuota + $seg;
                $saldoFinal= $saldoIni-$cap;
            }
            
        }

        echo "capital: " . round($totalCapital, 2) . "<br>";
        echo "interés: " . round($totalInteres, 2) . "<br>";

        // return $tabla;
    }
}
