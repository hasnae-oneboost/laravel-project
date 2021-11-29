<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('libelle');
            $table->integer('pay_id')->unsigned();
            $table->foreign('pay_id')->references('id')->on('pays')->onDelete('cascade');
            $table->integer('ville_id')->unsigned();
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
            $table->string('adresse');            
            $table->string('rc');
            $table->string('patente');
            $table->string('if');
            $table->string('compte_bancaire');
            $table->string('capital');
            $table->string('cnss');
            $table->string('fixe1');
            $table->string('fixe2');
            $table->string('fixe3');
            $table->string('fixe4');
            $table->string('gsm1');
            $table->string('gsm2');
            $table->string('fax');            
            $table->string('gerant');
            $table->string('responsable');
            $table->string('site_web');
            $table->string('commentaire');
            $table->string('type');
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
        Schema::dropIfExists('fournisseurs');
    }
}
