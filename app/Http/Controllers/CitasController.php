<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\citas;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actual = Carbon::now();

        $hoy = $actual->format('d-m-y');
        $paciente = DB::table('citas')
        ->join('remitidoa', 'citas.remitido', '=', 'remitidoa.id_seccion')
        ->join('pacientes', 'citas.id_paciente', '=', 'pacientes.id_paciente')
        //->join('sexos', 'pacientes.sexo', '=', 'sexos.id_sexos')
        ->join('categorias', 'pacientes.categoria', '=', 'categorias.id_categorias')
        ->where('fechayHora', $hoy)
        ->select(
            'pacientes.numero_cuenta','pacientes.nombre_completo','categorias.categoria','pacientes.carrera','sexo','citas.id_paciente','citas.peso', 'citas.talla','citas.imc',
            'citas.temperatura', 'citas.presion', 'citas.pulso', 'siguiente_cita',
            'observaciones', 'impresion', 'indicaciones', 'remitidoa.seccion', 'fechayHora'
            )
        ->get();

    echo json_encode($paciente);
    
    //echo json_encode($hoy);
        
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
        $citas = new citas();
        $actual = Carbon::now();
    


        $citas->id_paciente = $request->input('id_paciente'); 
        $citas->peso = $request->input('peso');
        $citas->talla = $request->input('talla');
        $citas->imc = $request->input('imc');
        $citas->temperatura = $request->input('temperatura'); 
        $citas->presion = $request->input('presion');
        $citas->pulso = $request->input('pulso');
        $citas->siguiente_cita = $request->input('siguiente_cita');
        $citas->observaciones = $request->input('observaciones');
        $citas->impresion = $request->input('impresion');
        $citas->indicaciones = $request->input('indicaciones');
        $citas->remitido = $request->input('remitido');
        $citas->fechayHora = $actual->format('d-m-y');


        $citas->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function show($id_paciente)
    {
        $paciente = DB::table('citas')
        ->join('remitidoa', 'citas.remitido', '=', 'remitidoa.id_seccion')
        //->join('categorias', 'pacientes.categoria', '=', 'categorias.id_categorias')
        ->where('id_paciente', $id_paciente)
        ->select(
            'id_paciente','peso', 'talla','imc',
            'temperatura', 'presion', 'pulso', 'siguiente_cita',
            'observaciones', 'impresion', 'indicaciones', 'remitidoa.seccion', 'fechayHora'
            )
            
        ->get();

    echo json_encode($paciente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit(citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, citas $citas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy(citas $citas)
    {
        //
    }
}
