<?php

Auth::routes();

Route::group(['middleware'=> 'auth'], function () {


Route::get('/', function () {


if(empty(Auth::user()->roles->pluck('slug')->first()))
{
	alert()->info('Debe completar su perfil de usuario para continuar', 'IMPORTANTE')->persistent("Aceptar");
}
return view('welcome');
});

Route::resource('solicitudes', 'SolicitudController');  //Usuario & Admin

Route::resource('user', 'UserController');	

Route::resource('cars', 'CarsController');				//Usuario

Route::resource('estaciones', 'EstacionesController');	//Admin & Admin

Route::resource('personas', 'PersonasController');		//Usuario

Route::resource('transportes', 'TransporteController');	//Admin

Route::resource('gestiones', 'GestionController');		//Admin

Route::post('gestiones/{id}/notificar', 'GestionController@notificar')->name('gestiones.notificar');							  //Admin

Route::resource('success', 'SuccessController');		//Admin

Route::get('/home', 'HomeController@index');			//Usuario

});