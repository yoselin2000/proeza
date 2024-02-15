<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Agency;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::paginate(10);
        $agencies = Agency::where('state', true)->orderBy('name')->get();
        return view('admin.accounts.index', compact('accounts', 'agencies'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Account::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Account $account)
    {
        //
    }

    public function edit(Account $account)
    {
        //
    }

    public function update(Request $request, Account $account)
    {
        $account->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Account $account)
    {
        $account->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
