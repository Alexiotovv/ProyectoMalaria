<?php

namespace App\Exports;
// use App\Models\Guia;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class GuiasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function collection()
    {
        $nombre='%';
        if (auth()->user()->is_admin) {
            $nombre='%';
        }else{
            $nombre=auth()->user()->name;
        }
        $obj=DB::table("formintervenciones")
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
        ->where('formintervenciones.user','like',$nombre)
        ->where('formintervenciones.delete','=',0)
        ->get();
        return ($obj);
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'CODIGO',
            'FICHA_DISTRITO',
            'FICHA_PROVINCIA',
            'FICHA_RIOQUEBRADA',
            'FICHA_JEFEBRIGADA',
            'FICHA_FECHA_INICIO',
            'FICHA_FECHA_FINAL',
            'LOC_LOCALIDAD',
            'LOC_POBLACION',
            'LOC_NUMEROVIVIENDAS',
            'LOC_LAMINAS_ULTIMAS_SEMANAS',
            'LOC_CASOS_ULTIMAS_8SEMANAS',
            'LOC_INDICE_POSITIVIDAD_ULT_8SEMANAS',
            'LOC_FECHA_INICIO',
            'LOC_FECHA_FINAL',
            'AP_ACTIVIDADES_PROGRAMADAS',
            'AP_LAMINAS',
            'AP_CASAS',
            'AP_LAMINAS_TOMADAS',
            'AP_VIVAX',
            'AP_FALCIPARUM',
            'AP_PROB_MUESTREADA',
            'AP_INDICE_PSOTIVIDAD',
            'AP_TASA_PREVALENCIA',
            'AP_ACTIVIDAD_DESARROLLADA',
            'AP_CASAS_ROCIADAS',
            'AP_FECHA_INICIO',
            'AP_FECHA_FINAL',
            'USUARIO'
       ];
    }
    
}
