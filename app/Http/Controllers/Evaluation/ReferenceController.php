<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function index()
    {
        $references = Reference::paginate(10);
        $evaluations = Evaluation::get();
        return view('evaluation.references.index', compact('references', 'evaluations'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Reference::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Reference $reference)
    {
        //
    }

    public function edit(Reference $reference)
    {
        //
    }

    public function update(Request $request, Reference $reference)
    {
        $reference->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Reference $reference)
    {
        $reference->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
