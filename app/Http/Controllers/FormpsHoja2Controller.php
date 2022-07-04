<?php

namespace App\Http\Controllers;

use App\Models\formps_hoja2;
use Illuminate\Http\Request;
use App\Models\formps_hoja2s;
use App\Models\formps_hoja2stock;
use App\Models\Competencias;
use DB;
class FormpsHoja2Controller extends Controller
{
    public function Guardarformps2(Request $request)
    {
        
        $competencias = DB::table('competencias')
        ->where('tipo_competencia','=','promotor de salud')
        ->get();

        foreach ($competencias as $com ) {
            $obj = new formps_hoja2();
            $obj->formPS=request('id');#Id de la Ficha
            $obj->CompetenciaId=$com->id;#Id competencia
            $obj->visita1=request('visita1'.$com->id);
            $obj->obs1=request('obs1'.$com->id);
            $obj->save();
        }
        return redirect()->route('Listar.formps');

    }

    public function Guardarformps2stock(Request $request)
    {
        $competencias = DB::table('competencias')
        ->where('tipo_competencia','=','stock de medicamentos')
        ->get();

        foreach ($competencias as $com ) {
            $obj = new formps_hoja2stock();
            $obj->formPS=request('id');#Id de la Ficha
            $obj->CompetenciaId=$com->id;#Id competencia
            $obj->unidades1=request('unidades1'.$com->id);
            $obj->fecha1=request('fecha1'.$com->id);
            $obj->save();
        }
        return redirect()->route('Listar.formps');

    }




  
}
