<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\Reception;
use App\Models\Evaluation;
use App\Models\Warranty;
use App\Models\Element;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    public function index()
    {
        $receptions = Reception::paginate(10);
        $evaluations = Evaluation::get();
        $warranties = Warranty::get();
        $elements = Element::get();
        return view('evaluation.receptions.index', compact('receptions', 'evaluations', 'warranties', 'elements'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Reception::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Reception $reception)
    {
        //
    }

    public function edit(Reception $reception)
    {
        //
    }

    public function update(Request $request, Reception $reception)
    {
        $reception->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Reception $reception)
    {
        $reception->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
