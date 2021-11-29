<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnEcheanceToFournisseur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fournisseurs', function($table) {
            $table->integer('echeance')->unsigned()->index()->nullable()->after('activite');
            $table->foreign('echeance')->references('id')->on('echeances')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fournisseurs', function($table) {
            $table->dropColumn('echeance');
        });
    }
}
