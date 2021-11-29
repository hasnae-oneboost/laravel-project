<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipementProtectionIndividuellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipement_protection_individuelles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->string('frequence');
            $table->string('unite');
            $table->string('montant_ht');
            $table->string('tva');
            $table->string('montant_ttc');
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
        Schema::dropIfExists('equipement_protection_individuelles');
    }
}
