<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifsGasoilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifs_gasoils', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->integer('service_station')->unsigned();
            $table->foreign('service_station')->references('id')->on('service_stations')->onDelete('cascade');
            $table->string('station');
            $table->decimal('montan_ht');
            $table->decimal('montan_tva');
            $table->decimal('montan_ttc');
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
        Schema::dropIfExists('tarifs_gasoils');
    }
}
