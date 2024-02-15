<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Cash;
use App\Models\Activity;
use Illuminate\Http\Request;

class CashController extends Controller
{
    public function index()
    {
        $cashes = Cash::paginate(10);
        $activities = Activity::get();
        return view('activity.cashes.index', compact('cashes', 'activities'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Cash::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Cash $cash)
    {
        //
    }

    public function edit(Cash $cash)
    {
        //
    }

    public function update(Request $request, Cash $cash)
    {
        $cash->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Cash $cash)
    {
        $cash->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
