<?php

namespace App\Http\Controllers;

use App\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarios = Inventario::get();
        echo json_encode($inventarios);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventario = new Inventario(); 
        $inventario->cantidad = $request->input('cantidad');
        $inventario->nombre = $request->input('nombre');
        $inventario->descripcion = $request->input('descripcion');
        $inventario->fecha_vencimiento = $request->input('fecha_vencimiento');
        $inventario->save();

        echo json_encode($inventario);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $inventario_id)
    {
        $inventario = Inventario::find($inventario_id); 
        $inventario->cantidad = $request->input('cantidad');
        $inventario->nombre = $request->input('nombre');
        $inventario->descripcion = $request->input('descripcion');
        $inventario->fecha_vencimiento = $request->input('fecha_vencimiento');
        $inventario->save();

        echo json_encode($inventario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy($inventario_id)
    {
        $inventario = Inventario::find($inventario_id);
        $inventario->delete();
        
    }
}
