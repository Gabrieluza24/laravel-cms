<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Success extends Model
{
    protected $table = 'success';
    
	public function estacion()
	{
    	return $this->belongsTo(Estacion::class, 'rif_estacion', 'rif');
	}
}
