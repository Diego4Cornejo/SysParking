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
            $table->unsignedInteger("ID_TARIFA");
            $table->unsignedInteger("ID_USUARIOINGRESO");
            $table->unsignedInteger("ID_ABONADO")->nullable();
            $table->unsignedInteger("ID_CAJA")->nullable();
            $table->unsignedInteger("ID_TARIFASALIDA")->nullable();
            $table->string('EST_PATENTE');
            $table->datetime('EST_INGRESO');
            $table->datetime('EST_SALIDA')->nullable();
            $table->integer('COBRO')->nullable();
            $table->timestamps();
            $table->foreign('ID_ESTADO')->references('ID_ESTADO')->on('estados');
            $table->foreign('ID_TARIFA')->references('ID_TARIFA')->on('tarifas');
            $table->foreign('ID_CAJA')->references('ID_CAJA')->on('cajas');
            $table->foreign('ID_USUARIOINGRESO')->references('id')->on('users');
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
