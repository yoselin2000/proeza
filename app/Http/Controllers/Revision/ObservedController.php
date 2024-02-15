<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use App\Models\Observed;
use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;

class ObservedController extends Controller
{
    public function index()
    {
        $users = User::get();
        $applications = Application::get();
        $observeds = Observed::orderBy('id', 'DESC')->paginate(10);
        return view('revision.observeds.index', compact('observeds', 'users', 'applications'));
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
        Observed::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Observed $observed)
    {
        //
    }

    public function edit(Observed $observed)
    {
        //
    }

    public function update(Request $request, Observed $observed)
    {
        $observed->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Observed $observed)
    {
        $observed->delete();
        return back()->with('confirmation','Eliminado Correctamente');
    }
}
