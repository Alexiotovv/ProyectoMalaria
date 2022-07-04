<?php
namespace App\Http\Controllers;
use App\Models\asisttrabcoms;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class AsisttrabcomsController extends Controller
{
    public function ActualizarAsistTrabCom(Request $request)
    {
        $id=request('idAsis');
        $obj=asisttrabcoms::findOrFail($id);
        $obj->asc_NombreCapacitacion=request('NombreCapacitacione');
        $obj->asc_Fecha=request('Fechae');
        $obj->asc_estsaludId=request('Sedee');
        $obj->asc_tcsId=request('tcse');
        $obj->asc_ComunidadProcedencia=request('ComunidadProcedenciae');
        $obj->asc_ESSCercano=request('EESSCercanoe');        
        $obj->asc_DNI=request('DNIe');
        $obj->asc_FechaAsistencia=request('FechaAsistenciae');
        $obj->responsable_cap=request('ResponsableCape');
        $obj->save();
        $data=['Mensaje'=>'Grabado'];
        return response()->json($data);
    }
    public function EditarAsistenciaTraCom($id)
    {
        $lista = asisttrabcoms::
        leftjoin('estsalud','asisttrabcoms.asc_estsaludId','=','estsalud.id')
        ->select('asisttrabcoms.id as idasist','asisttrabcoms.*','estsalud.*')
        ->where('asisttrabcoms.id','=',$id)
        ->get();
        return response()->json($lista);
    }
    public function AsistenciaTraCom()
    {
        $estsalud=DB::table('estsalud')->get();
        return view('asist_trabajadores_com', ['estsalud'=>$estsalud]);
    }
    public function ListarAsistenciaTraCom(){
        //Siempre se utilizará al parecer
        //se comentó porque loreto no se necesita
        $lista = asisttrabcoms::
        leftjoin('estsalud','asisttrabcoms.asc_estsaludId','=','estsalud.id')
        ->select('asisttrabcoms.id as idasist','asisttrabcoms.*','estsalud.*')
        ->get();
        return datatables()->of($lista)->toJson();

    }

    public function GrabarAsistTrabCom(Request $request){
        $obj = new asisttrabcoms();
        $obj->asc_NombreCapacitacion=request('NombreCapacitacion');
        $obj->asc_Fecha=request('Fecha');
        $obj->asc_estsaludId=request('Sede');
        $obj->asc_tcsId=request('tcs');
        $obj->asc_ComunidadProcedencia=request('ComunidadProcedencia');
        $obj->asc_ESSCercano=request('EESSCercano');        
        $obj->asc_DNI=request('DNI');
        $obj->asc_FechaAsistencia=request('FechaAsistencia');
        $obj->responsable_cap=request('ResponsableCap');
        $obj->save();
        $data=['Mensaje'=>'Grabado'];
        return response()->json($data);

    }

    
}
