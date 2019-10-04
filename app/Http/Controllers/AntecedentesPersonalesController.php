<?php

namespace App\Http\Controllers;

use App\antecedentes_personales;
use App\antecedentesPersonales;
use Illuminate\Http\Request;

class AntecedentesPersonalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $antecedentes_personales = antecedentesPersonales::get();
       echo json_encode($antecedentes_personales);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $antecedente_personales = new antecedentesPersonales();
        $antecedente_personales->diabetes = $request->input(['diabetes']);
        $antecedente_personales->observacion_diabetes = $request->input(['observacion_diabetes']);
        $antecedente_personales->tb_pulmonar = $request->input(['tb_pulmonar']);
        $antecedente_personales->observacion_tb_pulmonar = $request->input(['observacion_tb_pulmonar']);
        $antecedente_personales->its = $request->input(['its']);
        $antecedente_personales->observacion_its = $request->input(['observacion_its']);
        $antecedente_personales->desnutricion = $request->input(['desnutricion']);
        $antecedente_personales->observacion_desnutricion = $request->input(['observacion_desnutricion']);
        $antecedente_personales->enfermedades_mentales = $request->input(['enfermedades_mentales']);
        $antecedente_personales->observacion_enfermedades_mentales = $request->input(['observacion_enfermedades_mentales']);
        $antecedente_personales->convulciones = $request->input(['convulciones']);
        $antecedente_personales->observacion_convulciones = $request->input(['observacion_convulciones']);
        $antecedente_personales->alergias = $request->input(['alergias']);
        $antecedente_personales->observacion_alergias = $request->input(['observacion_alergias']);
        $antecedente_personales->cancer = $request->input(['cancer']);
        $antecedente_personales->observacion_cancer = $request->input(['observacion_cancer']);
        $antecedente_personales->hospitalarias_quirurgicas = $request->input(['hospitalarias_quirurgicas']);
        $antecedente_personales->observacion_hospitalarias_quirurgicas = $request->input(['observacion_hospitalarias_quirurgicas']);
        $antecedente_personales->traumaticos = $request->input(['traumaticos']);
        $antecedente_personales->observacion_traumaticos = $request->input(['observacion_traumaticos']);
        $antecedente_personales->otros = $request->input(['otros']);
        $antecedente_personales->observacion_otros = $request->input(['observacion_otros']);
        $antecedente_personales->id_paciente = $request->input(['id_paciente']);

        $antecedente_personales->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\antecedentes_personales  $antecedentes_personales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, antecedentes_personales $antecedentes_personales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\antecedentes_personales  $antecedentes_personales
     * @return \Illuminate\Http\Response
     */
    public function destroy(antecedentes_personales $antecedentes_personales)
    {
        //
    }
}
