<?php

use Illuminate\Database\Seeder;

class AntecedentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $antecedentes = array(

            'Diabetes',
            'Tuberculosis pulmonar',
            'Desnutrición',
            'Enfermedades mentales',
            'Convulsiones',
            'Alcoholismo o Sustancias psicoactivas',
            'Alergias',
            'Cáncer',
            'Hipertensión arterial',
            'ITS/VIH',
            'Hospitalarias y Quirurgicas',
            'Traumáticos',
            

        );

        foreach($antecedentes as $antecedente){
            DB::table('antecedentes')->insert([
                'antecedente' => $antecedente,
            ]);
        }
    }
}
