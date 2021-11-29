<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTracteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_tracteurs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tracteur_id')->unsigned()->index()->nullable()->before('document');
            $table->foreign('tracteur_id')->references('id')->on('vehicules')->onDelete('cascade');
            $table->string('document');
            $table->string('date');
            $table->string('date_expiration');
            $table->string('alerte');
            $table->string('fichier');
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
        Schema::dropIfExists('document_tracteurs');
    }
}
