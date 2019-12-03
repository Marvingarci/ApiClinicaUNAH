<?php

namespace App\Http\Controllers;

use App\HabitosToxicologicos;
use database\funciones\insertarHabito;
use Illuminate\Support\facades\DB;

use Illuminate\Http\Request;

class HabitosToxicologicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habito_toxicologicos = HabitosToxicologicos::get();

        echo json_encode($habito_toxicologicos);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertarHabito = new insertarHabito();
        $habito_toxicologico = $request->input('habito_toxicologico');

        $id_habito_toxicologico = $insertarHabito->ejecutar($habito_toxicologico);

        echo json_encode($id_habito_toxicologico);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HabitosToxicologicos  $habitosToxicologicos
     * @return \Illuminate\Http\Response
     */
    public function show(HabitosToxicologicos $habitosToxicologicos)
    {
        //
    }


    public function obtenerColumnaHabitoToxicologico(){

        $habitoS_toxicologicos = DB::table('habitos_toxicologicos')->select('habito_toxicologico')->get();
        
        echo json_encode($habitoS_toxicologicos);

    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HabitosToxicologicos  $habitosToxicologicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HabitosToxicologicos $habitosToxicologicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HabitosToxicologicos  $habitosToxicologicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(HabitosToxicologicos $habitosToxicologicos)
    {
        //
    }
}
