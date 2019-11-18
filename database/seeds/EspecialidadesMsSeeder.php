<?php

use Illuminate\Database\Seeder;

class EspecialidadesMsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especialidades_mes = array(

            'Salud Pública',
            'Ginecología y Obstetricia',
            'Pediatría',
            'Cirugía General',
            'Medicina Interna',
            'Dermatología',
            'Neurología',
            'Neurocirugía ',
            'Cirugía Plástica ',
            'Anestesiología, Reanimación y Dolor',
            'Ortopedia',
            'Psiquiatría',
            'Otorrinolaringología',
            'Medicina Física y Rehabilitación',

        );

        foreach($especialidades_mes as $especialidad_mes){
            DB::table('especialidad_mes')->insert([
                'especialidad_mes' => $especialidad_mes,
            ]);
        }
    }
}
