<?php

namespace App\Http\Controllers;

use App\Exports\EntregaMosquiteros;
use App\Exports\GuiasExport;
use App\Exports\SeguimientoACSExport;
use App\Exports\SeguimientoACSStockExport;
use App\Exports\EntregaIMMExport;
use App\Exports\AsistCapacACS;

use Illuminate\Http\Request;
use App\Models\produccion;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class ProduccionController extends Controller
{

    public function ProduccionSeguimientoACSStock(Request $request)
    {
        $data=DB::table("form_seguimiento_promotor_saluds")
        ->leftjoin('formps_hoja2stocks','formps_hoja2stocks.formPS','=','form_seguimiento_promotor_saluds.id')
        ->leftjoin('dists', 'dists.id','=','form_seguimiento_promotor_saluds.Distrito')
        ->leftjoin('provs', 'provs.id','=','form_seguimiento_promotor_saluds.Provincia')
        ->leftjoin('estsalud','estsalud.id','=','form_seguimiento_promotor_saluds.NombreEstablecimiento')
        ->leftjoin('medios_transportes','medios_transportes.id','=','form_seguimiento_promotor_saluds.MedioTransporte')
        ->leftjoin('competencias','competencias.id','=','formps_hoja2s.CompetenciaId')
        ->select('form_seguimiento_promotor_saluds.Codigo AS FICHA_CODIGO',
            'form_seguimiento_promotor_saluds.Localidad AS FICHA_LOCALIDAD',
            'dists.nombre_dist AS FICHA_DISTRITO',
            'provs.nombre_prov AS FICHA_PROVINCIA',
            'estsalud.nombre_estsalud AS FICHA_ESTABLECIMIENTO',
            'form_seguimiento_promotor_saluds.TiempoEesLocalidad AS FICHA_TIEMPOEESLOCALIDAD',
            'form_seguimiento_promotor_saluds.TiempoLocalidadEess AS FICHA_TIEMPOLOCALIDADESS',
            'medios_transportes.nombre_medio AS FICHA_MEDIOTRANSPORTE',
            'form_seguimiento_promotor_saluds.FechaVisita1 AS FICHA_VISITA',
            'form_seguimiento_promotor_saluds.NombreTcsVisita1 AS FICHA_NOMBRE_ACS',
            'form_seguimiento_promotor_saluds.CodigoTcsVisita1 AS FICHA_CODIGO_ACS',
            'form_seguimiento_promotor_saluds.NombreTsVisita1 AS FICHA_NOMBRE_TS',
            'form_seguimiento_promotor_saluds.CodigoHisTsVisita1 AS FICHA_CODIGO_HIS_TS',
            'form_seguimiento_promotor_saluds.NumeroVisita AS FICHA_NUMERO_VISITA',
            'form_seguimiento_promotor_saluds.user AS USUARIO',
            'formps_hoja2stocks.unidades1 AS UNIDADES',
            'formps_hoja2stocks.fecha1 AS FECHA_VCMTO',
            'competencias.nombre_competencia AS ACTIVIDAD'
        )
        ->get();
        return datatables()->of($data)->toJson();
    }

    public function ProduccionSeguimientoACSActividades(Request $request)
    {
        $obj=DB::table("form_seguimiento_promotor_saluds")
        ->leftjoin('formps_hoja2s','formps_hoja2s.formPS','=','form_seguimiento_promotor_saluds.id')        
        ->leftjoin('dists','dists.id','=','form_seguimiento_promotor_saluds.Distrito')
        ->leftjoin('provs','provs.id','=','form_seguimiento_promotor_saluds.Provincia')
        ->leftjoin('estsalud','estsalud.id','=','form_seguimiento_promotor_saluds.NombreEstablecimiento')
        ->leftjoin('medios_transportes','medios_transportes.id','=','form_seguimiento_promotor_saluds.MedioTransporte')
        ->leftjoin('competencias','competencias.id','=','formps_hoja2s.CompetenciaId')
        ->select('form_seguimiento_promotor_saluds.id as ID',
        'form_seguimiento_promotor_saluds.Codigo as FICHA_CODIGO',
        'form_seguimiento_promotor_saluds.Localidad as FICHA_LOCALIDAD',
        'dists.nombre_dist as FICHA_DISTRITO',
        'provs.nombre_prov as FICHA_PROVINCIA',
        'estsalud.nombre_estsalud as FICHA_ESTABLECIMIENTO',
        'form_seguimiento_promotor_saluds.TiempoEesLocalidad as FICHA_TIEMPOEESS_LOCALIDAD',
        'form_seguimiento_promotor_saluds.TiempoLocalidadEess as FICHA_TIEMPO_LOCALIDAD_ESS',
        'form_seguimiento_promotor_saluds.MedioTransporte as FICHA_MEDIO_TRANSPORTE',
        'form_seguimiento_promotor_saluds.FechaVisita1 as FICHA_FECHA_VISITA',
        'form_seguimiento_promotor_saluds.NombreTcsVisita1 as FICHA_NOMBRE_ACS_VISITA',
        'form_seguimiento_promotor_saluds.CodigoTcsVisita1 as FICHA_CODIGO_ACS_VISITA',
        'form_seguimiento_promotor_saluds.NombreTsVisita1 as FICHA_NOMBRE_TS_VISITA',
        'form_seguimiento_promotor_saluds.CodigoHisTsVisita1 as FICHA_CODIGO_HIS_TS_VISITA',
        'form_seguimiento_promotor_saluds.NumeroVisita as FICHA_NUMERO_VISITA',
        'form_seguimiento_promotor_saluds.user as USUARIO',
        'formps_hoja2s.visita1 as ACTIVIDAD_VISITA',
        'formps_hoja2s.obs1 as ACTIVIDAD_OBSERVACION',
        'competencias.nombre_competencia as ACTIVIDAD'
        )
        ->get();
        return datatables()->of($obj)->toJson();
    }

    public function ProduccionIntervenciones(Request $request)
    {
        $data=DB::table("formintervenciones")
        ->leftjoin('formintlocalidads','formintlocalidads.intervencionesId','=','formintervenciones.id')
        ->leftjoin('formacprograms','formacprograms.localidadId','=','formintlocalidads.id')
        ->leftjoin('dists', 'dists.id','=','formintervenciones.Distrito')
        ->leftjoin('provs', 'provs.id','=','formintervenciones.Provincia')
        ->select('formintervenciones.id as ID',
        'formintervenciones.codigo as CODIGO',
        'dists.nombre_dist as FICHA_DISTRITO',
        'provs.nombre_prov as FICHA_PROVINCIA',
        'formintervenciones.RioQuebrada as FICHA_RIOQUEBRADA',
        'formintervenciones.JefeBrigada as FICHA_JEFEBRIGADA',
        'formintervenciones.FechaInicio as FICHA_FECHA_INICIO',
        'formintervenciones.FechaFinal as FICHA_FECHA_FINAL',
        'formintlocalidads.Localidad as LOC_LOCALIDAD',
        'formintlocalidads.Poblacion  as LOC_POBLACION',
        'formintlocalidads.Nvivienda as LOC_NUMEROVIVIENDAS',
        'formintlocalidads.Lamtul8sem  as LOC_LAMINAS_ULTIMAS_SEMANAS',
        'formintlocalidads.Casosul8sem  as LOC_CASOS_ULTIMAS_8SEMANAS',
        'formintlocalidads.Iptul8sem as LOC_INDICE_POSITIVIDAD_ULT_8SEMANAS',
        'formintlocalidads.FechaInicio  as LOC_FECHA_INICIO',
        'formintlocalidads.FechaFinal as LOC_FECHA_FINAL',
        'formacprograms.act_programadas as AP_ACTIVIDADES_PROGRAMADAS',
        'formacprograms.laminas as AP_LAMINAS',
        'formacprograms.casas_fumigar as AP_CASAS',
        'formacprograms.LaminasTomadas as AP_LAMINAS_TOMADAS',
        'formacprograms.Vivax as AP_VIVAX',
        'formacprograms.Falciparum as AP_FALCIPARUM',
        'formacprograms.ProbMuestreada as AP_PROB_MUESTREADA',
        'formacprograms.IndicePos as AP_INDICE_PSOTIVIDAD',
        'formacprograms.TasaPre as AP_TASA_PREVALENCIA',
        'formacprograms.ActDesa as AP_ACTIVIDAD_DESARROLLADA',
        'formacprograms.CasasRociadas as AP_CASAS_ROCIADAS',
        'formacprograms.FechaInicio as AP_FECHA_INICIO',
        'formacprograms.FechaFinal as AP_FECHA_FINAL',
        'formintervenciones.user as USUARIO')
        ->get();
        return datatables()->of($data)->toJson();
    }

    public function Produccion (Request $request)
    {      
        $nombre='%';
        if (auth()->user()->is_admin) {
            $nombre='%';
        }else{
            $nombre=auth()->user()->name;
        }
        ///////////////NUMERO DE REGISTROS
        $reg_inter=DB::table("formintervenciones")
        ->select('formintervenciones.id')
        ->leftjoin('formintlocalidads','formintlocalidads.intervencionesId','=','formintervenciones.id')
        ->leftjoin('formacprograms','formacprograms.localidadId','=','formintlocalidads.id')
        ->where('formintervenciones.user','like',$nombre)
        ->count();
        $reg_seg_acs=DB::table("form_seguimiento_promotor_saluds")
        ->leftjoin('formps_hoja2s','formps_hoja2s.formps','=','form_seguimiento_promotor_saluds.id')        
        ->select('form_seguimiento_promotor_saluds.id')
        ->where('form_seguimiento_promotor_saluds.user','like',$nombre)
        ->count();
        $reg_entrega_imm=DB::table("actaentregaimms")
        ->select('form_seguimiento_promotor_saluds.id')
        ->where('actaentregaimms.user','like',$nombre)
        ->count();

        $reg_entrega_mosq=DB::table("formmosquiteros")
        ->select('formmosquiteros.id')
        ->leftjoin('formpersonamqs','formpersonamqs.formmosquiterosId','=','formmosquiteros.id')
        ->leftjoin('formlistaentregamosqs','formlistaentregamosqs.formpersonamqsId','=','formpersonamqs.id')
        ->where('formmosquiteros.user','like',$nombre)
        ->count();

        $reg_cap_acs=DB::table("asistenciaacs")
        ->leftjoin('asistenciaacs_nombres','asistenciaacs_nombres.idAsistencia','=','asistenciaacs.id')
        ->where('asistenciaacs.user','like',$nombre)
        ->count();

        /////////////////////////////

        ////////NUMERO DE FICHAS/////////////////////
        $acsStock=DB::table("form_seguimiento_promotor_saluds")
        ->leftjoin('formps_hoja2stocks','formps_hoja2stocks.formPS','=','form_seguimiento_promotor_saluds.id')
        ->select('form_seguimiento_promotor_saluds.id')
        ->where('form_seguimiento_promotor_saluds.user','like',$nombre)
        ->count();

        $fich_int=DB::table("formintervenciones")
        ->select('formintervenciones.id')
        ->where('formintervenciones.user','like',$nombre)
        ->count();

        $fich_seg_acs=DB::table("form_seguimiento_promotor_saluds")
        ->select('form_seguimiento_promotor_saluds.id')
        ->where('form_seguimiento_promotor_saluds.user','like',$nombre)
        ->count();

        $fich_imm=DB::table("actaentregaimms")
        ->select('actaentregaimms.id')
        ->where('actaentregaimms.user','like',$nombre)
        ->count();

        $fich_entrega_mosq=DB::table("formmosquiteros")
        ->select('formmosquiteros.id')
        ->where('formmosquiteros.user','like',$nombre)
        ->count();

        $fich_cap_acs=DB::table("asistenciaacs")
        ->select('asistenciaacs.id')
        ->where('asistenciaacs.user','like',$nombre)
        ->count();

        return view('produccion',['reg_inter'=>$reg_inter,
        'reg_seg_acs'=>$reg_seg_acs,
        'reg_entrega_imm'=>$reg_entrega_imm,
        'acsStock'=>$acsStock,
        'fich_int'=>$fich_int,
        'fich_seg_acs'=>$fich_seg_acs,
        'fich_imm'=>$fich_imm,
        'fich_entrega_mosq'=>$fich_entrega_mosq,
        'reg_entrega_mosq'=>$reg_entrega_mosq,
        'fich_cap_acs'=>$fich_cap_acs,
        'reg_cap_acs'=>$reg_cap_acs,

        ]);
    }

    public function Exportar()
    {
        return Excel::download(new GuiasExport, 'intervenciones.xlsx');
    }

    public function ExportarSeguimientoACS()
    {
        return Excel::download(new SeguimientoACSExport, 'seguimientoacs_actividades.xlsx');
    }
    public function ExportarSeguimientoACSStock()
    {
        return Excel::download(new SeguimientoACSStockExport, 'seguimientoacs_stock.xlsx');
    }
    public function ExportarEntregaIMM()
    {
        return Excel::download(new EntregaIMMExport, 'ActaEntregaIsumosyMateriales.xlsx');
    }
    public function ExportarEntregaMosquiteros()
    {
        return Excel::download(new EntregaMosquiteros, 'FichaEntregaMosquiteros.xlsx');
    }
    public function ExportarAsistCapacACS()
    {
        return Excel::download(new AsistCapacACS, 'AsistenciaCapacitacionACS.xlsx');
    }
    

    public function NumeroRegistros(Request $request)
    {
        
        $fich_int=DB::table("formintervenciones")
        ->select('formintervenciones.id')
        ->count();
        $fich_seg_acs=DB::table("form_seguimiento_promotor_saluds")
        ->select('form_seguimiento_promotor_saluds.id')
        ->count();

        $fich_imm=DB::table("actaentregaimms")
        ->select('actaentregaimms.id')
        ->count();


        $fichas=['fich_int'=>$fich_int,
        'fich_seg_acs'=>$fich_seg_acs,
        'fich_imm'=>$fich_imm];

        return response()->json($fichas);

    }

}
