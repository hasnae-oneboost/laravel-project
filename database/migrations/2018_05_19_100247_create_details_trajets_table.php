<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTrajetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_trajets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trajet_id')->unsigned();
            $table->foreign('trajet_id')->references('id')->on('trajets')->onDelete('cascade');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->integer('categorie_id')->unsigned();
            $table->foreign('categorie_id')->references('id')->on('categorie_trajets')->onDelete('cascade');
            $table->decimal('prime_deplacement_1er_conducteur');
            $table->decimal('prime_deplacement_2eme_conducteur');
            $table->decimal('frais_route');
            $table->integer('consommation');
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
        Schema::dropIfExists('details_trajets');
    }
}
