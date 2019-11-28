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
            'marca' => 'toyota',
        	'modelo'=> 'corolla',
        	'anno' => '1991',
        	'capacidad' => '40',
        ]);



        Automovil::create([
            
            'placa' => 'CRACKTOTAL',
            'marca' => 'Ford',
            'modelo'=> 'Fiesta',
            'anno' => '2010',
            'capacidad' => '50',
        ]);
    }


}
   