<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesPiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_pieces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->integer('famille_id')->unsigned()->index()->nullable();
            $table->foreign('famille_id')->references('id')->on('familles_pieces')->onDelete('cascade');
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
        Schema::dropIfExists('categories_pieces');
    }
}
