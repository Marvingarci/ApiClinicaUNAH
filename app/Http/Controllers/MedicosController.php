<?php

namespace App\Http\Controllers;

use App\Medicos;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medicos::get();
        echo json_encode($medicos);
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
        $medicos = new Medicos();
        $medicos->usuarioM = $request->input(['usuarioM']);
        $medicos->contraseniaM = $request->input(['contraseniaM']);
        $medicos->nombreM = $request->input(['nombreM']);
        $medicos->identidadM = $request->input(['identidadM']);
        $medicos->especialidadM = $request->input(['especialidadM']);
        $medicos->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function show(Medicos $medicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicos $medicos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicos  $medicos_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $medicos_id)
    {
        $medicos = Medicos::find($medicos_id);
        $medicos->usuarioM = $request->input(['usuarioM']);
        $medicos->contraseniaM = $request->input(['contraseniaM']);
        $medicos->nombreM= $request->input(['nombreM']);
        $medicos->identidadM = $request->input(['identidadM']);
        $medicos->especialidadM = $request->input(['especialidadM']);
        $medicos->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicos  $medicos_id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $medicos_id)
    {
        $medicos = Medicos::find($medicos_id);
            $medicos->delete();
    }
}
