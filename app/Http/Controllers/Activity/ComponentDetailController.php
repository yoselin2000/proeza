<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\ComponentDetail;
use Illuminate\Http\Request;

class ComponentDetailController extends Controller
{
    public function index()
    {
        $componentDetails = ComponentDetail::paginate(10);
        return view('activity.componentDetails.index', compact('componentDetails'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ComponentDetail::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(ComponentDetail $componentDetail)
    {
        //
    }

    public function edit(ComponentDetail $componentDetail)
    {
        //
    }

    public function update(Request $request, ComponentDetail $componentDetail)
    {
        $componentDetail->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(ComponentDetail $componentDetail)
    {
        $componentDetail->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
