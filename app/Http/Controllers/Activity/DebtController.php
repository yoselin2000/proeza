<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Debt;
use App\Models\Activity;
use App\Models\BusinessPassive;
use Illuminate\Http\Request;

class DebtController extends Controller
{
    public function index()
    {
        $debts = Debt::paginate(10);
        $activities = Activity::get();
        return view('activity.debts.index', compact('debts','activities'));
    }
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $activity = Activity::find($request->activity_id);
        $totalBalace = $activity->businessPassives->sum('balace');
        $request['longTerm']= $totalBalace - $request->shortTerm;
        Debt::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Debt $debt)
    {
        //
    }
    
    public function edit(Debt $debt)
    {
        //
    }

    public function update(Request $request, Debt $debt)
    {
        $activity = $debt->activity;
        $totalBalace = $activity->businessPassives->sum('balace');
        $request['longTerm']= $totalBalace - $request->shortTerm;
        $debt->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Debt $debt)
    {
        $debt->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
