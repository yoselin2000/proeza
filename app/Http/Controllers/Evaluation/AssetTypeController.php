<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\AssetType;
use Illuminate\Http\Request;

class AssetTypeController extends Controller
{
    public function index()
    {
        $assetTypes = AssetType::paginate(10);
        return view('evaluation.assetTypes.index', compact('assetTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        AssetType::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(AssetType $assetType)
    {
        //
    }

    public function edit(AssetType $assetType)
    {
        //
    }

    public function update(Request $request, AssetType $assetType)
    {
        $assetType->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(AssetType $assetType)
    {
        $assetType->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
