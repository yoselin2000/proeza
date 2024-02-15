<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $transports = Transport::paginate(10);
        $vehicles = Vehicle::orderBy('type')->get();
        return view('activity.transports.index', compact('transports', 'vehicles'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Transport::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Transport $transport)
    {
        //
    }

    public function edit(Transport $transport)
    {
        //
    }

    public function update(Request $request, Transport $transport)
    {
        $transport->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Transport $transport)
    {
        $transport->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
