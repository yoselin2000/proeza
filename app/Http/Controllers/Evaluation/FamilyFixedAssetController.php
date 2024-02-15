<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\FamilyFixedAsset;
use App\Models\Evaluation;
use App\Models\AssetType;
use Illuminate\Http\Request;

class FamilyFixedAssetController extends Controller
{
    public function index()
    {
        $familyFixedAssets = FamilyFixedAsset::paginate(10);
        $evaluations = Evaluation::get();
        $assetTypes = AssetType::get();
        return view('evaluation.familyFixedAssets.index', compact('familyFixedAssets', 'evaluations', 'assetTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        FamilyFixedAsset::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(FamilyFixedAsset $familyFixedAsset)
    {
        //
    }

    public function edit(FamilyFixedAsset $familyFixedAsset)
    {
        //
    }

    public function update(Request $request, FamilyFixedAsset $familyFixedAsset)
    {
        $familyFixedAsset->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }
    
    public function destroy(FamilyFixedAsset $familyFixedAsset)
    {
        $familyFixedAsset->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
