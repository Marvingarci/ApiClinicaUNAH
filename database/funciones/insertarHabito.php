<?php

namespace database\funciones;
use Illuminate\Support\facades\DB;


class insertarHabito{

    public function ejecutar($habito)
    {
        // return DB::select('select insertar_antecedente(?)',[$antecedente])->first(); 
        return DB::select('SELECT insertar_habito(?) as id_habito_toxicologico', [$habito]);

       

    }
}