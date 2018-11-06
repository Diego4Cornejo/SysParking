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
            $table->string('EST_CODIGOBOUCHER');
            $table->unsignedInteger("ID_ESTADO");
            $table->unsignedInteger("ID_TIPODEATENCION");
            $table->unsignedInteger("ID_USUARIOINGRESO")->nullable();
            $table->unsignedInteger("ID_ABONADO")->nullable();
            $table->string('EST_PATENTE');
            $table->integer("EST_ESTADO");
            $table->datetime('EST_INGRESO');
            $table->datetime('EST_SALIDA')->nullable();
            $table->int('COBRO')->nullable();
            $table->timestamps();
            $table->foreign('ID_ESTADO')->references('ID_ESTADO')->on('estados');
            $table->foreign('ID_TIPODEATENCION')->references('ID_TIPODEATENCION')->on('tarifas');
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
