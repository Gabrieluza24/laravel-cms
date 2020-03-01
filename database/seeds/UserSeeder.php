<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Persona;
use Illuminate\Support\Facades\DB;
use Caffeinated\Shinobi\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('users')->truncate();
        DB::table('personas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas


        $usuario = user::create([
            'name' => 'Usuario',
            'lastname' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt('00000000'),

        ]);

        persona::create([
            'tipocedula' => 'V',
            'cedula' => '99999999',
            'usuario_id' => '1',
            'name' => 'Usuario',
            'lastname' => 'Admin',
            'telefono' => '04000000000',
            'estado'=> 'Merida',
        ]);


        $usuario->get()->first()->assignRoles('administrador');

    }
}
