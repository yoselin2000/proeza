<?php

namespace App\Http\Controllers\Qr;

use App\Http\Controllers\Controller;
use App\Models\ElementComponent;
use Illuminate\Http\Request;

class QrController extends Controller
{
    public function generarQR()
    {
        //
    }

    public function qr(ElementComponent $elementComponent)
    {
        return view('asset.qrs.qr', compact('elementComponent'));
    }

    public function informacion(ElementComponent $elementComponent)
    {
        return view('asset.qrs.informacion', compact('elementComponent'));
    }
}
