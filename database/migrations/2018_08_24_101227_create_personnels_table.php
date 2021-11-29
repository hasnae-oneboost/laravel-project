<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->string('date_naissance');
            $table->string('date_prevue_retraite');
            $table->integer('pay_id')->unsigned();
            $table->foreign('pay_id')->references('id')->on('pays')->onDelete('cascade');
            $table->integer('ville_id')->unsigned();
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
            $table->string('adresse_postale');
            $table->integer('nationnalite_id')->unsigned();
            $table->foreign('nationnalite_id')->references('id')->on('nationalites')->onDelete('cascade');
            $table->string('cin');
            $table->string('date_approbation');
            $table->string('sexe');
            $table->string('photo');
            $table->integer('categorie_id')->unsigned();
            $table->foreign('categorie_id')->references('id')->on('categories_postes')->onDelete('cascade');
            $table->string('gsm_professionnel');
            $table->string('gsm_personnel');
            $table->string('gsm_etranger');
            $table->string('email_pro');
            $table->string('email_perso');
            $table->string('contact1');
            $table->string('gsm1');
            $table->string('contact2');
            $table->string('gsm2');
            $table->string('cnss');
            $table->integer('banque_id')->unsigned();
            $table->foreign('banque_id')->references('id')->on('banques')->onDelete('cascade');
            $table->string('date_immatriculation');
            $table->string('compte_bancaire');
            $table->string('numero_compte_comptable');
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
        Schema::dropIfExists('personnels');
    }
}
