<?php

namespace App\Http\Controllers;
use App\Models\formlistaentregamosq;
use App\Models\formmosquiteros;
use App\Models\formpersonamq;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class FormmosquiterosController extends Controller
{
  
  function GuardarEntregaMosquitero(Request $request)
  {
    $obj = new formlistaentregamosq();
    $obj->formpersonamqsId=request('idEntregaPersona');
    $obj->doble=request('doble');
    $obj->familiar1=request('familiar1');
    $obj->familiar2=request('familiar2');
    $obj->personas_usaran=request('nro_personas');
    $obj->nro_afiches=request('nro_afiches');
    $obj->save();
    $data=['mensaje'=>'Guardado'];
    return response()->json($data);
  }
  public function ListarEntregaMosquitero($id)
  {
    $lista=DB::table('formlistaentregamosqs')
    ->leftjoin('formpersonamqs','formpersonamqs.id','=','formlistaentregamosqs.formpersonamqsId')
    ->select('formlistaentregamosqs.id as formlistaentregamosqsId','formlistaentregamosqs.*')
    ->where('formlistaentregamosqs.formpersonamqsId','=',$id)
    ->get();
    return datatables()->of($lista)->toJson();
  }
  function ActualizaPersonaMosquitero(Request $request)
  {
    $id=request('idPersona');
    $obj = formpersonamq::findOrFail($id);
    $obj->dni=request('edni');
    $obj->nombres=request('enombres');
    $obj->apellidos=request('eapellidos');
    $obj->numero_personas=request('enpersonas');
    $obj->mq_noimpregnados_tamano=request('etamanomos_noimp');
    $obj->mq_noimpregnados_estado=request('eestadomos_noimp');
    $obj->mq_impregnados_tamano=request('etamanomos_imp');
    $obj->mq_impregnados_estado=request('eestadomos_imp');
    $obj->save();
    $data=['mensaje'=>'Actualizado'];
    return response()->json($data);
  }
  public function EditarPersonaMosquitero($id)
  {
    $lista=DB::table('formpersonamqs')
      ->select('formpersonamqs.*')
      ->where('formpersonamqs.id','=',$id)
      ->get();
      return response()->json($lista);
  }
  public function GuardaPersonaMosquitero(Request $request)
  {
    $obj = new formpersonamq();
    $obj->formmosquiterosId=request('idMosquiteroPersona');
    $obj->dni=request('dni');
    $obj->nombres=request('nombres');
    $obj->apellidos=request('apellidos');
    $obj->numero_personas=request('npersonas');
    $obj->mq_noimpregnados_tamano=request('tamanomos_noimp');
    $obj->mq_noimpregnados_estado=request('estadomos_noimp');
    $obj->mq_impregnados_tamano=request('tamanomos_imp');
    $obj->mq_impregnados_estado=request('estadomos_imp');
    $obj->save();
    $data=['mensaje'=>'Guardado'];
    return response()->json($data);
  }
  public function ListarPersonaMosquitero($id)
    {
      $lista=DB::table('formpersonamqs')
      ->leftjoin('formmosquiteros','formmosquiteros.id','=','formpersonamqs.formmosquiterosId')
      ->select('formpersonamqs.id as formpersonamqsId','formpersonamqs.*')
      ->where('formpersonamqs.formmosquiterosId','=',$id)
      ->get();
      return datatables()->of($lista)->toJson();
    }
  
  public function ActualizarMosquiteros(Request $request)
  {
    $id=request('idMosquitero');
    $obj = formmosquiteros::findOrFail($id);
    $obj->Departamento=request('edepartamento');
    $obj->Provincia=request('eprovincia');
    $obj->Distrito=request('edistrito');
    $obj->Localidad=request('elocalidad');
    $obj->fecha_entrega=request('efecha_entrega');
    $obj->eess_cercano=request('eeess_cercano');
    $obj->tiempo_eesscercano=request('etiempo_eesscercano');
    $obj->eess_cercano_microscopio=request('eeess_cercano_microscopio');
    $obj->tiempo_eesscercano_microscopio=request('etiempo_eesscercano_microscopio');
    $obj->Responsable=request('eresponsable');
    $obj->save();
    $data=['mensaje'=>'Actualizado'];
    return response()->json($data);
  }  
  public function EditarMosquiteros($id)
    {
      $lista=DB::table('formmosquiteros')
      ->leftjoin('dptos','dptos.id','=','formmosquiteros.Departamento')
      ->leftjoin('provs','provs.id','=','formmosquiteros.Provincia')
      ->leftjoin('dists','dists.id','=','formmosquiteros.Distrito')
      ->select('formmosquiteros.id as mosquiteroId','formmosquiteros.*',
      'dptos.id as dptoId','provs.id as provId','dists.id as distId','dptos.*','provs.*','dists.*')
      ->where('formmosquiteros.id','=',$id)
      ->get();
      return response()->json($lista);
    }
    public function GuardaMosquiteros(Request $request)
    {
        $fecha = Carbon::now();
        $ultimo = DB::table('formmosquiteros')->select("id")->latest()->first();
        $idcod=0;
        if ($ultimo){
            $idcod=$ultimo->id;
            $codigo='MQ'.$fecha->format('dmy'.'-'.$idcod);            
        }else{
            $codigo='MQ'.$fecha->format('dmy'.'-'."1");
        }
        
        $obj = new formmosquiteros();
        $obj->Codigo=$codigo;
        $obj->Departamento=request('departamento');
        $obj->Provincia=request('provincia');
        $obj->Distrito=request('distrito');
        $obj->Localidad=request('localidad');
        $obj->fecha_entrega=request('fecha_entrega');
        $obj->eess_cercano=request('eess_cercano');
        $obj->tiempo_eesscercano=request('tiempo_eesscercano');
        $obj->eess_cercano_microscopio=request('eess_cercano_microscopio');
        $obj->tiempo_eesscercano_microscopio=request('tiempo_eesscercano_microscopio');
        $obj->Responsable=request('responsable');
        $obj->save();
        return response()->json($codigo);
        // return redirect()->route('Mosquiteros');
    }

    public function ListarMosquiteros()
    {
      $lista=DB::table('formmosquiteros')
      ->leftjoin('dptos','dptos.id','=','formmosquiteros.Departamento')
      ->leftjoin('provs','provs.id','=','formmosquiteros.Provincia')
      ->leftjoin('dists','dists.id','=','formmosquiteros.Distrito')
      ->select('formmosquiteros.id as mosquiteroId','formmosquiteros.*',
      'dptos.*','provs.*','dists.*')
      ->get();
      return datatables()->of($lista)->toJson();
    }

    public function Mosquiteros()
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
        $tcs=DB::table('tcs')->get();

        return view('entrega_mosquiteros_hogares',
        ['dpto'=>$dpto,'prov'=>$prov,'dist'=>$dist,'tcs'=>$tcs]);
    }
}
