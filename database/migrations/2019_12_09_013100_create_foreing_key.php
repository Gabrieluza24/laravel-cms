<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeingKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('solicitud', function (Blueprint $table) {
            $table->unsignedInteger('rif_estacion')->onDelete('cascade');            
            $table->foreign('rif_estacion')->references('rif')->on('estacionservicio');
            $table->string('placa_car')->onDelete('cascade');            
            $table->foreign('placa_car')->references('placa')->on('cars');
            $table->unsignedInteger('id_status')->onDelete('cascade');            
            $table->foreign('id_status')->references('id')->on('status');
            });

        Schema::table('transporte', function (Blueprint $table) {
            $table->unsignedInteger('rif_estacion')->onDelete('cascade');            
            $table->foreign('rif_estacion')->references('rif')->on('estacionservicio');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('solicitud', function (Blueprint $table) {
            $table->dropForeign('solicitud_rif_estacion_foreign');
            $table->dropForeign('solicitud_placa_automovil_foreign');
            $table->dropForeign('solicitud_id_status_foreign');

        });

        Schema::table('transporte', function (Blueprint $table) {
            $table->dropForeign('transporte_rif_estacion_foreign');
        });


    }
}
