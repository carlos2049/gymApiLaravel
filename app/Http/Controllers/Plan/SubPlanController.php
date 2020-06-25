<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\SubPlan;
use Illuminate\Http\Request;

class SubPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subPlanes = SubPlan::all();
        return response()->json(['data' => $subPlanes],200);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\SubPlan  $subPlan
     * @return \Illuminate\Http\Response
     */
    public function show(SubPlan $subPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubPlan  $subPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(SubPlan $subPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubPlan  $subPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubPlan $subPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubPlan  $subPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubPlan $subPlan)
    {
        //
    }
}
