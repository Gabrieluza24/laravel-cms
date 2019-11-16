<?php

use App\Automovil;
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
        Automovil::create([
        	
        	'placa' => 'XNZ229',
        	'modelo'=> 'corolla',
        	'anno' => '1991',
        	'capacidad' => '40',
        ]);
    }
}
   