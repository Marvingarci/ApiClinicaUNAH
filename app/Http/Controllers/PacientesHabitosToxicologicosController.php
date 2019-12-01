<?php

namespace App\Http\Controllers;

use App\PacientesHabitosToxicologicos;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;


class PacientesHabitosToxicologicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes_habitos_toxicologicos = DB::table('pacientes')
            ->join('pacientes_habitos_toxicologicos',
                'pacientes.id_paciente', '=', 'pacientes_habitos_toxicologicos.id_paciente')
            ->join('habitos_toxicologicos', 
                'habitos_toxicologicos.id_habito_toxicologico', '=', 'pacientes_habitos_toxicologicos.id_habito_toxicologico')
            
            ->select(
                'pacientes.id_paciente',
                'habitos_toxicologicos.habito_toxicologico',
                'observacion'
                )
            ->get();

        echo json_encode($pacientes_habitos_toxicologicos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente_habito_toxicologico = new PacientesHabitosToxicologicos();
        $paciente_habito_toxicologico->id_paciente = $request->input(['id_paciente']);
        $paciente_habito_toxicologico->id_habito_toxicologico = $request->input(['id_habito_toxicologico']);
        $paciente_habito_toxicologico->observacion = $request->input(['observacion']);

        $paciente_habito_toxicologico->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PacientesHabitosToxicologicos  $pacientesHabitosToxicologicos
     * @return \Illuminate\Http\Response
     */
    public function show(PacientesHabitosToxicologicos $pacientesHabitosToxicologicos)
    {
        //
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PacientesHabitosToxicologicos  $pacientesHabitosToxicologicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacientesHabitosToxicologicos $pacientesHabitosToxicologicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PacientesHabitosToxicologicos  $pacientesHabitosToxicologicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacientesHabitosToxicologicos $pacientesHabitosToxicologicos)
    {
        //
    }
}
