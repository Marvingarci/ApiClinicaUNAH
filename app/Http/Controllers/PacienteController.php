<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::get();
        echo json_encode($pacientes);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Procesar la entrada (validadiones)
        /*$validatedData = $request->validate([
            'primerApellido' => 'required',
            'segundoApellido' => 'nullable',
            'primerNombre' => 'required',
            'segundoNombre' => 'nullable',
            'numeroCuenta' => 'required',
            'numeroIdentidad' => 'required',
            'direccion' => 'required',
            'carrera' => 'required',
            'lugarProcedencia' => 'required',
            'fechaNacimiento' => 'required',
            'sexo' => 'required',
            'estadoCivil' => 'required',
            'numeroTelefono' => 'required',
            'emergenciaTelefono' => 'required',
            'seguroMedico' => 'required',


        ],[
            '.required' => 'El campo es obligatorio'
        ]);*/

        $paciente = new Paciente();
        $paciente->primer_apellido = $request->input(['primer_apellido']);
        $paciente->segundo_apellido = $request->input(['segundo_apellido']);
        $paciente->primer_nombre = $request->input(['primer_nombre']);
        $paciente->segundo_nombre = $request->input(['segundo_nombre']);
        $paciente->numero_cuenta = $request->input(['numero_cuenta']);
        $paciente->numero_identidad = $request->input(['numero_identidad']);
        $paciente->direccion = $request->input(['direccion']);
        $paciente->carrera = $request->input(['carrera']);
        $paciente->lugar_procedencia = $request->input(['lugar_procedencia']);
        $paciente->fecha_nacimiento = $request->input(['fecha_nacimiento']);
        $paciente->sexo = $request->input(['sexo']);
        $paciente->estado_civil = $request->input(['estado_civil']);
        $paciente->numero_telefono = $request->input(['numero_telefono']);
        $paciente->emergencia_telefono = $request->input(['emergencia_telefono']);
        $paciente->seguro_medico = $request->input(['seguro_medico']);
        $paciente->save();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
