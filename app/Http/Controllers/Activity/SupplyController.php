<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Supply;
use App\Models\Article;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    public function index()
    {
        $supplies = Supply::paginate(10);
        $articles = Article::orderBy('name')->get();
        return view('activity.supplies.index', compact('supplies', 'articles'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request['total']=($request->price/$request->performance)*$request->cant;
        Supply::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Supply $supply)
    {
        //
    }

    public function edit(Supply $supply)
    {
        //
    }

    public function update(Request $request, Supply $supply)
    {
        $request['total']=($request->price/$request->performance)*$request->cant;
        $supply->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Supply $supply)
    {
        $supply->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
