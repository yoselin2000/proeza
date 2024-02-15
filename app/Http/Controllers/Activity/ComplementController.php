<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Complement;
use App\Models\Activity;
use App\Models\ComplementType;
use Illuminate\Http\Request;

class ComplementController extends Controller
{
    public function index()
    {
        $complements = Complement::paginate(10);
        $activities = Activity::get();
        $complementTypes = ComplementType::orderBy('name')->get();
        return view('activity.complements.index', compact('complements', 'activities', 'complementTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Complement::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Complement $complement)
    {
        //
    }

    public function edit(Complement $complement)
    {
        //
    }

    public function update(Request $request, Complement $complement)
    {
        $complement->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Complement $complement)
    {
        $complement->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
