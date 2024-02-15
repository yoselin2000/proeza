<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\ComponentDetail;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index()
    {
        $components = Component::paginate(10);
        $vehicles = Vehicle::orderBy('type')->get();
        $componentDetails = ComponentDetail::orderBy('name')->get();
        return view('activity.components.index', compact('components', 'vehicles', 'componentDetails'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Component::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Component $component)
    {
        //
    }

    public function edit(Component $component)
    {
        //
    }

    public function update(Request $request, Component $component)
    {
        $component->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Component $component)
    {
        $component->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
