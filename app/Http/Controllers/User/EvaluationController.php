<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Models\Warranty;
use App\Models\Element;
use App\Models\ArchiveType;
use App\Models\AssetType;
use App\Models\PassiveType;
use App\Models\ExpenseType;
use App\Models\Caedec;
use App\Models\Activity;
use App\Models\ComplementType;
use App\Models\Supply;
use App\Models\Vehicle;
use App\Models\ComponentDetail;
use App\Models\MaintenanceDetail;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Evaluation $evaluation)
    {
        //
    }

    public function edit(Evaluation $evaluation)
    {
        //
    }
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    public function destroy(Evaluation $evaluation)
    {
        //
    }


    public function hoja1(Evaluation $evaluation)
    {
        $application = $evaluation->participant->application;
        $warranties = Warranty::get();
        $elements = Element::get();
        $archiveTypes = ArchiveType::get();
        $assetTypes = AssetType::get();
        $passiveTypes = PassiveType::get();
        $expenseTypes = ExpenseType::get();
        $caedecs = Caedec::get();
        return view('hojas.hoja1', compact('application', 'evaluation', 'warranties', 'elements', 'archiveTypes', 'assetTypes', 'passiveTypes', 'expenseTypes', 'caedecs'));
    }

    public function hoja2(Evaluation $evaluation)
    {
        $application = $evaluation->participant->application;
        $assetTypes = AssetType::get();
        $passiveTypes = PassiveType::get();
        return view('hojas.hoja2', compact('application', 'evaluation', 'assetTypes', 'passiveTypes'));
    }

    public function hoja3(Activity $activity)
    {
        $application = $activity->evaluation->participant->application;
        $evaluation = $activity->evaluation;
        $complementTypes = ComplementType::get();
        $assetTypes = AssetType::get();
        $passiveTypes = PassiveType::get();
        $expenseTypes = ExpenseType::get();
        return view('hojas.hoja3', compact('application', 'activity', 'evaluation', 'complementTypes', 'assetTypes', 'passiveTypes', 'expenseTypes'));
    }

    public function inventario(Activity $activity)
    {
        $application = $activity->evaluation->participant->application;
        $evaluation = $activity->evaluation;
        return view('hojas.inventario', compact('application', 'activity', 'evaluation'));
    }

    public function ventas(Activity $activity)
    {
        $application = $activity->evaluation->participant->application;
        $evaluation = $activity->evaluation;
        if ($activity->form == "Comercio" || $activity->form == "Servicio") {
            $inventories = $activity->inventories;
            return view('hojas.ventas', compact('application', 'activity', 'evaluation', 'inventories'));
        }
        if ($activity->form == "Produccion") {
            $articles = $activity->articles;
            return view('hojas.ventas', compact('application', 'activity', 'evaluation', 'articles'));
        }
    }

    public function costos(Activity $activity)
    {
        $application = $activity->evaluation->participant->application;
        $evaluation = $activity->evaluation;
        $supplies = Supply::get();
        return view('hojas.costos', compact('application', 'activity', 'evaluation', 'supplies'));
    }

    public function transporte(Activity $activity)
    {
        $application = $activity->evaluation->participant->application;
        $evaluation = $activity->evaluation;
        $componentDetails = ComponentDetail::get();
        $maintenanceDetails = MaintenanceDetail::get();
        return view('hojas.transporte', compact('application', 'activity', 'evaluation', 'componentDetails', 'maintenanceDetails'));
    }

    public function empresa(Activity $activity)
    {
        $application = $activity->evaluation->participant->application;
        $evaluation = $activity->evaluation;
        return view('hojas.empresa', compact('application', 'activity', 'evaluation'));
    }

    public function indicadores(Evaluation $evaluation)
    {
        $familyFixedAssets = round($evaluation->familyFixedAssets->sum('amount'), 2);
        $familyPassives = round($evaluation->familyPassives->sum('balace'), 2);
        $familyExpenses = round($evaluation->familyExpenses->sum('amount'), 2);
        $totalFamily = round($familyFixedAssets+$familyPassives+$familyExpenses, 2);

        // actividad
        $activities = $evaluation->activities;
        $activity = $activities->first();


        return view('hojas.indicadores', compact('evaluation', 'familyFixedAssets', 'familyPassives', 'familyExpenses', 'totalFamily', 'activities', 'activity'));
    }
}
