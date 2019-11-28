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
        	
        	'name' => 'administrador',
            'email' => 'admin@admin.com',
        	'password'=> bycript('22222222'),
        ]);
    }
}
