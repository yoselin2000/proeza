<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\BusinessExpense;
use App\Models\Activity;
use App\Models\ExpenseType;
use Illuminate\Http\Request;

class BusinessExpenseController extends Controller
{

    public function index()
    {
        $businessExpenses = BusinessExpense::paginate(10);
        $activities = Activity::get();
        $expenseTypes = ExpenseType::get();
        return view('activity.businessExpenses.index', compact('businessExpenses', 'activities', 'expenseTypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        BusinessExpense::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(BusinessExpense $businessExpense)
    {
        //
    }

    public function edit(BusinessExpense $businessExpense)
    {
        //
    }

    public function update(Request $request, BusinessExpense $businessExpense)
    {
        $businessExpense->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(BusinessExpense $businessExpense)
    {
        $businessExpense->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
