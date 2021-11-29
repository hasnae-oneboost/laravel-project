<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinistresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinistres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tracteur_id')->unsigned()->index()->nullable();
            $table->foreign('tracteur_id')->references('id')->on('vehicules')->onDelete('cascade');
            $table->integer('semiremorque_id')->unsigned()->index()->nullable();
            $table->foreign('semiremorque_id')->references('id')->on('vehicules')->onDelete('cascade');
            $table->integer('conducteur1_id')->unsigned()->index()->nullable();
            $table->foreign('conducteur1_id')->references('id')->on('personnels')->onDelete('cascade');
            $table->integer('conducteur2_id')->unsigned()->index()->nullable();
            $table->foreign('conducteur2_id')->references('id')->on('personnels')->onDelete('cascade');
            $table->string('date');
            $table->string('heure');
            $table->integer('pay_id')->unsigned();
            $table->foreign('pay_id')->references('id')->on('pays')->onDelete('cascade');
            $table->integer('ville_id')->unsigned();
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
            $table->string('constat');            
            $table->string('rapport');            
            $table->string('commentaire');            
            $table->string('autorite_proces_verbal')->nullable();
            $table->string('renseignement_proces_verbal')->nullable();
            $table->string('date_proces_verbal')->nullable();
            $table->string('numero_proces_verbal')->nullable();
            $table->string('immatriculation')->nullable();
            $table->string('marque')->nullable();
            $table->string('nom_conducteur')->nullable();
            $table->string('prenom_conducteur')->nullable();
            $table->string('cin')->nullable();
            $table->string('numero_permis')->nullable();
            $table->string('type_permis')->nullable();
            $table->string('date_fin_permis')->nullable();
            $table->string('ville_permis')->nullable();
            $table->string('adresse')->nullable();
            $table->string('compagnie_assurance')->nullable();
            $table->string('numero_police')->nullable();
            $table->string('agence_intermediaire')->nullable();
            $table->string('numero_attestation')->nullable();
            $table->string('adresse_assure')->nullable();
            $table->string('degats')->nullable();
            $table->string('degat_adverse')->nullable();
            $table->string('degat_materiel')->nullable();
            $table->string('degat_mortel')->nullable();
            $table->string('degat_corporel')->nullable();
            $table->string('observations')->nullable();
            $table->string('taux_remboursement')->nullable();
            $table->string('montant_franchise')->nullable();
            $table->string('reference_sinistre')->nullable();
            $table->string('taux_responsabilite')->nullable();
            $table->string('date_fin')->nullable();
            $table->string('circonstance_sinistre')->nullable();
            $table->string('sinistre_cloture')->nullable();
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
        Schema::dropIfExists('sinistres');
    }
}
