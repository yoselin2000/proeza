<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\MaintenanceHistory;
use App\Models\Assignment;
use App\Models\ElementComponent;
use Illuminate\Http\Request;

class MaintenanceHistoryController extends Controller
{
    public function index()
    {
        $maintenanceHistories = MaintenanceHistory::paginate(10);
        $assignments = Assignment::get();
        $elementComponents = ElementComponent::get();
        return view('asset.maintenanceHistories.index', compact('maintenanceHistories', 'assignments', 'elementComponents'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $elementComponent = ElementComponent::find($request->element_component_id);
        $lastAssignment = $elementComponent->assignments->last();
        $request["assigned_to"] = $lastAssignment->id;
        MaintenanceHistory::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(MaintenanceHistory $maintenanceHistory)
    {
        //
    }

    public function edit(MaintenanceHistory $maintenanceHistory)
    {
        //
    }

    public function update(Request $request, MaintenanceHistory $maintenanceHistory)
    {
        $maintenanceHistory->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(MaintenanceHistory $maintenanceHistory)
    {
        $maintenanceHistory->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
