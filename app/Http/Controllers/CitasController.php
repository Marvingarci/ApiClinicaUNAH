<?php

namespace App\Http\Controllers;

use App\Citas;
use Illuminate\Http\Request;
use DB;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $citas = Citas::get();

        $citas = DB::table('citas')
        ->join('pacientes', 'id_paciente' , '=' , 'paciente')
        ->select('id_cita', 'pacientes.nombre_completo as paciente', 'fecha','hora_cita')
        ->get();

        return response()->json($citas);

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos_validados = $request->validate([
            'fecha' => ['required', 'date'],
            'paciente' => ['required'],            
            'hora_cita' => ['required'],
        ]);

        $cita = new Citas();

        $cita->fecha = $datos_validados['fecha'];
        $cita->paciente = $datos_validados['paciente'];
        $cita->hora_cita = $datos_validados['hora_cita'];

        $cita->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function show(Citas $citas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit(Citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citas $citas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citas $citas)
    {
        //
    }
}
