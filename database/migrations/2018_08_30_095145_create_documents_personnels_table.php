<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsPersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_personnels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_id')->unsigned()->index()->nullable();
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade');
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
        Schema::dropIfExists('documents_personnels');
    }
}
