<?php

namespace App\Http\Controllers;
use App\Models\actividades;
use App\Models\objetivo;
use Illuminate\Http\Request;

class metasController extends Controller
{
    public function metas(Request $request)
    {   
        $metas = DB::table('objetivos')->get()->where('activo','=',1);
        $actividades = DB::table('actividades')->get()->where('activo_act','=',1);
        return view('listaractividades',['metas'=>$metas,'actividades'=>$actividades]);
    }


}
