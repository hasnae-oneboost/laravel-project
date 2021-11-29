<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesFamilleInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_famille_interventions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->string('code');
            $table->integer('famille_id')->unsigned();
            $table->foreign('famille_id')->references('id')->on('familles_interventions')->onDelete('cascade');           
            $table->string('commentaire');
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
        Schema::dropIfExists('categories_famille_interventions');
    }
}
