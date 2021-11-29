<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->integer('direction_id')->unsigned();
            $table->foreign('direction_id')->references('id')->on('directions')->onDelete('cascade');           
            $table->string('ajoute_par');
            $table->string('modifie_par');
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
        Schema::dropIfExists('departements');
    }
}
