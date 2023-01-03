<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class AsistCapacACS implements FromCollection,WithHeadings
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

        $obj=DB::table("asistenciaacs")
        ->select('asistenciaacs.*')
        ->leftjoin('asistenciaacs_nombres','asistenciaacs_nombres.idAsistencia','=','asistenciaacs.id')
        ->leftjoin('estsalud','estsalud.id','=','asistenciaacs.ts_estsaludId')
        ->leftjoin('tcs','tcs.id','=','asistenciaacs_nombres.idACS')
        ->select(
            'asistenciaacs.ts_NombreCapacitacion AS NOMBRE_CAPACITACIÓN',
            'asistenciaacs.ts_Fecha AS FECHA',
            'asistenciaacs.ts_FechaFinal AS FECHA_FINAL',
            'estsalud.nombre_estsalud AS EST_SALUD',
            'asistenciaacs.user AS USUARIO',
            'tcs.nombre_tcs AS NOMBRE ACS ',
            'ts_ComunidadProcedencia AS COMUNIDAD_PROCEDENCIA',
            'ts_ESSCercano AS ESS_MAS_CERCANO',
            'ts_FechaAsistencia AS FECHA_ASISTENCIA',
            'ts_responsable_cap AS RESPONSABLE_CAPACITACIÓN',
            
        )
        ->where('asistenciaacs.user','like',$nombre)
        ->get();
        return ($obj);
    }
    
    public function headings(): array
    {
        return [
            'NOMBRE_CAPACITACIÓN',
            'FECHA',
            'FECHA_FINAL',
            'EST_SALUD',
            'USUARIO',
            'NOMBRE ACS ',
            'COMUNIDAD_PROCEDENCIA',
            'ESS_MAS_CERCANO',
            'FECHA_ASISTENCIA',
            'RESPONSABLE_CAPACITACIÓN',
       ];
    }
    
}
