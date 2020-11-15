<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Admin;
use App\Administrativo;
use App\Cliente;
use App\Paciente;

class UserController extends Controller
{

    public function all(){

        $users = User::all();
        return response()->json(['data'=> $users],201);
    }

    public function pacientes(){
       
        $pacientes = Paciente::all();
     
        return response()->json(['data'=> $pacientes],201);

    }

    private function createProfile($usuario, $request){

        $profile = $request->id_perfil;
        $idUser = [
            "id_user" => strval($usuario)
        ];
     
        switch ($profile){
            case "1";
                $admins = Admin::create($idUser);             
            break;

            case "2";
                $administrativo = Administrativo::create($idUser);               
            break;

            case "3";
                $cliente = $this->createCLiente($idUser, $request);
            break;

            case "4";
                $paciente = $this->createPaciente($idUser, $request);
            break;
        } 
    }

    private function createPaciente($idUser, $request){

        $campos = $request->all();
        $campos['id_user'] = strval($idUser['id_user']); 
        
        $cliente = Paciente::create($campos);
    }

    private function createCLiente($idUser, $request){

        $campos = $request->all();
        $campos['id_user'] = strval($idUser['id_user']); 
        
        $cliente = Cliente::create($campos);
    }

    private function validations($request){

        $perfil = $request->id_perfil;
        $validation = $this->validateUser($request);
        if ($validation->fails()) {
            return "error validacion usuario";
        }

        switch($perfil){

            case "3";
                $validation = $this->validateCliente($request);
                if ($validation->fails()) {
                    return "error validacion cliente";
                }
            break;

            case "4";
                $validation = $this->validatePaciente($request);
                if ($validation->fails()) {
                    return "error validacion paciente";
                }
            break;
        };

        return $validation ;
    }

    public function createUser(Request $request){      

        $validation = $this->validations($request);
        
        if (is_string($validation) )  {
            return $validation;
        }
        
        $campos = $request->all();
         
        $campos['password']=bcrypt($request->password);
        $usuario = User::create($campos);

        $createProfile = $this->createProfile($usuario->id, $request);
          
        return response()->json(['data'=> $usuario],201);
    }

    private function validatePaciente($request){
   
        $rules = [
            'observaciones' => 'required',
            'fecha_ingreso' => 'required'
        ];
        return $validator = Validator::make($request->all(), $rules);
    }

    private function validateCliente($request){

        $rules = [
            'actividad_fisica' => 'required',
            'objetivo'=> 'required',
            'enfermedades'=> 'required',
            'alergias'=> 'required',
            'contacto_emergencia'=> 'required',
            'fono_contacto_eme'=> 'required',
            'fecha_ingreso'=> 'required',
            'observaciones'=> 'required',
            'id_subplan'=> 'required',
            
        ];
    
        return $validator = Validator::make($request->all(), $rules);
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
