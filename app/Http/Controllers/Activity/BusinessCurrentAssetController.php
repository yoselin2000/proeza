<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\BusinessCurrentAsset;
use App\Models\Activity;
use App\Models\AssetType;
use Illuminate\Http\Request;

class BusinessCurrentAssetController extends Controller
{
    public function index()
    {
        $businessCurrentAssets = BusinessCurrentAsset::paginate(10);
        $activities = Activity::get();
        $assetTypes = AssetType::get();
        return view('activity.businessCurrentAssets.index', compact('businessCurrentAssets', 'activities', 'assetTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        BusinessCurrentAsset::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(BusinessCurrentAsset $businessCurrentAsset)
    {
        //
    }

    public function edit(BusinessCurrentAsset $businessCurrentAsset)
    {
        //
    }

    public function update(Request $request, BusinessCurrentAsset $businessCurrentAsset)
    {
        $businessCurrentAsset->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(BusinessCurrentAsset $businessCurrentAsset)
    {
        $businessCurrentAsset->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
