<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use App\Models\Approved;
use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;

class ApprovedController extends Controller
{
    public function index()
    {
        $users = User::get();
        $applications = Application::get();
        $approveds = Approved::orderBy('id', 'DESC')->paginate(10);
        return view('revision.approveds.index', compact('approveds', 'users', 'applications'));
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
        Approved::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Approved $approved)
    {
        //
    }

    public function edit(Approved $approved)
    {
        //
    }

    public function update(Request $request, Approved $approved)
    {
        $approved->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Approved $approved)
    {
        $approved->delete();
        return back()->with('confirmation','Eliminado Correctamente');
    }
}
