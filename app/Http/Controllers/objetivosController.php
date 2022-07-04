<?php

namespace App\Http\Controllers;
use App\Models\objetivo;
use Illuminate\Http\Request;
use DB;
class objetivosController extends Controller
{
    public function objetivos(Request $request)
    {
        $objetivos = DB::table('objetivos')->get()->where('activo','=',1);
        //$actividades = DB::table('objetivos')
        //->lefjoint('actividades','objetivos.id','=','actividades.objetivos_id')
        //->get()->where('activo','=',1);
        $actividades = DB::table('actividades')->get()->where('activo_act','=',1);
        return view('listarobjetivos',['objetivos'=>$objetivos,'actividades'=>$actividades]);              
    }
    
    public function crear_objetivos(Request $request)
    {
        $objetivos = DB::table('objetivos')->get();
            $obj = new objetivo();
            $obj->nombre = request('nombre');
            $obj->save();
            return redirect()->route('objetivos');
    }
    public function editar_objetivos(Request $request)
    {          
        $id = request('editid'); //capturamos el id del inputext
        $obj = objetivo::findOrFail($id);
        $obj->nombre = request('editnombre');
        $obj->save();
        return redirect()->route('objetivos');
    }  
    
    public function delete_objetivos(Request $request){
        $id = request('borrarid'); 
        $obj = objetivo::findOrFail($id);
        $obj->activo=0;
        $obj->save();
        return redirect()->route('objetivos');
    }

    // public function casos_consolidado_solo(Request $request){
        
    //     //$period = $request->select('period');
    //     $period = $request->get('period');
    //     //$period='todo';
    //     //$datos = DB::select("call IndicadorCinco_1('$p','$m','$pr')");
    //     $consolidado = DB::select("call casos_provincia('$period')");
    //     //$consolidado = DB::select("call prueba_casos");
    //     return view('consolidadocasos',['casos_covid'=>$consolidado,'period'=>$period]);;
        
    // }

    

}
