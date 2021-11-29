<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsSemiRemorquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_semi_remorques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('semiremorque_id')->unsigned()->index()->nullable();
            $table->foreign('semiremorque_id')->references('id')->on('semi_remorques')->onDelete('cascade');
            $table->string('document');
            $table->string('date');
            $table->string('date_expiration');
            $table->string('alerte');
            $table->string('fichier');
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
        Schema::dropIfExists('documents_semi_remorques');
    }
}
