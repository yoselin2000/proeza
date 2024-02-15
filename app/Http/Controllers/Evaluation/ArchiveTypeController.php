<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\ArchiveType;
use Illuminate\Http\Request;

class ArchiveTypeController extends Controller
{
    public function index()
    {
        $archiveTypes = ArchiveType::paginate(10);
        return view('evaluation.archiveTypes.index', compact('archiveTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ArchiveType::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(ArchiveType $archiveType)
    {
        //
    }

    public function edit(ArchiveType $archiveType)
    {
        //
    }

    public function update(Request $request, ArchiveType $archiveType)
    {
        $archiveType->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }
    
    public function destroy(ArchiveType $archiveType)
    {
        $archiveType->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
