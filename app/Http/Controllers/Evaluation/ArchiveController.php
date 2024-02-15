<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use App\Models\Evaluation;
use App\Models\ArchiveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    public function index()
    {
        $archives = Archive::paginate(10);
        $evaluations = Evaluation::get();
        $archiveTypes = ArchiveType::get();
        return view('evaluation.archives.index', compact('archives', 'evaluations', 'archiveTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $evaluation = Evaluation::find($request->evaluation_id);
        $participant = $evaluation->participant;
        $client = $evaluation->participant->client;
        
        $archive = Archive::create($request->all());
        $nombre = $evaluation->id.".".$participant->id.".".$client->id.".".$client->lastName." ".$client->secondLastName." ".$client->name;
        $path = Storage::disk('public')->put($nombre,  $request->file('file'));
        $archive->fill(['file' => asset($path)])->save();

        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Archive $archive)
    {
        //
    }

    public function edit(Archive $archive)
    {
        //
    }

    public function update(Request $request, Archive $archive)
    {
        $archive->update($request->all());

        $evaluation = Evaluation::find($request->evaluation_id);
        $participant = $evaluation->participant;
        $client = $evaluation->participant->client;
        $nombre = $evaluation->id.".".$participant->id.".".$client->id.".".$client->lastName." ".$client->secondLastName." ".$client->name;

        if ($request->file('file')) {
            $path = Storage::disk('public')->put($nombre,  $request->file('file'));
            $archive->fill(['file' => asset($path)])->save();
        }
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Archive $archive)
    {
        $archive->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
