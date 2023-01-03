<?php

namespace App\Http\Controllers;

use App\Models\FormSeguimientoPromotorSalud;
use App\Models\formps_hoja2;
use App\Models\formps_hoja2stock;
use App\Models\EstadosForm;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class FormSeguimientoPromotorSaludController extends Controller
{
    public function EliminarSegu($id)
    {
        $obj = FormSeguimientoPromotorSalud::findOrFail($id);
        $obj->delete=1;
        $obj->save();
        $data=['Mensaje'=>'Listo'];
        return response()->json($data);
    }

    public function GuardaStockMedicamentos(Request $request)
    {
        $competencias = DB::table('competencias')
        ->where('tipo_competencia','=','stock de medicamentos')
        ->get();

        foreach ($competencias as $com ) {
            $obj = new formps_hoja2stock();
            $obj->formPS=request('idStock');#Id de la Ficha
            $obj->CompetenciaId=$com->id;#Id competencia
            $obj->unidades1=request('unidades1'.$com->id);
            $obj->fecha1=request('fecha1'.$com->id);
            $obj->save();
        }
        $data=['Mensaje'=>'ok'];

        return response()->json($data);
    }

    public function ActualizaSegumientoACS(Request $request)
    {
        $id=request('idform');
        $obj = FormSeguimientoPromotorSalud::findOrFail($id);
        $obj->Localidad=request('Localidad');
        $obj->Distrito=request('Distrito');
        $obj->Provincia=request('Provincia');
        $obj->Departamento=request('Departamento');
        $obj->NombreEstablecimiento=request('EstSalud');
        $obj->TiempoEesLocalidad=request('TiempoEESSLocalidad');
        $obj->TiempoLocalidadEess=request('TiempoLocalidadEESS');
        $obj->NumeroVisita=request('NumeroVisita');
        $obj->MedioTransporte=request('Transporte');
        $obj->FechaVisita1=request('FechaVisita1');
        $obj->NombreTcsVisita1=request('NombreTCS1');
        $obj->CodigoTcsVisita1=request('CodigoTCS1');
        $obj->NombreTsVisita1=request('NombreTS1');
        $obj->CodigoHisTsVisita1=request('CodigoHISTS1');
        $obj->user=auth()->user()->name;
        $obj->save();
    }

    public function RegistraSegumientoACS(Request $request)
    {
        $fecha = Carbon::now();
        $ultimo = FormSeguimientoPromotorSalud::select("id")->latest()->first();
        if ($ultimo) {
            $idcod=$ultimo->id+1;
            $cod='ICM'.$fecha->format('dmy'.'-'.$idcod);    
        }else{
            $idcod=1;
            $cod='ICM'.$fecha->format('dmy'.'-'."1");
        }
        
        $codigo='ACS'.'-'.$idcod;
        $obj = new FormSeguimientoPromotorSalud();
        $obj->Codigo=$codigo;
        $obj->Localidad=request('Localidad');
        $obj->Distrito=request('Distrito');
        $obj->Provincia=request('Provincia');
        $obj->Departamento=request('Departamento');
        $obj->NombreEstablecimiento=request('EstSalud');
        $obj->TiempoEesLocalidad=request('TiempoEESSLocalidad');
        $obj->TiempoLocalidadEess=request('TiempoLocalidadEESS');
        $obj->NumeroVisita=request('NumeroVisita');
        $obj->MedioTransporte=request('Transporte');
        $obj->FechaVisita1=request('FechaVisita1');
        $obj->NombreTcsVisita1=request('NombreTCS1');
        $obj->CodigoTcsVisita1=request('CodigoTCS1');
        $obj->NombreTsVisita1=request('NombreTS1');
        $obj->CodigoHisTsVisita1=request('CodigoHISTS1');
        $obj->user=auth()->user()->name;
        $obj->save();

        //AQUI VA GRABAR EN ESTADO FORM 
        $seg = FormSeguimientoPromotorSalud::select("id")->latest()->first();
        $obj2 = new EstadosForm();
        $obj2->idRegistro=$seg->id; //esto es el idform
        $obj2->user_id=request('iduser');
        $obj2->nombre_tabla=request('nombre_tabla');
        $obj2->save();

        //ultimo id de estado form
        $idestadoform = EstadosForm::select("id")->latest()->first();
        $data=['id'=>$seg->id,'codigo'=>$codigo,'idestadoform'=>$idestadoform->id];
        return response()->json($data);
    }
    
    public function ListarSeguimientoACS(Request $request)
    {
        $lista=DB::table('form_seguimiento_promotor_saluds')
        ->leftjoin('dists','dists.id','=','form_seguimiento_promotor_saluds.Distrito')
        ->leftjoin('provs','provs.id','=','form_seguimiento_promotor_saluds.Provincia')
        ->leftjoin('dptos','dptos.id','=','form_seguimiento_promotor_saluds.Departamento')
        ->leftjoin('medios_transportes','medios_transportes.id','=','form_seguimiento_promotor_saluds.MedioTransporte')
        ->leftjoin('estsalud','estsalud.id','=','form_seguimiento_promotor_saluds.NombreEstablecimiento')
        ->select('form_seguimiento_promotor_saluds.id as idform','form_seguimiento_promotor_saluds.*','dists.*','provs.*','dptos.*','medios_transportes.*','estsalud.*')
        ->where('form_seguimiento_promotor_saluds.user','like',$nombre)
        ->get();
        return datatables()->of($lista)->tojson();
        
    }

    public function soloformseguiACS()
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
        $formps_hoja2s=DB::table('formps_hoja2s')->select('formPS')->distinct()->get();
        $formps_hoja2stock=DB::table('formps_hoja2stocks')->select('formPS')->distinct()->get();
        $medios_transportes=DB::table('medios_transportes')->get();

        $lista=DB::table('form_seguimiento_promotor_saluds')
        ->leftjoin('dists','dists.id','=','form_seguimiento_promotor_saluds.Distrito')
        ->leftjoin('provs','provs.id','=','form_seguimiento_promotor_saluds.Provincia')
        ->leftjoin('dptos','dptos.id','=','form_seguimiento_promotor_saluds.Departamento')
        ->leftjoin('medios_transportes','medios_transportes.id','=','form_seguimiento_promotor_saluds.MedioTransporte')
        ->leftjoin('estsalud','estsalud.id','=','form_seguimiento_promotor_saluds.NombreEstablecimiento')
        ->select('form_seguimiento_promotor_saluds.id as idform','form_seguimiento_promotor_saluds.*','dists.*','provs.*','dptos.*','medios_transportes.*','estsalud.*')
        ->where('form_seguimiento_promotor_saluds.user','like',$nombre)
        ->get();

        $tcs=DB::table('tcs')
        ->select('tcs.*')
        ->get();
        $competencias=DB::table('competencias')
        ->where('tipo_competencia','promotor de salud')
        ->get();
        
        $stock=DB::table('competencias')
        ->where('tipo_competencia','stock de medicamentos')
        ->get();

        return view('frmseguimientoACS',['tcs'=>$tcs,'lista'=>$lista,'dpto'=>$dpto,'prov'=>$prov,
        'dist'=>$dist,'ests'=>$ests,'medios_transportes'=>$medios_transportes,
        'competencias'=>$competencias,'stock'=>$stock]);
        
        //'formps_hoja2s'=>$formps_hoja2s,'formps_hoja2stock'=>$formps_hoja2stock
        // return view('frmseguimientoACS');
    }

    public function BuscaDNIACS($id)
    {
        $obj=DB::table('tcs')
        ->where('tcs.id','=',$id)
        ->get();
        return response()->json($obj);
    }

    public function ActualizarStockMedicamentos(Request $request)
    {
        $id=request('idStock');
        $obj=formps_hoja2stock::findOrFail($id);
        $obj->unidades1=request('stock1e');
        $obj->fecha1=request('fecha1e');
        $obj->save();
        $data=['Mensaje'=>'Guardado'];
        return response()->json($data);
    }
    public function EditarStockMedicamentos($id)
    {
        $lista=DB::table('formps_hoja2stocks')
        ->leftjoin('competencias','competencias.id','=','formps_hoja2stocks.CompetenciaId')
        ->select('formps_hoja2stocks.*','competencias.nombre_competencia')
        ->where('formps_hoja2stocks.id','=',$id)
        ->get();
        return response()->json($lista);
    }
    public function ListaStockMedicamentos($id)
    {
        $lista=DB::table('formps_hoja2stocks')
        ->leftjoin('competencias','competencias.id','=','formps_hoja2stocks.CompetenciaId')
        ->select('formps_hoja2stocks.*','competencias.nombre_competencia')
        ->where('formps_hoja2stocks.formPS','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }
    public function EditarCompetenciasform2($id)
    {
        $lista=DB::table('formps_hoja2s')
        ->leftjoin('competencias','competencias.id','=','formps_hoja2s.CompetenciaId')
        ->select('formps_hoja2s.*','competencias.nombre_competencia')
        ->where('formps_hoja2s.id','=',$id)
        ->get();
        return response()->json($lista);

    }
    public function ActualizarCompetenciasform2(Request $request)
    {
        $id=request('idCompe');
        $obj=formps_hoja2::findOrFail($id);
        $obj->visita1=request('visita1e');
        $obj->obs1=request('obs1e');
        $obj->save();
        $data=['Mensaje'=>'Guardado'];
        return response()->json($data);

    }
    public function ListarCompetencias($id)
    {
        $lista= DB::table('formps_hoja2s')
        ->leftjoin('competencias','competencias.id','=','formps_hoja2s.CompetenciaId')
        ->select('formps_hoja2s.*','competencias.nombre_competencia')
        ->where('formps_hoja2s.formPS','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function ActualizarFormSeg(Request $request)
    {
        $id=request("idFormSeg");
        $obj=FormSeguimientoPromotorSalud::findOrFail($id);
        $obj->Localidad=request('Localidade');
        $obj->Distrito=request('Distritoe');
        $obj->Provincia=request('Provinciae');
        $obj->Departamento=request('Departamentoe');
        $obj->NombreEstablecimiento=request('EstSalude');
        $obj->TiempoEesLocalidad=request('TiempoEESSLocalidade');
        $obj->TiempoLocalidadEess=request('TiempoLocalidadEESSe');
        $obj->NumeroVisita=request('NumeroVisitae');
        $obj->MedioTransporte=request('Transportee');
        $obj->FechaVisita1=request('FechaVisita1e');
        $obj->NombreTcsVisita1=request('NombreTCS1e');
        $obj->CodigoTcsVisita1=request('CodigoTCS1e');
        $obj->NombreTsVisita1=request('NombreTS1e');
        $obj->CodigoHisTsVisita1=request('CodigoHISTS1e');
        $obj->user=auth()->user()->name;
        $obj->save();
        // $data=['mensaje'=>'Actualizado'];
        // return response()->json($data);
        return redirect()->route('Listar.formps');
    }
    public function EditarFormSeg($id)
    {
        $lista=DB::table('form_seguimiento_promotor_saluds')
        ->leftjoin('dists','dists.id','=','form_seguimiento_promotor_saluds.Distrito')
        ->leftjoin('provs','provs.id','=','form_seguimiento_promotor_saluds.Provincia')
        ->leftjoin('dptos','dptos.id','=','form_seguimiento_promotor_saluds.Departamento')
        ->leftjoin('medios_transportes','medios_transportes.id','=','form_seguimiento_promotor_saluds.MedioTransporte')
        ->leftjoin('estsalud','estsalud.id','=','form_seguimiento_promotor_saluds.NombreEstablecimiento')
        ->select('form_seguimiento_promotor_saluds.id as idform','form_seguimiento_promotor_saluds.*',
        'dists.id as distId','provs.id as provId','dptos.id as dptoId','medios_transportes.id as mtId',
        'estsalud.id as esId')
        ->where('form_seguimiento_promotor_saluds.id','=',$id)
        ->get();
        return response()->json($lista);
    }
    public function CrearHoja2($id){
        $competencias=DB::table('competencias')
        ->where('tipo_competencia','promotor de salud')
        ->get();

        $form=DB::table('form_seguimiento_promotor_saluds')
        ->where('id',$id)->get();
        
        foreach ($form as $key => $item) {
            $codigo=$item->Codigo;
        }
        return view('formSPS2',['competencias'=>$competencias,'id'=>$id,'codigo'=>$codigo]);
    }

    public function CrearHoja2stock($id){
        $competencias=DB::table('competencias')
        ->where('tipo_competencia','stock de medicamentos')
        ->get();

        $form=DB::table('form_seguimiento_promotor_saluds')
        ->where('id',$id)->get();
        
        foreach ($form as $key => $item) {
            $codigo=$item->Codigo;
        }
        return view('formSPS2stock',['competencias'=>$competencias,'id'=>$id,'codigo'=>$codigo]);
    }


    public function Listar()
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
        $formps_hoja2s=DB::table('formps_hoja2s')->select('formPS')->distinct()->get();
        $formps_hoja2stock=DB::table('formps_hoja2stocks')->select('formPS')->distinct()->get();
        $medios_transportes=DB::table('medios_transportes')->get();

        $nombre='%';
        if (auth()->user()->is_admin) {
            $nombre='%';
        }else{
            $nombre=auth()->user()->name;
        }

        $lista=DB::table('form_seguimiento_promotor_saluds')
        ->leftjoin('dists','dists.id','=','form_seguimiento_promotor_saluds.Distrito')
        ->leftjoin('provs','provs.id','=','form_seguimiento_promotor_saluds.Provincia')
        ->leftjoin('dptos','dptos.id','=','form_seguimiento_promotor_saluds.Departamento')
        ->leftjoin('medios_transportes','medios_transportes.id','=','form_seguimiento_promotor_saluds.MedioTransporte')
        ->leftjoin('estsalud','estsalud.id','=','form_seguimiento_promotor_saluds.NombreEstablecimiento')
        ->select('form_seguimiento_promotor_saluds.id as idform','form_seguimiento_promotor_saluds.*','dists.*','provs.*','dptos.*','medios_transportes.*','estsalud.*')
        ->where('form_seguimiento_promotor_saluds.user','like',$nombre)
        ->where('form_seguimiento_promotor_saluds.delete','=',0)
        ->get();

        $tcs=DB::table('tcs')
        ->select('tcs.*')
        ->get();

        return view('formSeguimientoPromotorSalud',['tcs'=>$tcs,'lista'=>$lista,'dpto'=>$dpto,'prov'=>$prov,
        'dist'=>$dist,'ests'=>$ests,'medios_transportes'=>$medios_transportes,
        'formps_hoja2s'=>$formps_hoja2s,'formps_hoja2stock'=>$formps_hoja2stock]);
    }

    public function Crear(Request $request)
    {
        $fecha = Carbon::now();
        $ultimo = FormSeguimientoPromotorSalud::select("id")->latest()->first();
        $idcod=$ultimo->id+1;
        $codigo='ACS'.'-'.$idcod;
        $obj = new FormSeguimientoPromotorSalud();
        $obj->Codigo=$codigo;
        $obj->Localidad=request('Localidad');
        $obj->Distrito=request('Distrito');
        $obj->Provincia=request('Provincia');
        $obj->Departamento=request('Departamento');
        $obj->NombreEstablecimiento=request('EstSalud');
        $obj->TiempoEesLocalidad=request('TiempoEESSLocalidad');
        $obj->TiempoLocalidadEess=request('TiempoLocalidadEESS');
        $obj->NumeroVisita=request('NumeroVisita');
        $obj->MedioTransporte=request('Transporte');
        $obj->FechaVisita1=request('FechaVisita1');
        $obj->NombreTcsVisita1=request('NombreTCS1');
        $obj->CodigoTcsVisita1=request('CodigoTCS1');
        $obj->NombreTsVisita1=request('NombreTS1');
        $obj->CodigoHisTsVisita1=request('CodigoHISTS1');
        $obj->user=auth()->user()->name;
        $obj->save();
        return redirect()->route('Listar.formps')->with(['message'=>$codigo]);

    }

}
