<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Solicitud extends Model
{

	protected $table = 'solicitud';
		

	public function car()
	{
    	return $this->belongsTo(Car::class, 'placa_car', 'placa');
	}

	public function estacion()
	{
    	return $this->belongsTo(Estacion::class, 'rif_estacion', 'rif');
	}
}	