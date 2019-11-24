<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FuncionInsertarAntecedente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $available = Constant::PRODUCT_AVAILABLE_TRUE | Constant::PRODUCT_AVAILABLE_STOCK_TRUE;

        $sql = 

        'DROP FUNCTION IF EXISTS insertar_antecedente;

        ALTER DATABASE db_clinica CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; 
        ALTER TABLE antecedentes CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
        
        CREATE FUNCTION insertar_antecedente(a varchar(50)) returns int
            deterministic
        begin 
            declare id int;
        
            IF(a not in (select antecedente from antecedentes)) then
                insert into antecedentes(antecedente) values (a);		
            END IF;
            
            return (select id_antecedente from antecedentes where antecedente = a);
        
            
        END';

        DB::unprepared($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // esto no da !!
        DB::unprepared('drop function if exits insertar_antecedente');
    }
}
