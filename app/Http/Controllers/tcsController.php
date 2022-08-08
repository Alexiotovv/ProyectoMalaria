<?php

namespace App\Http\Controllers;
use App\Models\tcs;
use Illuminate\Http\Request;
use DB;

class tcsController extends Controller
{
    public function ActualizarACS(Request $request)
    {
        $id=request("id");
        $obj=tcs::findOrFail($id);
        $obj->dni_tcs=request("dni_tcs");
        $obj->nombre_tcs=request("nombre_tcs");
        $obj->save();
        $msje=['MEnsaje'=>'ok'];
        return response()->json($msje);
    }
    
    public function EditarTCS($id)
    {        
        $lista = DB::table('tcs')
        ->where('tcs.id','=',$id)
        ->select('tcs.*')
        ->get();
        return response()->json($lista);
    }

    public function BuscaDNIACS($id)
    {
        $obj=DB::table('tcs')
        ->where('tcs.dni_tcs','=',$id)
        ->count();
        if ($obj>0) {
            $data=['estado'=>'No_Disponible'];
        }else{
            $data=['estado'=>'Disponible'];
        }
        return response()->json($data);
    }
    
    public function tcsregistro(Request $request)
    {
        $obj = new tcs();
        $obj->dni_tcs=request('dni_tcs');
        $obj->nombre_tcs=request('nombre_tcs');
        $obj->save();
        $data=['Mensaje'=>'Guardado'];
        return response()->json($data);
    }

    public function ListaTCSjson(Request $request)
    {
        $lista_tcs = DB::table('tcs')->get();   
        return response()->json($lista_tcs);
    }
    public function ListaTCSTable()
    {
        $lista = DB::table('tcs')->get();   
        return datatables()->of($lista)->toJson();
    }

    public function ListaTCS(Request $request)
    {        
        $lista_tcs = DB::table('tcs')->get();   
        return view('tcs_crud',['lista_tcs'=>$lista_tcs]);
    }

    public function GrabarTCS(Request $request)
    {        
        $obj = new tcs();
        $obj->dni_tcs=request('dni');
        $obj->nombre_tcs=request('nombre');
        $obj->save();
        $lista_tcs = DB::table('tcs')->get();
        return view('tcs_crud',['lista_tcs'=>$lista_tcs]);
    }
    
    

    // public function editar_actividades(Request $request)
    // {
    //     $id = request('editid'); //capturamos el id del inputext
    //     $obj = actividades::findOrFail($id);
    //     $obj->nombre_actividades = request('editnombre');
    //     $obj->save();
    //     return redirect()->route('actividades');
    // }

    // public function delete_actividades(Request $request){
    //     $id = request('borrarid');
    //     $obj = actividades::findOrFail($id);
    //     $obj->activo_act=0;
    //     $obj->save();
    //     return redirect()->route('actividades');
    // }

}
