<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
