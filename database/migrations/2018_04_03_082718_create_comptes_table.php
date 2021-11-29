<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->integer('banque_id')->unsigned();
            $table->foreign('banque_id')->references('id')->on('banques')->onDelete('cascade');
            $table->integer('agence_id')->unsigned();
            $table->foreign('agence_id')->references('id')->on('agences')->onDelete('cascade');
            $table->string('date_création');
            $table->string('rib');
            $table->string('solde_initial');
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
        Schema::dropIfExists('comptes');
    }
}
