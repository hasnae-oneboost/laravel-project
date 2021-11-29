<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrat_achats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vehicule');
            $table->integer('fournisseur_id')->unsigned()->index()->nullable();
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade');
            $table->string('code');
            $table->string('date_achat');
            $table->string('garantie');
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
        Schema::dropIfExists('contrat_achats');
    }
}
