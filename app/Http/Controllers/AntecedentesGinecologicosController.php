<?php

namespace App\Http\Controllers;

use App\antecedentesGinecologicos;
use Illuminate\Http\Request;

class AntecedentesGinecologicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antecedentes_ginecologicos = antecedentesGinecologicos::get();
        echo json_encode($antecedentes_ginecologicos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $antecedente_ginecologico = new antecedentesGinecologicos();
        $antecedente_ginecologico->edad_inicio_menstruacion = $request->input(['edad_inicio_menstruacion']);
        $antecedente_ginecologico->fum = $request->input(['fum']);
        $antecedente_ginecologico->citologia = $request->input(['citologia']);
        $antecedente_ginecologico->fecha_citologia = $request->input(['fecha_citologia']);
        $antecedente_ginecologico->resultado_citologia = $request->input(['resultado_citologia']);
        $antecedente_ginecologico->duracion_ciclo_menstrual = $request->input(['duracion_ciclo_menstrual']);
        $antecedente_ginecologico->periocidad_ciclo_menstrual = $request->input(['periocidad_ciclo_menstrual']);
        $antecedente_ginecologico->caracteristicas_ciclo_menstrual = $request->input(['caracteristicas_ciclo_menstrual']);
        $antecedente_ginecologico->id_paciente = $request->input(['id_paciente']);

        $antecedente_ginecologico->save();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\antecedentesGinecologicos  $antecedentesGinecologicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, antecedentesGinecologicos $antecedentesGinecologicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\antecedentesGinecologicos  $antecedentesGinecologicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(antecedentesGinecologicos $antecedentesGinecologicos)
    {
        //
    }
}
