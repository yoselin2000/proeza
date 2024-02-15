<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\EvaluationPassive;
use App\Models\Evaluation;
use App\Models\PassiveType;
use Illuminate\Http\Request;

class EvaluationPassiveController extends Controller
{
    public function index()
    {
        $evaluationPassives = EvaluationPassive::paginate(10);
        $evaluations = Evaluation::get();
        $passiveTypes = PassiveType::get();
        return view('evaluation.evaluationPassives.index', compact('evaluationPassives', 'evaluations', 'passiveTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        EvaluationPassive::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(EvaluationPassive $evaluationPassive)
    {
        //
    }

    public function edit(EvaluationPassive $evaluationPassive)
    {
        //
    }

    public function update(Request $request, EvaluationPassive $evaluationPassive)
    {
        $evaluationPassive->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(EvaluationPassive $evaluationPassive)
    {
        $evaluationPassive->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
