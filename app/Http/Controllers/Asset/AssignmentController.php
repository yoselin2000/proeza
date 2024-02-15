<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\ElementComponent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::paginate(10);
        $elementComponents = ElementComponent::get();
        $users = User::get();
        return view('asset.assignments.index', compact('assignments', 'users', 'elementComponents'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            $lastAssignment = Assignment::orderBy('cont', 'desc')->first();
            $cont = $lastAssignment ? $lastAssignment->cont + 1 : 1;
            $request["cont"] = $cont;

            $assignment = Assignment::create($request->all());
            $assignment->elementComponents()->attach($request->elementComponents); // muchos a muchos
            ElementComponent::whereIn('id', $request->elementComponents)->update(['state' => false]);//cambiar el estado del componente

            return back()->with('confirmation','Registrado Correctamente');
        } else {
            $lastAssignment = Assignment::orderBy('cont', 'desc')->first();
            $hoy = Carbon::today();

            $request["cont"] = $lastAssignment ? $lastAssignment->cont + 1 : 1;
            $request["assigned_by"] = $user->id;
            $request["date"] = $hoy;

            $assignment = Assignment::create($request->all());
            $assignment->elementComponents()->attach($request->elementComponents); // muchos a muchos
            ElementComponent::whereIn('id', $request->elementComponents)->update(['state' => false]);//cambiar el estado del componente

            return back()->with('confirmation','Registrado Correctamente');
        }
    }

    public function show(Assignment $assignment)
    {
        //
    }

    public function edit(Assignment $assignment)
    {
        //
    }

    public function update(Request $request, Assignment $assignment)
    {
        $assignment->update($request->all());
        $assignment->elementComponents()->sync($request->elementComponents);
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Assignment $assignment)
    {
        $elementComponentIds = $assignment->elementComponents->pluck('id');
        $assignment->delete();
        ElementComponent::whereIn('id', $elementComponentIds)->update(['state' => true]);
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
