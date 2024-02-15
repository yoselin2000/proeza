<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Range;
use App\Models\User;
use App\Models\Assign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $assigns;
        if ($user->hasRole('admin')) {
            $assigns = Assign::paginate(10);
        } else {
            $assigns = Assign::where('user_id', $user->id)->paginate(10);
        }
        return view('user.assigns.index', compact('assigns', 'user'));
    }

    public function create()
    {
        //
    }

    public function store(Application $application)
    {
        $user = Auth::user();
        $ranges = Range::all();
        $range = null;
        foreach ($ranges as $item) {
            if ($application->amount>$item->min && $application->amount<=$item->max) {
                $range = $item;
                break;
            }
        }

        $rev1 = $range->users->where('id', '!=', $user->id)->where('agency_id', $user->agency->id);
        $rev2 = $range->users->where('id', '!=', $user->id);
        $rev3 = User::find(1);

        if ($rev1->count() > 0) {
            $assign = Assign::create([
                'application_id' => $application->id,
                'user_id' => $rev1->random(1)->first()->id,
            ]);
        } elseif ($rev2->count() > 0) {
            $assign = Assign::create([
                'application_id' => $application->id,
                'user_id' => $rev2->random(1)->first()->id,
            ]);
        } else {
            $assign = Assign::create([
                'application_id' => $application->id,
                'user_id' => $rev3->id,
            ]);
        }
        return back();
    }

    public function show(Application $application)
    {
        //
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
