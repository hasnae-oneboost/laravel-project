<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->integer('parc_id')->unsigned()->index()->nullable()->after('login');
            $table->foreign('parc_id')->references('id')->on('parcs')->onDelete('cascade');
            $table->integer('client_id')->unsigned()->index()->nullable()->after('parc_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('parc_id');
            $table->dropColumn('client_id');
        });
    }
}
