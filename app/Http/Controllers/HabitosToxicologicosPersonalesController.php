<?php

namespace App\Http\Controllers;

use App\habitosToxicologicosPersonales;
use Illuminate\Http\Request;

class HabitosToxicologicosPersonalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitosToxicologicosPersonales = habitosToxicologicosPersonales::get();
        echo json_encode($habitosToxicologicosPersonales);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $habito_toxicologico_personal = new habitosToxicologicosPersonales();
       $habito_toxicologico_personal->alcohol = $request->input(['alcohol']);
       $habito_toxicologico_personal->observacion_alcohol = $request->input(['observacion_alcohol']);
       $habito_toxicologico_personal->tabaquismo = $request->input(['tabaquismo']);
       $habito_toxicologico_personal->observacion_tabaquismo = $request->input(['observacion_tabaquismo']);
       $habito_toxicologico_personal->marihuana = $request->input(['marihuana']);
       $habito_toxicologico_personal->observacion_marihuana = $request->input(['observacion_marihuana']);
       $habito_toxicologico_personal->cocaina = $request->input(['cocaina']);
       $habito_toxicologico_personal->observacion_cocaina = $request->input(['observacion_cocaina']);
       $habito_toxicologico_personal->otros = $request->input(['otros']);
       $habito_toxicologico_personal->observacion_otros = $request->input(['observacion_otros']);
       $habito_toxicologico_personal->id_paciente = $request->input(['id_paciente']);

       $habito_toxicologico_personal->save();
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\habitosToxicologicosPersonales  $habitosToxicologicosPersonales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, habitosToxicologicosPersonales $habitosToxicologicosPersonales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\habitosToxicologicosPersonales  $habitosToxicologicosPersonales
     * @return \Illuminate\Http\Response
     */
    public function destroy(habitosToxicologicosPersonales $habitosToxicologicosPersonales)
    {
        //
    }
}
