<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
        $campos = $request->all();
        
        $rol = $campos['id_perfil'];

        // switch ($rol){
        //     case "1";
        //     return "perfil 1";
        //     break;

        //     case "2";
        //     return "perfil 2";
        //     break;

        //     case "3";
        //     return "perfil 3";
        //     break;
        // } 
        
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
        
        $this->validate($request, $rules);
        
        $campos['password']=bcrypt($request->password);
        

        $usuario = User::create($campos);
        $idUser = $usuario->id;
        

       $createAdmin = $this->createAdmin($idUser); 

      

         
        
        return response()->json(['data'=> $usuario],201);
    }

   private function createAdmin($idUser){
   

    $rules = [
        'id_user' => 'required|unique:admins'
       ];
   }
}
