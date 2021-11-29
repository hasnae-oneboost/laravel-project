<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gammes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gamme');
            $table->integer('marque_id')->unsigned();
            $table->foreign('marque_id')->references('id')->on('marques')->onDelete('cascade');
            $table->integer('categorie_id')->unsigned();
            $table->foreign('categorie_id')->references('id')->on('categories_vehicules')->onDelete('cascade');
            $table->integer('confort_id')->unsigned();
            $table->foreign('confort_id')->references('id')->on('conforts')->onDelete('cascade');
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
        Schema::dropIfExists('gammes');
    }
}
