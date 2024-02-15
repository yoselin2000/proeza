<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Activity;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        $activities = Activity::get();
        return view('activity.companies.index', compact('companies', 'activities'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Company::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Company $company)
    {
        //
    }

    public function edit(Company $company)
    {
        //
    }

    public function update(Request $request, Company $company)
    {
        $company->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
