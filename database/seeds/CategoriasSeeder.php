<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Categoria = array(

            'Empleado',
            'Visitante',
            'Estudiante',
            

        );

        foreach($Categoria as $Categorias){
            DB::table('categorias')->insert([
                'categoria' => $Categorias,
            ]);
        }
    
    }
}
