<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rif_estacion');            
            $table->foreign('rif_estacion')->references('rif')->on('estacionservicio')->onDelete('cascade');
            $table->string('placa_transporte');            
            $table->foreign('placa_transporte')->references('placa')->on('transporte')->onDelete('cascade');
            $table->date('fecha_despacho');
            $table->unsignedInteger('litros');            
            $table->unsignedInteger('Inicial');            
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
        Schema::dropIfExists('gestion');
    }
}
