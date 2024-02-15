<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use App\Models\Destination;
use App\Models\Product;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::paginate(10);
        $users = User::where('state', true)->orderBy('name')->get();
        $destinations = Destination::where('state', true)->orderBy('name')->get();
        $products = Product::where('state', true)->orderBy('name')->get();
        return view('credit.applications.index', compact('applications', 'users', 'destinations', 'products'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Application::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Application $application)
    {
        //
    }

    public function edit(Application $application)
    {
        //
    }

    public function update(Request $request, Application $application)
    {
        if ($application->assign) {
            $application->update($request->all());
            $rev = $application->choose();
            $assign = $application->assign;
            $assign->user_id = $rev->random(1)->first()->id;
            $assign->save();
            return back()->with('confirmation','Actualizado Correctamente');
        } else {
            $application->update($request->all());
            return back()->with('confirmation','Actualizado Correctamente');
        }
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
