<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\AverageSale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::paginate(10);
        $averageSales = AverageSale::get();
        return view('activity.sales.index', compact('sales', 'averageSales'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if (is_array($request->item)) {
            for ($i=0; $i < count($request->item); $i++) {
                if ($request->amount[$i] != null) {
                    Sale::create([
                        'item' => $request->item[$i],
                        'amount' => $request->amount[$i],
                        'average_sale_id' => $request->average_sale_id,
                    ]);
                }
            }
        } else {
            Sale::create($request->all());
        }
        
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Sale $sale)
    {
        //
    }

    public function edit(Sale $sale)
    {
        //
    }

    public function update(Request $request, Sale $sale)
    {
        $sale->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
