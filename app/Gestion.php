<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
   
	protected $table = 'gestion';
		

	public function transporte()
	{
    	return $this->belongsTo(Transporte::class, 'placa_transporte', 'placa');
	}

	public function estacion()
	{
    	return $this->belongsTo(Estacion::class, 'rif_estacion', 'rif');
	}
}
