<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\Warranty;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    public function index()
    {
        $warranties = Warranty::paginate(10);
        return view('evaluation.warranties.index', compact('warranties'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Warranty::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Warranty $warranty)
    {
        //
    }

    public function edit(Warranty $warranty)
    {
        //
    }

    public function update(Request $request, Warranty $warranty)
    {
        $warranty->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Warranty $warranty)
    {
        $warranty->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
