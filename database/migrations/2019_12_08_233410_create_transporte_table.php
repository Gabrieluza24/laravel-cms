<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('transporte')) {
        Schema::create('transporte', function (Blueprint $table) {
            $table->string('placa',10)->unique();
            $table->string('marca',50);
            $table->string('modelo',50);
            $table->year('anno');
            $table->string('chofer',100);
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
        Schema::dropIfExists('transporte');
    }
}
