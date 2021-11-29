<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pieces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('famille_id')->unsigned()->index()->nullable();
            $table->foreign('famille_id')->references('id')->on('familles_pieces')->onDelete('cascade');          
            $table->integer('categorie_id')->unsigned()->index()->nullable();
            $table->foreign('categorie_id')->references('id')->on('categories_pieces')->onDelete('cascade');          
            $table->integer('marque_id')->unsigned()->index()->nullable();
            $table->foreign('marque_id')->references('id')->on('marques_pieces')->onDelete('cascade');          
            $table->string('code');
            $table->integer('unite_id')->unsigned()->index()->nullable();
            $table->foreign('unite_id')->references('id')->on('unites')->onDelete('cascade');          
            $table->string('libelle');
            $table->string('prix_ht');
            $table->string('stock_minimal');
            $table->string('stock')->nullable();
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
        Schema::dropIfExists('pieces');
    }
}
