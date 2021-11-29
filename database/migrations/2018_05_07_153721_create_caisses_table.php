<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('libelle')->unique();
            $table->string('solde_initial');
            $table->string('numero_compte_comptable');
            $table->string('montant_min');
            $table->string('dernier_numero_operation');
            $table->boolean('caisse_principale');
            $table->string('description');
            $table->string('observation');
            $table->string('solde');
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
        Schema::dropIfExists('caisses');
    }
}
