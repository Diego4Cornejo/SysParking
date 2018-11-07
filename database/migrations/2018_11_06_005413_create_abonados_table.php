<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonados', function (Blueprint $table) {
            $table->increments('ABONADO_ID');
            $table->string('AB_CODIGO');
            $table->unsignedInteger("PLAN_ID");
            $table->string("AB_PATENTE");
            $table->string("AB_RUN");
            $table->string("AB_NOMBRE");
            $table->date("AB_FECHADENACIMIENTO");
            $table->string("AB_SEXO");
            $table->string("AB_CORREO");
            $table->integer("AB_NUMERODETELEFONO");
            $table->string("AB_ESTADO");
            $table->timestamps(); 
            $table->foreign('PLAN_ID')->references('ID_PLAN')->on('planes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonados');
    }
}
