<?php

namespace App\Http\Controllers;

use App\ActividadSexual;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;


class ActividadSexualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades_sexuales = ActividadSexual::get();
        echo json_encode($actividades_sexuales);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividad_sexual = new ActividadSexual();
        $actividad_sexual->actividad_sexual = $request->input(['actividad_sexual']);
        $actividad_sexual->edad_inicio_sexual = $request->input(['edad_inicio_sexual']);
        $actividad_sexual->numero_parejas_sexuales = $request->input(['numero_parejas_sexuales']);
        $actividad_sexual->practicas_sexuales_riesgo = $request->input(['practicas_sexuales_riesgo']);
        $actividad_sexual->id_paciente = $request->input(['id_paciente']);

        $actividad_sexual->save();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActividadSexual  $actividadSexual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_paciente)
    {
        $actividad_sexual = $request->input(['actividad_sexual']);
        $edad_inicio_sexual = $request->input(['edad_inicio_sexual']);
        $numero_parejas_sexuales = $request->input(['numero_parejas_sexuales']);
        $practicas_sexuales_riesgo = $request->input(['practicas_sexuales_riesgo']);


        DB::table('actividad_sexuals')
        ->where('id_paciente', $id_paciente)
        ->update([

            'actividad_sexual'=> $actividad_sexual,
            'edad_inicio_sexual' => $edad_inicio_sexual,
            'numero_parejas_sexuales' => $numero_parejas_sexuales, 
            'practicas_sexuales_riesgo' => $practicas_sexuales_riesgo,
            

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActividadSexual  $actividadSexual
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActividadSexual $actividadSexual)
    {
        //
    }
}
