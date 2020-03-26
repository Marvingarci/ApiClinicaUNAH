<?php

namespace App\Http\Controllers;

use App\TelefonosPacientes;
use Illuminate\Http\Request;

class TelefonosPacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telefonos_pacientes = TelefonosPacientes::get();

        return response()->json($telefonos_pacientes);
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
            'id_paciente' => 'required',
            'telefono' => ['unique:telefonos_pacientes', 'required']
        ]);

        $telefono_paciente = new TelefonosPacientes();
        $telefono_paciente->id_paciente = $datos_validados['id_paciente'];
        $telefono_paciente->telefono = $datos_validados['telefono'];
        $telefono_paciente->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TelefonosPacientes  $telefonosPacientes
     * @return \Illuminate\Http\Response
     */
    public function show(TelefonosPacientes $telefonosPacientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TelefonosPacientes  $telefonosPacientes
     * @return \Illuminate\Http\Response
     */
    public function edit(TelefonosPacientes $telefonosPacientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TelefonosPacientes  $telefonosPacientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TelefonosPacientes $telefonosPacientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TelefonosPacientes  $telefonosPacientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(TelefonosPacientes $telefonosPacientes)
    {
        //
    }
}
