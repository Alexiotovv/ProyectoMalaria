<?php

namespace App\Http\Controllers;

use App\Models\competencias;
use Illuminate\Http\Request;
use DB;
class CompetenciasController extends Controller
{

    public function EliminarCompetencia(Request $request)
    {
        $id=request('borrarid');
        $obj = competencias::findOrFail($id);
        $obj->delete();
        return redirect()->route('ListarCompetencias');
    }
    
    public function ListarCompetencias(Request $request)
    {
        $actividades=DB::table('actividades')->get(); //se comentó porque loreto no se necesita
        $competencias = competencias::
        leftjoin('actividades','competencias.actividadId','=','actividades.id')
        ->select('actividades.id as idactividad','competencias.*','actividades.*','competencias.id as idcompetencia')
        ->get();
        return view('listar_competencias',['competencias'=>$competencias,'actividades'=>$actividades]);
    }


    public function CrearCompetencias(Request $request)
    {
        $obj = new competencias();
        $obj->actividadId = request('actividadId');
        $obj->nombre_competencia = request('nombrecompetencia');
        $obj->tipo_competencia=request('tipocompetencia');
        $obj->save();
        return redirect()->route('ListarCompetencias');
    }

    public function EditarCompetencias(Request $request)
    {
        $id=request('editid');
        $obj = competencias::findOrFail($id);
        $obj->actividadId = (request('actividad'.$id));
        $obj->nombre_competencia = (request('nombrecompetencia'.$id));
        $obj->tipo_competencia = (request('tipocompetencia'.$id));

        $obj->save();
        return redirect()->route('ListarCompetencias');
    }

}
