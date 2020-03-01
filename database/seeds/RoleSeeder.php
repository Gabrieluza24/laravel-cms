<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('permission_role')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
        
    	$admin = Role::create([
            'name'          => 'Administrador',
            'slug'          => 'administrador',
            'description'   => 'Administrador con acceso a informacion confidencial',
        ]);

        $admin->givePermissionTo('solicitudes.show','users.index', 'users.edit', 'users.update', 'users.destroy','personas.index', 'personas.edit', 'cars.show', 'estacionservicio.index', 'estacionservicio.store', 'estacionservicio.destroy', 'estacionservicio.edit','transportes.index','transportes.store','transportes.destroy','transportes.edit', 'gestiones.index','gestiones.store','gestiones.destroy','success.index');


        $usuario = Role::create([
            'name'          => 'Usuario',
            'slug'          => 'usuario',
            'description'   => 'Usuario regular del sistema con acceso restringido',
        ]);

        $usuario->givePermissionTo('solicitudes.index','solicitudes.store', 'users.update','solicitudes.destroy','personas.index', 'personas.edit','cars.index', 'cars.edit', 'cars.store', 'cars.destroy','estacionservicio.index');
    }
}
