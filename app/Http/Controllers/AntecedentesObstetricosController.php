<?php

namespace App\Http\Controllers;

use App\antecedentesObstetricos;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;


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
        $antecedente_obstetrico->partos = $request->input(['partos']);
        $antecedente_obstetrico->abortos = $request->input(['abortos']);
        $antecedente_obstetrico->cesarias = $request->input(['cesarias']);
        $antecedente_obstetrico->hijos_vivos = $request->input(['hijos_vivos']);
        $antecedente_obstetrico->hijos_muertos = $request->input(['hijos_muertos']);
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
    public function update(Request $request, $id_paciente)
    {
        $partos = $request->input(['partos']);
        $abortos = $request->input(['abortos']);
        $cesarias = $request->input(['cesarias']);
        $hijos_vivos = $request->input(['hijos_vivos']);
        $hijos_muertos = $request->input(['hijos_muertos']);
        $fecha_termino_ult_embarazo = $request->input(['fecha_termino_ult_embarazo']);
        $descripcion_termino_ult_embarazo = $request->input(['descripcion_termino_ult_embarazo']);
        $observaciones = $request->input(['observaciones']);

        DB::table('antecedentes_obstetricos')
        ->where('id_paciente', $id_paciente)
        ->update([

            'partos'=> $partos,
            'abortos' => $abortos,
            'cesarias' => $cesarias, 
            'hijos_vivos' => $hijos_vivos,
            'hijos_muertos' => $hijos_muertos,
            'fecha_termino_ult_embarazo' => $fecha_termino_ult_embarazo,
            'descripcion_termino_ult_embarazo' => $descripcion_termino_ult_embarazo,
            'observaciones' => $observaciones,
            

        ]);

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
