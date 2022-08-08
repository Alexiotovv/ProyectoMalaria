<?php

namespace App\Http\Controllers;

use App\Models\asistenciats;
use App\Models\asistenciats_nombre;
use Illuminate\Http\Request;
use DB;
class AsistenciatsController extends Controller
{
    
    public function ActualizarRegistroNombre(Request $request)
    {
        $id=request('idEditarNombre');
        $obj = asistenciats_nombre::findOrFail($id);
        $obj->ts_DNI=request('DNITSe');
        $obj->ts_Nombre=request('NombreTSe');
        $obj->ts_ESSCercano=request('eesscercanoe');
        $obj->ts_FechaAsistencia=request('FechaRegistroe');
        $obj->ts_responsable_cap=request('responsablee');
        $obj->save();
        $msje=['Mensaje'=>'Guardado'];
        return response()->json($msje);
    }

    public function EditarRegistroNombre($id)
    {
        $lista=DB::table('asistenciats_nombres')
        ->where('asistenciats_nombres.id','=',$id)
        ->select('asistenciats_nombres.*')
        ->get();
        return response()->json($lista);
    }

    public function ListaNombresTS($id)
    {
        $lista=DB::table('asistenciats_nombres')
        ->where('asistenciats_nombres.idAsistencia','=',$id)
        ->select('asistenciats_nombres.*','asistenciats_nombres.id as IdNombre')
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function NuevoNombreTS(Request $request)
    {
        $id=request('idAsistencia');
        $obj = new asistenciats_nombre();
        $obj->idAsistencia=$id;
        $obj->ts_DNI=request('DNITS');
        $obj->ts_Nombre=request('NombreTS');
        $obj->ts_ESSCercano=request('eesscercano');
        $obj->ts_FechaAsistencia=request('FechaRegistro');
        $obj->ts_responsable_cap=request('responsable');
        $obj->save();
        $msje=['Mensaje'=>'Guardado'];
        return response()->json($msje);
    }

    public function ActualizarAsistenciaTS(Request $request)
    {
        $id=request('idRegistro');
        $obj = asistenciats::findOrFail($id);
        $obj->ts_NombreCapacitacion=request('NombreCapacitacione');
        $obj->ts_Fecha=request('Fechae');
        $obj->ts_estsaludId=request('Establecimientoe');
        $obj->user=auth()->user()->name;
        $obj->save();
        $msje=['Mensaje'=>'Guardado'];
        return response()->json($msje);
    }
    public function EditarAsistenciaTS($id)
    {
        $lista=DB::table('asistenciats')
        ->where('asistenciats.id','=',$id)
        ->select('asistenciats.*')
        ->get();
        return response()->json($lista);
    }

    public function GuardarAsistenciaTS(Request $request)
    {
        $obj = new asistenciats();
        $obj->ts_NombreCapacitacion=request('NombreCapacitacion');
        $obj->ts_Fecha=request('Fecha');
        $obj->ts_estsaludId=request('Establecimiento');
        $obj->user=auth()->user()->name;
        $obj->save();
        $msje=['Mensaje'=>'Guardado'];
        return response()->json($msje);
    }

    public function ListaAsistenciaTS()
    {
        $nombre='%';
        if (auth()->user()->is_admin) {
            $nombre='%';
        }else{
            $nombre=auth()->user()->name;
        }

        $lista=DB::table('asistenciats')
        ->leftjoin('estsalud','asistenciats.ts_estsaludId','=','estsalud.id')
        ->select('asistenciats.id as IdTS','asistenciats.*','estsalud.nombre_estsalud')
        ->where('asistenciats.user','like',$nombre)
        ->get();
        
        return datatables()->of($lista)->toJson();
        
    }
    public function AsistenciaTS(Request $request)
    {
        $est=DB::table('estsalud')
        ->get();
        return view('AsistenciaTS',['est'=>$est]);
    }

    
}
