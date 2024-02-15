<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use App\Models\Assign;
use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;

class AssignController extends Controller
{
    public function index()
    {
        $users = User::get();
        $applications = Application::get();
        $assigns = Assign::orderBy('id', 'DESC')->paginate(10);
        return view('revision.assigns.index', compact('assigns', 'users', 'applications'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if (!$request->user_id) {
            $user = Auth::user();
            $request["user_id"]=$user->id;
        }
        Assign::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Assign $assign)
    {
        //
    }

    public function edit(Assign $assign)
    {
        //
    }

    public function update(Request $request, Assign $assign)
    {
        $assign->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Assign $assign)
    {
        $assign->delete();
        return back()->with('confirmation','Eliminado Correctamente');
    }
}
