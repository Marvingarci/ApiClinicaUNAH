<?php

namespace App\Http\Controllers;

use App\Antecedentes;
use Illuminate\Support\facades\DB;

use Illuminate\Http\Request;

class AntecedentesController extends Controller
{
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
        $antecedente = new Antecedentes();
        $antecedente->antecedente = $request->input('antecedente');
        $antecedente->save();
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

        // $id= DB::select('SELECT MAX(id_antecedente) as ultimoId FROM antecedentes');

        // echo json_encode($id);
    }

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
