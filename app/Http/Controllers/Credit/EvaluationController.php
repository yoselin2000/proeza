<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Models\Participant;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::paginate(10);
        $participants = Participant::get();
        return view('credit.evaluations.index', compact('evaluations', 'participants'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $client = Participant::find($request->participant_id)->client;
        $actual = Carbon::now();
        $nacimiento = new Carbon($client->birth);
        $request["age"]=$actual->diffInYears($nacimiento);

        Evaluation::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Evaluation $evaluation)
    {
        //
    }

    public function edit(Evaluation $evaluation)
    {
        //
    }

    public function update(Request $request, Evaluation $evaluation)
    {
        $client = $evaluation->participant->client;
        $actual = Carbon::now();
        $nacimiento = new Carbon($client->birth);
        $request["age"]=$actual->diffInYears($nacimiento);
        $evaluation->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
