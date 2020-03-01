<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('success', function (Blueprint $table) {
            $table->BigInteger('codigo_solicitud')->unique()->unsigned();
            $table->foreign('id_gestion')->references('codigo')->on('solicitud')->onDelete('cascade');
            $table->BigInteger('usuario_id')->unsigned();
            $table->string('rif_estacion');  
            $table->string('placa_car');            
            $table->unsignedInteger('capacidad_car');
            $table->string('placa_transporte');
            $table->BigInteger('id_gestion')->unsigned();
            $table->foreign('id_gestion')->references('id')->on('gestion')->onDelete('cascade');
            $table->date('fecha_gestion');        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('success');
    }
}
