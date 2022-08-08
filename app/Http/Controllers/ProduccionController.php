<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produccion;
use DB;

class ProduccionController extends Controller
{
    public function Produccion (Request $request)
    {
        return view('produccion');
    }
    public function NumeroRegistros(Request $request)
    {
        // $intervenciones=DB::table("formintervenciones as inte")
        // ->leftjoin('formintlocalidads as loca','loca.intervencionesId=inte.id')
        // ->leftjoin('formacprograms as act','act.localidadId=loca.id')
        // ->leftjoin('dists', 'dists.id=inte.Distrito')
        // ->leftjoin('provs', 'provs.id=inte.Provincia')
        // ->select('inte.id as ID,inte.codigo as CODIGO','dists.nombre_dist as FICHA_DISTRITO',
        // 'provs.nombre_prov as FICHA_PROVINCIA','inte.RioQuebrada as FICHA_RIOQUEBRADA',
        // 'inte.JefeBrigada as FICHA_JEFEBRIGADA','inte.FechaInicio as FICHA_FECHA_INICIO',
        // 'inte.FechaFinal as FICHA_FECHA_FINAL','loca.Localidad as LOC_LOCALIDAD',
        // 'loca.Poblacion  as LOC_POBLACION','loca.Nvivienda as LOC_NUMEROVIVIENDAS',
        // 'loca.Lamtul8sem  as LOC_LAMINAS_ULTIMAS_SEMANAS','loca.Casosul8sem  as LOC_CASOS_ULTIMAS_8SEMANAS',
        // 'loca.Iptul8sem as LOC_INDICE_POSITIVIDAD_ULT_8SEMANAS','loca.FechaInicio  as LOC_FECHA_INICIO',
        // 'loca.FechaFinal as LOC_FECHA_FINAL','act.act_programadas as AP_ACTIVIDADES_PROGRAMADAS',
        // 'act.laminas as AP_LAMINAS','act.casas_fumigar as AP_CASAS',
        // 'act.LaminasTomadas as AP_LAMINAS_TOMADAS',
        // 'act.Vivax as AP_VIVAX','act.Falciparum as AP_FALCIPARUM',
        // 'act.ProbMuestreada as AP_PROB_MUESTREADA','act.IndicePos as AP_INDICE_PSOTIVIDAD',
        // 'act.TasaPre as AP_TASA_PREVALENCIA','act.ActDesa as AP_ACTIVIDAD_DESARROLLADA',
        // 'act.CasasRociadas as AP_CASAS_ROCIADAS','act.FechaInicio as AP_FECHA_INICIO',
        // 'act.FechaFinal as AP_FECHA_FINAL','inte.user as USUARIO')
        // ->get();
        
        $intervenciones=DB::table("formintervenciones")
        ->select('formintervenciones.id')
        ->count();

        $reg_inter=DB::table("formintervenciones")
        ->select('formintervenciones.id')
        ->leftjoin('formintlocalidads','formintlocalidads.intervencionesId','=','formintervenciones.id')
        ->leftjoin('formacprograms','formacprograms.localidadId','=','formintlocalidads.id')
        ->count();

        $reg_seg_acs=DB::table("form_seguimiento_promotor_saluds")
        ->leftjoin('formps_hoja2s','formps_hoja2s.formps','=','form_seguimiento_promotor_saluds.id')
        ->leftjoin('formps_hoja2stocks','formps_hoja2stocks.formPS','=','form_seguimiento_promotor_saluds.id')
        ->select('form_seguimiento_promotor_saluds.id')
        ->count();


        $seguimientoacs=DB::table("form_seguimiento_promotor_saluds")
        ->select('form_seguimiento_promotor_saluds.id')
        ->count();
        $fichas=['intervenciones'=>$intervenciones,
        'seguimientoacs'=>$seguimientoacs,
        'reg_inter'=>$reg_inter,
        'reg_seg_acs'=>$reg_seg_acs];
        return response()->json($fichas);

    }

}
