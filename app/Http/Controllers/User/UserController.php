<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Admin;
use App\Administrativo;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json(['data'=> $users],201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($validator)
    {
        return $validator;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createUser(Request $request)
    {     
        
        $validation = $this->validateUser($request);
        if ($validation->fails()) {
            return "error de validacion";
        }
        
        $campos = $request->all();
        
        
        $perfil = $campos['id_perfil'];
             
        $campos['password']=bcrypt($request->password);
        $usuario = User::create($campos);

        $idUser = [
            "id_user" => $usuario->id
        ];
        
        switch ($perfil){
            case "1";
                $admins = Admin::create($idUser);
            break;

            case "2";
                $admins = Administrativo::create($idUser);
            break;

            case "3";
            return "perfil 3";
            break;
        } 
        
      

     
        return response()->json(['data'=> $usuario],201);
    }

    private function createAdmin($idUser){
   

        $rules = [
            'id_user' => 'required|unique:admins'
        ];
        return $validator = Validator::make($idUser, $rules);
    }



    private function validateUser($request){
           
        $rules = [
            'name' => 'required',
            'a_paterno'=> 'required',
            'a_materno'=> 'required',
            'fecha_nacimiento'=> 'required',
            'rut'=> 'required',
            'telefono'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:6|confirmed',
            'id_perfil'=> 'required',
        ];
    
        return $validator = Validator::make($request->all(), $rules);

    }
}
