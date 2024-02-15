<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\Element;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    public function index()
    {
        $elements = Element::paginate(10);
        return view('evaluation.elements.index', compact('elements'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Element::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Element $element)
    {
        //
    }

    public function edit(Element $element)
    {
        //
    }

    public function update(Request $request, Element $element)
    {
        $element->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Element $element)
    {
        $element->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }

    public function obtenerDocumentos($id)
    {
        $element = Element::findOrFail($id);
        $documents = $element->documents;

        return response()->json($documents);
    }
}
