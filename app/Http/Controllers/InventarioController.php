<?php

namespace App\Http\Controllers;

use App\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inventarios = DB::table('inventarios')
            ->join('inventarios_presentaciones', 'inventarios.presentacion', '=', 'inventarios_presentaciones.id_inventario_presentacion')
            
            ->select(
                'id_inventario','unidad','nombre', 'descripcion','presentacion',
                'observacion'
                )
            ->get();


        //$inventarios = Inventario::get();
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
        $inventario->unidad = $request->input('unidad');
        $inventario->nombre = $request->input('nombre');
        $inventario->descripcion = $request->input('descripcion');
        $inventario->presentacion = $request->input('presentacion');
        $inventario->observacion = $request->input('observacion');
        //$inventario->fecha_vencimiento = $request->input('fecha_vencimiento');
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
    public function update(Request $request, $id_inventario)
    {
        
       
        $unidad = $request->input('unidad');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $presentacion = $request->input('presentacion');
        $observacion = $request->input('observacion');
        //$fecha_vencimiento = $request->input('fecha_vencimiento');
       
        

        DB::table('inventarios')
        ->where('id_inventario', $id_inventario)
        ->update([
            'unidad'=> $unidad,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'presentacion' => $presentacion,
            'observacion' => $observacion,            
            
        ]);
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
