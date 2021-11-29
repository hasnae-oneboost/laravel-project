<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->integer('banque_id')->unsigned();
            $table->foreign('banque_id')->references('id')->on('banques')->onDelete('cascade');
            $table->integer('ville_id')->unsigned();
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
            $table->string('telephone');
            $table->string('fax');
            $table->string('directeur_agence');
            $table->string('libelle');
            $table->string('adresse');
            $table->string('charge_de_clientele');
            $table->string('tel_charge_de_clientele');
            $table->string('email_cdc');
            $table->string('description');
                        
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
        Schema::dropIfExists('agences');
    }
}
