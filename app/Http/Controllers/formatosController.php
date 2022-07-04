<?php
namespace App\Http\Controllers;
use App\Models\objetivo;
use Illuminate\Http\Request;
use DB;

class formatosController extends Controller
{
    public function formatos(Request $request){
        $dpto=DB::table('dpto')->get(); //se comentó porque loreto no se necesita
        $prov=DB::table('prov')->get();
        $dist=DB::table('dist')->get();

        $est=DB::table('estsalud')->get();
        $formato=DB::table('formatos')->get();
        //'prov'=>$prov,'dist'=>$dist,
        return view('informe_operacional_auto',['formato'=>$formato,'est'=>$est,'dist'=>$dist,'prov'=>$prov,'dpto'=>$dpto]);

    }
}
