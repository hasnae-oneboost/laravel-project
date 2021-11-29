<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotifsEncaissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motifs_encaissements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('libelle');
            $table->string('numero_compte_comptable');
            $table->integer('categorie_motif_id')->unsigned();
            $table->foreign('categorie_motif_id')->references('id')->on('categories_motifs_encaissements')->onDelete('cascade');
            $table->string('description');
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
        Schema::dropIfExists('motifs_encaissements');
    }
}
