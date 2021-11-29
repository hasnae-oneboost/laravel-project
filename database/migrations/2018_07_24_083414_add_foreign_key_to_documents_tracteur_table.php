<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToDocumentsTracteurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents_tracteurs', function($table) {
            $table->integer('tracteur_id')->unsigned()->index()->nullable()->before('document');
            $table->foreign('tracteur_id')->references('id')->on('tracteurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents_tracteurs', function($table) {
            $table->dropColumn('tracteur_id');
           
        });
    }
}
