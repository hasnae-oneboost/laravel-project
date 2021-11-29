<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratsLeasingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats_leasings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_contrat');
            $table->integer('fournisseur_id')->unsigned()->index()->nullable();
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade');
            $table->string('vehicule');
            $table->string('date_contrat');
            $table->string('date_premier_prelevement');
            $table->string('date_fin_contrat');
            $table->string('duree');
            $table->string('date_reception');
            $table->string('description');
            $table->string('montant_contrat_ht');
            $table->string('montant_prelevement_ttc');
            $table->string('montant_valeur_residuelle');
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
        Schema::dropIfExists('contrats_leasings');
    }
}
