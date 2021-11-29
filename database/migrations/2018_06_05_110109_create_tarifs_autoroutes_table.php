<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifsAutoroutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifs_autoroutes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->integer('categorie_vehicule')->unsigned();
            $table->foreign('categorie_vehicule')->references('id')->on('categories_vehicules')->onDelete('cascade');
            $table->integer('peage_depart')->unsigned();
            $table->foreign('peage_depart')->references('id')->on('peages_autoroutes')->onDelete('cascade');
            $table->integer('peage_arrivee')->unsigned();
            $table->foreign('peage_arrivee')->references('id')->on('peages_autoroutes')->onDelete('cascade');
            $table->string('description');
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
        Schema::dropIfExists('tarifs_autoroutes');
    }
}
