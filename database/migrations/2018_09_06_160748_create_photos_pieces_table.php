<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosPiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_pieces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('piece_id')->unsigned();
            $table->foreign('piece_id')->references('id')->on('pieces')->onDelete('cascade');
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
        Schema::dropIfExists('photos_pieces');
    }
}
