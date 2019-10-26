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
     * @param  \App\LoginAdmin  $loginAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoginAdmin $loginAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoginAdmin  $loginAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoginAdmin $loginAdmin)
    {
        //
    }
}
