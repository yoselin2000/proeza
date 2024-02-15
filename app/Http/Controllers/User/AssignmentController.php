<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\ElementComponent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AssignmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $assignments = Assignment::get();
        $elementComponents = ElementComponent::paginate(10);
        $users = User::where('state', true)->orderBy('id')->get();

        return view('user.assignments.index', compact('user', 'assignments', 'users', 'elementComponents'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Assignment $assignment)
    {
        //
    }

    public function edit(Assignment $assignment)
    {
        //
    }

    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    public function destroy(Assignment $assignment)
    {
        //
    }
}
