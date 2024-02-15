<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Element;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::paginate(10);
        $elements = Element::get();
        return view('evaluation.documents.index', compact('documents', 'elements'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Document::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Document $document)
    {
        //
    }

    public function edit(Document $document)
    {
        //
    }

    public function update(Request $request, Document $document)
    {
        $document->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
