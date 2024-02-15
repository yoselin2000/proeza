<?php

namespace App\Http\Controllers\USer;

use App\Http\Controllers\Controller;
use App\Models\Recovery;
use App\Models\Credit;
use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon;

class RecoveryController extends Controller
{
    public function index(Request $request)
    {
        $query = Credit::query();

        // Filtrar por ID si se proporciona un ID en la solicitud
        if ($request->id) {
            $query->find($request->id);
        }

        // Filtrar por apellido si se proporciona un apellido en la solicitud
        if ($request->ci) {
            $ci = $request->ci;

            $query->whereHas('application.participants', function ($q) use ($ci) {
                $q->whereHas('category', function ($q) {
                    $q->where('name', 'Deudor');
                });
                $q->whereHas('client', function ($q) use ($ci) {
                    $q->where('number', 'LIKE', '%' . $ci . '%');
                });
            });
        }

        // Filtrar por apellido si se proporciona un apellido en la solicitud
        if ($request->name) {
            $name = $request->name;

            $query->whereHas('application.participants', function ($q) use ($name) {
                $q->whereHas('category', function ($q) {
                    $q->where('name', 'Deudor');
                });
                $q->whereHas('client', function ($q) use ($name) {
                    $q->where('name', 'LIKE', '%' . $name . '%')
                        ->orWhere('lastName', 'LIKE', '%' . $name . '%');
                });
            });
        }

        $credits = $query->paginate(10);
        return view('user.recoveries.index', compact('credits'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $credit = Credit::find($request->credit_id);
        $paymentPlan = null;

        $hoy = Carbon::today();
        $ultimoPago = $credit->ultimoPago();
        $fechaCuota = $credit->fechaCuota();
        $monto = $request->amount;

        $recovery = new Recovery;
        $recovery->credit_id = $request->credit_id;
        $recovery->fecha = $hoy;
        $recovery->saldoIni = $credit->saldoFinal();
        $recovery->cuotaTotal = $monto;

        $recovery->seguro = 0;
        $recovery->diferido = 0;
        $recovery->penal = 0;
        $recovery->vencido = 0;
        $recovery->interes = 0;
        $recovery->capital = 0;
        $recovery->saldoFin = 0;

        if ($monto >= $recovery->seguro) {
            $recovery->seguro = $credit->seguro();
            $monto = $monto - $recovery->seguro;
        } else {
            $recovery->seguro = $monto;
            $monto = 0;
        }

        if ($monto >= $recovery->diferido) {
            $recovery->diferido = $credit->intDiferido($fechaCuota, $hoy);
            $monto = $monto - $recovery->diferido;
        } else {
            $recovery->diferido = $monto;
            $monto = 0;
        }

        if ($monto >= $recovery->penal) {
            $recovery->penal = $credit->intPenal($fechaCuota, $hoy);
            $monto = $monto - $recovery->penal;
        } else {
            $recovery->penal = $monto;
            $monto = 0;
        }

        if ($monto >= $recovery->vencido) {
            $recovery->vencido = $credit->intVencido($fechaCuota, $hoy);
            $monto = $monto - $recovery->vencido;
        } else {
            $recovery->vencido = $monto;
            $monto = 0;
        }

        if ($monto >= $recovery->interes) {
            $recovery->interes = $credit->interes($ultimoPago, $hoy);
            $monto = $monto - $recovery->interes;
        } else {
            $recovery->interes = $monto;
            $monto = 0;
        }

        if ($monto >= $recovery->capital) {
            $recovery->capital = $monto;
            $monto = 0;
            $paymentPlan = $credit->acturalizarPdP();
        } else {
            $recovery->capital = $monto;
            $monto = 0;
        }

        // $recovery->capital = $monto;
        $recovery->saldoFin = $recovery->saldoIni - $recovery->capital;
        $recovery->save();

        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Credit $credit)
    {
        $recoveries = $credit->recoveries;
        $paymentPlans = $credit->paymentPlans;

        $client = $credit->application->debtor();
        $hoy = Carbon::today();
        $ultimoPago = $credit->ultimoPago();
        $fechaCuota = $credit->fechaCuota();
        $capital = $credit->capital();
        $interes = $credit->interes($ultimoPago, $hoy);
        $intVencido = $credit->intVencido($fechaCuota, $hoy);
        $intPenal = $credit->intPenal($fechaCuota, $hoy);
        $intDiferido = $credit->intDiferido($fechaCuota, $hoy);
        $cuota = $credit->cuota();
        $seguro = $credit->seguro();

        $total = $interes + $capital + $intVencido + $intPenal + $intDiferido + $seguro;

        $montoPago = 600;

        return view('user.recoveries.show', compact('credit', 'client', 'hoy', 'capital', 'interes', 'intVencido', 'intPenal', 'intDiferido', 'seguro', 'total', 'cuota', 'hoy', 'ultimoPago', 'fechaCuota', 'recoveries', 'paymentPlans'));
    }

    public function edit(Recovery $recovery)
    {
        //
    }

    public function update(Request $request, Recovery $recovery)
    {
        //
    }

    public function destroy(Recovery $recovery)
    {
        //
    }
}
