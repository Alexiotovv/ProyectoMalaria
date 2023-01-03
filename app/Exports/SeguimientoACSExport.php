<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class SeguimientoACSExport implements FromCollection, WithHeadings
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

        $obj=DB::table("form_seguimiento_promotor_saluds")
        ->leftjoin('formps_hoja2s','formps_hoja2s.formPS','=','form_seguimiento_promotor_saluds.id')        
        ->leftjoin('dists','dists.id','=','form_seguimiento_promotor_saluds.Distrito')
        ->leftjoin('provs','provs.id','=','form_seguimiento_promotor_saluds.Provincia')
        ->leftjoin('estsalud','estsalud.id','=','form_seguimiento_promotor_saluds.NombreEstablecimiento')
        ->leftjoin('medios_transportes','medios_transportes.id','=','form_seguimiento_promotor_saluds.MedioTransporte')
        ->leftjoin('competencias','competencias.id','=','formps_hoja2s.CompetenciaId')
        ->leftjoin('tcs','tcs.dni_tcs','=','form_seguimiento_promotor_saluds.NombreTcsVisita1')
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
        'form_seguimiento_promotor_saluds.NombreTcsVisita1 as FICHA_DNI_ACS_VISITA',
        'tcs.nombre_tcs as FICHA_NOMBRE_ACS_VISITA',
        'form_seguimiento_promotor_saluds.CodigoTcsVisita1 as FICHA_CODIGO_ACS_VISITA',
        'form_seguimiento_promotor_saluds.NombreTsVisita1 as FICHA_NOMBRE_TS_VISITA',
        'form_seguimiento_promotor_saluds.CodigoHisTsVisita1 as FICHA_CODIGO_HIS_TS_VISITA',
        'form_seguimiento_promotor_saluds.NumeroVisita as FICHA_NUMERO_VISITA',
        'form_seguimiento_promotor_saluds.user as USUARIO',
        'formps_hoja2s.visita1 as ACTIVIDAD_VISITA',
        'formps_hoja2s.obs1 as ACTIVIDAD_OBSERVACION',
        'competencias.nombre_competencia as ACTIVIDAD_COMPETENCIAS'
        )
        ->where('form_seguimiento_promotor_saluds.user','like',$nombre)
        ->where('form_seguimiento_promotor_saluds.delete','=',0)
        ->get();
        return ($obj);
    }
    

    public function headings(): array
    {
        return [
        'ID',
        'FICHA_CODIGO',
        'FICHA_LOCALIDAD',
        'FICHA_DISTRITO',
        'FICHA_PROVINCIA',
        'FICHA_ESTABLECIMIENTO',
        'FICHA_TIEMPOEESS_LOCALIDAD',
        'FICHA_TIEMPO_LOCALIDAD_ESS',
        'FICHA_MEDIO_TRANSPORTE',
        'FICHA_FECHA_VISITA',
        'FICHA_DNI_ACS_VISITA',
        'FICHA_NOMBRE_ACS_VISITA',
        'FICHA_CODIGO_ACS_VISITA',
        'FICHA_NOMBRE_TS_VISITA',
        'FICHA_CODIGO_HIS_TS_VISITA',
        'FICHA_NUMERO_VISITA',
        'USUARIO',
        'ACTIVIDAD_VISITA',
        'ACTIVIDAD_OBSERVACION',
        'ACTIVIDAD_COMPETENCIAS'
       ];
    }
    
}
