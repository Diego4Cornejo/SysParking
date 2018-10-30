<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstacionadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estacionados', function (Blueprint $table) {
            $table->increments('ID_ESTACIONADO');
            $table->string('EST_TIPODEATENCION');
            $table->string('EST_PATENTE');
            $table->integer("EST_ESTADO");
            $table->datetime('EST_INGRESO');
            $table->datetime('EST_SALIDA')->nullable();
            $table->datetime('COBRO')->nullable();
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
        Schema::dropIfExists('estacionados');
    }
}
