<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
  protected $table = 'transporte';
  protected $fillable = ['placa', 'marca','modelo','anno','chofer'];

}

