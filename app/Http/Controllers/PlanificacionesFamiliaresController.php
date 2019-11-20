<?php

namespace App\Http\Controllers;

use App\planificacionesFamiliares;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;


class PlanificacionesFamiliaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $planificaciones_familiares = DB::table('planificaciones_familiares')
        ->join('metodos_planificaciones', 'planificaciones_familiares.metodo_planificacion', '=', 'metodos_planificaciones.id_metodo_planificacion')
        
        ->select(
            'id_planificacion_familiar','planificacion_familiar', 'metodos_planificaciones.metodo_planificacion',
            'observacion_planificacion', 'id_paciente'
           
            )
        ->get();

        //$planificaciones_familiares = planificacionesFamiliares::get();
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

    public function show($id_paciente){

        $planificacion_familiar = DB::table('planificaciones_familiares')
        ->join('metodos_planificaciones', 'planificaciones_familiares.metodo_planificacion', '=', 'metodos_planificaciones.id_metodo_planificacion')
        ->where('id_paciente', $id_paciente)
        ->select(
            'id_planificacion_familiar','planificacion_familiar', 'metodos_planificaciones.metodo_planificacion',
            'observacion_planificacion', 'id_paciente'
           
            )
        ->first();

        echo json_encode($planificacion_familiar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\planificacionesFamiliares  $planificacionesFamiliares
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_paciente)
    {

        $planificacion_familiar = $request->input(['planificacion_familiar']);
        $metodo_planificacion = $request->input(['metodo_planificacion']);
        $observacion_planificacion = $request->input(['observacion_planificacion']);


        DB::table('planificaciones_familiares')
            ->where('id_paciente', $id_paciente)
            ->update([

                'planificacion_familiar'=> $planificacion_familiar,
                'metodo_planificacion' => $metodo_planificacion,
                'observacion_planificacion' => $observacion_planificacion,

            ]);
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
