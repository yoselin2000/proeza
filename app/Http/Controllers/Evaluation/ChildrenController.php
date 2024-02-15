<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\Children;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    public function index()
    {
        $childrens = Children::paginate(10);
        $evaluations = Evaluation::get();
        return view('evaluation.childrens.index', compact('childrens', 'evaluations'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Children::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Children $children)
    {
        //
    }

    public function edit(Children $children)
    {
        //
    }

    public function update(Request $request, Children $children)
    {
        $children->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }
    
    public function destroy(Children $children)
    {
        $children->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
