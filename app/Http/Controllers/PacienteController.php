<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Hash;
class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
        $pacientes = DB::table('pacientes')
            ->join('estados_civiles', 'pacientes.estado_civil', '=', 'estados_civiles.id_estado_civil')
            ->join('seguros_medicos', 'pacientes.seguro_medico', '=', 'seguros_medicos.id_seguro_medico')
            //->join('sexos', 'pacientes.sexo', '=', 'sexos.id_sexos')
            ->join('categorias', 'pacientes.categoria', '=', 'categorias.id_categorias')
            ->select(
                'id_paciente','nombre_completo', 'numero_cuenta','numero_identidad',
                'imagen', 'direccion', 'carrera', 'lugar_procedencia',
                'fecha_nacimiento', 'sexo', 'estados_civiles.estado_civil', 'numero_telefono',
                'seguros_medicos.seguro_medico', 'categorias.categoria','prosene'
                )
            ->get();

        echo json_encode($pacientes);



        //convertir los id a numero
        // foreach ($pacientes as $paciente) {
        // $numero = (int)$paciente->id_paciente;
        // $paciente->id_paciente=$numero;
        // }
        


    }


    public function show($id_paciente)
    {
        //buscamos al paciente por id y mostramos solo el primer resultado para 
        //evitar problemas al momento de mandar a traer los datos en angular

        $paciente = DB::table('pacientes')
            ->join('estados_civiles', 'pacientes.estado_civil', '=', 'estados_civiles.id_estado_civil')
            ->join('seguros_medicos', 'pacientes.seguro_medico', '=', 'seguros_medicos.id_seguro_medico')
            //->join('sexos', 'pacientes.sexo', '=', 'sexos.id_sexos')
            ->join('categorias', 'pacientes.categoria', '=', 'categorias.id_categorias')
            ->where('id_paciente', $id_paciente)
            ->select(
                'id_paciente','nombre_completo', 'numero_cuenta','numero_identidad',
                'imagen', 'direccion', 'carrera', 'lugar_procedencia',
                'fecha_nacimiento', 'sexo', 'estados_civiles.estado_civil', 'numero_telefono',
                'seguros_medicos.seguro_medico', 'categorias.categoria',
                'peso', 'talla', 'imc', 'temperatura', 'presion','pulso','prosene'
                )
                
            ->first();

        echo json_encode($paciente);
    }
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // $estado_civil = $request->input('estado_civil');

        $paciente = new Paciente();
        $paciente->id_paciente = $request->input('id_paciente'); 
        $paciente->nombre_completo = $request->input('nombre_completo');
        $paciente->numero_cuenta = $request->input('numero_cuenta');
        $paciente->numero_identidad = $request->input('numero_identidad');
        $paciente->imagen = $request->input('imagen'); 
        $paciente->direccion = $request->input('direccion');
        $paciente->carrera = $request->input('carrera');
        $paciente->lugar_procedencia = $request->input('lugar_procedencia');
        $paciente->fecha_nacimiento = $request->input('fecha_nacimiento');
        $paciente->sexo = $request->input('sexo');
        $paciente->estado_civil = $request->input('estado_civil');
        $paciente->numero_telefono = $request->input('numero_telefono');
        // $paciente->emergencia_persona = $request->input('emergencia_persona');
        $paciente->seguro_medico = $request->input('seguro_medico');
        $paciente->categoria = $request->input('categoria');
        // $paciente->contrasenia = $request->input('contrasenia');
        
        
        $paciente->save();

        

    }

    public function ultimoID(){
        $si= DB::select('SELECT MAX(id_paciente) as ultimoId FROM pacientes');

        echo json_encode($si);
        
        
    }


    public function obtenerColumnaNumeroTelefono($numero_telefono){

        // $telefonos = DB::table('pacientes')->select('numero_telefono')
        // ->where('numero_telefono', $numero_telefono)
        // ->first();
        
        // echo $telefonos->numero_telefono;

        $telefonos = DB::table('pacientes')->select('numero_telefono')
        ->where('numero_telefono', $numero_telefono)
        ->first();
        
        echo json_encode($telefonos);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_paciente)
    {

        
        if($request->input('contrasenia')!= null){
            $nuevaContra = $request->input('contrasenia');
           // $hashed = Hash::make($nuevaContra);

            DB::table('pacientes')
            ->where('id_paciente', $id_paciente)
            ->update(['contrasenia' =>  $nuevaContra]);

        }

        if($request->input('nombre_completo')!=null){

            $nombre_completo = $request->input('nombre_completo');
            $numero_cuenta = $request->input('numero_cuenta');
            $numero_identidad = $request->input('numero_identidad');
            $imagen = $request->input('imagen'); 
            $direccion = $request->input('direccion');
            $carrera = $request->input('carrera');
            $lugar_procedencia = $request->input('lugar_procedencia');
            $fecha_nacimiento = $request->input('fecha_nacimiento');
            $sexo = $request->input('sexo');
            switch ( $estado_civil = $request->input('estado_civil')) {
                case 'Union Libre':
                $estado_civil = 2;
                    break;
                case 'Soltero':
                    # code...
                    $estado_civil =1;
                    break;
                case 'Divorciado':
                    # code...
                    $estado_civil = 3;
                    break;
                case 'Viudo':
                    # code...
                    $estado_civil = 4;
                    break;
                case 'Casado':
                    # code...
                    $estado_civil = 5;
                    break;
                default:
                    # code...
                    break;
            }
            switch ($seguro_medico = $request->input('seguro_medico')) {
                case 'Privado':
                $seguro_medico = 1;
                    break;
                case 'IHSS':
                    # code...
                    $seguro_medico =2;
                    break;
                case 'No':
                    # code...
                    $estado_civil = 3;
                    break;
                
                default:
                    # code...
                    break;
            }
            $numero_telefono = $request->input('numero_telefono');
            $imc = $request->input('imc');
            $peso = $request->input('peso');
            $presion = $request->input('presion');
            $talla = $request->input('talla');
            $temperatura = $request->input('temperatura');
            $pulso = $request->input('pulso');  
            $prosene = $request->input('prosene');  
            $emergencia_persona = $request->input('emergencia_persona'); 
  
            switch ($request->input('categoria')) {
                case 'Estudiante':
                $categoria = 3;
                    break;
                case 'Empleado':
                    $categoria =1;
                    break;
                
                default:
                     $categoria =2;
                    break;
            }

            //$categoria = $request->input('categoria');
            $contrasenia = $request->input('contrasenia');
           // $hashed = Hash::make($contrasenia);
            

            DB::table('pacientes')
            ->where('id_paciente', $id_paciente)
            ->update([

                'nombre_completo'=> $nombre_completo,
                'numero_cuenta' => $numero_cuenta,
                'numero_identidad' => $numero_identidad, 
                'imagen' => $imagen,
                'direccion' => $direccion,                           
                'carrera' => $carrera,
                'lugar_procedencia' => $lugar_procedencia,
                'fecha_nacimiento' => $fecha_nacimiento, 
                'sexo' => $sexo,
                'estado_civil' => $estado_civil,
                'numero_telefono' => $numero_telefono,
                'imc' => $imc,
                'peso' => $peso,
                'presion' => $presion,
                'talla' => $talla,
                'temperatura' => $temperatura,
                'pulso' => $pulso,
                'prosene' => $prosene,
                'emergencia_persona' => $emergencia_persona,
                'seguro_medico' => $seguro_medico,
                'categoria' => $categoria,
                'contrasenia' => $contrasenia
            ]);
        }

            
                
            
            
            
        
            
       
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


    public function obtenerPaciente($cuenta){

        $usuario = DB::table('pacientes')->where('numero_cuenta', $cuenta)->first();

        echo json_encode($usuario);


    }




}
