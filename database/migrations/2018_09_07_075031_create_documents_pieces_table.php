<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsPiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_pieces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('piece_id')->unsigned()->index()->nullable();
            $table->foreign('piece_id')->references('id')->on('pieces')->onDelete('cascade');
            $table->string('fichier');
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
        Schema::dropIfExists('documents_pieces');
    }
}
