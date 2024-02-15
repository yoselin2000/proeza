<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\BusinessPassive;
use App\Models\Activity;
use App\Models\PassiveType;
use Illuminate\Http\Request;

class BusinessPassiveController extends Controller
{
    public function index()
    {
        $businessPassives = BusinessPassive::paginate(10);
        $activities = Activity::get();
        $passiveTypes = PassiveType::get();
        return view('activity.businessPassives.index', compact('businessPassives', 'activities', 'passiveTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        BusinessPassive::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(BusinessPassive $businessPassive)
    {
        //
    }

    public function edit(BusinessPassive $businessPassive)
    {
        //
    }

    public function update(Request $request, BusinessPassive $businessPassive)
    {
        $businessPassive->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }


    public function destroy(BusinessPassive $businessPassive)
    {
        $businessPassive->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
