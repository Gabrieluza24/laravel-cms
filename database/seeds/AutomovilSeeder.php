<?php

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
        
        Car::create([
        	
        	'placa' => 'XNZ229',
            'marca' => 'toyota',
        	'modelo'=> 'corolla',
        	'anno' => '1991',
        	'capacidad' => '40',
        ]);



        Car::create([
            
            'placa' => 'CRACKTOTAL',
            'marca' => 'Ford',
            'modelo'=> 'Fiesta',
            'anno' => '2010',
            'capacidad' => '50',
        ]);
    }


}
   