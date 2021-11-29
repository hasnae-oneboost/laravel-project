<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarchandisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marchandises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types_marchandises')->onDelete('cascade');
            $table->integer('unite_id')->unsigned();
            $table->foreign('unite_id')->references('id')->on('unites')->onDelete('cascade');
            $table->integer('tva_id')->unsigned();
            $table->foreign('tva_id')->references('id')->on('tvas')->onDelete('cascade');            
            $table->string('description');
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
        Schema::dropIfExists('marchandises');
    }
}
