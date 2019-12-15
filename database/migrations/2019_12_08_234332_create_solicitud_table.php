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
        if (!Schema::hasTable('status')) {
        Schema::create('status', function (Blueprint $table) {
            $table->unsignedInteger('id')->unique();
            $table->string('nombre_status');
        });
        }
        
        if (!Schema::hasTable('solicitud')) {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->bigIncrements('codigo');
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
