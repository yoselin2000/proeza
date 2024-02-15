<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\EvaluationAsset;
use App\Models\Evaluation;
use App\Models\AssetType;
use Illuminate\Http\Request;

class EvaluationAssetController extends Controller
{
    public function index()
    {
        $evaluationAssets = EvaluationAsset::paginate(10);
        $evaluations = Evaluation::get();
        $assetTypes = AssetType::get();
        return view('evaluation.evaluationAssets.index', compact('evaluationAssets', 'evaluations', 'assetTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        EvaluationAsset::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(EvaluationAsset $evaluationAsset)
    {
        //
    }

    public function edit(EvaluationAsset $evaluationAsset)
    {
        //
    }

    public function update(Request $request, EvaluationAsset $evaluationAsset)
    {
        $evaluationAsset->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(EvaluationAsset $evaluationAsset)
    {
        $evaluationAsset->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
