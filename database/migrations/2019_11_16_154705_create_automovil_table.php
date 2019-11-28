<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomovilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automovil', function (Blueprint $table) {
            $table->string('placa',10)->unique();
            $table->string('marca',50);
            $table->string('modelo',50);
            $table->year('anno');
            $table->unsignedInteger('capacidad');
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
        Schema::dropIfExists('automovil');
    }
}
