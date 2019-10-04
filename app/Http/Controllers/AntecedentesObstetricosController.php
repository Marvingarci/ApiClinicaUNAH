<?php

namespace App\Http\Controllers;

use App\antecedentesObstetricos;
use Illuminate\Http\Request;

class AntecedentesObstetricosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $antecedentes_obstetricos = antecedentesObstetricos::get();
        echo json_encode($antecedentes_obstetricos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $antecedente_obstetrico = new antecedentesObstetricos();
        $antecedente_obstetrico->fecha_termino_ult_embarazo = $request->input(['fecha_termino_ult_embarazo']);
        $antecedente_obstetrico->descripcion_termino_ult_embarazo = $request->input(['descripcion_termino_ult_embarazo']);
        $antecedente_obstetrico->observaciones = $request->input(['observaciones']);
        $antecedente_obstetrico->id_paciente = $request->input(['id_paciente']);

        $antecedente_obstetrico->save();
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\antecedentesObstetricos  $antecedentesObstetricos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, antecedentesObstetricos $antecedentesObstetricos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\antecedentesObstetricos  $antecedentesObstetricos
     * @return \Illuminate\Http\Response
     */
    public function destroy(antecedentesObstetricos $antecedentesObstetricos)
    {
        //
    }
}
