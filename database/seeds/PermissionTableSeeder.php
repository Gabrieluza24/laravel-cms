<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Usuarios
        Permission::create([
        	'name'        => 'Navegar Usuarios',
        	'slug' 		  => 'users.index',
        	'description' => 'Lista y navega los Usuarios',
        ]);

        Permission::create([
        	'name'        => 'Editar Usuarios',
        	'slug' 		  => 'users.edit',
        	'description' => 'Editar perfiles de Usuario',
        ]);
        
        Permission::create([
        	'name'        => 'Eliminar Usuarios',
        	'slug' 		  => 'users.destroy',
        	'description' => 'Eliminar perfiles de Usuario',
        ]);

        //Roles
        Permission::create([
        	'name'        => 'Navegar Roles',
        	'slug' 		  => 'roles.index',
        	'description' => 'Navega, Lista, Edita, Elimina y Asigna Roles de Usuarios',
        ]);

        //Estadisticas
		Permission::create([
        	'name'        => 'Navegar Estadisticas',
        	'slug' 		  => 'chart.index',
        	'description' => 'Navega y Obseva Estadisticas del Sistema',
        ]);        

		//Estaciones de Servicio
        Permission::create([
        	'name'        => 'Navegar por las estaciones de Servicio',
        	'slug' 		  => 'estacionservicio.index',
        	'description' => 'Lista las Estaciones de Servicio',
        ]);

        Permission::create([
        	'name'        => 'Crear Estaciones de Servicio',
        	'slug' 		  => 'estacionservicio.create',
        	'description' => 'Crea estaciones de Servicio',
        ]);
        
        Permission::create([
        	'name'        => 'Eliminar Estaciones de Servicio',
        	'slug' 		  => 'estacionservicio.destroy',
        	'description' => 'Elimina Estaciones de Servicio Existentes',
        ]);

        Permission::create([
        	'name'        => 'Editar Estaciones de Servicio',
        	'slug' 		  => 'estacionservicio.edit',
        	'description' => 'Edita informacion de las Estaciones de Servicio',
        ]);

    }
}
