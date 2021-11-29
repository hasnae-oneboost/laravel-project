<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrestataireIdToTracteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracteurs', function($table) {
            $table->integer('prestataire_id')->unsigned()->index()->nullable();
            $table->foreign('prestataire_id')->references('id')->on('prestataires')->onDelete('cascade');
            $table->string('prestataire')->after('prestataire_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracteurs', function($table) {
            $table->dropColumn('prestataire_id');
            $table->dropColumn('prestataire');
           
        });
    }
}
