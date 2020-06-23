<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::all();
        return response()->json(['data' => $admin],200);
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
  
          
         // $pacientePerfil = $request->id_user;
    
          if($idPerfil == 2){
              $campos = $request->all();
              $campos['id_user'] = $ultimoUser;
              $rules = [
               'id_user' => 'required|unique:admins'
              ];
              $admins = Admin::create($campos);
              return response()->json(['data' => $admins], 201);
  
          }else{
              return response()->json(['data' => 'el perfil de usuario no corresponde  : ' . $idPerfil]) ;
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
