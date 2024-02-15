<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\SaleDetail;
use App\Models\Inventory;
use App\Models\Article;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    public function index()
    {
        $saleDetails = SaleDetail::paginate(10);
        $activities = Activity::get();
        $inventories = Inventory::get();
        $articles = Article::get();
        return view('activity.saleDetails.index', compact('saleDetails', 'activities', 'inventories', 'articles'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        if ($request->inventory_id) {
            $inventory = Inventory::find($request->inventory_id);
            if ($request->frecuency == 'Diario') {
                $request["total"] = $request->cant*$inventory->sale*26;
            } elseif ($request->frecuency == 'Semanal') {
                $request["total"] = $request->cant*$inventory->sale*4;
            } elseif ($request->frecuency == 'Quinsenal') {
                $request["total"] = $request->cant*$inventory->sale*2;
            } elseif ($request->frecuency == 'Mensual') {
                $request["total"] = $request->cant*$inventory->sale;
            } elseif ($request->frecuency == 'Bimensula') {
                $request["total"] = ($request->cant*$inventory->sale)/2;
            } elseif ($request->frecuency == 'Trimestral') {
                $request["total"] = ($request->cant*$inventory->sale)/3;
            } elseif ($request->frecuency == 'Semestral') {
                $request["total"] = ($request->cant*$inventory->sale)/6;
            } elseif ($request->frecuency == 'Anual') {
                $request["total"] = ($request->cant*$inventory->sale)/12;
            } else {
                return "Error";
            }
        }
        if ($request->article_id) {
            $article = Article::find($request->article_id);
            if ($request->frecuency == 'Diario') {
                $request["total"] = $request->cant*$article->sale*26;
            } elseif ($request->frecuency == 'Semanal') {
                $request["total"] = $request->cant*$article->sale*4;
            } elseif ($request->frecuency == 'Quinsenal') {
                $request["total"] = $request->cant*$article->sale*2;
            } elseif ($request->frecuency == 'Mensual') {
                $request["total"] = $request->cant*$article->sale;
            } elseif ($request->frecuency == 'Bimensula') {
                $request["total"] = ($request->cant*$article->sale)/2;
            } elseif ($request->frecuency == 'Trimestral') {
                $request["total"] = ($request->cant*$article->sale)/3;
            } elseif ($request->frecuency == 'Semestral') {
                $request["total"] = ($request->cant*$article->sale)/6;
            } elseif ($request->frecuency == 'Anual') {
                $request["total"] = ($request->cant*$article->sale)/12;
            } else {
                return "Error";
            }
        }
        $saleDetail = SaleDetail::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }
    public function show(SaleDetail $saleDetail)
    {
        //
    }
    public function edit(SaleDetail $saleDetail)
    {
        //
    }
    public function update(Request $request, SaleDetail $saleDetail)
    {
        if ($request->inventory_id) {
            $inventory = $saleDetail->inventory;
            if ($request->frecuency == 'Diario') {
                $request["total"] = $request->cant*$inventory->sale*26;
            } elseif ($request->frecuency == 'Semanal') {
                $request["total"] = $request->cant*$inventory->sale*4;
            } elseif ($request->frecuency == 'Quinsenal') {
                $request["total"] = $request->cant*$inventory->sale*2;
            } elseif ($request->frecuency == 'Mensual') {
                $request["total"] = $request->cant*$inventory->sale;
            } elseif ($request->frecuency == 'Bimensula') {
                $request["total"] = ($request->cant*$inventory->sale)/2;
            } elseif ($request->frecuency == 'Trimestral') {
                $request["total"] = ($request->cant*$inventory->sale)/3;
            } elseif ($request->frecuency == 'Semestral') {
                $request["total"] = ($request->cant*$inventory->sale)/6;
            } elseif ($request->frecuency == 'Anual') {
                $request["total"] = ($request->cant*$inventory->sale)/12;
            } else {
                return "Error";
            }
        }
        if ($request->article_id) {
            $article = Article::find($request->article_id);
            if ($request->frecuency == 'Diario') {
                if ($saleDetail->activity->form == 'Produccion') {
                    $request["total"] = $request->cant*$article->sale*24;
                } else {
                    $request["total"] = $request->cant*$article->sale*26;
                }
                // $request["total"] = $request->cant*$article->sale*24;
            } elseif ($request->frecuency == 'Semanal') {
                $request["total"] = $request->cant*$article->sale*4;
            } elseif ($request->frecuency == 'Quinsenal') {
                $request["total"] = $request->cant*$article->sale*2;
            } elseif ($request->frecuency == 'Mensual') {
                $request["total"] = $request->cant*$article->sale;
            } elseif ($request->frecuency == 'Bimensula') {
                $request["total"] = ($request->cant*$article->sale)/2;
            } elseif ($request->frecuency == 'Trimestral') {
                $request["total"] = ($request->cant*$article->sale)/3;
            } elseif ($request->frecuency == 'Semestral') {
                $request["total"] = ($request->cant*$article->sale)/6;
            } elseif ($request->frecuency == 'Anual') {
                $request["total"] = ($request->cant*$article->sale)/12;
            } else {
                return "Error";
            }
        }

        $saleDetail->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }
    public function destroy(SaleDetail $saleDetail)
    {
        $saleDetail->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
