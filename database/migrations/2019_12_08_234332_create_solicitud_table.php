<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        if (!Schema::hasTable('solicitud')) {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->bigIncrements('codigo');
            $table->BigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('rif_estacion');            
            $table->foreign('rif_estacion')->references('rif')->on('estacionservicio')->onDelete('cascade');
            $table->string('placa_car');            
            $table->foreign('placa_car')->references('placa')->on('cars')->onDelete('cascade');
            $table->unsignedInteger('capacidad_car');
            $table->unsignedInteger('id_status');
            $table->date('aprobacion')->nullable();
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
        Schema::dropIfExists('solicitud');
    }
}
