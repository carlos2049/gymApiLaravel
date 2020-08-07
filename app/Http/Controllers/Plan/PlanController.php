<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
   
    public function index()
    {
        $planes = Plan::all();
        return response()->json(['data' => $planes],200);
    }

    public function store(Request $request)
    {
        $campos = $request->all();
        $rules = [
            'nombre' => 'required|unique:planes'
        ];
        $this->validate( $request , $rules );

        $planes = Plan::create($campos);

        return response()->json(['data'=> $planes],201);

    }

    public function show( $plan)
    {
        $planes = Plan::find($plan);
        return response()->json(['data'=> $planes], 201);

    }

}
