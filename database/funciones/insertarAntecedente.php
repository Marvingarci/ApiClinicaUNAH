<?php

namespace database\funciones;
use Illuminate\Support\facades\DB;


class insertarAntecedente {

    public function ejecutar($antecedente)
    {
        // return DB::select('select insertar_antecedente(?)',[$antecedente])->first(); 
        return DB::select('SELECT insertar_antecedente(?) as id_antecedente limit 1', [$antecedente]);

       

    }
}