<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->increments('ID_CARGO');
            $table->string('CAR_NOMBRE');
            $table->string('CAR_JORNADA');
            $table->string('CAR_DOTACION');
            $table->string('CAR_DEPENDENCIA');
            $table->string('CAR_SUPERVICION');
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}
