<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Activity;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::paginate(10);
        $activities = Activity::get();
        return view('activity.vehicles.index', compact('vehicles', 'activities'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Vehicle::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Vehicle $vehicle)
    {
        //
    }

    public function edit(Vehicle $vehicle)
    {
        //
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
