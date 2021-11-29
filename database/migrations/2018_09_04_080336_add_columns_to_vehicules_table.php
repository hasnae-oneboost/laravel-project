<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicules', function($table) {
            $table->string('kilometrage')->after('code')->default(0);
            $table->string('index_horaire')->after('kilometrage')->default(0);
            $table->string('etat')->after('index_horaire')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicules', function($table) {
            $table->dropColumn('kilometrage');
            $table->dropColumn('index_horaire');
            $table->dropColumn('etat');
           
        });
    }
}
