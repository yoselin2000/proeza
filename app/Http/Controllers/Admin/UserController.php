<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Agency;
use App\Models\Range;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->paginate(10);
        $agencies = Agency::where('state', true)->orderBy('id')->get();
        $roles = Role::orderBy('name')->get();
        $ranges = Range::where('state', true)->orderBy('id')->get();
        return view('admin.users.index', compact('users', 'roles', 'agencies', 'ranges'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'agency_id' => $request->agency_id,
            'range_id' => $request->range_id
        ]);
        $role = $request->role;
        $user->assignRole($role);

        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->agency_id = $request->agency_id;
        $user->range_id = $request->range_id;
        $user->state = $request->state;
        $user->save();

        $role = $request->role;
        $user->syncRoles($role);

        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('confirmation','Eliminado Correctamente');
    }
}
