<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(EstadosCivilesSeeder::class);
         $this->call(SegurosMedicosSeeder::class);
         $this->call(InventariosPresentacionesSeeder::class);
         $this->call(AntecedentesSeeder::class);
         $this->call(ParentescosSeeder::class);
         
    }
}
