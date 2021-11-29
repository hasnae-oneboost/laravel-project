<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutorisationsAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorisations_absences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_id')->unsigned()->index()->nullable();
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade');
            $table->integer('type_id')->unsigned()->index()->nullable();
            $table->foreign('type_id')->references('id')->on('types_absences')->onDelete('cascade');
            $table->string('date_demande');
            $table->string('date_depart');
            $table->string('date_retour');
            $table->string('date_reprise');
            $table->string('description')->nullable();
            $table->string('ajout_par');
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
        Schema::dropIfExists('autorisations_absences');
    }
}
