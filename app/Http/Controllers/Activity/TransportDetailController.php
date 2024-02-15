<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\TransportDetail;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportDetailController extends Controller
{
    public function index()
    {
        $transportDetails = TransportDetail::paginate(10);
        $transports = Transport::orderBy('type')->get();
        return view('activity.transportDetails.index', compact('transportDetails', 'transports'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->frequency == 'Diario') {
            $request["total"] = $request->num * $request->number * $request->price*24;
        } elseif ($request->frequency == 'Semanal') {
            $request["total"] = $request->num * $request->number * $request->price*4;
        } elseif ($request->frequency == 'Quinsenal') {
            $request["total"] = $request->num * $request->number * $request->price*2;
        } elseif ($request->frequency == 'Mensual') {
            $request["total"] = $request->num * $request->number * $request->price;
        } elseif ($request->frequency == 'Bimensula') {
            $request["total"] = ($request->num * $request->number * $request->price)/2;
        } elseif ($request->frequency == 'Trimestral') {
            $request["total"] = ($request->num * $request->number * $request->price)/3;
        } elseif ($request->frequency == 'Semestral') {
            $request["total"] = ($request->num * $request->number * $request->price)/6;
        } elseif ($request->frequency == 'Anual') {
            $request["total"] = ($request->num * $request->number * $request->price)/12;
        } else {
            return "Error";
        }

        TransportDetail::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(TransportDetail $transportDetail)
    {
        //
    }

    public function edit(TransportDetail $transportDetail)
    {
        //
    }

    public function update(Request $request, TransportDetail $transportDetail)
    {

        if ($request->frequency == 'Diario') {
            $request["total"] = $request->num * $request->number * $request->price*24;
        } elseif ($request->frequency == 'Semanal') {
            $request["total"] = $request->num * $request->number * $request->price*4;
        } elseif ($request->frequency == 'Quinsenal') {
            $request["total"] = $request->num * $request->number * $request->price*2;
        } elseif ($request->frequency == 'Mensual') {
            $request["total"] = $request->num * $request->number * $request->price;
        } elseif ($request->frequency == 'Bimensula') {
            $request["total"] = ($request->num * $request->number * $request->price)/2;
        } elseif ($request->frequency == 'Trimestral') {
            $request["total"] = ($request->num * $request->number * $request->price)/3;
        } elseif ($request->frequency == 'Semestral') {
            $request["total"] = ($request->num * $request->number * $request->price)/6;
        } elseif ($request->frequency == 'Anual') {
            $request["total"] = ($request->num * $request->number * $request->price)/12;
        } else {
            return "Error";
        }

        $transportDetail->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(TransportDetail $transportDetail)
    {
        $transportDetail->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
