<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\CompanyElement;
use App\Models\ElementCategory;
use Illuminate\Http\Request;

class CompanyElementController extends Controller
{
    public function index()
    {
        $companyElements = CompanyElement::paginate(10);
        $elementCategories = ElementCategory::orderBy('name')->get();
        return view('asset.companyElements.index', compact('companyElements', 'elementCategories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        CompanyElement::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(CompanyElement $companyElement)
    {
        //
    }

    public function edit(CompanyElement $companyElement)
    {
        //
    }

    public function update(Request $request, CompanyElement $companyElement)
    {
        $companyElement->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(CompanyElement $companyElement)
    {
        $companyElement->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
    
}
