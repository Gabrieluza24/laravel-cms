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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
        

        //Personas
        Permission::create([
            'name'        => 'Observar Perfil',
            'slug'        => 'personas.index',
            'description' => 'Observar los datos del Perfil',
        ]);

        Permission::create([
            'name'        => 'Editar Perfil',
            'slug'        => 'personas.edit',
            'description' => 'Editar el perfil de Usuario',
        ]);
        
    	//Usuarios
        Permission::create([
        	'name'        => 'Observar Usuarios',
        	'slug' 		  => 'users.index',
        	'description' => 'Lista y navega los Usuarios',
        ]);

        Permission::create([
        	'name'        => 'Editar Usuarios',
        	'slug' 		  => 'users.edit',
        	'description' => 'Editar perfiles de Usuario',
        ]);

        Permission::create([
            'name'        => 'Actualizar Usuarios',
            'slug'        => 'users.update',
            'description' => 'Actualiza informacion del perfil del Usuario',
        ]);
        
        Permission::create([
        	'name'        => 'Eliminar Usuarios',
        	'slug' 		  => 'users.destroy',
        	'description' => 'Eliminar perfiles de Usuario',
        ]);


        //Estadisticas
		Permission::create([
        	'name'        => 'Navegar Estadisticas',
        	'slug' 		  => 'success.index',
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
        	'slug' 		  => 'estacionservicio.store',
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

        //Automoviles
        Permission::create([
            'name'        => 'Listar Automoviles',
            'slug'        => 'cars.index',
            'description' => 'Navegar en la pestana Automoviles',
        ]);
        
        Permission::create([
            'name'        => 'Observar Automoviles',
            'slug'        => 'cars.show',
            'description' => 'Observar lista de Automoviles',
        ]);

        Permission::create([
            'name'        => 'Crear Automoviles',
            'slug'        => 'cars.store',
            'description' => 'Crear un Automovil',
        ]);

        Permission::create([
            'name'        => 'Editar Automoviles',
            'slug'        => 'cars.edit',
            'description' => 'Edita un Automovil',
        ]);

        Permission::create([
            'name'        => 'Eliminar Automoviles',
            'slug'        => 'cars.destroy',
            'description' => 'Elimina un Automovil',
        ]);


        //Transportes
        Permission::create([
            'name'        => 'Listar Transportes',
            'slug'        => 'transportes.index',
            'description' => 'Observar lista de Transportes',
        ]);

        Permission::create([
            'name'        => 'Crear Transportes',
            'slug'        => 'transportes.store',
            'description' => 'Crear un Transporte',
        ]);

        Permission::create([
            'name'        => 'Editar Transportes',
            'slug'        => 'transportes.edit',
            'description' => 'Edita un Transporte',
        ]);

        Permission::create([
            'name'        => 'Eliminar Transportes',
            'slug'        => 'transportes.destroy',
            'description' => 'Elimina un Transporte',
        ]);

        //Gestiones
        Permission::create([
            'name'        => 'Observar despachos de Combustible',
            'slug'        => 'gestiones.index',
            'description' => 'Lista los despachos con combustible disponible',
        ]);

        Permission::create([
            'name'        => 'Cargar un nuevo despacho de combustible',
            'slug'        => 'gestiones.store',
            'description' => 'Crea nuevos despachos de combustible',
        ]);
        
        Permission::create([
            'name'        => 'Eliminar despachos',
            'slug'        => 'gestiones.destroy',
            'description' => 'Elimina despachos de combustible con errores',
        ]);

        //Solicitudes
        Permission::create([
            'name'        => 'Listar Solicitudes',
            'slug'        => 'solicitudes.index',
            'description' => 'Observar lista de Solicitudes',
        ]);

        Permission::create([
            'name'        => 'Observar Solicitudes',
            'slug'        => 'solicitudes.show',
            'description' => 'Observar lista de Solicitudes',
        ]);

        Permission::create([
            'name'        => 'Crear Solicitudes',
            'slug'        => 'solicitudes.store',
            'description' => 'Crear una Solicitud',
        ]);

        Permission::create([
            'name'        => 'Eliminar Solicitudes',
            'slug'        => 'solicitudes.destroy',
            'description' => 'Elimina una Solicitud',
        ]);



    }
}
