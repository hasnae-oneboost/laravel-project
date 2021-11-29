<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemiRemorquesPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semi_remorques_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('semiremorque_id')->unsigned();
            $table->foreign('semiremorque_id')->references('id')->on('vehicules')->onDelete('cascade');
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
        Schema::dropIfExists('semi_remorques_photos');
    }
}
