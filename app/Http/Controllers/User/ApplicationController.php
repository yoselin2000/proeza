<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Destination;
use App\Models\Product;
use App\Models\Client;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::where('state', true)->orderBy('id')->get();;
        $destinations = Destination::where('state', true)->orderBy('name')->get();
        $products = Product::where('state', true)->orderBy('name')->get();
        $applications = null;
        if ($user->hasRole('admin')) {
            $applications = Application::paginate(10);
            return view('user.applications.index', compact('applications', 'destinations', 'products', 'user', 'users'));
        } else {
            $applications = Application::where('user_id', $user->id)->paginate(10);
            return view('user.applications.index', compact('applications', 'destinations', 'products', 'user'));
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Application $application)
    {
        $clients = Client::get();
        $categories = Category::get();
        return view('user.applications.show', compact('application', 'clients', 'categories'));
    }

    public function edit(Application $application)
    {
        //
    }

    public function update(Request $request, Application $application)
    {
        //
    }

    public function destroy(Application $application)
    {
        //
    }
}
