<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
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
        $paciente->id_paciente = $request->input('id_paciente'); 
        $paciente->nombre_completo = $request->input('nombre_completo');
        $paciente->numero_cuenta = $request->input('numero_cuenta');
        $paciente->numero_identidad = $request->input('numero_identidad');
        $paciente->direccion = $request->input('direccion');
        $paciente->carrera = $request->input('carrera');
        $paciente->lugar_procedencia = $request->input('lugar_procedencia');
        $paciente->fecha_nacimiento = $request->input('fecha_nacimiento');
        $paciente->sexo = $request->input('sexo');
        $paciente->estado_civil = $request->input('estado_civil');
        $paciente->numero_telefono = $request->input('numero_telefono');
        $paciente->emergencia_telefono = $request->input('emergencia_telefono');
        $paciente->seguro_medico = $request->input('seguro_medico');
        $paciente->save();

        

    }

    public function ultimoID(){
        $si= DB::select('SELECT MAX(id_paciente) as ultimoId FROM pacientes');

        echo json_encode($si);
        
        
    }


    public function show($id)
    {
        //Solicitamos al modelo el Paciente con el id solicitado por GET.
        return Paciente::where('id_paciente', $id)->get();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pacienteId)
    {
        $nuevaContra = $request->input('contrasenia');

    DB::table('pacientes')
    ->where('id_paciente', $pacienteId)
    ->update(['contrasenia' => $nuevaContra]);
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
