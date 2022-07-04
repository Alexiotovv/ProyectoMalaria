<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
class UserController extends Controller
{
    public function create(Request $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return json_encode(["msg" => "usuario agregado"]); 
    }

    public function verificanombre(Request $request)
    {
        $name=request('name');
        $lista=DB::table('users')
        ->select('users.*')
        ->where('users.name','=',$name)
        ->count();
        if ($lista>0) {
            $data=['estado'=>'No_disponible'];
        }else{
            $data=['estado'=>'Disponible'];
        }
        return response()->json($data);
      }

      public function verificaemail(Request $request)
      {
          $email=request('email');
          $lista=DB::table('users')
          ->select('users.*')
          ->where('users.email','=',$email)
          ->count();
          if ($lista>0) {
              $data=['estado'=>'No_disponible'];
          }else{
              $data=['estado'=>'Disponible'];
          }
          return response()->json($data);
        }
}
