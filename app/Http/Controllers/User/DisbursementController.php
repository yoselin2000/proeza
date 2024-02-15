<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Disbursement;
use App\Models\Approved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisbursementController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $approveds = Approved::paginate(10);
        return view('user.disbursements.index', compact('approveds', 'user'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Disbursement $disbursement)
    {
        //
    }

    public function edit(Disbursement $disbursement)
    {
        //
    }

    public function update(Request $request, Disbursement $disbursement)
    {
        //
    }

    public function destroy(Disbursement $disbursement)
    {
        //
    }
}
