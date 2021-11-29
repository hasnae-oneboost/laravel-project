<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client')->unsigned();
            $table->foreign('client')->references('id')->on('clients')->onDelete('cascade');
            $table->string('date_appel');
            $table->string('heure_appel');
            $table->string('resume_appel');
            $table->string('prochain_appel');
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
        Schema::dropIfExists('appels');
    }
}
