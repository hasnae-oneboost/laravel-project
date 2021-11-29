<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('nom');
            $table->string('adresse');                        
            $table->integer('pay_id')->unsigned();
            $table->foreign('pay_id')->references('id')->on('pays')->onDelete('cascade');
            $table->integer('ville_id')->unsigned();
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
            $table->string('code_gestionnaire');
            $table->string('nom_gestionnaire');
            $table->string('email_gestionnaire');
            $table->string('commentaire');
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
        Schema::dropIfExists('parcs');
    }
}
