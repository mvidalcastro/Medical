<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrestadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestador', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->char('rut',10);
            $table->string('nombres');
            $table->string('ape_pat');
            $table->string('ape_mat');
            $table->string('email');
            $table->string('fono_fijo');
            $table->string('celular');
            $table->boolean('acreditado');
            $table->string('nro_colmedico');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            // Claves Foraneas
            $table->integer('id_comuna')->unsigned();


            $table->foreign('id_comuna')->references('id')->on('comuna')->onDelete('cascade');
//            $table->foreign('id_especialidad')->references('id')->on('especialidad')->onDelete('cascade');

        });

        Schema::create('especialidad_prestador', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            // Campos foraneos
            $table->integer('especialidad_id')->unsigned();
            $table->integer('prestador_id')->unsigned();

            $table->foreign('especialidad_id')->references('id')->on('especialidad')->onDelete('cascade');
            $table->foreign('prestador_id')->references('id')->on('prestador')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestador');
    }
}
