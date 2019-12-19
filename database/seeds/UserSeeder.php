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
        	
        	'name' => 'Usuario',
            'lastname' => 'Admin',
            'email' => 'admin@gmail.com',
        	'password'=> bycript('00000000'),
        ]);
    }
}
