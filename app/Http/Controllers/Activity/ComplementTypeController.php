<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\ComplementType;
use Illuminate\Http\Request;

class ComplementTypeController extends Controller
{
    public function index()
    {
        $complementTypes = ComplementType::paginate(10);
        return view('activity.complementTypes.index', compact('complementTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ComplementType::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(ComplementType $complementType)
    {
        //
    }

    public function edit(ComplementType $complementType)
    {
        //
    }

    public function update(Request $request, ComplementType $complementType)
    {
        $complementType->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(ComplementType $complementType)
    {
        $complementType->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
