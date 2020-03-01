<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  protected $table = 'personas';
  protected $fillable = ['cedula','telefono', 'ciudad'];

  public function usuario()
	{
    	return $this->belongsTo(User::class, 'usuario_id', 'id');
	}
}
