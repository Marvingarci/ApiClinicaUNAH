<?php

namespace App\Http\Controllers;

use App\antecedentesFamiliares;
use Illuminate\Http\Request;

class AntecedentesFamiliaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antecendentes_familiares = antecedentesFamiliares::get();
        echo json_encode($antecendentes_familiares);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'diabetes' => 'required',
            'tb_pulmonar' => 'required',
            'desnutricion' => 'required',
            'enfermedades_mentales' => 'required',
            'convulsiones' => 'required',
            'alcoholismo_sustancias_psicoactivas' => 'required',
            'alergias' => 'required',
            'cancer' => 'required',
            'hipertension_arterial' => 'required',
        ],[
            '.required' => 'El campo es obligatorio'
        ]);
        
        $antecedente_familiar = new antecedentesFamiliares();
        $antecedente_familiar->diabetes = $request->input(['diabetes']);
        $antecedente_familiar->observacion_diabetes = $request->input(['observacion_diabetes']);
        $antecedente_familiar->tb_pulmonar = $request->input(['tb_pulmonar']);
        $antecedente_familiar->observacion_tb_pulmonar = $request->input(['observacion_tb_pulmonar']);
        $antecedente_familiar->desnutricion = $request->input(['desnutricion']);
        $antecedente_familiar->observacion_desnutricion = $request->input(['observacion_desnutricion']);
        $antecedente_familiar->tipo_desnutricion = $request->input(['tipo_desnutricion']);
        $antecedente_familiar->enfermedades_mentales = $request->input(['enfermedades_mentales']);
        $antecedente_familiar->observacion_enfermedades_mentales = $request->input(['observacion_enfermedades_mentales']);
        $antecedente_familiar->tipo_enfermedad_mental = $request->input(['tipo_enfermedad_mental']);
        $antecedente_familiar->convulsiones = $request->input(['convulsiones']);
        $antecedente_familiar->observacion_convulsiones = $request->input(['observacion_convulsiones']);
        $antecedente_familiar->alcoholismo_sustancias_psicoactivas = $request->input(['alcoholismo_sustancias_psicoactivas']);
        $antecedente_familiar->observacion_alcoholismo_sustancias_psicoactivas = $request->input(['observacion_alcoholismo_sustancias_psicoactivas']);
        $antecedente_familiar->alergias = $request->input(['alergias']);
        $antecedente_familiar->observacion_alergias = $request->input(['observacion_alergias']);
        $antecedente_familiar->tipo_alergia = $request->input(['tipo_alergia']);
        $antecedente_familiar->cancer = $request->input(['cancer']);
        $antecedente_familiar->observacion_cancer = $request->input(['observacion_cancer']);
        $antecedente_familiar->tipo_cancer = $request->input(['tipo_cancer']);
        $antecedente_familiar->hipertension_arterial = $request->input(['hipertension_arterial']);
        $antecedente_familiar->observacion_hipertension_arterial = $request->input(['observacion_hipertension_arterial']);        
        $antecedente_familiar->otros = $request->input(['otros']);
        $antecedente_familiar->observacion_otros = $request->input(['observacion_otros']);
        $antecedente_familiar->id_paciente = $request->input(['id_paciente']);
        $antecedente_familiar->save();



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\antecedentesFamiliares  $antecedentesFamiliares
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, antecedentesFamiliares $antecedentesFamiliares)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\antecedentesFamiliares  $antecedentesFamiliares
     * @return \Illuminate\Http\Response
     */
    public function destroy(antecedentesFamiliares $antecedentesFamiliares)
    {

    }
}
