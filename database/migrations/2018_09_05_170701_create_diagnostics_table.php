<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('demande_id')->unsigned()->index()->nullable();
            $table->foreign('demande_id')->references('id')->on('demandes_interventions')->onDelete('cascade');
            $table->integer('demandeur_id')->unsigned()->index()->nullable();
            $table->foreign('demandeur_id')->references('id')->on('personnels')->onDelete('cascade');
            $table->integer('vehicule_id')->unsigned()->index()->nullable();
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
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
        Schema::dropIfExists('diagnostics');
    }
}
