<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAjouteParAndModifieParColumnsToEquipementProtectionIndividuellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipement_protection_individuelles', function($table) {
            $table->string('ajoute_par')->after('description');
            $table->string('modifie_par')->after('ajoute_par');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipement_protection_individuelles', function($table) {
            $table->dropColumn('ajoute_par');
            $table->dropColumn('modifie_par');
        });
    }
}
