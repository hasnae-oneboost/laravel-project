<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourtiersAssurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courtiers_assurances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricule');
            $table->string('nom');
            $table->string('adresse');
            $table->integer('pay_id')->unsigned();
            $table->foreign('pay_id')->references('id')->on('pays')->onDelete('cascade');
            $table->integer('ville_id')->unsigned();
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
            $table->integer('societe_assurance_id')->unsigned();
            $table->foreign('societe_assurance_id')->references('id')->on('societes_assurances')->onDelete('cascade');            
            $table->string('rc');
            $table->string('patente');
            $table->string('if');
            $table->string('compte_bancaire');
            $table->string('capital');
            $table->string('fixe1');
            $table->string('fixe2');
            $table->string('fixe3');
            $table->string('fixe4');
            $table->string('gsm1');
            $table->string('gsm2');
            $table->string('gerant');
            $table->string('nom_responsable');
            $table->string('site_web');
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
        Schema::dropIfExists('courtiers_assurances');
    }
}
