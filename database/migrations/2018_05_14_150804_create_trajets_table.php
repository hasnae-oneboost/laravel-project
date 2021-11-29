<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrajetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trajets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->string('distance');
            $table->string('lieu_chargement1');
            $table->string('lieu_chargement2');
            $table->string('lieu_chargement3');
            $table->string('lieu_chargement4');
            $table->string('lieu_chargement5');
            $table->string('lieu_dechargement1');
            $table->string('lieu_dechargement2');
            $table->string('lieu_dechargement3');
            $table->string('lieu_dechargement4');
            $table->string('lieu_dechargement5');
            $table->string('libelle');
            $table->string('douane');
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
        Schema::dropIfExists('trajets');
    }
}
