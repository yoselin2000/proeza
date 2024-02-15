<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use App\Models\FamilyExpense;
use App\Models\Evaluation;
use App\Models\ExpenseType;
use Illuminate\Http\Request;

class FamilyExpenseController extends Controller
{
    public function index()
    {
        $familyExpenses = FamilyExpense::paginate(10);
        $evaluations = Evaluation::get();
        $expenseTypes = ExpenseType::get();
        return view('evaluation.familyExpenses.index', compact('familyExpenses', 'evaluations', 'expenseTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        FamilyExpense::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(FamilyExpense $familyExpense)
    {
        //
    }

    public function edit(FamilyExpense $familyExpense)
    {
        //
    }

    public function update(Request $request, FamilyExpense $familyExpense)
    {
        $familyExpense->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(FamilyExpense $familyExpense)
    {
        $familyExpense->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
