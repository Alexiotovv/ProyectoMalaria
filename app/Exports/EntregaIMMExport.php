<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class EntregaIMMExport implements FromCollection,WithHeadings
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

        $obj=DB::table("actaentregaimms")
        ->select('actaentregaimms.*')
        ->leftjoin('provs','provs.id','=','actaentregaimms.ProvinciaId')
        ->leftjoin('dists','dists.id','=','actaentregaimms.DistritoId')
        ->leftjoin('tcs','actaentregaimms.DNI','=','tcs.dni_tcs')
        ->select(
            'actaentregaimms.id as ID',
            'provs.nombre_prov as PROVINCIA',
            'dists.nombre_dist as DISTRITO',
            'actaentregaimms.DNI as DNI_ACS',
            'tcs.nombre_tcs as NOMBRE_ACS',
            'actaentregaimms.localidad as LOCALIDAD',
            'actaentregaimms.Comunidad as COMUNIDAD',
            'actaentregaimms.NombreESS as NOMBRE_ESTABLECIMIENTO',
            'actaentregaimms.TiempoHorasESS as TIEMPO_HORA_ESS',
            'actaentregaimms.IMM as MATERIAL',
            'actaentregaimms.Cantidad as CANTIDAD',
            'actaentregaimms.Fecha as FECHA',
            'actaentregaimms.user as USUARIO',
            
        )
        ->where('actaentregaimms.user','like',$nombre)
        ->get();
        return ($obj);
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'PROVINCIA',
            'DISTRITO',
            'DNI_ACS',
            'NOMBRE_ACS',
            'LOCALIDAD',
            'COMUNIDAD',
            'NOMBRE_ESTABLECIMIENTO',
            'TIEMPO_HORA_ESS',
            'MATERIAL',
            'CANTIDAD',
            'FECHA',
            'USUARIO',
       ];
    }
    
}
