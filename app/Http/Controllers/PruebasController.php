<?php

namespace App\Http\Controllers;

use App\Models\pruebas;
use Illuminate\Http\Request;
use DB;

class PruebasController extends Controller
{
    
    public function Pruebas()
    {
        return view('pruebas');
    }

    public function ListarPruebas()
    {
        $lista=DB::table('pruebas')
        ->select('pruebas.id as idPrueba','pruebas.*')
        ->get();
        return datatables()->of($lista)->toJson();
    
    }
    public function EditarPrueba($id)
    {
        $data= DB::table('pruebas')
        ->select('pruebas.id as idPrueba','pruebas.nombre_prueba')
        ->where('pruebas.id','=',$id)
        ->get();
        return response()->json($data);
        
    }

    public function ActualizaPruebas(Request $request)
    {
        $id=request('editidPrueba');
        $obj = pruebas::findOrFail($id);
        $obj->nombre_prueba = request('editnombreprueba');
        $obj->save();
        $data=['mensaje'=>'Actualizado'];
        return response()->json($data);
        
    }

    

}
