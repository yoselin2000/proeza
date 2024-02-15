<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\BusinessAddress;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessAddressController extends Controller
{

    public function index()
    {
        $businessAddresses = BusinessAddress::paginate(10);
        $activities = Activity::get();
        return view('activity.businessAddresses.index', compact('businessAddresses', 'activities'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $activity = Activity::find($request->activity_id);
        $participant = $activity->evaluation->participant;
        $client = $activity->evaluation->participant->client;

        $businessAddress = BusinessAddress::create($request->all());
        $nombre = $activity->evaluation->id.".".$participant->id.".".$client->id.".".$client->lastName." ".$client->secondLastName." ".$client->name;
        $path = Storage::disk('public')->put($nombre,  $request->file('file'));
        $businessAddress->fill(['file' => asset($path)])->save();

        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(BusinessAddress $businessAddress)
    {
        //
    }

    public function edit(BusinessAddress $businessAddress)
    {
        //
    }

    public function update(Request $request, BusinessAddress $businessAddress)
    {
        $businessAddress->update($request->all());

        $activity = activity::find($request->activity_id);
        $participant = $activity->evaluation->participant;
        $client = $activity->evaluation->participant->client;
        $nombre = $activity->evaluation->id.".".$participant->id.".".$client->id.".".$client->lastName." ".$client->secondLastName." ".$client->name;

        if ($request->file('file')) {
            $path = Storage::disk('public')->put($nombre,  $request->file('file'));
            $businessAddress->fill(['file' => asset($path)])->save();
        }
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(BusinessAddress $businessAddress)
    {
        $businessAddress->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
