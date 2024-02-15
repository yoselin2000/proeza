<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\ElementComponent;
use App\Models\CompanyElement;
use App\Models\Assignment;
use App\Models\ElementCategory;
use App\Models\Agency;
use Illuminate\Http\Request;

class ElementComponentController extends Controller
{
    public function index()
    {
        $elementComponents = ElementComponent::paginate(10);
        $agencies = Agency::orderBy('name')->get();
        $elementCategories = ElementCategory::get();
        return view('asset.elementComponents.index', compact('elementComponents', 'agencies', 'elementCategories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ElementComponent::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(ElementComponent $elementComponent)
    {
        //
    }

    public function edit(ElementComponent $elementComponent)
    {
        //
    }

    public function update(Request $request, ElementComponent $elementComponent)
    {
        $elementComponent->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(ElementComponent $elementComponent)
    {
        $elementComponent->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
