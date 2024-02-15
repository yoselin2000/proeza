<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Activity;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::paginate(10);
        $activities = Activity::get();
        return view('activity.inventories.index', compact('inventories', 'activities'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Inventory $inventory)
    {
        if ($request->type == 'MP') {
            $request["vimp"] = $request->amount * $request->buys;
            $request["mb"] = round(((1 - ($request->buys / $request->sale)) * 100), 2);
        } elseif ($request->type == 'PP') {
            $request["vipp"] = $request->amount * $request->buys * $request->buys;
            $request["mb"] = round(((1 - ($request->buys / $request->sale)) * 100), 2);

        } elseif ($request->type == 'PT') {
            $request["vipt"] = $request->amount * $request->buys;
            if ($request->sale > 0) {
                $request["mb"] = round(((1 - ($request->buys / $request->sale)) * 100), 2);
            }

        } else {
            return "Error";
        }

        $inventory = Inventory::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');

    }

    public function show(Inventory $inventory)
    {
        //
    }

    public function edit(Inventory $inventory)
    {
        //
    }

    public function update(Request $request, Inventory $inventory)
    {
        if ($request->type == 'MP') {
            $request["vimp"] = $request->amount * $request->buys;
            $request["vipp"] = 0;
            $request["vipt"] = 0;
            $request["mb"] = round(((1 - ($request->buys / $request->sale))  *  100), 2);
        } elseif ($request->type == 'PP') {
            $request["vimp"] = 0;
            $request["vipp"] = $request->amount * $request->buys * $request->buys;
            $request["vipt"] = 0;
            $request["mb"] = round(((1 - ($request->buys / $request->sale)) * 100), 2);
        } elseif ($request->type == 'PT') {
            $request["vimp"] = 0;
            $request["vipp"] = 0;

            $request["vipt"] = $request->amount * $request->buys;
            if ($request->sale > 0) {
                $request["mb"] = round(((1 - ($request->buys / $request->sale)) * 100), 2);
            }

        } else {
            return "Error";
        }

        $inventory->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
