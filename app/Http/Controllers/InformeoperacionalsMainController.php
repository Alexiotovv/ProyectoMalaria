<?php

namespace App\Http\Controllers;

use App\Models\informeoperacionals_main;
use Illuminate\Http\Request;

class InformeoperacionalsMainController extends Controller
{
    public function InformeOperacional(Request $request)
    {
        return view ('informe_operacional');
    }
}
