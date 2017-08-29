<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddComunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comuna', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('nombre');
            $table->string('descripcion');
            $table->date('fecha_ini');
            $table->date('fecha_fin');

            // campos foraneos
            $table->integer('id_region')->unsigned();
            $table->foreign('id_region')->references('id')->on('region')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comuna');
    }
}
