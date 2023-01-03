<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class SeguimientoACSStockExport implements FromCollection, WithHeadings
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
        ->leftjoin('formps_hoja2stocks','formps_hoja2stocks.formPS','=','form_seguimiento_promotor_saluds.id')
        ->leftjoin('dists', 'dists.id','=','form_seguimiento_promotor_saluds.Distrito')
        ->leftjoin('provs', 'provs.id','=','form_seguimiento_promotor_saluds.Provincia')
        ->leftjoin('estsalud','estsalud.id','=','form_seguimiento_promotor_saluds.NombreEstablecimiento')
        ->leftjoin('medios_transportes','medios_transportes.id','=','form_seguimiento_promotor_saluds.MedioTransporte')
        ->leftjoin('competencias','competencias.id','=','formps_hoja2stocks.CompetenciaId')
        ->leftjoin('tcs','tcs.dni_tcs','=','form_seguimiento_promotor_saluds.NombreTcsVisita1')
        ->select('form_seguimiento_promotor_saluds.id AS ID',
            'form_seguimiento_promotor_saluds.Codigo AS FICHA_CODIGO',
            'form_seguimiento_promotor_saluds.Localidad AS FICHA_LOCALIDAD',
            'dists.nombre_dist AS FICHA_DISTRITO',
            'provs.nombre_prov AS FICHA_PROVINCIA',
            'estsalud.nombre_estsalud AS FICHA_ESTABLECIMIENTO',
            'form_seguimiento_promotor_saluds.TiempoEesLocalidad AS FICHA_TIEMPOEESLOCALIDAD',
            'form_seguimiento_promotor_saluds.TiempoLocalidadEess AS FICHA_TIEMPOLOCALIDADESS',
            'medios_transportes.nombre_medio AS FICHA_MEDIOTRANSPORTE',
            'form_seguimiento_promotor_saluds.FechaVisita1 AS FICHA_VISITA',
            'form_seguimiento_promotor_saluds.NombreTcsVisita1 as FICHA_DNI_ACS_VISITA',
            'tcs.nombre_tcs as FICHA_NOMBRE_ACS_VISITA',
            'form_seguimiento_promotor_saluds.CodigoTcsVisita1 AS FICHA_CODIGO_ACS',
            'form_seguimiento_promotor_saluds.NombreTsVisita1 AS FICHA_NOMBRE_TS',
            'form_seguimiento_promotor_saluds.CodigoHisTsVisita1 AS FICHA_CODIGO_HIS_TS',
            'form_seguimiento_promotor_saluds.NumeroVisita AS FICHA_NUMERO_VISITA',
            'form_seguimiento_promotor_saluds.user AS USUARIO',
            'formps_hoja2stocks.unidades1 AS UNIDADES',
            'formps_hoja2stocks.fecha1 AS FECHA_VCMTO',
            'competencias.nombre_competencia AS ACTIVIDAD'
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
            'UNIDADES',
            'FECHA_VCMTO',
            'ACTIVIDAD'
       ];
    }
    
}
