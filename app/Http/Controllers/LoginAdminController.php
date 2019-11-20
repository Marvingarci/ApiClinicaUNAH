<?php

namespace App\Http\Controllers;

use App\LoginAdmin;
use Illuminate\Http\Request;

class LoginAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $login_admin = LoginAdmin::get();
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

        // $validatedData = $request->validate([
        //     'usuario_admin'=>'required|min:6|max:15',
        //     'contrasenia_admin'=>'required|min:6|max:15',
        //     'nombre_admin'=>'required|string|max:30|min:10',
        //     'identidad_admin'=>'required|numeric',
        //     'especialidad_admin'=>'required',
        //             ]);
       

        $login_admin = new LoginAdmin();
        $login_admin->usuario_admin = $request->input(['usuario_admin']);
        $login_admin->contrasenia_admin = $request->input(['contrasenia_admin']);
        $login_admin->nombre_admin= $request->input(['nombre_admin']);
        $login_admin->identidad_admin = $request->input(['identidad_admin']);
        $login_admin->especialidad_admin = $request->input(['especialidad_admin']);
        $login_admin->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LoginAdmin  $loginAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(LoginAdmin $loginAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LoginAdmin  $loginAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(LoginAdmin $loginAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoginAdmin  $loginAdmin_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $loginAdmin_id)
    {
        $login_admin = LoginAdmin::find($loginAdmin_id);
        $login_admin->usuario_admin = $request->input(['usuario_admin']);
        $login_admin->contrasenia_admin = $request->input(['contrasenia_admin']);
        $login_admin->nombre_admin= $request->input(['nombre_admin']);
        $login_admin->identidad_admin = $request->input(['identidad_admin']);
        $login_admin->especialidad_admin = $request->input(['especialidad_admin']);
        $login_admin->save();
        // if($request->input('contraseniaC')!= null){
        //     $nuevaContra = $request->input('contraseniaC');
        //     DB::table('login_admins')
        //     ->where('id', $id)
        //     ->update(['contrasenia_admin' => $nuevaContra]);
        // }

        
        // if($request->input('usuario')!=null){
        //     $usuario = $request->input('usuario');
        //     $contraseniaC = $request->input('contraseniaC');
        //     $nombre = $request->input('nombre');
        //     $identidad = $request->input('identidad');
        //     $especialidad = $request->input('especialidad');

        //     DB::table('login_admins')
        //     ->where('id', $id)
        //     ->update([
        //         'usuario_admin'=> $usuario,
        //         'contrasenia_admin' =>  $contraseniaC,
        //         'nombre_admin' => $nombre,            
        //         'identidad_admin' => $identidad ,
        //         'especialidad_admin' => $especialidad,
        //     ]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoginAdmin  $loginAdmin_id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $loginAdmin_id)
        {
            $login_admin = LoginAdmin::find($loginAdmin_id);
            $login_admin->delete();
    }
}
