<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::paginate(10);
        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Destination::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Destination $destination)
    {
        //
    }

    public function edit(Destination $destination)
    {
        //
    }

    public function update(Request $request, Destination $destination)
    {
        $destination->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
