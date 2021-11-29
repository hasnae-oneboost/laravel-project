<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeagesAutoroutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peages_autoroutes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('peage');
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
        Schema::dropIfExists('peages_autoroutes');
    }
}
