<?php

namespace App\Http\Controllers;

use App\Models\monitoevalu_mosqs;
use App\Models\encuestadomosqs;
use Illuminate\Http\Request;
use DB;

class MonitoevaluMosqsController extends Controller
{
    public function EliminarEncuestado($id)
    {
        $obj=encuestadomosqs::findOrFail($id);
        $obj->delete();
        $data=['Mensaje'=>'Listo'];
        return response()->json($data);
    }
    public function EliminarMonitoreo($id)
    {
        $obj=monitoevalu_mosqs::findOrFail($id);
        $obj->delete=1;#cambia el estado de 0 a 1 para indicar que está eliminado no lo elimina
        $obj->save();
        $data=['Mensaje'=>'Listo'];
        return response()->json($data);
    }
    public function ActualizarEncuestado(Request $request)
    {
        $id=request('idEncuestado');
        $obj=encuestadomosqs::findOrFail($id);
        $obj->update($request->all());
        $obj->save();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);
    }
    
    public function EditarEncuestado($id)
    {
        $lista=DB::table('encuestadomosqs')
        ->where('encuestadomosqs.id','=',$id)
        ->select('encuestadomosqs.*')
        ->get();
        return response()->json($lista);
    }

    public function GuardarEncuestado(Request $request)
    {
        $obj = new encuestadomosqs();
        $obj->create($request->all());
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

    public function ListaEncuestado($id)
    {
        $lista=DB::table('encuestadomosqs')
        ->where('encuestadomosqs.idMonitoreo','=',$id)
        ->select('encuestadomosqs.id as IdEncuestado','encuestadomosqs.Nombre',
        'encuestadomosqs.Apellido','encuestadomosqs.Edad','encuestadomosqs.DNI')
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function ActualizarMonitoreo(Request $request)
    {
        // dd("entro a post");
        $id=request('idMonitoreo1');
        $obj = monitoevalu_mosqs::findOrFail($id);
        $obj->Departamento=request('Departamento');
        $obj->Provincia=request('Provincia');
        $obj->Distrito=request('Distrito');
        $obj->Ipress=request('Ipress');
        $obj->Comunidad=request('Comunidad');
        $obj->FechaEntrega=request('FechaEntrega');
        $obj->FechaMonitoreo=request('FechaMonitoreo');
        $obj->NumeroMonitoreo=request('NumeroMonitoreo');
        $obj->Responsable=request('Responsable');
        $obj->CargoResponsable=request('CargoResponsable');
        $obj->save();
        $data=['Mensaje'=>'Registro Actualizado'];
        return response()->json($data);
    }
    
    public function EditarMonitoreo($id)
    {
        $lista=DB::table('monitoevalu_mosqs')
        ->leftjoin('dptos','dptos.id','=','monitoevalu_mosqs.Departamento')
        ->leftjoin('provs','provs.id','=','monitoevalu_mosqs.Provincia')
        ->leftjoin('dists','dists.id','=','monitoevalu_mosqs.Distrito')
        ->leftjoin('estsalud','estsalud.id','=','monitoevalu_mosqs.Ipress')
        ->select('dptos.id as DptoId','provs.id as ProvId','dists.id as DistId','estsalud.id as IpressId',
            'monitoevalu_mosqs.*')
        ->where('monitoevalu_mosqs.id','=',$id)
        ->get();
        return response()->json($lista);
    }

    public function GuardaMonitoreo(Request $request)
    {
        $obj = new monitoevalu_mosqs();
        $obj->Departamento=request('Departamento');
        $obj->Provincia=request('Provincia');
        $obj->Distrito=request('Distrito');
        $obj->Ipress=request('Ipress');
        $obj->Comunidad=request('Comunidad');
        $obj->FechaEntrega=request('FechaEntrega');
        $obj->FechaMonitoreo=request('FechaMonitoreo');
        $obj->NumeroMonitoreo=request('NumeroMonitoreo');
        $obj->Responsable=request('Responsable');
        $obj->CargoResponsable=request('CargoResponsable');
        $obj->user=auth()->user()->name;
        $obj->save();
        $data=['Mensaje'=>'Registro Guardado'];
        return response()->json($data);
    }

    public function ListaMonitoreo(Request $request)
    {
        $lista=DB::table('monitoevalu_mosqs')
        ->leftjoin('dptos','dptos.id','=','monitoevalu_mosqs.Departamento')
        ->leftjoin('provs','provs.id','=','monitoevalu_mosqs.Provincia')
        ->leftjoin('dists','dists.id','=','monitoevalu_mosqs.Distrito')
        ->select('monitoevalu_mosqs.id as MonId','monitoevalu_mosqs.*',
        'dptos.*','provs.*','dists.*')
        ->where('monitoevalu_mosqs.delete','=',0)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function MonitoEvaluUsoMosq(Request $request)
    {
        $dpto=DB::table('dptos')
        ->select('dptos.id as id','dptos.nombre_dpto as nombre_dpto')
        ->where('dptos.nombre_dpto','=','LORETO') 
        ->get();
        $prov=DB::table('provs')
        ->leftjoin('dptos','dptos.id','=','provs.DptoId')
        ->select('provs.id as id','provs.nombre_prov as nombre_prov')
        ->where('dptos.nombre_dpto','=','LORETO')
        ->get();

        $dist=DB::table('dists')
        ->leftjoin('provs','provs.id','=','dists.ProvId')
        ->leftjoin('dptos','dptos.id','=','provs.DptoId')
        ->select('dists.codigo as codigo','dists.id as id','dists.nombre_dist')
        ->where('dptos.nombre_dpto','=','LORETO')
        ->get();
        $ests=DB::table('estsalud')
        ->select('estsalud.id as id','estsalud.cod','estsalud.nombre_estsalud')
        ->get();
        return view('MonitoEvaluUsoMosq',compact('dpto','prov','dist','ests'));
    }
}
