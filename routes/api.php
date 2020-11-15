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


Route::post('users', 'UserController@createUser');
Route::get('pacientes', 'UserController@pacientes');


 Route::resource('planes', 'Plan\PlanController',['only' => ['index', 'store','show']]);
 Route::resource('subplanes', 'Plan\SubPlanController',['only' => ['index', 'store','show']]);
