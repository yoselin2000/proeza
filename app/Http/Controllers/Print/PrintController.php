<?php

namespace App\Http\Controllers\Print;

use App\Http\Controllers\Controller;
use App\Models\Application;
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
use App\Models\Participant;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function solicitud(Application $application)
    {
        return view('print.solicitud', compact('application'));
    }

    public function address(Participant $participant)
    {
        $application = $participant->application;
        return view('print.address', compact('participant', 'application'));
    }

    public function statement(Participant $participant)
    {
        $application = $participant->application;
        return view('print.statement', compact('participant', 'application'));
    }

    public function client(Evaluation $evaluation)
    {
        $application = $evaluation->participant->application;
        $warranties = Warranty::get();
        $elements = Element::get();
        $archiveTypes = ArchiveType::get();
        $assetTypes = AssetType::get();
        $passiveTypes = PassiveType::get();
        $expenseTypes = ExpenseType::get();
        $caedecs = Caedec::get();
        return view('print.client', compact('application', 'evaluation', 'warranties', 'elements', 'archiveTypes', 'assetTypes', 'passiveTypes', 'expenseTypes', 'caedecs'));
    }

    public function activity(Activity $activity)
    {
        $application = $activity->evaluation->participant->application;
        $evaluation = $activity->evaluation;
        $complementTypes = ComplementType::get();
        $assetTypes = AssetType::get();
        $passiveTypes = PassiveType::get();
        $expenseTypes = ExpenseType::get();
        return view('print.activity', compact('application', 'activity', 'evaluation', 'complementTypes', 'assetTypes', 'passiveTypes', 'expenseTypes'));
    }

    public function inventory(Activity $activity)
    {
        $application = $activity->evaluation->participant->application;
        $evaluation = $activity->evaluation;
        return view('print.inventory', compact('application', 'activity', 'evaluation'));
    }

    public function sales(Activity $activity)
    {
        $application = $activity->evaluation->participant->application;
        $evaluation = $activity->evaluation;
        return view('print.sales', compact('application', 'activity', 'evaluation'));
    }

    public function costs(Activity $activity)
    {
        $application = $activity->evaluation->participant->application;
        $evaluation = $activity->evaluation;
        $supplies = Supply::get();
        return view('print.costs', compact('application', 'activity', 'evaluation', 'supplies'));
    }

    public function transport(Activity $activity)
    {
        $application = $activity->evaluation->participant->application;
        $evaluation = $activity->evaluation;
        $componentDetails = ComponentDetail::get();
        $maintenanceDetails = ComponentDetail::get();
        return view('print.transport', compact('application', 'activity', 'evaluation', 'componentDetails', 'maintenanceDetails'));
    }

    public function company(Activity $activity)
    {
        $application = $activity->evaluation->participant->application;
        $evaluation = $activity->evaluation;
        return view('print.company', compact('application', 'activity', 'evaluation'));
    }
}
