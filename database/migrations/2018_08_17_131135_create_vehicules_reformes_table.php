<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculesReformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules_reformes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicule_id')->unsigned()->index()->nullable();
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
            $table->string('date_reforme');
            $table->integer('reforme_id')->unsigned()->index()->nullable();
            $table->foreign('reforme_id')->references('id')->on('reformes')->onDelete('cascade');
            $table->string('montant');
            $table->string('observation');
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
        Schema::dropIfExists('vehicules_reformes');
    }
}
