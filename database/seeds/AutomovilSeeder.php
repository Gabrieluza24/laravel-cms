<?php

use Illuminate\Support\Facades\DB;
use App\Car;
use Illuminate\Database\Seeder;

class AutomovilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('cars')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas

        DB::table('cars')->insert([
            'usuario_id' => '1',
            'placa' => 'XNZ229',
            'marca' => 'toyota',
            'modelo'=> 'corolla',
            'anno' => '1991',
            'capacidad' => '40',
        ]);
    }

}
   