<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\AverageSale;
use App\Models\Activity;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class AverageSaleController extends Controller
{
    public function index()
    {
        $averageSales = AverageSale::paginate(10);
        $activities = Activity::get();
        $vehicles = Vehicle::get();
        return view('activity.averageSales.index', compact('averageSales', 'activities', 'vehicles'));
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        AverageSale::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(AverageSale $averageSale)
    {
        //
    }

    public function edit(AverageSale $averageSale)
    {
        //
    }

    public function update(Request $request, AverageSale $averageSale)
    {
        $averageSale->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(AverageSale $averageSale)
    {
        $averageSale->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
