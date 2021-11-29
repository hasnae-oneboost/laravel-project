<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoituresServicesPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voitures_services_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voiture_id')->unsigned()->index()->nullable();
            $table->foreign('voiture_id')->references('id')->on('vehicules')->onDelete('cascade');
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
        Schema::dropIfExists('voitures_services_photos');
    }
}
