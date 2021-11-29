<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnFournisseurToTableAppels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appels', function($table) {
            $table->integer('fournisseur')->unsigned()->index()->nullable()->after('client');
            $table->foreign('fournisseur')->references('id')->on('fournisseurs')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appels', function($table) {
            $table->dropColumn('fournisseur');
        });
    }
}
