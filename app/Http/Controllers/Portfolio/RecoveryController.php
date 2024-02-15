<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Recovery;
use App\Models\Credit;
use Illuminate\Http\Request;

class RecoveryController extends Controller
{
    public function index()
    {
        $credits = Credit::all();
        $recoveries = Recovery::paginate(10);
        return view('portfolio.recoveries.index', compact('credits', 'recoveries'));
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        Recovery::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Recovery $recovery)
    {
        //
    }

    public function edit(Recovery $recovery)
    {
        //
    }

    public function update(Request $request, Recovery $recovery)
    {
        $recovery->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Recovery $recovery)
    {
        $recovery->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
