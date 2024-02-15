<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Evaluation;
use App\Models\Caedec;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::paginate(10);
        $evaluations = Evaluation::get();
        $caedecs = Caedec::get();
        return view('evaluation.activities.index', compact('activities', 'evaluations', 'caedecs'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Activity::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Activity $activity)
    {
        //
    }

    public function edit(Activity $activity)
    {
        //
    }

    public function update(Request $request, Activity $activity)
    {
        $activity->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
