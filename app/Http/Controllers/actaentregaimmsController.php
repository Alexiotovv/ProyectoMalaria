<?php
namespace App\Http\Controllers;
use App\Models\actaentregaimms;
use App\Models\objetivo;
use App\Models\actividades;
use Illuminate\Http\Request;
use DB;

class actaentregaimmsController extends Controller
{
    public function ActaEntregadeIMM()
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

        return view('acta_registrar_imm',
        ['dpto'=>$dpto,'prov'=>$prov,'dist'=>$dist]);
    }

    public function ListarActaEntregaIMM(){
        $actas_entrega_imm = actaentregaimms::
        leftjoin('dptos','dptos.id','=','actaentregaimms.DepartamentoId')
        ->leftjoin('provs','provs.id','=','actaentregaimms.ProvinciaId')
        ->leftjoin('dists','dists.id','=','actaentregaimms.DistritoId')
        ->select('actaentregaimms.id as idacta','actaentregaimms.*','dptos.*','provs.*','dists.*','dptos.id as iddpto','provs.id as idprov','dists.id as iddist')
        ->get();

        return datatables()->of($actas_entrega_imm)->toJson();

    }

    public function GrabarActaEntregaIMM(Request $request){
        $obj = new actaentregaimms();
        $obj->DepartamentoId=request('Departamento');
        $obj->ProvinciaId=request('Provincia');
        $obj->DistritoId=request('Distrito');
        $obj->Localidad=request('Localidad');
        $obj->NombreTCS=request('NombreTCS');        
        $obj->Comunidad=request('Comunidad');
        $obj->NombreESS=request('NombreESS');
        $obj->TiempoHorasESS=request('Tiempo');
        $obj->IMM=request('IMM');
        $obj->Cantidad=request('Cantidad');
        $obj->DNI=request('DNI');
        $obj->Fecha=request('Fecha');
        $obj->save();
        $data=['Mensaje'=>'Actualizado'];
        return response()->json($data);

    }
    public function EditarActaEntregaIMM($id)
    {
        $lista=DB::table('actaentregaimms')
        ->leftjoin('dptos','dptos.id','=','actaentregaimms.DepartamentoId')
        ->leftjoin('provs','provs.id','=','actaentregaimms.ProvinciaId')
        ->leftjoin('dists','dists.id','=','actaentregaimms.DistritoId')
        ->select('actaentregaimms.id as idacta','actaentregaimms.*',
        'dptos.id as dptoId','provs.id as provId','dists.id as distId')
        ->where('actaentregaimms.id','=',$id)
        ->get();
        return response()->json($lista);
    }

    public function ActualizarActaEntregaIMM(Request $request){
        $id = request('editId'); //capturamos el id del inputext
        $obj = actaentregaimms::findOrFail($id);        
        $obj->DepartamentoId = request('editDepartamento');
        $obj->ProvinciaId = request('editProvincia');
        $obj->DistritoId = request('editDistrito');
        $obj->Localidad = request('editLocalidad');
        $obj->NombreTCS = request('editNombreTCS');
        $obj->Comunidad = request('editComunidad');
        $obj->NombreESS = request('editNombreESS');
        $obj->TiempoHorasESS = request('editTiempo');
        $obj->IMM = request('editIMM');
        $obj->Cantidad = request('editCantidad');
        $obj->DNI = request('editDNI');
        $obj->Fecha = request('editFecha');
        $obj->save();
        $data=['Mensaje'=>'Actualizado'];
        return response()->json($data);
    }

    public function EliminarActaEntregaIMM(Request $request)
    {
        $id = request('borrarid');

        $obj = actaentregaimms::find($id);
        $obj->delete();
        return redirect()->route('ListarActaEntregaIMM');
    }


}
