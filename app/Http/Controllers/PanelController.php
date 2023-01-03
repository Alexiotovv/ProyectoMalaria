<?php

namespace App\Http\Controllers;

use App\Models\panel;
use Illuminate\Http\Request;

class PanelController extends Controller
{
   public function Panel()
   {
        return view('panel');
   }
}
