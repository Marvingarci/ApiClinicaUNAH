<?php

namespace App\Http\Controllers;

use App\planificacionesFamiliares;
use Illuminate\Http\Request;

class PlanificacionesFamiliaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planificaciones_familiares = planificacionesFamiliares::get();
        echo json_encode($planificaciones_familiares);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planificacion_familiar = new planificacionesFamiliares();
        $planificacion_familiar->planificacion_familiar = $request->input(['planificacion_familiar']);
        $planificacion_familiar->metodo_planificacion = $request->input(['metodo_planificacion']);
        $planificacion_familiar->observacion_planificacion = $request->input(['observacion_planificacion']);
        $planificacion_familiar->id_paciente = $request->input(['id_paciente']);

        $planificacion_familiar->save();

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\planificacionesFamiliares  $planificacionesFamiliares
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, planificacionesFamiliares $planificacionesFamiliares)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\planificacionesFamiliares  $planificacionesFamiliares
     * @return \Illuminate\Http\Response
     */
    public function destroy(planificacionesFamiliares $planificacionesFamiliares)
    {
        //
    }
}
