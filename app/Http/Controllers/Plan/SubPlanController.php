<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\SubPlan;
use Illuminate\Http\Request;

class SubPlanController extends Controller
{
  
    public function index()
    {
        $subPlanes = SubPlan::all();
        return response()->json(['data' => $subPlanes],200);
    }

    public function store(Request $request)
    {
        $campos = $request->all();
        $rules= [
            'nombre' => 'required|unique:sub_planes',
            'valor_mensual' => 'required',
            'valor_trimestral' => 'required',
            'valor_semestral' => 'required',
            'valor_anual' => 'required',
            
        ];

        $this->validate($request, $rules);

        $subplanes = SubPlan::create($campos);
        return response()->json(['data'=> $subplanes],201);

    }
   
    public function show( $id)
    {
        $subplan = SubPlan::findOrFail($id);
        return response()->json(['data'=> $subplan], 201);
    }

}
