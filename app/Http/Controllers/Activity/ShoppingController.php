<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Shopping;
use App\Models\Activity;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function index()
    {
        $shoppings = Shopping::paginate(10);
        $activities = Activity::get();
        return view('activity.shoppings.index', compact('shoppings', 'activities'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->frecuency == 'Diario') {
            $request["total"] = $request->amount*$request->buys*26;
        } elseif ($request->frecuency == 'Semanal') {
            $request["total"] = $request->amount*$request->buys*4;
        } elseif ($request->frecuency == 'Quinsenal') {
            $request["total"] = $request->amount*$request->buys*2;
        } elseif ($request->frecuency == 'Mensual') {
            $request["total"] = $request->amount*$request->buys;
        } elseif ($request->frecuency == 'Bimensula') {
            $request["total"] = ($request->amount*$request->buys)/2;
        } elseif ($request->frecuency == 'Trimestral') {
            $request["total"] = ($request->amount*$request->buys)/3;
        } elseif ($request->frecuency == 'Semestral') {
            $request["total"] = ($request->amount*$request->buys)/6;
        } elseif ($request->frecuency == 'Anual') {
            $request["total"] = ($request->amount*$request->buys)/12;
        } else {
            return "Error";
        }

        Shopping::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Shopping $shopping)
    {
        //
    }

    public function edit(Shopping $shopping)
    {
        //
    }

    public function update(Request $request, Shopping $shopping)
    {
        if ($request->frecuency == 'Diario') {
            $request["total"] = $request->amount*$request->buys*26;
        } elseif ($request->frecuency == 'Semanal') {
            $request["total"] = $request->amount*$request->buys*4;
        } elseif ($request->frecuency == 'Quinsenal') {
            $request["total"] = $request->amount*$request->buys*2;
        } elseif ($request->frecuency == 'Mensual') {
            $request["total"] = $request->amount*$request->buys;
        } elseif ($request->frecuency == 'Bimensula') {
            $request["total"] = ($request->amount*$request->buys)/2;
        } elseif ($request->frecuency == 'Trimestral') {
            $request["total"] = ($request->amount*$request->buys)/3;
        } elseif ($request->frecuency == 'Semestral') {
            $request["total"] = ($request->amount*$request->buys)/6;
        } elseif ($request->frecuency == 'Anual') {
            $request["total"] = ($request->amount*$request->buys)/12;
        } else {
            return "Error";
        }
        
        $shopping->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Shopping $shopping)
    {
        $shopping->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
