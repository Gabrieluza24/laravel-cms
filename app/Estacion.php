<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacion extends Model
{
	  protected $table = 'estacionservicio';
	  protected $fillable = ['rif', 'nombre','direccion','surtidores','capacidad'];
}
