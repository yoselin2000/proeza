<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index()
    {
        $credits = Credit::paginate(10);
        return view('portfolio.credits.index', compact('credits'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Credit $credit)
    {
        // if ($credit->estado == 'activo') {
        //     // $paymentPlans = $credit->paymentPlans;
        //     // $paymentPlan = $paymentPlans->where('estado', 'pendiente')->first();
        //     // $numero = $paymentPlan->numero;
        //     // $capital = $paymentPlan->capital;
        //     // $interes = $paymentPlan->interes;
        //     // $cuota = $paymentPlan->cuota;
        //     // $saldo = $paymentPlan->saldo;
        //     // $mora = 0;
        //     // $total = 0;
        //     return view('portfolio.credits.show', compact('credit', 'numero', 'capital', 'interes', 'cuota', 'saldo'));
        // } else {
            return view('portfolio.credits.show', compact('credit'));
            // return $credit->paymentPlans;
        // }
    }

    public function edit(Credit $credit)
    {
        //
    }

    public function update(Request $request, Credit $credit)
    {
        //
    }

    public function destroy(Credit $credit)
    {
        //
    }
}
