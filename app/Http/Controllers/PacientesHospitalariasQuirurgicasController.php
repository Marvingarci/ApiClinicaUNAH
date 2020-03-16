<?php

namespace App\Http\Controllers;

use App\PacientesHospitalariasQuirurgicas;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

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

    public function obtenerhospitalarias_quirurgicas($id_paciente){
        $paciente_hospitalarias_quirurgicas = DB::select('SELECT  id_hospitalaria_quirurgica, fecha, tiempo_hospitalizacion,       diagnostico,
        tratamiento FROM pacientes_hospitalarias_quirurgicas
         WHERE id_paciente = ?;', [$id_paciente]);

        echo json_encode($paciente_hospitalarias_quirurgicas);
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
    public function destroy( $pacientesHospitalariasQuirurgicas)
    {
        DB::table('pacientes_hospitalarias_quirurgicas')->where('id_hospitalaria_quirurgica', $pacientesHospitalariasQuirurgicas)->delete(); 
    }
}
