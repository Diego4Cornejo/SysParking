<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajas', function (Blueprint $table) {
            $table->increments('ID_CAJA');
            $table->unsignedInteger("ID_USUARIO")->nullable();
            $table->datetime('CAJA_FECHAAPERTURA');
            $table->datetime('CAJA_FECHACIERRE')->nullable();
            $table->integer("CAJA_MONTOINICIAL");
            $table->integer("CAJA_MONTOFINAL")->nullable();
            $table->timestamps();

            $table->foreign('ID_USUARIO')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cajas');
    }
}
