<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    public function index()
    {
        $expenseTypes = ExpenseType::paginate(10);
        return view('evaluation.expenseTypes.index', compact('expenseTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ExpenseType::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(ExpenseType $expenseType)
    {
        //
    }

    public function edit(ExpenseType $expenseType)
    {
        //
    }

    public function update(Request $request, ExpenseType $expenseType)
    {
        $expenseType->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(ExpenseType $expenseType)
    {
        $expenseType->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
