<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\PassiveType;
use Illuminate\Http\Request;

class PassiveTypeController extends Controller
{
    public function index()
    {
        $passiveTypes = PassiveType::paginate(10);
        return view('evaluation.passiveTypes.index', compact('passiveTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        PassiveType::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(PassiveType $passiveType)
    {
        //
    }

    public function edit(PassiveType $passiveType)
    {
        //
    }

    public function update(Request $request, PassiveType $passiveType)
    {
        $passiveType->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(PassiveType $passiveType)
    {
        $passiveType->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
