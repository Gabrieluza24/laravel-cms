<?php

Auth::routes();

Route::group(['middleware'=> 'auth'], function () {

Route::get('/', function () {

return view('welcome');

});

Route::resource('cars', 'CarsController');
Route::resource('personas', 'PersonasController');
Route::get('/home', 'HomeController@index');

});