<?php

namespace App\Http\Controllers;

use App\Antecedentes;
use database\funciones\insertarAntecedente;
use Illuminate\Support\facades\DB;
use Illuminate\Http\Request;

// include 'database/funciones/insertarAntecedente';

class AntecedentesController extends Controller
{

    protected $insertarAntecedente;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antecedentes = Antecedentes::get();
        echo json_encode($antecedentes);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $antecedente = new Antecedentes();


        // $antecedente->antecedente = $request->input('antecedente');
        // $antecedente->save();

        $insertarAntecedente = new insertarAntecedente();
        $antecedente = $request->input('antecedente');

        $id_antecedente = $insertarAntecedente->ejecutar($antecedente);

        echo json_encode($id_antecedente);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Antecedentes  $antecedentes
     * @return \Illuminate\Http\Response
     */
    public function show(Antecedentes $antecedentes)
    {
        
    }


    public function obtenerUltimoIdAntecedente(){

        $id = DB::table('antecedentes')->max('id_antecedente');
        
        echo json_encode($id);

    }


    // public function insertar(Request $request){

    //     $insertarAntecedente = new insertarAntecedente();
    //     $antecedente = $request->input('antecedente');
    //     $id_antecedente = $insertarAntecedente->ejecutar($antecedente);

    //     echo json_encode($id_antecedente);

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Antecedentes  $antecedentes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Antecedentes $antecedentes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Antecedentes  $antecedentes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Antecedentes $antecedentes)
    {
        //
    }
}
