<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracteurs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parc_id')->unsigned()->index()->nullable();
            $table->foreign('parc_id')->references('id')->on('parcs')->onDelete('cascade');
            $table->integer('marque_id')->unsigned()->index()->nullable();
            $table->foreign('marque_id')->references('id')->on('marques')->onDelete('cascade');
            $table->integer('gamme_id')->unsigned()->index()->nullable();
            $table->foreign('gamme_id')->references('id')->on('gammes')->onDelete('cascade');
            $table->integer('confort_id')->unsigned()->index()->nullable();
            $table->foreign('confort_id')->references('id')->on('conforts')->onDelete('cascade');
            $table->integer('categorie_id')->unsigned()->index()->nullable();
            $table->foreign('categorie_id')->references('id')->on('categories_vehicules')->onDelete('cascade');
            $table->string('immatriculation');
            $table->string('code');
            $table->string('numero_ordre');
            $table->string('numero_imputation');
            $table->integer('type_acquisition_id')->unsigned()->index()->nullable();
            $table->foreign('type_acquisition_id')->references('id')->on('types_acquisitions')->onDelete('cascade');
            $table->string('numero_ww');
            $table->string('numero_carte_grise');
            $table->string('numero_chassis');
            $table->string('date_entree_parc');
            $table->string('date_mise_en_circulation');
            $table->string('date_restitution');
            $table->string('date_recepisse');
            $table->string('couleur');
            $table->string('code_cle');
            $table->string('description');
            $table->string('ajoute_par');
            $table->string('modifier_par');
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
        Schema::dropIfExists('tracteurs');
    }
}
