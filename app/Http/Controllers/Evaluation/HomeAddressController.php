<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\HomeAddress;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeAddressController extends Controller
{
    public function index()
    {
        $homeAddresses = HomeAddress::paginate(10);
        $evaluations = Evaluation::get();
        return view('evaluation.homeAddresses.index', compact('homeAddresses', 'evaluations'));
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
        
        $homeAddress = HomeAddress::create($request->all());
        $nombre = $evaluation->id.".".$participant->id.".".$client->id.".".$client->lastName." ".$client->secondLastName." ".$client->name;
        $path = Storage::disk('public')->put($nombre,  $request->file('file'));
        $homeAddress->fill(['file' => asset($path)])->save();

        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(HomeAddress $homeAddress)
    {
        //
    }

    public function edit(HomeAddress $homeAddress)
    {
        //
    }

    public function update(Request $request, HomeAddress $homeAddress)
    {
        $homeAddress->update($request->all());

        $evaluation = Evaluation::find($request->evaluation_id);
        $participant = $evaluation->participant;
        $client = $evaluation->participant->client;
        $nombre = $evaluation->id.".".$participant->id.".".$client->id.".".$client->lastName." ".$client->secondLastName." ".$client->name;

        if ($request->file('file')) {
            $path = Storage::disk('public')->put($nombre,  $request->file('file'));
            $homeAddress->fill(['file' => asset($path)])->save();
        }
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(HomeAddress $homeAddress)
    {
        $homeAddress->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
