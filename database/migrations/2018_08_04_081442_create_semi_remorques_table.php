<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemiRemorquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semi_remorques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parc_id')->unsigned()->index()->nullable();
            $table->foreign('parc_id')->references('id')->on('parcs')->onDelete('cascade');
            $table->integer('marque_id')->unsigned()->index()->nullable();
            $table->foreign('marque_id')->references('id')->on('marques')->onDelete('cascade');
            $table->integer('gamme_id')->unsigned()->index()->nullable();
            $table->foreign('gamme_id')->references('id')->on('gammes')->onDelete('cascade');
            $table->integer('confort_id')->unsigned()->index()->nullable();
            $table->foreign('confort_id')->references('id')->on('conforts')->onDelete('cascade');
            $table->integer('type_id')->unsigned()->index()->nullable();
            $table->foreign('type_id')->references('id')->on('types_semiremorques')->onDelete('cascade');
            $table->integer('modele_id')->unsigned()->index()->nullable();
            $table->foreign('modele_id')->references('id')->on('modeles')->onDelete('cascade');
            $table->integer('prestataire_id')->unsigned()->index()->nullable();
            $table->foreign('prestataire_id')->references('id')->on('prestataires')->onDelete('cascade');
            $table->string('prestataire');
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
        Schema::dropIfExists('semi_remorques');
    }
}
