<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Paciente;
use App\User;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return response()->json(['data'=> $pacientes], 200);
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
 
        $ultimoUser = User::latest('id')->value('id');
      //  dd($ultimoUser);

        $idPerfil = User::where('id', $ultimoUser)->value('id_perfil');

        
        $pacientePerfil = $request->id_user;
  
        if($idPerfil == 2){
            $campos = $request->all();
            $campos['id_user'] = $ultimoUser;
            $rules = [
             'id_user' => 'required|unique:pacientes'
            ];
            $paciente = Paciente::create($campos);
            return response()->json(['data' => $paciente], 201);

        }else{
            return response()->json(['data' => 'el perfil de usuario no corresponde  : ' . $idPerfil]) ;
        }
       
         
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {

     
        return response()->json(['data' => $paciente],201);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
