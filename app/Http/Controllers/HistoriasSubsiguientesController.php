<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\HistoriasSubsiguientes;
use Illuminate\Http\Request;
use DB;

class HistoriasSubsiguientesController extends Controller
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

        $historias_subsiguientes = DB::table('historias_subsiguientes')
        ->join('remitidoa', 'historias_subsiguientes.remitido', '=', 'remitidoa.id_seccion')
        ->join('pacientes', 'historias_subsiguientes.id_paciente', '=', 'pacientes.id_paciente')
        ->join('categorias', 'pacientes.categoria', '=', 'categorias.id_categorias')
        ->where('fecha', $hoy)
        ->select(
            'pacientes.numero_cuenta','pacientes.nombre_completo','categorias.categoria','pacientes.carrera','sexo','historias_subsiguientes.id_paciente',
            'historias_subsiguientes.peso', 'historias_subsiguientes.talla','historias_subsiguientes.imc',
            'historias_subsiguientes.temperatura', 'historias_subsiguientes.presion_sistolica',
            'historias_subsiguientes.presion_diastolica', 'historias_subsiguientes.pulso',
            'observaciones','nombre', 'impresion', 'indicaciones', 'remitidoa.seccion', 'fecha','hora_cita', DB::raw("DATEDIFF(current_date, pacientes.fecha_nacimiento)/365 as edad")
            )
        ->get();

        return response()->json($historias_subsiguientes);

        
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
        $historia_subsiguiente = new HistoriasSubsiguientes();
        $actual = Carbon::now();
    


        $historia_subsiguiente->id_paciente = $request->input('id_paciente'); 
        $historia_subsiguiente->peso = $request->input('peso');
        $historia_subsiguiente->talla = $request->input('talla');
        $historia_subsiguiente->imc = $request->input('imc');
        $historia_subsiguiente->temperatura = $request->input('temperatura'); 
        $historia_subsiguiente->presion_sistolica = $request->input('presion_sistolica');
        $historia_subsiguiente->presion_diastolica = $request->input('presion_diastolica');
        $historia_subsiguiente->pulso = $request->input('pulso');
        // $historia_subsiguiente->siguiente_cita = $request->input('siguiente_cita');
        $historia_subsiguiente->observaciones = $request->input('observaciones');
        $historia_subsiguiente->impresion = $request->input('impresion');
        $historia_subsiguiente->indicaciones = $request->input('indicaciones');
        $historia_subsiguiente->remitido = $request->input('remitido');
        $historia_subsiguiente->fecha = $actual->format('d-m-y');
        $historia_subsiguiente->hora_cita = $request->input('hora_cita');
        $historia_subsiguiente->nombre = $request->input('nombre');

        $historia_subsiguiente->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistoriasSubsiguientes  $historia_subsiguiente
     * @return \Illuminate\Http\Response
     */
    public function show($id_paciente)
    {
        // $historia_subsiguiente = HistoriasSubsiguientes::find($id_paciente);

        // if($historia_subsiguiente->nombre == "0"){

        //     $historia_subsiguiente = DB::table('historias_subsiguientes')
        //     ->join('remitidoa', 'historias_subsiguientes.remitido', '=', 'remitidoa.id_seccion')
        //     ->where('id_paciente', $id_paciente)
        //     ->select(
        //     'id_paciente','peso', 'talla','imc',
        //     'temperatura', 'presion', 'pulso', 'siguiente_cita',
        //     'observaciones', 'impresion', 'indicaciones', 'remitidoa.seccion', 'fechayHora'
        //     )
        //     ->get();
        //     echo json_encode($historia_subsiguiente);

        // }else{        
        //     $historia_subsiguiente = DB::table('historias_subsiguientes')
        //     ->join('remitidoa', 'historias_subsiguientes.remitido', '=', 'remitidoa.id_seccion')
        //     ->join('inventarios', 'historias_subsiguientes.nombre', '=', 'inventarios.id_inventario')
        //     //->join('categorias', 'pacientes.categoria', '=', 'categorias.id_categorias')
        //     ->where('id_paciente', $id_paciente)
        //     ->select(
        //     'id_paciente','peso', 'talla','imc',
        //     'temperatura', 'presion', 'pulso', 'siguiente_cita',
        //     'observaciones', 'impresion','inventarios.nombre', 'indicaciones', 'remitidoa.seccion', 'fechayHora'
        //     )                
        //     ->get();
        //     echo json_encode($historia_subsiguiente);
        // }


        $historias_subsiguientes = DB::table('historias_subsiguientes')
        ->join('remitidoa', 'historias_subsiguientes.remitido', '=', 'remitidoa.id_seccion')
        ->join('pacientes', 'historias_subsiguientes.id_paciente', '=', 'pacientes.id_paciente')
        ->join('categorias', 'pacientes.categoria', '=', 'categorias.id_categorias')
        ->where('historias_subsiguientes.id_paciente', $id_paciente)
        ->select(
            'pacientes.numero_cuenta','pacientes.nombre_completo','categorias.categoria','pacientes.carrera','sexo','historias_subsiguientes.id_paciente',
            'historias_subsiguientes.peso', 'historias_subsiguientes.talla','historias_subsiguientes.imc',
            'historias_subsiguientes.temperatura', 'historias_subsiguientes.presion_sistolica',
            'historias_subsiguientes.presion_diastolica', 'historias_subsiguientes.pulso',
            'observaciones','nombre', 'impresion', 'indicaciones', 'remitidoa.seccion', 'fecha','hora_cita', DB::raw("DATEDIFF(current_date, pacientes.fecha_nacimiento)/365 as edad")
            )
        ->first();

        return response()->json($historias_subsiguientes);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistoriasSubsiguientes  $historia_subsiguiente
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoriasSubsiguientes $historia_subsiguiente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistoriasSubsiguientes  $historia_subsiguiente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoriasSubsiguientes $cihistoria_subsiguientetas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistoriasSubsiguientes  $cithistoria_subsiguienteas
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoriasSubsiguientes $historia_subsiguiente)
    {
        //
    }


    public function pesosPaciente($id_paciente){

        $pesos = DB::table('historias_subsiguientes')->select('peso', 'fecha')
        ->where('id_paciente', $id_paciente)
        ->orderBy('fecha', 'desc')
        ->limit(3)
        ->get();

        return response()->json($pesos);


    }

    public function todosPesosPaciente($id_paciente){

        $pesos = DB::table('historias_subsiguientes')->select('peso', 'fecha')
        ->where('id_paciente', $id_paciente)
        ->orderBy('fecha', 'desc')
        ->get();

        return response()->json($pesos);


    }

    public function pulsosPaciente($id_paciente){


        $pulsos = DB::table('historias_subsiguientes')->select('pulso', 'fecha')
        ->where('id_paciente', $id_paciente)
        ->orderBy('fecha', 'desc')
        ->limit(3)
        ->get();

        return response()->json($pulsos);


    }

    public function todosPulsosPaciente($id_paciente){

        $pulsos = DB::table('historias_subsiguientes')->select('pulso', 'fecha')
        ->where('id_paciente', $id_paciente)
        ->orderBy('fecha', 'desc')
        ->get();

        return response()->json($pulsos);


    }


    public function alturasPaciente($id_paciente){


        $alturas = DB::table('historias_subsiguientes')->select('talla', 'fecha')
        ->where('id_paciente', $id_paciente)
        ->orderBy('fecha', 'desc')
        ->limit(3)
        ->get();

        return response()->json($alturas);


    }

    public function todasAlturasPaciente($id_paciente){

        $alturas = DB::table('historias_subsiguientes')->select('talla', 'fecha')
        ->where('id_paciente', $id_paciente)
        ->orderBy('fecha', 'desc')
        ->get();

        return response()->json($alturas);


    }

    public function temperaturasPaciente($id_paciente){


        $temperaturas = DB::table('historias_subsiguientes')->select('temperatura', 'fecha')
        ->where('id_paciente', $id_paciente)
        ->orderBy('fecha', 'desc')
        ->limit(3)
        ->get();

        return response()->json($temperaturas);


    }

    public function todasTemperaturasPaciente($id_paciente){

        $temperaturas = DB::table('historias_subsiguientes')->select('temperatura', 'fecha')
        ->where('id_paciente', $id_paciente)
        ->orderBy('fecha', 'desc')
        ->get();

        return response()->json($temperaturas);


    }


    public function presionesPaciente($id_paciente){


        $presiones = DB::table('historias_subsiguientes')->select('presion_sistolica','presion_diastolica', 'fecha')
        ->where('id_paciente', $id_paciente)
        ->orderBy('fecha', 'desc')
        ->limit(3)
        ->get();

        return response()->json($presiones);


    }

    public function todasPresionesPaciente($id_paciente){

        $temperaturas = DB::table('historias_subsiguientes')->select('presion_sistolica','presion_diastolica', 'fecha')
        ->where('id_paciente', $id_paciente)
        ->orderBy('fecha', 'desc')
        ->get();

        return response()->json($temperaturas);


    }
}
