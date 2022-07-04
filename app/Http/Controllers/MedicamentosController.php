<?php

namespace App\Http\Controllers;

use App\Models\medicamentos;
use Illuminate\Http\Request;
use DB;
class MedicamentosController extends Controller
{
    public function ActualizaMedicamento(Request $request)
    {
        $id=request("idMedicamento");
        $obj = medicamentos::findOrFail($id);
        $obj->medicamento_recibido=request('editMedicamento');
        $obj->fecha=request('editFecha');
        $obj->dosis=request('editdosis');
        $obj->comp_incom=request('editcomp_incom');
        $obj->control=request('editcontrol');
        $obj->save();
        $data=['mensaje'=>'Actualizado'];
        return response()->json($data);
    }

    public function EditarMedicamento($id)
    {
        $data= DB::table('medicamentos')
        ->select('medicamentos.*')
        ->where('medicamentos.id','=',$id)
        ->get();
        return response()->json($data);
    }

    public function ListarMedicamentos($id)
    {
        $lista = DB::table('medicamentos')
        ->leftjoin('dtacpacientes','dtacpacientes.id','=','medicamentos.pacienteId')
        ->select('medicamentos.*')
        ->where('dtacpacientes.id','=',$id)
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function GuardarMedicamentos(Request $request)
    {
        $obj = new medicamentos();
        $obj->pacienteId=request('idMedicamentoPaciente');
        $obj->medicamento_recibido=request('Medicamento');
        $obj->fecha=request('Fecha');
        $obj->dosis=request('dosis');
        $obj->comp_incom=request('comp_incom');
        $obj->control=request('control');

        $obj->save();
        $data=['mensaje'=>'Guardado'];
        return response()->json($data);
    }


}
