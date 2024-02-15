<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\FamilyPassive;
use App\Models\Evaluation;
use App\Models\PassiveType;
use Illuminate\Http\Request;

class FamilyPassiveController extends Controller
{
    public function index()
    {
        $familyPassives = FamilyPassive::paginate(10);
        $evaluations = Evaluation::get();
        $passiveTypes = PassiveType::get();
        return view('evaluation.familyPassives.index', compact('familyPassives', 'evaluations', 'passiveTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        FamilyPassive::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(FamilyPassive $familyPassive)
    {
        //
    }

    public function edit(FamilyPassive $familyPassive)
    {
        //
    }

    public function update(Request $request, FamilyPassive $familyPassive)
    {
        $familyPassive->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(FamilyPassive $familyPassive)
    {
        $familyPassive->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
