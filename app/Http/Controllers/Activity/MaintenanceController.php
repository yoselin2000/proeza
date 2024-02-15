<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use App\Models\MaintenanceDetail;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $maintenances = Maintenance::paginate(10);
        $vehicles = Vehicle::orderBy('type')->get();
        $maintenanceDetails = MaintenanceDetail::orderBy('name')->get();
        return view('activity.maintenances.index', compact('maintenances', 'vehicles', 'maintenanceDetails'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request['total']=$request->cant * $request->price;
        if ($request->frequency == 'Diario') {
            $request['month']=$request->total * 24;
        } elseif ($request->frequency == 'Semanal') {
            $request['month']=$request->total * 4;
        } elseif ($request->frequency == 'Quincenal') {
            $request['month']=$request->total * 2;
        } elseif ($request->frequency == 'Mesual') {
            $request['month']=$request->total * 1;
        } elseif ($request->frequency == 'Bimestral') {
            $request['month']=$request->total * 0.5;
        } elseif ($request->frequency == 'Trimestral') {
            $request['month']=$request->total * 0.33;
        } elseif ($request->frequency == 'Semestral') {
            $request['month']=$request->total * 0.66;
        } elseif ($request->frequency == 'Anual') {
            $request['month']=$request->total * 0.083;
        } elseif ($request->frequency == '1 año 1/2') {
            $request['month']=$request->total * 0.55;
        } elseif ($request->frequency == '2 años') {
            $request['month']=$request->total * 0.042;
        } elseif ($request->frequency == '3 años') {
            $request['month']=$request->total * 0.027;
        } elseif ($request->frequency == '4 años') {
            $request['month']=$request->total * 0.020;
        } elseif ($request->frequency == '5 años') {
            $request['month']=$request->total * 0.016;
        } else {
            $request['month']=0;
        }
        $request['year']=$request->month / 12;
        Maintenance::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Maintenance $maintenance)
    {
        //
    }

    public function edit(Maintenance $maintenance)
    {
        //
    }

    public function update(Request $request, Maintenance $maintenance)
    {
        $request['total']=$request->cant * $request->price;
        if ($request->frequency == 'Diario') {
            $request['month']=round($request->total * (24), 2);
        } elseif ($request->frequency == 'Semanal') {
            $request['month']=round($request->total * (4), 2);
        } elseif ($request->frequency == 'Quincenal') {
            $request['month']=round($request->total * (2), 2);
        } elseif ($request->frequency == 'Mesual') {
            $request['month']=round($request->total * (1), 2);
        } elseif ($request->frequency == 'Bimestral') {
            $request['month']=round($request->total * (0.5), 2);
        } elseif ($request->frequency == 'Trimestral') {
            $request['month']=round($request->total * (0.33), 2);
        } elseif ($request->frequency == 'Semestral') {
            $request['month']=round($request->total * (0.167), 2);
        } elseif ($request->frequency == 'Anual') {
            $request['month']=round($request->total * (0.083), 2);
        } elseif ($request->frequency == '1 año 1/2') {
            $request['month']=round($request->total * (0.055), 2);
        } elseif ($request->frequency == '2 años') {
            $request['month']=round($request->total * (0.042), 2);
        } elseif ($request->frequency == '3 años') {
            $request['month']=round($request->total * (0.027), 2);
        } elseif ($request->frequency == '4 años') {
            $request['month']=round($request->total * (0.020), 2);
        } elseif ($request->frequency == '5 años') {
            $request['month']=round($request->total * (0.016), 2);
        } else {
            $request['month']=0;
        }
        $request['year']=$request->month / 12;
        $maintenance->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
