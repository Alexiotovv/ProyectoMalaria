<?php

namespace App\Http\Controllers;

use App\Models\pruebasyresultados;
use Illuminate\Http\Request;
use DB;

class PruebasyresultadosController extends Controller
{
    public function ActualizaResultado(Request $request)
    {
        $id=request("idResultado");
        $obj = pruebasyresultados::findOrFail($id);
        $obj->nombre_prueba = request('editnombre_prueba');
        $obj->fecha_toma = request('editFechaToma');
        $obj->resultado = request('editresultado');
        $obj->fecha_resultado = request('editFechaResultado');
   
        $obj->save();
        $data=['mensaje'=>'Actualizado'];
        return response()->json($data);
    }
    public function EditarResultado($id)
    {
        $data= DB::table('pruebasyresultados')
        ->select('pruebasyresultados.*')
        ->where('pruebasyresultados.id','=',$id)
        ->get();
        return response()->json($data);
    }
    function ListarResultados($id)
    {
        $lista=DB::table('pruebasyresultados')
        ->leftjoin('dtacpacientes','dtacpacientes.id','=','pruebasyresultados.pacienteId')
        ->select('pruebasyresultados.*')
        ->where('dtacpacientes.id','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    function GuardarResultados(Request $request)
    {
        $obj = new pruebasyresultados();
        $obj->pacienteId=request('idResultadoPaciente');
        $obj->nombre_prueba=request('nombre_prueba');
        $obj->fecha_toma=request('FechaToma');
        $obj->resultado=request('resultado');
        $obj->fecha_resultado=request('FechaResultado');
        $obj->save();
        $data=['mensaje'=>'Guardado'];
        return response()->json($data);
    }

}
