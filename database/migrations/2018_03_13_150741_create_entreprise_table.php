<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrepriseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('raison_sociale');
            $table->string('logo');
            $table->string('IF');
            $table->string('RC');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('fixe');
            $table->string('type');
            $table->string('capital');
            $table->string('cnss');
            $table->string('TP');
            $table->string('swift');
            $table->string('site');
            $table->string('ice');
            $table->string('email');
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
        Schema::dropIfExists('entreprise');
    }
}
