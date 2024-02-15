<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Permission::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Permission $permission)
    {
        //
    }

    public function edit(Permission $permission)
    {
        //
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('confirmation','Eliminado Correctamente');
    }
}
