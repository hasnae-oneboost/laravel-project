<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipementVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipement_vehicules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('type_equipement_vehicules')->onDelete('cascade');
            $table->string('libelle');           
            $table->string('description');
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
        Schema::dropIfExists('equipement_vehicules');
    }
}
