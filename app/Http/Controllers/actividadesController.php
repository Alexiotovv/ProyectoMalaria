<?php

namespace App\Http\Controllers;
use App\Models\actividades;
use App\Models\objetivo;
use Illuminate\Http\Request;
use DB;

class actividadesController extends Controller
{
    public function actividades(Request $request)
    {
        $objetivos = DB::table('objetivos')->get()->where('activo','=',1);
        $actividades = DB::table('actividades')
        ->leftjoin('objetivos','objetivos.id','=','actividades.objetivo_id')
        ->select('objetivos.*','actividades.*','actividades.id as actividadId','objetivos.id as objetivoId','objetivos.nombre as nombre_objetivo')
        ->get()->where('activo_act','=',1);
        return view('listaractividades',['objetivos'=>$objetivos,'actividades'=>$actividades]);
    }

    public function crear_actividades(Request $request)
    {
        $obj = new actividades();
        $id = request('objetivoid'); //capturamos el id del inputext
        $obj->objetivo_id = $id;
        $obj->nombre_actividades = request('nombreactividad');
        $obj->save();
        
        return redirect()->route('actividades');
    }

    public function editar_actividades(Request $request)
    {
        $id = request('editid'); //capturamos el id del inputext
        $obj = actividades::findOrFail($id);
        $obj->objetivo_id = request('objetivo'.$id);
        $obj->nombre_actividades = request('editnombre'.$id);
        $obj->save();
        return redirect()->route('actividades');
    }

    public function delete_actividades(Request $request){
        $id = request('borrarid');
        $obj = actividades::findOrFail($id);
        $obj->activo_act=0;
        $obj->save();
        return redirect()->route('actividades');
    }

}
