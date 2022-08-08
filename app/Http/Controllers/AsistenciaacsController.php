<?php

namespace App\Http\Controllers;

use App\Models\asistenciaacs;
use App\Models\asistenciaacs_nombres;
use Illuminate\Http\Request;
use DB;
class AsistenciaacsController extends Controller
{
    public function ActualizarRegistroNombreACS(Request $request)
    {
        $id=request('idEditarNombre');
        $obj = asistenciaacs_nombres::findOrFail($id);
        $obj->idACS=request('tcse');
        $obj->ts_ComunidadProcedencia=request('ComunidadProcedenciae');
        $obj->ts_ESSCercano=request('eesscercanoe');
        $obj->ts_FechaAsistencia=request('FechaRegistroe');
        $obj->ts_responsable_cap=request('responsablee');
        $obj->save();
        $msje=['Mensaje'=>'Guardado'];
        return response()->json($msje);
    }

    public function EditarRegistroNombreACS($id)
    {
        $lista=DB::table('asistenciaacs_nombres')
        ->where('asistenciaacs_nombres.id','=',$id)
        ->select('asistenciaacs_nombres.*')
        ->get();
        return response()->json($lista);
    }

    public function ListaNombresACS($id)
    {
        $lista=DB::table('asistenciaacs_nombres')
        ->leftjoin('tcs','tcs.id','=','asistenciaacs_nombres.idACS')
        ->where('asistenciaacs_nombres.idAsistencia','=',$id)
        ->select('asistenciaacs_nombres.*','asistenciaacs_nombres.id as IdNombre','tcs.nombre_tcs as ts_NombreACS')
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function NuevoNombreACS(Request $request)
    {
        $id=request('idAsistencia');
        $obj = new asistenciaacs_nombres();
        $obj->idAsistencia=$id;
        $obj->idACS=request('tcs');
        $obj->ts_ComunidadProcedencia=request('ComunidadProcedencia');
        $obj->ts_ESSCercano=request('eesscercano');
        $obj->ts_FechaAsistencia=request('FechaRegistro');
        $obj->ts_responsable_cap=request('responsable');
        $obj->save();
        $msje=['Mensaje'=>'Guardado'];
        return response()->json($msje);
    }

    public function ActualizarAsistenciaACS(Request $request)
    {
        $id=request('idRegistro');
        $obj = asistenciaacs::findOrFail($id);
        $obj->ts_NombreCapacitacion=request('NombreCapacitacione');
        $obj->ts_Fecha=request('Fechae');
        $obj->ts_FechaFinal=request('FechaFinale');
        $obj->ts_estsaludId=request('Establecimientoe');
        $obj->user=auth()->user()->name;
        $obj->save();
        $msje=['Mensaje'=>'Guardado'];
        return response()->json($msje);
    }
    public function EditarAsistenciaACS($id)
    {
        $lista=DB::table('asistenciaacs')
        ->where('asistenciaacs.id','=',$id)
        ->select('asistenciaacs.*')
        ->get();
        return response()->json($lista);
    }

    public function GuardarAsistenciaACS(Request $request)
    {
        $obj = new asistenciaacs();
        $obj->ts_NombreCapacitacion=request('NombreCapacitacion');
        $obj->ts_Fecha=request('Fecha');
        $obj->ts_FechaFinal=request('FechaFinal');
        $obj->ts_estsaludId=request('Establecimiento');
        $obj->user=auth()->user()->name;
        $obj->save();
        $msje=['Mensaje'=>'Guardado'];
        return response()->json($msje);
    }

    public function ListaAsistenciaACS()
    {
        $nombre='%';
        if (auth()->user()->is_admin) {
            $nombre='%';
        }else{
            $nombre=auth()->user()->name;
        }
        $lista=DB::table('asistenciaacs')
        ->leftjoin('estsalud','asistenciaacs.ts_estsaludId','=','estsalud.id')
        ->select('asistenciaacs.id as IdTS','asistenciaacs.*','estsalud.nombre_estsalud')
        ->where('asistenciaacs.user','like',$nombre)
        ->get();
        
        return datatables()->of($lista)->toJson();
        
    }
    public function AsistenciaACS(Request $request)
    {
        $est=DB::table('estsalud')
        ->get();
        $tcs=DB::table('tcs')
        ->get();
        return view('AsistenciaACS',['est'=>$est,'tcs'=>$tcs]);
    }

}
