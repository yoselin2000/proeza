<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);
        $permissions = Permission::get();
        return view('admin.roles.index', compact('roles', 'permissions'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // $role = Role::create(['name' => $request->name]);
        $role = Role::create($request->all());//jose
        $permissions = $request->permissions;
        $role->givePermissionTo($permissions);

        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role)
    {
        //
    }

    public function update(Request $request, Role $role)
    {
        $role->save();
        $permissions = $request->permissions;
        $role->syncPermissions($permissions);
        $role->update($request->all());//jose

        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('confirmation','Eliminado Correctamente');
    }
}
