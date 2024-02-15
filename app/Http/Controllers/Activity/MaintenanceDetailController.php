<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\MaintenanceDetail;
use Illuminate\Http\Request;

class MaintenanceDetailController extends Controller
{
    public function index()
    {
        $maintenanceDetails = MaintenanceDetail::paginate(10);
        return view('activity.maintenanceDetails.index', compact('maintenanceDetails'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        MaintenanceDetail::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(MaintenanceDetail $maintenanceDetail)
    {
        //
    }

    public function edit(MaintenanceDetail $maintenanceDetail)
    {
        //
    }

    public function update(Request $request, MaintenanceDetail $maintenanceDetail)
    {
        $maintenanceDetail->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(MaintenanceDetail $maintenanceDetail)
    {
        $maintenanceDetail->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
