<?php

namespace App\Http\Controllers;

use App\PacientesHospitalariasQuirurgicas;
use Illuminate\Http\Request;

class PacientesHospitalariasQuirurgicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitalarias_quirurgicas = PacientesHospitalariasQuirurgicas::get();

        echo json_encode($hospitalarias_quirurgicas);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hospitalaria_quirurgica = new PacientesHospitalariasQuirurgicas();
        $hospitalaria_quirurgica->id_paciente = $request->input(['id_paciente']);
        $hospitalaria_quirurgica->fecha = $request->input(['fecha']);
        $hospitalaria_quirurgica->tiempo_hospitalizacion = $request->input(['tiempo_hospitalizacion']);
        $hospitalaria_quirurgica->diagnostico = $request->input(['diagnostico']);
        $hospitalaria_quirurgica->tratamiento = $request->input(['tratamiento']);

        $hospitalaria_quirurgica->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PacientesHospitalariasQuirurgicas  $pacientesHospitalariasQuirurgicas
     * @return \Illuminate\Http\Response
     */
    public function show(PacientesHospitalariasQuirurgicas $pacientesHospitalariasQuirurgicas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PacientesHospitalariasQuirurgicas  $pacientesHospitalariasQuirurgicas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacientesHospitalariasQuirurgicas $pacientesHospitalariasQuirurgicas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PacientesHospitalariasQuirurgicas  $pacientesHospitalariasQuirurgicas
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacientesHospitalariasQuirurgicas $pacientesHospitalariasQuirurgicas)
    {
        //
    }
}
