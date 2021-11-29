<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modeles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gamme_id')->unsigned();
            $table->foreign('gamme_id')->references('id')->on('gammes')->onDelete('cascade');           
            $table->integer('marque_id')->unsigned();
            $table->foreign('marque_id')->references('id')->on('marques')->onDelete('cascade');
            $table->integer('categorie_id')->unsigned();
            $table->foreign('categorie_id')->references('id')->on('categories_vehicules')->onDelete('cascade');
            $table->integer('confort_id')->unsigned();
            $table->foreign('confort_id')->references('id')->on('conforts')->onDelete('cascade');
            $table->string('nom');
            $table->string('annee');
            $table->integer('energie_id')->unsigned();
            $table->foreign('energie_id')->references('id')->on('energies')->onDelete('cascade');
            $table->string('cv_fiscaux');
            $table->string('nombre_portes');
            $table->decimal('prix_ht');
            $table->decimal('tva');
            $table->decimal('ttc');
            $table->string('boite_vitesse');
            $table->string('cylindree');
            $table->string('moteur');
            $table->string('cv_moteur');
            $table->string('transmission');
            $table->string('acceleration');
            $table->string('vitesse_max');
            $table->string('hauteur');
            $table->string('largeur');
            $table->string('longueur');
            $table->string('poids_vide');
            $table->string('ptc');
            $table->string('urbaine');
            $table->string('puissance_fiscale');
            $table->string('couple');
            $table->string('volume_reservoir1');
            $table->string('volume_reservoir2');
            $table->decimal('montant_vignette');
            $table->string('description');
            $table->string('intervalle_revision');
            $table->float('marge_tolerance');
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
        Schema::dropIfExists('modeles');
    }
}
