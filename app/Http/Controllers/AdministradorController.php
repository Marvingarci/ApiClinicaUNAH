<?php

namespace App\Http\Controllers;

use App\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $login_admin = Administrador::get();
        echo json_encode($login_admin);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $login_admin = new Administrador();
        $login_admin->usuario_admin = $request->input(['usuario_admin']);
        $login_admin->contrasenia_admin = $request->input(['contrasenia_admin']);
        $login_admin->nombre_admin= $request->input(['nombre_admin']);
        $login_admin->identidad_admin = $request->input(['identidad_admin']);
        $login_admin->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrador  $loginAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(Administrador $loginAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrador  $loginAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrador $loginAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrador  $loginAdmin_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $loginAdmin_id)
    {

        $login_admin = Administrador::find($loginAdmin_id);
        $login_admin->usuario_admin = $request->input(['usuario_admin']);
        $login_admin->contrasenia_admin = $request->input(['contrasenia_admin']);
        $login_admin->nombre_admin= $request->input(['nombre_admin']);
        $login_admin->identidad_admin = $request->input(['identidad_admin']);
        $login_admin->save();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrador  $loginAdmin_id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $loginAdmin_id)
        {
            $login_admin = Administrador::find($loginAdmin_id);
            $login_admin->delete();
    }

    public function obtenerAdministrador($nombre_usuario){

        $admin = DB::table('administradores')->where('usuario_admin', $nombre_usuario)->first();

        echo json_encode($admin);


    }


    public function obtenerColumnaUsuarioAdmin($usuario){

        $admin = DB::table('administradores')->select('usuario')
        ->where('usuario', $usuario)
        ->first();
        
        echo json_encode($admin);

    }
}
