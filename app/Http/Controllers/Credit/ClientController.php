<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(10);
        return view('credit.clients.index', compact('clients'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Client::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Client $client)
    {
        //
    }

    public function edit(Client $client)
    {
        //
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
