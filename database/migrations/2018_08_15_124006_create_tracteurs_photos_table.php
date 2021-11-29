<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracteursPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracteurs_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tracteur_id')->unsigned();
            $table->foreign('tracteur_id')->references('id')->on('vehicules')->onDelete('cascade');
            $table->string('ordre');
            $table->string('photo');
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
        Schema::dropIfExists('tracteurs_photos');
    }
}
