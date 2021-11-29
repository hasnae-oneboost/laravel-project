<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToDiagnosticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diagnostics', function($table){
            $table->integer('famille_id')->unsigned()->index()->nullable();
            $table->foreign('famille_id')->references('id')->on('familles_pieces')->onDelete('cascade');
            $table->integer('categorie_id')->unsigned()->index()->nullable();
            $table->foreign('categorie_id')->references('id')->on('categories_pieces')->onDelete('cascade');
            $table->integer('piece_id')->unsigned()->index()->nullable();
            $table->foreign('piece_id')->references('id')->on('pieces')->onDelete('cascade');
            $table->integer('unite_id')->unsigned()->index()->nullable();
            $table->foreign('unite_id')->references('id')->on('unites')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diagnostics', function($table) {
            $table->dropColumn('famille_id');
            $table->dropColumn('categorie_id');
            $table->dropColumn('piece_id');
            $table->dropColumn('unite_id');
        });
    }
}
