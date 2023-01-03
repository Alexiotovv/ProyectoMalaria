<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class EntregaMosquiteros implements FromCollection,WithHeadings
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

        $obj=DB::table("formmosquiteros")
        ->select('formmosquiteros.*')
        ->leftjoin('provs','provs.id','=','formmosquiteros.Provincia')
        ->leftjoin('dists','dists.id','=','formmosquiteros.Distrito')
        ->leftjoin('formpersonamqs','formpersonamqs.formmosquiterosId','=','formmosquiteros.id')
        ->leftjoin('formlistaentregamosqs','formlistaentregamosqs.formpersonamqsId','=','formpersonamqs.id')
        ->select(
            'formmosquiteros.id AS ID',
            'formmosquiteros.Codigo AS CODIGO',
            'provs.nombre_prov AS PROVINCIA',
            'dists.nombre_dist AS DISTRITO',
            'formmosquiteros.Localidad AS LOCALIDAD',
            'formmosquiteros.fecha_entrega AS FECHA_ENTREGA',
            'formmosquiteros.eess_cercano AS EESS_CERCANO',
            'formmosquiteros.tiempo_eesscercano AS TIEMPO_ESSCERCANO',
            'formmosquiteros.eess_cercano_microscopio AS EESS_EESCERCANO_MIC',
            'formmosquiteros.tiempo_eesscercano_microscopio AS TIEMPO_EESCERCANO_MIC',
            'formmosquiteros.Responsable AS RESONSABLE',
            'formmosquiteros.user AS USUARIO',
            'formpersonamqs.dni AS DNI',
            'formpersonamqs.nombres AS NOMBRES',
            'formpersonamqs.apellidos AS APELLIDOS',
            'formpersonamqs.numero_personas AS N°_PERSONAS',
            'formpersonamqs.mq_noimpregnados_tamano AS N°_MOSQ_ANTES_ENTREGA_NO_IMPREG.',
            'formpersonamqs.mq_noimpregnados_estado AS ESTADO_ANTES_ENTREGA_NO_IMPREG',
            'formpersonamqs.mq_impregnados_tamano AS N°_MOSQ_ANTES_ENTREGA_IMPREG',
            'formpersonamqs.mq_impregnados_estado AS ESTADO_ANTES_ENTREGA_IMPREG',
            'formlistaentregamosqs.doble AS PERSONAL',
            'formlistaentregamosqs.familiar1 AS MEDIANO',
            'formlistaentregamosqs.familiar2 AS FAMILIAR_GRANDE',
            'formlistaentregamosqs.personas_usaran AS N°_UTILIZARÁN',
            'formlistaentregamosqs.nro_afiches AS N°_AFICHES',
            
        )
        ->where('formmosquiteros.user','like',$nombre)
        ->where('formmosquiteros.delete','=',0)
        ->get();
        return ($obj);
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'CODIGO',
            'PROVINCIA',
            'DISTRITO',
            'LOCALIDAD',
            'FECHA_ENTREGA',
            'EESS_CERCANO',
            'TIEMPO_ESSCERCANO',
            'EESS_EESCERCANO_MIC',
            'TIEMPO_EESCERCANO_MIC',
            'RESONSABLE',
            'USUARIO',
            'DNI',
            'NOMBRES',
            'APELLIDOS',
            'N°_PERSONAS',
            'N°_MOSQ_ANTES_ENTREGA_NO_IMPREG.',
            'ESTADO_ANTES_ENTREGA_NO_IMPREG',
            'N°_MOSQ_ANTES_ENTREGA_IMPREG',
            'ESTADO_ANTES_ENTREGA_IMPREG',
            'PERSONAL',
            'MEDIANO',
            'FAMILIAR_GRANDE',
            'N°_UTILIZARÁN',
            'N°_AFICHES',
       ];
    }
    
}
