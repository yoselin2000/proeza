<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\ReturnComponent;
use App\Models\Assignment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReturnComponentController extends Controller
{
    public function index()
    {
        $returnComponents = ReturnComponent::paginate(10);
        $users = User::get();
        $assignments = Assignment::whereDoesntHave('returnComponent')->get();
        return view('asset.returnComponents.index', compact('returnComponents', 'assignments', 'users'));
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
            $assignment = Assignment::find($request->assignment_id)->first();
            $request["assigned_to"] = $assignment->assignedToUser->id;

            ReturnComponent::create($request->all());
            return back()->with('confirmation','Registrado Correctamente');
        } else {
            $assignment = Assignment::find($request->assignment_id)->first();
            $hoy = Carbon::today();
            $lastReturnComponent = ReturnComponent::orderBy('cont', 'desc')->first();

            $request["cont"] = $lastReturnComponent ? $lastReturnComponent->cont + 1 : 1;
            $request["assigned_by"] = $assignment->assignedToUser->id;
            $request["assigned_to"] = $user->id;
            $request["date"] = $hoy;

            ReturnComponent::create($request->all());
            return back()->with('confirmation','Registrado Correctamente');
        }
    }

    public function show(ReturnComponent $returnComponent)
    {
        //
    }

    public function edit(ReturnComponent $returnComponent)
    {
        //
    }

    public function update(Request $request, ReturnComponent $returnComponent)
    {
        $returnComponent->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(ReturnComponent $returnComponent)
    {
        $returnComponent->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
