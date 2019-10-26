<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
include '../includes/login_unah.php';

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $logins = Login::first();
        // echo json_encode($logins);

        // orderBy('id_login','desc')->take(1); 

    
        $logins = Login::all()->last();
        echo json_encode($logins);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuenta= $request->input('cuenta');
        $clave= $request->input('clave');

        $alumno = accesoAlumno($cuenta, $clave);

        $datos_login= new Login();
        
        $datos_login->cuenta = $alumno['cuenta'];
        $datos_login->nombre = $alumno['nombre'];
        $datos_login->carrera = $alumno['carrera'];
        $datos_login->centro = $alumno['centro'];
        $datos_login->numero_identidad = $alumno['numero_identidad'];
        $datos_login->imagen = $alumno['imagen'];


        $datos_login->save();



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }

}
