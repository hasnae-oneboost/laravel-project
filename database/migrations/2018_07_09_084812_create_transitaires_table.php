<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransitairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transitaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('raison_sociale');
            $table->integer('pay_id')->unsigned();
            $table->foreign('pay_id')->references('id')->on('pays')->onDelete('cascade');
            $table->integer('ville_id')->unsigned();
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
            $table->string('adresse');
            $table->string('fixe1');
            $table->string('fixe2');
            $table->string('gsm');
            $table->string('fax');
            $table->string('site_web');
            $table->string('email');
            $table->string('capital');
            $table->string('rc');
            $table->string('patente');
            $table->string('if');
            $table->integer('echeance')->unsigned();
            $table->foreign('echeance')->references('id')->on('echeances')->onDelete('cascade');
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
        Schema::dropIfExists('transitaires');
    }
}
