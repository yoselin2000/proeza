<?php

namespace App\Http\Controllers\Print;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\ReturnComponent;
use Illuminate\Http\Request;

class PrintComponentQrController extends Controller
{
    public function assignment(Assignment $assignment)
    {
        return view('asset.print.assignment', compact('assignment'));
    }

    public function returnComponent(ReturnComponent $returnComponent)
    {
        return view('asset.print.returnComponent', compact('returnComponent'));
    }
}
