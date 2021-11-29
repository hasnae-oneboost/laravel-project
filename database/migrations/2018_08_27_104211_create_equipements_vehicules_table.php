<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipementsVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipements_vehicules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicule_id')->unsigned()->index()->nullable();
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
            $table->string('libelle');
            $table->string('code');
            $table->integer('type_id')->unsigned()->index()->nullable();
            $table->foreign('type_id')->references('id')->on('type_equipement_vehicules')->onDelete('cascade');
            $table->integer('equipement_id')->unsigned()->index()->nullable();
            $table->foreign('equipement_id')->references('id')->on('equipement_vehicules')->onDelete('cascade');
            $table->integer('fournisseur_id')->unsigned()->index()->nullable();
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade');
            $table->string('date_affectation');
            $table->string('description');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->decimal('montant_ht');
            $table->decimal('tva');
            $table->decimal('montant_ttc');
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
        Schema::dropIfExists('equipements_vehicules');
    }
}
