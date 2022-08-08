<?php

namespace App\Http\Controllers;

use App\Models\formMonitoreoUsoMosq;
use App\Models\formMMReaccionesAdversas;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class FormMonitoreoUsoMosqController extends Controller
{
    public function ActualizarReaccionAdversa(Request $request)
    {
        $id=request("MMosquiteroIde");
        $obj = formMMReaccionesAdversas::findOrFail($id);
        $obj->Nombre = request('RANombree');
        $obj->Edad = request('RAEdade');
        $obj->Genero = request('RAGeneroe');
        $obj->MolestiaPresentada = request('RAMolestiaPresentadae');
        $obj->TiempoInicioMolestias = request('TiempoInicioMolestiase');
        $obj->Evolucion1 = request('Evolucion1e');
        $obj->Evolucion2 = request('Evolucion2e');
        $obj->save();
        $data=['mensaje'=>'Actualizado'];
        return response()->json($data);
    }
    public function EditarReaccionAdversa($id)
    {   $lista=DB::table('form_m_m_reacciones_adversas')
        ->select('form_m_m_reacciones_adversas.*')
        ->where('form_m_m_reacciones_adversas.id','=',$id)
        ->get();
        return response()->json($lista);
    }
    public function GuardarReaccionAdversa(Request $request)
    {
        $id=request('MMosquiteroId');
        $obj= new formMMReaccionesAdversas();
        $obj->MMosquiteroId=$id;
        $obj->Nombre=request('RANombre');
        $obj->Edad=request('RAEdad');
        $obj->Genero=request('RAGenero');
        $obj->MolestiaPresentada=request('RAMolestiaPresentada');
        $obj->TiempoInicioMolestias=request('TiempoInicioMolestias');
        $obj->Evolucion1=request('Evolucion1');
        $obj->Evolucion2=request('Evolucion2');
        $obj->save();
        $data=['mensaje'=>'Actualizado'];
        return response()->json($data);
    }
    public function ListarReaccionesAdversas($id)
    {
        $lista=DB::table('form_m_m_reacciones_adversas')
        ->select('form_m_m_reacciones_adversas.id as ReaccionesAdversasId',
        'form_m_m_reacciones_adversas.*')
        ->where('form_m_m_reacciones_adversas.MMosquiteroId','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function EditarMonitoreoMosquiteros($id)
    {
        $lista=DB::table('form_monitoreo_uso_mosqs')
        ->leftjoin('dptos','dptos.id','=','form_monitoreo_uso_mosqs.Departamento')
        ->leftjoin('provs','provs.id','=','form_monitoreo_uso_mosqs.Provincia')
        ->leftjoin('dists','dists.id','=','form_monitoreo_uso_mosqs.Distrito')
        ->select('form_monitoreo_uso_mosqs.*','form_monitoreo_uso_mosqs.id as MonitoreoMosquiteroId',
        'dptos.id as dptoId','provs.id as provId','dists.id as distId')
        ->where('form_monitoreo_uso_mosqs.id','=',$id)
        ->get();
        return response()->json($lista);
    }

    public function ActualizaMonitoreoMosquiteros(Request $request)
    {
        $id=request('idMonitoreoMosquitero');
        $obj=formMonitoreoUsoMosq::findOrFail($id);
        $obj->Fecha=request('Fechae');
        $obj->NumeroMonitoreo=request('NumeroMonitoreoe');
        $obj->Departamento=request('Departamentoe');
        $obj->Provincia=request('Provinciae');
        $obj->Distrito=request('Distritoe');
        $obj->Localidad=request('Localidade');
        $obj->Apellidos=request('Apellidose');
        $obj->Nombres=request('Nombrese');
        $obj->Genero=request('Generoe');
        
        $obj->Edad=request('Edade');
        $obj->TotalPersonas=request('TotalPersonase');
        $obj->TotalMenores5=request('TotalMenores5e');
        $obj->TotalNinos5_15=request('TotalNinos5_15e');
        $obj->TotalGestante=request('TotalGestantee');
        $obj->TotalCamas=request('TotalCamase');
        $obj->TotalHamacas=request('TotalHamacase');
        $obj->TotalMosquiteros=request('TotalMosquiterose');
        $obj->TotalMosqImpregnados=request('TotalMosqImpregnadose');
        $obj->DBM_Personas=request('DBM_Personase');
        $obj->DBM_menores5=request('DBM_menores5e');
        $obj->DBM_menores5_15=request('DBM_menores5_15e');
        $obj->Gestantes=request('Gestantese');
        $obj->CubiertosCamas=request('CubiertosCamase');
        $obj->CubiertosHamacas=request('CubiertosHamacase');
        $obj->UsoMosqAyer=request('UsoMosqAyere');
        $obj->UsoMosqAyer_Porqueno=request('UsoMosqAyer_Porquenoe');
        $obj->EntregaMosquiteroUltimosMeses=request('EntregaMosquiteroUltimosMesese');
        $obj->N_MosquiterosEntregados=request('N_MosquiterosEntregadose');
        $obj->MesMosquiterosEntregados=request('MesMosquiterosEntregadose');
        $obj->UsoMosquiteroEntregado=request('UsoMosquiteroEntregadoe');
        $obj->UsoMosquiteroEntregado_xNO=request('UsoMosquiteroEntregado_xNOe');
        $obj->ConformeMosquiteroEntregado=request('ConformeMosquiteroEntregadoe');
        $obj->ConformeMosquiteroEntregado_xNO=request('ConformeMosquiteroEntregado_xNOe');
        $obj->ConformeMaterialMosquiteroEntregado=request('ConformeMaterialMosquiteroEntregadoe');
        $obj->ConformeMaterialMosquiteroEntregado_xNO=request('ConformeMaterialMosquiteroEntregado_xNOe');
        $obj->ConformeColorMosquiteroEntregado=request('ConformeColorMosquiteroEntregadoe');
        $obj->ConformeColorMosquiteroEntregado_xNO=request('ConformeColorMosquiteroEntregado_xNOe');
        $obj->ConformeTamanoMosquiteroEntregado=request('ConformeTamanoMosquiteroEntregadoe');
        $obj->ConformeTamanoMosquiteroEntregado_xNO=request('ConformeTamanoMosquiteroEntregado_xNOe');
        $obj->ConformeTamanoAgujeroMosqEntregado=request('ConformeTamanoAgujeroMosqEntregadoe');
        $obj->ConformeTamanoAgujeroMosqEntregado_xNO=request('ConformeTamanoAgujeroMosqEntregado_xNOe');
        $obj->LlegaSueloMosqEntregado=request('LlegaSueloMosqEntregadoe');
        $obj->BordesEntranDebajoCama=request('BordesEntranDebajoCamae');
        $obj->ConformeCantidadMosqEntregado=request('ConformeCantidadMosqEntregadoe');
        $obj->ConformeCantidadMosqEntregado_xNO=request('ConformeCantidadMosqEntregado_xNOe');
        $obj->VecesLavadoMosquitero=request('VecesLavadoMosquiteroe');
        $obj->FrecuenciaLavadoMosquitero=request('FrecuenciaLavadoMosquiteroe');
        $obj->ReaccionMolestia=request('ReaccionMolestiae');
        $obj->user=auth()->user()->name;
        $obj->save();
        $data=['mensaje'=>'Actualizado'];
        return response()->json($data);

    }

    public function GuardaMonitoreoMosquiteros(Request $request)
    {
        $fecha = Carbon::now();
        $ultimo = DB::table('form_monitoreo_uso_mosqs')->select("id")->latest()->first();
        $idcod=0;
        if ($ultimo){
            $idcod=$ultimo->id;
            $cod='MM'.$fecha->format('dmy'.'-'.$idcod);            
        }else{
            $cod='MM'.$fecha->format('dmy'.'-'."1");
        }
        $obj= new formMonitoreoUsoMosq();
        $obj->codigo=$cod;
        $obj->Fecha=request('Fecha');
        $obj->NumeroMonitoreo=request('NumeroMonitoreo');
        $obj->Departamento=request('Departamento');
        $obj->Provincia=request('Provincia');
        $obj->Distrito=request('Distrito');
        $obj->Localidad=request('Localidad');
        $obj->Apellidos=request('Apellidos');
        $obj->Nombres=request('Nombres');
        $obj->Genero=request('Genero');
        
        $obj->Edad=request('Edad');
        $obj->TotalPersonas=request('TotalPersonas');
        $obj->TotalMenores5=request('TotalMenores5');
        $obj->TotalNinos5_15=request('TotalNinos5_15');
        $obj->TotalGestante=request('TotalGestante');
        $obj->TotalCamas=request('TotalCamas');
        $obj->TotalHamacas=request('TotalHamacas');
        $obj->TotalMosquiteros=request('TotalMosquiteros');
        $obj->TotalMosqImpregnados=request('TotalMosqImpregnados');
        $obj->DBM_Personas=request('DBM_Personas');
        $obj->DBM_menores5=request('DBM_menores5');
        $obj->DBM_menores5_15=request('DBM_menores5_15');
        $obj->Gestantes=request('Gestantes');
        $obj->CubiertosCamas=request('CubiertosCamas');
        $obj->CubiertosHamacas=request('CubiertosHamacas');
        $obj->UsoMosqAyer=request('UsoMosqAyer');
        $obj->UsoMosqAyer_Porqueno=request('UsoMosqAyer_Porqueno');
        $obj->EntregaMosquiteroUltimosMeses=request('EntregaMosquiteroUltimosMeses');
        $obj->N_MosquiterosEntregados=request('N_MosquiterosEntregados');
        $obj->MesMosquiterosEntregados=request('MesMosquiterosEntregados');
        $obj->UsoMosquiteroEntregado=request('UsoMosquiteroEntregado');
        $obj->UsoMosquiteroEntregado_xNO=request('UsoMosquiteroEntregado_xNO');
        $obj->ConformeMosquiteroEntregado=request('ConformeMosquiteroEntregado');
        $obj->ConformeMosquiteroEntregado_xNO=request('ConformeMosquiteroEntregado_xNO');
        $obj->ConformeMaterialMosquiteroEntregado=request('ConformeMaterialMosquiteroEntregado');
        $obj->ConformeMaterialMosquiteroEntregado_xNO=request('ConformeMaterialMosquiteroEntregado_xNO');
        $obj->ConformeColorMosquiteroEntregado=request('ConformeColorMosquiteroEntregado');
        $obj->ConformeColorMosquiteroEntregado_xNO=request('ConformeColorMosquiteroEntregado_xNO');
        $obj->ConformeTamanoMosquiteroEntregado=request('ConformeTamanoMosquiteroEntregado');
        $obj->ConformeTamanoMosquiteroEntregado_xNO=request('ConformeTamanoMosquiteroEntregado_xNO');
        $obj->ConformeTamanoAgujeroMosqEntregado=request('ConformeTamanoAgujeroMosqEntregado');
        $obj->ConformeTamanoAgujeroMosqEntregado_xNO=request('ConformeTamanoAgujeroMosqEntregado_xNO');
        $obj->LlegaSueloMosqEntregado=request('LlegaSueloMosqEntregado');
        $obj->BordesEntranDebajoCama=request('BordesEntranDebajoCama');
        $obj->ConformeCantidadMosqEntregado=request('ConformeCantidadMosqEntregado');
        $obj->ConformeCantidadMosqEntregado_xNO=request('ConformeCantidadMosqEntregado_xNO');
        $obj->VecesLavadoMosquitero=request('VecesLavadoMosquitero');
        $obj->FrecuenciaLavadoMosquitero=request('FrecuenciaLavadoMosquitero');
        $obj->ReaccionMolestia=request('ReaccionMolestia');
        $obj->user=auth()->user()->name;
        $obj->save();
        return response()->json($cod);
    }
    public function ListarMonitoreoMosquiteros()
    {
        $nombre='%';
        if (auth()->user()->is_admin) {
            $nombre='%';
        }else{
            $nombre=auth()->user()->name;
        }

        $lista=DB::table('form_monitoreo_uso_mosqs')
        ->leftjoin('dptos','dptos.id','=','form_monitoreo_uso_mosqs.Departamento')
        ->leftjoin('provs','provs.id','=','form_monitoreo_uso_mosqs.Provincia')
        ->leftjoin('dists','dists.id','=','form_monitoreo_uso_mosqs.Distrito')
        ->select('form_monitoreo_uso_mosqs.*','form_monitoreo_uso_mosqs.id as MonitoreoMosquiteroId',
        'dptos.nombre_dpto','provs.nombre_prov','dists.nombre_dist')
        ->where('form_monitoreo_uso_mosqs.user','like',$nombre)
        ->get();
        return datatables()->of($lista)->toJson();
    }
    
    public function MonitoreoMosquiteros()
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

        return view('monitoreo_mosquiteros',
        ['dpto'=>$dpto,'prov'=>$prov,'dist'=>$dist]);
    }
}
