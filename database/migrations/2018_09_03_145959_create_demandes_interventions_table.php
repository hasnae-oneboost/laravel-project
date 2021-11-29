<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandesInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes_interventions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicule_id')->unsigned()->index()->nullable();
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
            $table->integer('demandeur_id')->unsigned()->index()->nullable();
            $table->foreign('demandeur_id')->references('id')->on('personnels')->onDelete('cascade');
            $table->string('description');
            $table->string('numero_systeme');
            $table->string('date_demande');
            $table->string('kilometrage');
            $table->string('index_horaire');
            $table->string('categorie');
            $table->integer('gravite_id')->unsigned()->index()->nullable();
            $table->foreign('gravite_id')->references('id')->on('gravites')->onDelete('cascade');
            $table->integer('urgence_id')->unsigned()->index()->nullable();
            $table->foreign('urgence_id')->references('id')->on('urgences')->onDelete('cascade');
            $table->string('etat')->nullable();
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
        Schema::dropIfExists('demandes_interventions');
    }
}
