<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Client;
use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::paginate(10);
        $clients = Client::get();
        $applications = Application::get();
        $categories = Category::get();
        return view('credit.participants.index', compact('participants', 'clients', 'applications', 'categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Participant::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Participant $participant)
    {
        //
    }

    public function edit(Participant $participant)
    {
        //
    }

    public function update(Request $request, Participant $participant)
    {
        $participant->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
