<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Safe;
use App\Models\Agency;
use Illuminate\Http\Request;

class SafeController extends Controller
{
    public function index()
    {
        $safes = Safe::paginate(10);
        $agencies = Agency::where('state', true)->orderBy('name')->get();
        return view('admin.safes.index', compact('safes', 'agencies'));
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Safe::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Safe $safe)
    {
        //
    }

    public function edit(Safe $safe)
    {
        //
    }

    public function update(Request $request, Safe $safe)
    {
        $safe->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Safe $safe)
    {
        $safe->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
