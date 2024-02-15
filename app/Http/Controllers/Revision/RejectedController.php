<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use App\Models\Rejected;
use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;

class RejectedController extends Controller
{
    public function index()
    {
        $users = User::get();
        $applications = Application::get();
        $rejecteds = Rejected::orderBy('id', 'DESC')->paginate(10);
        return view('revision.rejecteds.index', compact('rejecteds', 'users', 'applications'));
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
        Rejected::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Rejected $rejected)
    {
        //
    }

    public function edit(Rejected $rejected)
    {
        //
    }

    public function update(Request $request, Rejected $rejected)
    {
        $rejected->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Rejected $rejected)
    {
        $rejected->delete();
        return back()->with('confirmation','Eliminado Correctamente');
    }
}
