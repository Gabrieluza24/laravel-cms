<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            User::create([
        	
        	'name' => 'Gabriel',
            'email' => 'gabrieluza24@gmail.com',
        	'password'=> bycript('22222222'),
        ]);
    }
}
