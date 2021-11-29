<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->string('code');
            $table->integer('type_tva_id')->unsigned();
            $table->foreign('type_tva_id')->references('id')->on('tva_types')->onDelete('cascade');
            $table->decimal('taux_tva');
            $table->string('description');            
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
        Schema::dropIfExists('tvas');
    }
}
