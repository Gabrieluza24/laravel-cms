<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstacionservicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('estacionservicio')) {
        Schema::create('estacionservicio', function (Blueprint $table) {
            $table->string('rif')->unique()->required();
            $table->string('nombre',100);
            $table->string('direccion',500);
            $table->unsignedInteger('surtidores');
            $table->unsignedInteger('capacidad');
            $table->string('imagen')->nullable();            
            $table->timestamps();

        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estacionservicio');
    }
}
