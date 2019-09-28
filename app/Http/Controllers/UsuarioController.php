<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "estoy en index";
        $usuarios = Usuario::get();
        echo json_encode($usuarios);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "estoy en store";
        $usuario = new Usuario();
        $usuario->cuentaUsuario = $request->input("cuentaUsuario");
        $usuario->contrasenia = $request->input("contrasenia");
        $usuario->save();

        echo json_encode($usuario);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id_usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_usuario)
    {
        echo "estoy en update";
        $usuario = Usuario::find($id_usuario);
        $usuario->cuentaUsuario = $request->input("cuentaUsuario");
        $usuario->contrasenia = $request->input("contrasenia");
        $usuario->save();

        echo json_encode($usuario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_usuario)
    {
        echo "estoy en destroy";
       Usuario::findOrFail($id_usuario)->delete();



    }
}
