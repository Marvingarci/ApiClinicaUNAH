<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(

            'Estudiante',
            'Administrador',
            'Medico',
            
        );

        foreach($roles as $rol){
            DB::table('roles')->insert([
                'rol' => $rol,
            ]);
        }
    }
}
