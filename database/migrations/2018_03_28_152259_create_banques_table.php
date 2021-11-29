<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('nom')->unique();
            $table->string('nom_responsable');
            $table->text('adresse');
            $table->string('logo');
            $table->integer('ville_id')->unsigned();
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
            $table->string('site_web');
            $table->text('description');
            $table->string('compte_general');
            $table->string('telephone');
            $table->string('gsm');
            $table->string('fax');
            $table->string('rc');
            $table->string('patente');
            $table->string('if');            
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
        Schema::dropIfExists('banques');
    }
}
