<?php

Auth::routes();



  Route::group(['middleware'=> 'auth'], function () {

Route::get('/', function () {

    return view('welcome');
});
        Route::get('/automovil', 'AutomovilController@index');
        Route::get('/home', 'HomeController@index');

    });