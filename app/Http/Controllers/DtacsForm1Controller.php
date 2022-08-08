<?php

namespace App\Http\Controllers;
use App\Models\dtacsForm1;
use App\Models\dtacpacientes;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class DtacsForm1Controller extends Controller
{
    
    public function EditarformPacientedtac($id)
    {
        $data= DB::table('dtacpacientes')
        ->leftjoin('dtacs_form1s','dtacs_form1s.id','=','dtacpacientes.formdtacpacienteId')
        ->select('dtacpacientes.id as IdPaciente' ,'dtacpacientes.formdtacpacienteId as idFichaPaciente',
            'dtacpacientes.*')
        ->where('dtacpacientes.id','=',$id)
        ->get();
        return response()->json($data);
    }

    public function ListarPacientesdtacs($id){
        $lista=DB::table('dtacpacientes')
        ->leftjoin('dtacs_form1s','dtacs_form1s.id','=','dtacpacientes.formdtacpacienteId')
        ->select('dtacpacientes.id as PacienteId',
        'dtacpacientes.dni','dtacpacientes.nombres','dtacpacientes.apellidos','dtacpacientes.edad',
        'dtacpacientes.sexo','dtacpacientes.gestante','dtacpacientes.inicio_sintomas',
        'dtacpacientes.lugar_probable_infeccion','dtacpacientes.nuevo_repetidor','dtacpacientes.etnia')
        ->where('dtacpacientes.formdtacpacienteId','=',$id)
        ->get();
        
        // return response()->json($lista);
        return datatables()->of($lista)->toJson();
    }
    
    public function ListaJsonDtac(){
        $lista=DB::table('dtacs_form1s')
        ->leftjoin('dists','dists.id','=','dtacs_form1s.DistritoId')
        ->leftjoin('provs','provs.id','=','dtacs_form1s.ProvinciaId')
        ->leftjoin('dptos','dptos.id','=','dtacs_form1s.DepartamentoId')
        ->select('dtacs_form1s.id as dtacsId',
        'dtacs_form1s.id as cod',
        'dtacs_form1s.Codigo',
        'dtacs_form1s.Comunidad',
        'dptos.nombre_dpto',
        'provs.nombre_prov',
        'dists.nombre_dist',
        'dtacs_form1s.Fecha',
        'dtacs_form1s.tcsId')
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function GuardarPacientedtacs(Request $request){
        $obj = new dtacpacientes();
        
        $obj->formdtacpacienteId=request('idFichaPaciente');
        $obj->dni=request('dni_paciente');
        $obj->nombres=request('nombre_paciente');
        $obj->apellidos=request('apellido_paciente');
        $obj->edad=request('edad_paciente');
        $obj->sexo=request('genero');
        $obj->gestante=request('gestante');
        $obj->etnia=request('etnia');
        $obj->inicio_sintomas=request('inicio_sintomas');
        $obj->lugar_probable_infeccion=request('lugar_infeccion');
        $obj->nuevo_repetidor=request('nuevo_repetidor');
        $obj->save();
        $data=['mensaje'=>'Guardado'];
        return response()->json($data);
    }


    public function Listardtacs(Request $request)
    {
        $lista_dtac=DB::table('dtacs_form1s')
        ->leftjoin('dists','dists.id','=','dtacs_form1s.DistritoId')
        ->leftjoin('provs','provs.id','=','dtacs_form1s.ProvinciaId')
        ->leftjoin('dptos','dptos.id','=','dtacs_form1s.DepartamentoId')
        ->select('dtacs_form1s.id as dtacsId' ,'dtacs_form1s.Codigo','dtacs_form1s.Comunidad','dptos.nombre_dpto',
        'provs.nombre_prov','dists.nombre_dist','dtacs_form1s.*')
        ->get();

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

        $etnia=DB::table('maestro_his_etnia')
        ->select('maestro_his_etnia.*')
        ->get();

        return view ('dtac_listar',['lista_dtac'=>$lista_dtac,
        'dpto'=>$dpto,'prov'=>$prov,'dist'=>$dist,'etnia'=>$etnia]);
    }

    public function ListaRegiones($id)
    {
        $lista_regiones=DB::table('dptos')
        ->leftjoin('provs','provs.DptoId','=','dptos.id')
        ->leftjoin('dists','dists.ProvId','=','provs.id')
        ->select('dptos.id as dptoId','dptos.nombre_dpto','provs.id as provId',
        'provs.nombre_prov','dists.id as distId','dists.nombre_dist','dists.codigo')
        ->where('dists.id','=',$id)
        ->get();
        return response()->json(['lista_regiones'=>$lista_regiones]);
        // return "hay comunicación";
    }

    public function Guardardtacs(Request $request)
    {       
        $fecha = Carbon::now();
        $ultimo = DB::table('dtacs_form1s')->select("id")->latest()->first();
        $idcod=0;
        if ($ultimo){
            $idcod=$ultimo->id+1;
            $codigo='TD-'.$idcod;            
        }else{
            $codigo='TD'."1";
        }
        
        $obj= new dtacsForm1();
        $obj->Codigo=$codigo;
        
        $obj->DepartamentoID=request('DepartamentoId');
        $obj->ProvinciaId=request('ProvinciaId');
        $obj->DistritoId=request('DistritoId');
        $obj->Comunidad=request('Comunidad');
        $obj->Fecha=request('fecha');
        $obj->tcsId=request('tcsId');
        $obj->save();
        return response()->json($codigo);
        // return redirect()->route('Listar.formdtac')->with(['message'=>$codigo]);
    }

    public function Editardtacs($id)
    {
        $data= DB::table('dtacs_form1s')
        ->leftjoin('dists','dists.id','=','dtacs_form1s.DistritoId')
        ->leftjoin('provs','provs.id','=','dtacs_form1s.ProvinciaId')
        ->leftjoin('dptos','dptos.id','=','dtacs_form1s.DepartamentoId')
        ->select('dtacs_form1s.id as dtacsId' ,'dtacs_form1s.Codigo','dtacs_form1s.Comunidad','dptos.nombre_dpto',
        'dptos.id as dptoId','provs.id as provId','dists.id as distId','dtacs_form1s.comunidad',
        'provs.nombre_prov','dists.nombre_dist','dtacs_form1s.Fecha','dtacs_form1s.tcsId')
        ->where('dtacs_form1s.id','=',$id)
        ->get();
        return response()->json($data);
        
    }

    public function Actualizar(Request $request)
    {        
        $id=request("idform");
        $obj = dtacsForm1::findOrFail($id);
        $obj->Codigo = request('codigoe');
        $obj->DepartamentoId = request('departamentoe');
        $obj->ProvinciaId = request('provinciae');
        $obj->DistritoId = request('distritoe');
        $obj->tcsId = request('tcse');
        $obj->Comunidad = request('comunidade');
        $obj->Fecha = request('fechae');
        $obj->save();
        $data=['mensaje'=>'Actualizado'];
        return response()->json($data);
    }
    
    public function ActualizaPaciente(Request $request)
    {        
        $id=request("EditidPaciente");
        $obj = dtacpacientes::findOrFail($id);
        $obj->formdtacpacienteId=request('EditidFichaPaciente');
        $obj->dni=request('Editdni_paciente');
        $obj->nombres=request('Editnombre_paciente');
        $obj->apellidos=request('Editapellido_paciente');
        $obj->edad=request('Editedad_paciente');
        $obj->sexo=request('Editgenero');
        $obj->gestante=request('Editgestante');
        $obj->etnia=request('etniae');
        $obj->inicio_sintomas=request('Editinicio_sintomas');
        $obj->lugar_probable_infeccion=request('Editlugar_infeccion');
        $obj->nuevo_repetidor=request('Editnuevo_repetidor');
        $obj->save();
        $data=['mensaje'=>'Actualizado'];
        return response()->json($data);
    }
    
}
