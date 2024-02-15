<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\BusinessFixedAsset;
use App\Models\Activity;
use App\Models\AssetType;
use Illuminate\Http\Request;

class BusinessFixedAssetController extends Controller
{

    public function index()
    {
        $businessFixedAssets = BusinessFixedAsset::paginate(10);
        $activities = Activity::get();
        $assetTypes = AssetType::get();
        return view('activity.businessFixedAssets.index', compact('businessFixedAssets', 'activities', 'assetTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        BusinessFixedAsset::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(BusinessFixedAsset $businessFixedAsset)
    {
        //
    }

    public function edit(BusinessFixedAsset $businessFixedAsset)
    {
        //
    }

    public function update(Request $request, BusinessFixedAsset $businessFixedAsset)
    {
        $businessFixedAsset->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(BusinessFixedAsset $businessFixedAsset)
    {
        $businessFixedAsset->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
