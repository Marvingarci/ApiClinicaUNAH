<?php

namespace App\Http\Controllers;

use App\PacientesAntecedentesPersonales;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;


class PacientesAntecedentesPersonalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pacientes_antecedentes_personales = DB::table('pacientes')
            ->join('pacientes_antecedentes_personales',
             'pacientes.id_paciente', '=', 'pacientes_antecedentes_personales.id_paciente')
            ->join('enfermedades', 'enfermedades.id_enfermedad', '=', 'pacientes_antecedentes_personales.id_enfermedad')
            
            ->select(
                'pacientes.id_paciente',
                'enfermedades.enfermedad',
                'observacion'
                )
            ->get();

        echo json_encode($pacientes_antecedentes_personales);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente_antecedente_personal = new PacientesAntecedentesPersonales();
        $paciente_antecedente_personal->id_paciente = $request->input(['id_paciente']);
        $paciente_antecedente_personal->id_enfermedad = $request->input(['id_enfermedad']);
        $paciente_antecedente_personal->observacion = $request->input(['observacion']);

        $paciente_antecedente_personal->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PacientesAntecedentesPersonales  $pacientesAntecedentesPersonales
     * @return \Illuminate\Http\Response
     */
    public function show(PacientesAntecedentesPersonales $pacientesAntecedentesPersonales, $id_paciente)
    {
        $paciente_antecedente_personal = DB::table('pacientes')
            ->join('pacientes_antecedentes_personales',
             'pacientes.id_paciente', '=', 'pacientes_antecedentes_personales.id_paciente')
            ->join('enfermedades', 'enfermedades.id_enfermedad', '=', 'pacientes_antecedentes_personales.id_enfermedad')
            ->where('pacientes.id_paciente', $id_paciente)
            
            ->select(
                'pacientes.id_paciente',
                'enfermedades.enfermedad',
                'observacion'
                )
            ->first();

        echo json_encode($paciente_antecedente_personal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PacientesAntecedentesPersonales  $pacientesAntecedentesPersonales
     * @return \Illuminate\Http\Response
     */
    public function edit(PacientesAntecedentesPersonales $pacientesAntecedentesPersonales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PacientesAntecedentesPersonales  $pacientesAntecedentesPersonales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacientesAntecedentesPersonales $pacientesAntecedentesPersonales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PacientesAntecedentesPersonales  $pacientesAntecedentesPersonales
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacientesAntecedentesPersonales $pacientesAntecedentesPersonales)
    {
        //
    }
}