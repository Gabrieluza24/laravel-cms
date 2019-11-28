<?php

Auth::routes();



Route::group(['middleware'=> 'auth'], function () {

Route::get('/', function () {

    return view('welcome');
});
 
Route::get('/automovil', 'AutomovilController@index');
Route::post('/automovil', 'AutomovilController@store');
Route::get('/home', 'HomeController@index');

});