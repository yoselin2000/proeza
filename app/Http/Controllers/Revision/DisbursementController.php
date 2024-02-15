<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use App\Models\Disbursement;
use App\Models\User;
use App\Models\Credit;
use App\Models\Application;
use App\Models\PaymentPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;

class DisbursementController extends Controller
{
    public function index()
    {
        $users = User::get();
        $applications = Application::get();
        $disbursements = Disbursement::orderBy('id', 'DESC')->paginate(10);
        return view('revision.disbursements.index', compact('disbursements', 'users', 'applications'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $hoy = Carbon::today();
        $date = Carbon::create($request->date);
        $diferencia = $hoy->diffInDays($date);

        if ($diferencia < 27 || $diferencia > 45) {
            return back()->with('confirmation','Elija otra Fecha');
        } else {
            // actualizamos fecha de siguiente mes
            $application = Application::find($request->application_id);
            $application->date = $date;
            $application->save();

            // registristramos datos del desembolso
            Disbursement::create($request->all());

            // Guardar los datos de credito
            $credit = Credit::create([
                'monto' => $application->amount,
                'interes' => $application->product->int,
                'seguro' => $application->product->seg,
                'plazo' => $application->term,
                'inicio' => $hoy,
                'cancelacion' => $date,
                'tipo' => $application->feeType,
                'estado' => 'activo',
                'application_id' => $application->id
            ]);

            // generamos plan de pagos
            if ($credit->tipo == "Francés(Couta Fija)") {

                // variables
                $monto = $credit->monto  ;
                $interes = ($credit->interes)/(12*100);
                $interesDia = ($credit->interes)/(12*100*30);
                $plazo = $credit->plazo;
                $seguro = $credit->seguro/100;
                $fechaInicio = $credit->inicio;
                $fechaDiaPago = $credit->cancelacion;
                $aux = $credit->cancelacion;

                // calculos
                $saldoIni = round($monto, 2);
                $cuota = round((($monto * $interes)/ (1 - pow(1 + $interes, - $plazo))), 2);
                $int= round($saldoIni * $interesDia * $diferencia, 2);
                $cap= round($cuota-$int, 2);
                $seg = round($monto * $seguro, 2);
                $cuotaTotal = round($cuota + $seg, 2);
                $saldoFinal= round($saldoIni-$cap, 2);

                // validar fecha
                if ($fechaDiaPago->isSaturday()) {
                    $fechaDiaPago->subDay();
                }
                if ($fechaDiaPago->isSunday()) {
                    $fechaDiaPago->addDay();
                }

                // iteramos creacion de plan de pago
                for ($i=1; $i <= $plazo; $i++) {

                    $planPago = new PaymentPlan([
                        'numero' => $i,
                        'fecha' => $fechaDiaPago,
                        'dia' => $fechaDiaPago->englishDayOfWeek,
                        'saldoIni' => $saldoIni,
                        'capital' => $cap,
                        'interes' => $int,
                        'cuota' => $cuota,
                        'seguro' => $seg,
                        'cuotaTotal' => $cuotaTotal,
                        'saldoFin' => $saldoFinal,
                        'estado' => 'pendiente',
                        'credit_id' => $credit->id,
                    ]);
                    $planPago->save();

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

                    $saldoIni = round($saldoFinal, 2);
                    $int= round($saldoIni * $interesDia * $diferencia, 2);

                    // condicional final
                    if ($i == $plazo-1) {
                        $cap = round($saldoIni, 2);
                        $cuota = round($cap + $int, 2);
                        $cuotaTotal = round($cuota + $seg, 2);
                        $saldoFinal= round($saldoIni-$cap, 2);
                    }else {
                        $cap= round($cuota-$int, 2);
                        $seg = round($saldoIni * $seguro, 2);
                        $saldoFinal= round($saldoIni-$cap, 2);
                    }
                }
                return back()->with('confirmation','Registrado Correctamente');
            }else {
                return back()->with('confirmation','aun no se implemento');
            }
        }


        // return $diferencia;

        // if ($credit->tipo == "Francés(Couta Fija)") {

        //     // $monto = $credit->monto;
        //     // $interes = ($credit->interes)/(12*100);
        //     // $plazo = $credit->plazo;
        //     // $seguro = $credit->seguro;

        //     $monto = 20800  ;
        //     $interes = (35.91)/(12*100);
        //     $interesDia = (35.91)/(12*100*30);
        //     $plazo = 24;
        //     $seguro = 0.09/100;
        //     $fechaInicio = '22-08-2023';
        //     $fechaDiaPago = '18-09-2023';


        //     $seg = $monto * $seguro;
        //     $cuota = (($monto * $interes)/ (1 - pow(1 + $interes, - $plazo)));
        //     $cuotaTotal = $cuota + $seg;

        //     $fechaPago = strtotime($fechaInicio);
        //     $fechaDia = strtotime($fechaDiaPago);
        //     $aux = strtotime($fechaDiaPago);

        //     $fechaInicio1 = new DateTime($fechaInicio);
        //     $fechaDiaPago1 = new DateTime($fechaDiaPago);
        //     $diferencia = $fechaInicio1->diff($fechaDiaPago1);
        //     $diferenciaDias = $diferencia->days;

        //     if ($diferenciaDias < 27 || $diferenciaDias > 45) {
        //         return 'NO SE PUEDE '.$diferenciaDias;
        //     }else{
        //         if (date('N', $fechaDia) == 6) {
        //             $fechaDia = strtotime('-1 day', $fechaDia);
        //         }
        //         if (date('N', $fechaDia) == 7) {
        //             $fechaDia = strtotime('+1 day', $fechaDia);
        //         }
        //     }
        //     $saldoIni = $monto;
        //     $int= $saldoIni * $interesDia * $diferenciaDias;
        //     $cap= $cuota-$int;
        //     $saldoFinal= $saldoIni-$cap;
        //     $tabla = [];
        //     for ($i=0; $i < $plazo; $i++) {
        //         $tabla[] = [
        //             '#' => $i+1,
        //             'Saldo Inicial' => number_format($saldoIni, 2),
        //             'Fecha' => date('d-m-Y', $fechaDia),
        //             'dia' => date('N', $fechaDia),
        //             'Capital' => number_format($cap, 2),
        //             'Interes' => number_format($int, 2),
        //             'Cuota' => number_format($cuota, 2),
        //             'Seguro' => number_format($seg, 2),
        //             'Cuota Total' => number_format($cuotaTotal, 2),
        //             'Saldo Final' => number_format($saldoFinal, 2),
        //             // 'Diferncia Dias' => number_format($diferenciaDias, 2),
        //         ];
        //         $fechaInicio1->setTimestamp($fechaDia);
        //         $aux = strtotime('+1 month', $aux);
        //         $fechaDia = $aux;
        //         if (date('N', $fechaDia) == 6) {
        //             $fechaDia = strtotime('-1 day', $fechaDia);
        //         }
        //         if (date('N', $fechaDia) == 7) {
        //             $fechaDia = strtotime('+1 day', $fechaDia);
        //         }
        //         $fechaDiaPago1->setTimestamp($fechaDia);
        //         $diferencia = $fechaInicio1->diff($fechaDiaPago1);
        //         $diferenciaDias = $diferencia->days;
        //         $saldoIni = $saldoFinal;
        //         $int= $saldoIni * $interesDia * $diferenciaDias;
        //         $cap= $cuota-$int;
        //         $saldoFinal= $saldoIni-$cap;
        //     }
        //     return $tabla;

        // }
        // if ($credit->tipo == "Alemám(Couta Variable)") {
        //     $tasaDecimal = ($tasaInteres / 100) / 12;
        //     $capital = $montoTotal / $plazoMeses;
        //     // $cuotaMensual = $montoTotal / $plazoMeses;
        //     $saldoCap = $montoTotal;

        //     for ($cuota = 1; $cuota <= $plazoMeses; $cuota++) {

        //         // Crear el registro del plan de pagos
        //         $planPago = new PaymentPlan([
        //             'numero' => $cuota,
        //             'cuota' => round($capital + ($saldoCap * $tasaDecimal), 2),
        //             'interes' => round($saldoCap * $tasaDecimal, 2),
        //             'seguro' => round($montoSeguro, 2),
        //             'capital' => round($capital, 2),
        //             'saldo' => round($saldoCap - $capital, 2),
        //             'fecha' => date('Y-m-d', strtotime("+$cuota months", strtotime($credit->inicio))),
        //             'estado' => 'pendiente',
        //             'credit_id' => $credit->id,
        //         ]);
        //         $planPago->save();
        //         $saldoCap = $saldoCap - $capital;
        //     }
        // }
        // if ($credit->tipo == "Fijo") {
        //     $tasaDecimal = $tasaInteres;
        //     $capital = $montoTotal / $plazoMeses;
        //     $saldoCap = $montoTotal;

        //     for ($cuota = 1; $cuota <= $plazoMeses; $cuota++) {

        //         // Crear el registro del plan de pagos
        //         $planPago = new PaymentPlan([
        //             'numero' => $cuota,
        //             'cuota' => round($capital + $tasaDecimal, 2),
        //             'interes' => round($tasaDecimal, 2),
        //             'seguro' => round($montoSeguro, 2),
        //             'capital' => round($capital, 2),
        //             'saldo' => round($saldoCap - $capital, 2),
        //             'fecha' => date('Y-m-d', strtotime("+$cuota months", strtotime($credit->inicio))),
        //             'estado' => 'pendiente',
        //             'credit_id' => $credit->id,
        //         ]);
        //         $planPago->save();
        //         $saldoCap = $saldoCap - $capital;
        //     }
        // }

        // return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Disbursement $disbursement)
    {
        //
    }

    public function edit(Disbursement $disbursement)
    {
        //
    }

    public function update(Request $request, Disbursement $disbursement)
    {
        $disbursement->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Disbursement $disbursement)
    {
        $disbursement->delete();
        return back()->with('confirmation','Eliminado Correctamente');
    }
}
