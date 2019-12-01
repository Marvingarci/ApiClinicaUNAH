<?php

namespace App\Http\Controllers;

use App\PacientesAntecedentesFamiliares;
use Illuminate\Support\facades\DB;
use Illuminate\Http\Request;

class PacientesAntecedentesFamiliaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pacientesAntecedentesFamiliares = PacientesAntecedentesFamiliares::get();

        // echo json_encode($pacientesAntecedentesFamiliares);

        $pacientesAntecedentesFamiliares = DB::table('pacientes')
            ->join('pacientes_antecedentes_familiares',
             'pacientes.id_paciente', '=', 'pacientes_antecedentes_familiares.id_paciente')
            ->join('enfermedades', 'enfermedades.id_enfermedad', '=', 'pacientes_antecedentes_familiares.id_enfermedad')
            ->join('parentescos', 'parentescos.id_parentesco', '=', 'pacientes_antecedentes_familiares.id_parentesco')
            
            ->select(
                'pacientes.id_paciente',
                'enfermedades.enfermedad',
                'parentescos.parentesco'
                )
            ->get();

        echo json_encode($pacientesAntecedentesFamiliares);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pacienteAntecedenteFamiliar = new PacientesAntecedentesFamiliares();
        
        $pacienteAntecedenteFamiliar->id_paciente = $request->input(['id_paciente']);
        $pacienteAntecedenteFamiliar->id_enfermedad = $request->input(['id_enfermedad']);
        $pacienteAntecedenteFamiliar->id_parentesco = $request->input(['id_parentesco']);

        $pacienteAntecedenteFamiliar->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PacientesAntecedentesFamiliares  $pacientesAntecedentesFamiliares
     * @return \Illuminate\Http\Response
     */
    public function show($id_paciente)
    {
        $pacienteAntecedenteFamiliar = DB::table('pacientes')
            ->join('pacientes_antecedentes_familiares',
             'pacientes.id_paciente', '=', 'pacientes_antecedentes_familiares.id_paciente')
            ->join('enfermedades', 'enfermedades.id_enfermedad', '=', 'pacientes_antecedentes_familiares.id_enfermedad')
            ->join('parentescos', 'parentescos.id_parentesco', '=', 'pacientes_antecedentes_familiares.id_parentesco')
            ->where('pacientes.id_paciente', $id_paciente)
            
            ->select(
                'pacientes.id_paciente',
                'enfermedades.enfermedad',
                'parentescos.parentesco'
                )
            ->first();
     

        echo json_encode($pacienteAntecedenteFamiliar);
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PacientesAntecedentesFamiliares  $pacientesAntecedentesFamiliares
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacientesAntecedentesFamiliares $pacientesAntecedentesFamiliares)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PacientesAntecedentesFamiliares  $pacientesAntecedentesFamiliares
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacientesAntecedentesFamiliares $pacientesAntecedentesFamiliares)
    {
        //
    }
}
