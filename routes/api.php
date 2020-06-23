<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 Route::resource('users', 'User\UserController', ['except' => ['destroy']]);
 Route::resource('perfiles', 'User\PerfilController',['only' => ['index', 'store']]);
 Route::resource('pacientes', 'Paciente\PacienteController',['only' => ['index', 'store','show']]);
 Route::resource('admins', 'Admin\AdminController',['only' => ['index', 'store']]);
