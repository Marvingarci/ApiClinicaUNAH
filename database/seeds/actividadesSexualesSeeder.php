<?php

use Illuminate\Database\Seeder;

class actividadesSexualesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actividades_sexuales = array(

            'Anal',
            'Vaginal',
            'Oral',
            

        );

        foreach($actividades_sexuales as $actividad_sexual){
            DB::table('actividades_sexuales')->insert([
                'actividad_sexual' => $actividad_sexual,
            ]);
        }
    }
}
