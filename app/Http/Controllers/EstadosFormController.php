<?php

namespace App\Http\Controllers;

use App\Models\EstadosForm;
use Illuminate\Http\Request;
use DB;
class EstadosFormController extends Controller
{
    public function EliminaEstadoForm(Request $request)
    {
        $id=request('idestadoform');
        $obj= EstadosForm::find($id);
        $obj->delete();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function EstadoForm(Request $request)
    {
        // $idform=request("id_form");
        $iduser=request("id_user");
        $nombretabla=request("nombre_tabla");
        
        $lista=DB::table('estados_forms')
        ->select('estados_forms.*')
        ->where([['estados_forms.user_id','=',$iduser],
        ['estados_forms.nombre_tabla','=',$nombretabla]])
        ->first();;

        if ($lista) {
            $data=$lista;
        }else{
            $data=['Mensaje'=>'No_Existe'];
        }

        return response()->json($data);
    }
}
