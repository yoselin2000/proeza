<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Box;
use App\Models\Agency;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index()
    {
        $boxes = Box::paginate(10);
        $agencies = Agency::where('state', true)->orderBy('name')->get();
        return view('admin.boxes.index', compact('boxes', 'agencies'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Box::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Box $box)
    {
        //
    }

    public function edit(Box $box)
    {
        //
    }

    public function update(Request $request, Box $box)
    {
        $box->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Box $box)
    {
        $box->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
