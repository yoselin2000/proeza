<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\ElementCategory;
use Illuminate\Http\Request;

class ElementCategoryController extends Controller
{
    public function index()
    {
        $elementCategories = ElementCategory::paginate(10);
        return view('asset.elementCategories.index', compact('elementCategories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ElementCategory::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(ElementCategory $elementCategory)
    {
        //
    }

    public function edit(ElementCategory $elementCategory)
    {
        //
    }

    public function update(Request $request, ElementCategory $elementCategory)
    {
        $elementCategory->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(ElementCategory $elementCategory)
    {
        $elementCategory->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }


    
    public function obtenerCompanyElements($id)
    {
        $elementCategory = ElementCategory::findOrFail($id);
        $companyElements = $elementCategory->companyElements;
        return response()->json($companyElements);
    }
}
