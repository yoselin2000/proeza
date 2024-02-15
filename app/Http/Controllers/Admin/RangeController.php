<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Range;
use Illuminate\Http\Request;

class RangeController extends Controller
{
    public function index()
    {
        $ranges = Range::paginate(10);
        return view('admin.ranges.index', compact('ranges'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Range::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Range $range)
    {
        //
    }

    public function edit(Range $range)
    {
        //
    }

    public function update(Request $request, Range $range)
    {
        $range->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Range $range)
    {
        $range->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
