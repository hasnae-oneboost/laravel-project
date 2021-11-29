<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesPriseEnChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_prise_en_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->string('code');
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
        Schema::dropIfExists('categories_prise_en_charges');
    }
}
