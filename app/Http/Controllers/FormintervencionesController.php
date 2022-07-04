<?php

namespace App\Http\Controllers;

use App\Models\formintervenciones;
use App\Models\formintlocalidad;
use App\Models\formacprogram;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class FormintervencionesController extends Controller
{   
    public function EliminarIntervencion($id)
    {
        $obj=formintervenciones::findOrFail($id);
        $obj->delete();
        $data=['Mensaje'=>'Listo'];
        return response()->json($data);
    }

    public function ListarLocalidadActividades($id)
    {
       $lista=DB::table('formintlocalidads')
       ->leftjoin('formacprograms','formacprograms.localidadId','=','formintlocalidads.id')
       ->select('formintlocalidads.id as IdLocalidad','formintlocalidads.*','formacprograms.*')
       ->where('formintlocalidads.intervencionesId','=',$id)
       ->get();
       return datatables()->of($lista)->toJson();
    }

    public function ActualizarIntervencionNew(Request $request)
    {
        $id=request("idIntervencion");
        $obj=formintervenciones::findOrFail($id);
        $obj->Departamento=request('Departamento');
        $obj->Provincia=request('Provincia');
        $obj->Distrito=request('Distrito');
        $obj->RioQuebrada=request('RioQuebrada');
        $obj->JefeBrigada=request('JefeBrigada');
        $obj->FechaInicio=request('fecha_inicio');
        $obj->FechaFinal=request('fecha_final');
        $obj->save();
        $data=['mensaje'=>'Actualizado'];
        return response()->json($data);
    }
    public function formIntervencion(Request $request){
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

        return view('SoloformIntervenciones',['dpto'=>$dpto,'prov'=>$prov,'dist'=>$dist,'tcs'=>$tcs]);
    }

    public function ActualizaActividadProgramada(Request $request)
    {
        $id=request("idact_pro");
        $obj=formacprogram::findOrFail($id);
        $obj->act_programadas=request('act_programadase');
        $obj->laminas=request('LaminasTomare');
        $obj->casas_fumigar=request('CasasRociare');
        $obj->FechaIntervencion=request('FechaIntervencione');
        $obj->LaminasTomadas=request('LaminasTomadase');
        $obj->Vivax=request('Vivaxe');
        $obj->Falciparum=request('Falciparume');
        $obj->ProbMuestreada=request('ProbMuestreadae');
        $obj->IndicePos=request('IndicePose');
        $obj->TasaPre=request('TasaPree');
        $obj->ActDesa=request('ActDesae');
        $obj->CasasRociadas=request('CasasRociadase');
        $obj->save();
        $data=['mensaje'=>'Actualizado'];
        return response()->json($data);
    }
    public function EditarActividadProgramada($id)
    {
        $data=DB::table('formacprograms')
        ->select('formacprograms.id as idActProgram','formacprograms.*')
        ->where('formacprograms.id','=',$id)
        ->get();
        return response()->json($data);
    }

    public function AgregarActividadProgramada(Request $request)
    {
        $obj = new formacprogram();
        $obj->localidadId=request('idLocalidad_actpro');
        $obj->act_programadas=request('act_programadas');
        $obj->laminas=request('LaminasTomar');
        $obj->casas_fumigar=request('CasasRociar');
        $obj->FechaIntervencion=request('FechaIntervencion');
        $obj->LaminasTomadas=request('LaminasTomadas');
        $obj->Vivax=request('Vivax');
        $obj->Falciparum=request('Falciparum');
        $obj->ProbMuestreada=request('ProbMuestreada');
        $obj->IndicePos=request('IndicePos');
        $obj->TasaPre=request('TasaPre');
        $obj->ActDesa=request('ActDesa');
        $obj->CasasRociadas=request('CasasRociadas');

        $obj->save();
        $data=['mensaje'=>'Actualizado'];
        return response()->json($data);
    }
    
    public function ListaActividadProgramada($id)
    {
        $lista=DB::table('formacprograms')
        ->select('formacprograms.*','formacprograms.id as ActiProgramadaId')
        ->where('formacprograms.localidadId','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }
    public function ActualizarLocalidad(Request $request)
    {
        $id=request("idLocalidade");
        $obj=formintlocalidad::findOrFail($id);
        $obj->Localidad=request('Localidade');
        $obj->Poblacion=request('Poblacione');
        $obj->Nvivienda=request('Nviviendae');
        $obj->Lamtul8sem=request('Lamtul8seme');
        $obj->Casosul8sem=request('Casosul8seme');
        $obj->Iptul8sem=request('Iptul8seme');
        $obj->save();
        $data=['mensaje'=>'Actualizado'];
        return response()->json($data);
    }

    public function EditarLocalidad($id)
    {
        $data=DB::table('formintlocalidads')
        ->leftjoin('formintervenciones','formintervenciones.id','=','formintlocalidads.intervencionesId')
        ->select('formintlocalidads.id as idLocalidad','formintlocalidads.*')
        ->where('formintlocalidads.id','=',$id)
        ->get();
        return response()->json($data);
    }

    public function NuevaLocalidad(Request $request)
    {
        $obj= new formintlocalidad();
        $obj->intervencionesId=request('idLocalidadIntervencion');
        $obj->Localidad=request('Localidad');
        $obj->Poblacion=request('Poblacion');
        $obj->Nvivienda=request('Nvivienda');
        $obj->Lamtul8sem=request('Lamtul8sem');
        $obj->Casosul8sem=request('Casosul8sem');
        $obj->Iptul8sem=request('Iptul8sem');
        $obj->save();
        $ultimo = DB::table('formintlocalidads')->select("id")->latest()->first();
        $data=['id'=>$ultimo->id];
        return response()->json($data);
    }

    public function ListarLocalidad($id)
    {
        $lista=DB::table('formintlocalidads')
        ->leftjoin('formintervenciones','formintervenciones.id','=','formintlocalidads.intervencionesId')
        ->select('formintlocalidads.*','formintlocalidads.id as localidadId')
        ->where('formintlocalidads.intervencionesId','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function ActualizarIntervencion(Request $request)
    {
        $id=request("idIntervencion");
        $obj=formintervenciones::findOrFail($id);
        $obj->Departamento=request('Departamentoe');
        $obj->Provincia=request('Provinciae');
        $obj->Distrito=request('Distritoe');
        $obj->RioQuebrada=request('RioQuebradae');
        $obj->JefeBrigada=request('JefeBrigadae');
        $obj->FechaInicio=request('fecha_inicioe');
        $obj->FechaFinal=request('fecha_finale');
        $obj->save();
        $data=['mensaje'=>'Actualizado'];
        return response()->json($data);
    }
    public function EditarIntervencion($id)
    {
        $data=DB::table('formintervenciones')
        ->leftjoin('dists','dists.id','=','formintervenciones.Distrito')
        ->leftjoin('provs','provs.id','=','formintervenciones.Provincia')
        ->leftjoin('dptos','dptos.id','=','formintervenciones.Departamento')
        ->select('formintervenciones.id as idIntervencion','formintervenciones.*',
        'dptos.id as dptoId','provs.id as provId','dists.id as distId')
        ->where('formintervenciones.id','=',$id)
        ->get();
        return response()->json($data);
    }

    public function GuardaNuevaIntervencion(Request $request)
    {
        $fecha = Carbon::now();
        $ultimo = DB::table('formintervenciones')->select("id")->latest()->first();

        $obj= new formintervenciones();
        $obj->codigo="";
        $obj->Departamento=request('Departamento');
        $obj->Provincia=request('Provincia');
        $obj->Distrito=request('Distrito');
        $obj->RioQuebrada=request('RioQuebrada');
        $obj->JefeBrigada=request('JefeBrigada');
        $obj->FechaInicio=request('fecha_inicio');
        $obj->FechaFinal=request('fecha_final');
        $obj->save();
        $id=DB::table('formintervenciones')->select("id")->latest()->first();
        //id para el registro de un solo formulario y cod para el registro en el otro form en forma de lista
        $cod='ICM-'.$id->id;
        $obj=formintervenciones::findOrFail($id->id);
        $obj->codigo=$cod;
        $obj->save();

        $data=['codigo'=>$cod,'id'=>$id->id];

        return response()->json($data);
    }

    public function ListarIntervenciones()
    {
        $lista=DB::table('formintervenciones')
        ->leftjoin('dists','dists.id','=','formintervenciones.Distrito')
        ->leftjoin('provs','provs.id','=','formintervenciones.Provincia')
        ->leftjoin('dptos','dptos.id','=','formintervenciones.Departamento')
        ->select('formintervenciones.*','formintervenciones.id as IntervencionId','dptos.nombre_dpto',
        'provs.nombre_prov','dists.nombre_dist')
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function Intervenciones()
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

        return view('formintervenciones',['dpto'=>$dpto,'prov'=>$prov,'dist'=>$dist,'tcs'=>$tcs]);
    }
}
